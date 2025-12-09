<?php

namespace App\Http\Controllers;

use App\Models\Bengkel;
use App\Models\Service;
use App\Models\BengkelService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BengkelOwnServiceController extends Controller
{
    /**
     * Display bengkel's own services
     */
    public function index()
    {
        $user = Auth::user();
        $bengkel = $user->bengkel;

        if (!$bengkel) {
            return redirect()->route('dashboard')->with('error', 'Bengkel tidak ditemukan.');
        }

        $bengkel->load('bengkelServices.service');
        $bengkelServices = $bengkel->bengkelServices;

        return view('bengkel.services.index', compact('bengkel', 'bengkelServices'));
    }

    /**
     * Show form to add services
     */
    public function create()
    {
        $user = Auth::user();
        $bengkel = $user->bengkel;

        if (!$bengkel) {
            return redirect()->route('dashboard')->with('error', 'Bengkel tidak ditemukan.');
        }

        $allServices = Service::all();
        $assignedServiceIds = $bengkel->bengkelServices->pluck('service_id')->toArray();

        return view('bengkel.services.create', compact('bengkel', 'allServices', 'assignedServiceIds'));
    }

    /**
     * Store services
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $bengkel = $user->bengkel;

        if (!$bengkel) {
            return redirect()->route('dashboard')->with('error', 'Bengkel tidak ditemukan.');
        }

        $request->validate([
            'services' => 'required|array',
            'services.*' => 'exists:services,id',
        ]);

        $bengkel->bengkelServices()->delete();

        foreach ($request->services as $serviceId) {
            BengkelService::create([
                'bengkel_id' => $bengkel->id,
                'service_id' => $serviceId,
            ]);
        }

        return redirect()->route('my-bengkel.services.index')
            ->with('success', 'Layanan berhasil diperbarui.');
    }
}
