<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class BengkelProfileController extends Controller
{
    /**
     * Show bengkel profile and settings
     */
    public function edit()
    {
        $user = Auth::user();
        $bengkel = $user->bengkel;

        if (!$bengkel) {
            return redirect()->route('dashboard')->with('error', 'Bengkel tidak ditemukan.');
        }

        return view('bengkel.settings.index', compact('user', 'bengkel'));
    }

    /**
     * Update bengkel profile
     */
    public function update(Request $request)
    {
        $user = Auth::user();
        $bengkel = $user->bengkel;

        if (!$bengkel) {
            return redirect()->route('dashboard')->with('error', 'Bengkel tidak ditemukan.');
        }

        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'avatar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $validatedBengkel = $request->validate([
            'bengkel_name' => 'required|string|max:255',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:20',
            'latitude' => 'nullable|string',
            'longitude' => 'nullable|string',
            'open_time' => 'required|date_format:H:i',
            'close_time' => 'required|date_format:H:i',
        ]);

        // Update user
        if (!empty($validatedUser['password'])) {
            $validatedUser['password'] = Hash::make($validatedUser['password']);
        } else {
            unset($validatedUser['password']);
        }

        if ($request->hasFile('avatar')) {
            $validatedUser['avatar'] = $request->file('avatar')->store('avatars', 'public');
        }

        $user->update($validatedUser);

        // Update bengkel
        $bengkel->update([
            'name' => $validatedBengkel['bengkel_name'],
            'address' => $validatedBengkel['address'],
            'phone' => $validatedBengkel['phone'],
            'latitude' => $validatedBengkel['latitude'] ?? $bengkel->latitude,
            'longitude' => $validatedBengkel['longitude'] ?? $bengkel->longitude,
            'open_time' => $validatedBengkel['open_time'],
            'close_time' => $validatedBengkel['close_time'],
        ]);

        return redirect()->route('my-bengkel.settings.index')
            ->with('success', 'Profil bengkel berhasil diperbarui.');
    }
}
