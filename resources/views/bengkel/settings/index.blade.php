<x-layout.dashboard>
    <div class="container-fluid py-4">
        <div class="row">
            <div class="col-12">
                <div class="card mb-4">
                    <div class="card-header pb-0">
                        <h6>Pengaturan Akun & Profil Bengkel</h6>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('my-bengkel.settings.update') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <!-- User Account Section -->
                                <div class="col-md-6">
                                    <h5 class="mb-3">Akun Pengguna</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Lengkap</label>
                                        <input 
                                            type="text" 
                                            class="form-control @error('name') is-invalid @enderror" 
                                            name="name" 
                                            value="{{ old('name', $user->name) }}"
                                            required
                                        >
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Email</label>
                                        <input 
                                            type="email" 
                                            class="form-control @error('email') is-invalid @enderror" 
                                            name="email" 
                                            value="{{ old('email', $user->email) }}"
                                            required
                                        >
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password Baru <small class="text-muted">(Kosongkan jika tidak diubah)</small></label>
                                        <input 
                                            type="password" 
                                            class="form-control @error('password') is-invalid @enderror" 
                                            name="password"
                                        >
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Konfirmasi Password</label>
                                        <input 
                                            type="password" 
                                            class="form-control" 
                                            name="password_confirmation"
                                        >
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Avatar</label>
                                        <input 
                                            type="file" 
                                            class="form-control @error('avatar') is-invalid @enderror" 
                                            name="avatar"
                                            accept="image/*"
                                        >
                                        <small class="text-muted">Maksimal 2MB. Format: JPG, JPEG, PNG</small>
                                        @error('avatar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Bengkel Section -->
                                <div class="col-md-6">
                                    <h5 class="mb-3">Informasi Bengkel</h5>

                                    <div class="mb-3">
                                        <label class="form-label">Nama Bengkel</label>
                                        <input 
                                            type="text" 
                                            class="form-control @error('bengkel_name') is-invalid @enderror" 
                                            name="bengkel_name" 
                                            value="{{ old('bengkel_name', $bengkel->name) }}"
                                            required
                                        >
                                        @error('bengkel_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Alamat</label>
                                        <textarea 
                                            class="form-control @error('address') is-invalid @enderror" 
                                            name="address"
                                            rows="3"
                                            required
                                        >{{ old('address', $bengkel->address) }}</textarea>
                                        @error('address')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Nomor Telepon</label>
                                        <input 
                                            type="text" 
                                            class="form-control @error('phone') is-invalid @enderror" 
                                            name="phone" 
                                            value="{{ old('phone', $bengkel->phone) }}"
                                            required
                                        >
                                        @error('phone')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Jam Buka</label>
                                            <input 
                                                type="time" 
                                                class="form-control @error('open_time') is-invalid @enderror" 
                                                name="open_time" 
                                                value="{{ old('open_time', $bengkel->open_time?->format('H:i')) }}"
                                                required
                                            >
                                            @error('open_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Jam Tutup</label>
                                            <input 
                                                type="time" 
                                                class="form-control @error('close_time') is-invalid @enderror" 
                                                name="close_time" 
                                                value="{{ old('close_time', $bengkel->close_time?->format('H:i')) }}"
                                                required
                                            >
                                            @error('close_time')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Latitude</label>
                                            <input 
                                                type="text" 
                                                class="form-control @error('latitude') is-invalid @enderror" 
                                                name="latitude" 
                                                value="{{ old('latitude', $bengkel->latitude) }}"
                                            >
                                            @error('latitude')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Longitude</label>
                                            <input 
                                                type="text" 
                                                class="form-control @error('longitude') is-invalid @enderror" 
                                                name="longitude" 
                                                value="{{ old('longitude', $bengkel->longitude) }}"
                                            >
                                            @error('longitude')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="isax isax-save me-2"></i>Simpan Perubahan
                                </button>
                                <a href="{{ route('dashboard') }}" class="btn btn-secondary">
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
