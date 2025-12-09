<x-layout.dashboard>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h6>Layanan Bengkel Saya</h6>
                        <a href="{{ route('my-bengkel.services.create') }}" class="btn btn-primary btn-sm">
                            <i class="isax isax-add me-2"></i>Kelola Layanan
                        </a>
                    </div>
                    <div class="card-body">
                        @if ($bengkelServices->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama Layanan</th>
                                            <th>Deskripsi</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bengkelServices as $bengkelService)
                                            <tr>
                                                <td>{{ $bengkelService->service->name }}</td>
                                                <td>{{ Str::limit($bengkelService->service->description, 50) }}</td>
                                                <td>
                                                    <span class="badge bg-success">Aktif</span>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="alert alert-info">
                                <p class="mb-0">Anda belum memiliki layanan. <a href="{{ route('my-bengkel.services.create') }}">Tambah layanan sekarang</a></p>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.dashboard>
