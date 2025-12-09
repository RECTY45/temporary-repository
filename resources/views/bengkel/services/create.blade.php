<x-layout.dashboard>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Kelola Layanan</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('my-bengkel.services.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">Pilih Layanan yang Tersedia</label>
                                <div class="row">
                                    @foreach ($allServices as $service)
                                        <div class="col-md-6 mb-3">
                                            <div class="form-check">
                                                <input 
                                                    class="form-check-input" 
                                                    type="checkbox" 
                                                    name="services[]" 
                                                    value="{{ $service->id }}"
                                                    id="service_{{ $service->id }}"
                                                    {{ in_array($service->id, $assignedServiceIds) ? 'checked' : '' }}
                                                >
                                                <label class="form-check-label" for="service_{{ $service->id }}">
                                                    <strong>{{ $service->name }}</strong>
                                                    <br>
                                                    <small class="text-muted">{{ $service->description }}</small>
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                @error('services')
                                    <div class="text-danger small mt-2">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="d-flex gap-2">
                                <button type="submit" class="btn btn-primary">
                                    <i class="isax isax-save me-2"></i>Simpan Layanan
                                </button>
                                <a href="{{ route('my-bengkel.services.index') }}" class="btn btn-secondary">
                                    Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.dashboard>
