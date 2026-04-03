<x-main-layout :title-page="__('Edit Peminjaman')">
    <div class="d-flex justify-content-between align-items-center mb-4">
    </div>

    @if($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Terjadi Kesalahan!</strong>
        <ul class="mb-0 mt-2">
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    @endif

    <div class="card border-0 shadow-sm">
        <div class="card-header bg-warning">
            <h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>Form Edit Peminjaman</h5>
        </div>
        <div class="card-body">
            <form action="{{ route('peminjaman.update', $peminjaman->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <!-- Barang -->
                    <div class="col-md-6 mb-3">
                        <label for="barang_id" class="form-label">Barang <span class="text-danger">*</span></label>
                        <select name="barang_id" id="barang_id" 
                                class="form-select @error('barang_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barang as $item)
                            <option value="{{ $item->id }}" {{ old('barang_id', $peminjaman->barang_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->kode_barang }} - {{ $item->nama_barang }} ({{ $item->kondisi }})
                            </option>
                            @endforeach
                        </select>
                        @error('barang_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Jumlah -->
                    <div class="col-md-6 mb-3">
                        <label for="jumlah" class="form-label">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" name="jumlah" id="jumlah" min="1" 
                               class="form-control @error('jumlah') is-invalid @enderror" 
                               value="{{ old('jumlah', $peminjaman->jumlah) }}" required>
                        @error('jumlah')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nama Peminjam -->
                    <div class="col-md-6 mb-3">
                        <label for="nama_peminjam" class="form-label">Nama Peminjam <span class="text-danger">*</span></label>
                        <input type="text" name="nama_peminjam" id="nama_peminjam"
                               class="form-control @error('nama_peminjam') is-invalid @enderror"
                               value="{{ old('nama_peminjam', $peminjaman->nama_peminjam) }}"
                               placeholder="Masukkan nama peminjam" required>
                        @error('nama_peminjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kontak Peminjam -->
                    <div class="col-md-6 mb-3">
                        <label for="kontak_peminjam" class="form-label">Kontak Peminjam <span class="text-danger">*</span></label>
                        <input type="text" name="kontak_peminjam" id="kontak_peminjam"
                               class="form-control @error('kontak_peminjam') is-invalid @enderror"
                               value="{{ old('kontak_peminjam', $peminjaman->kontak_peminjam) }}"
                               placeholder="Nomor HP/Email" required>
                        @error('kontak_peminjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Divisi -->
                    <div class="col-md-6 mb-3">
                        <label for="divisi" class="form-label">Divisi/Departemen</label>
                        <input type="text" name="divisi" id="divisi"
                               class="form-control @error('divisi') is-invalid @enderror"
                               value="{{ old('divisi', $peminjaman->divisi) }}"
                               placeholder="Contoh: IT, HRD, Keuangan">
                        @error('divisi')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Sumber Dana -->
                    <div class="col-md-6 mb-3">
                        <label for="sumber_dana" class="form-label">Sumber Dana</label>
                        <select name="sumber_dana" 
                                id="sumber_dana" 
                                class="form-select @error('sumber_dana') is-invalid @enderror">
                            <option value="">-- Pilih Sumber Dana --</option>
                            <option value="Swadaya" {{ old('sumber_dana', $peminjaman->sumber_dana) == 'Swadaya' ? 'selected' : '' }}>Swadaya</option>
                            <option value="Pemerintah" {{ old('sumber_dana', $peminjaman->sumber_dana) == 'Pemerintah' ? 'selected' : '' }}>Pemerintah</option>
                            <option value="Donatur" {{ old('sumber_dana', $peminjaman->sumber_dana) == 'Donatur' ? 'selected' : '' }}>Donatur</option>
                        </select>
                        @error('sumber_dana')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Kondisi Pinjam -->
                    <div class="col-md-6 mb-3">
                        <label for="kondisi_pinjam" class="form-label">Kondisi Barang Saat Dipinjam <span class="text-danger">*</span></label>
                        <select name="kondisi_pinjam" id="kondisi_pinjam"
                                class="form-select @error('kondisi_pinjam') is-invalid @enderror" required>
                            <option value="">-- Pilih Kondisi --</option>
                            <option value="baik" {{ old('kondisi_pinjam', $peminjaman->kondisi_pinjam) == 'baik' ? 'selected' : '' }}>Baik</option>
                            <option value="rusak ringan" {{ old('kondisi_pinjam', $peminjaman->kondisi_pinjam) == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="rusak berat" {{ old('kondisi_pinjam', $peminjaman->kondisi_pinjam) == 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                        @error('kondisi_pinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Pinjam -->
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"
                               class="form-control @error('tanggal_pinjam') is-invalid @enderror"
                               value="{{ old('tanggal_pinjam', $peminjaman->tanggal_pinjam->format('Y-m-d')) }}" required>
                        @error('tanggal_pinjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Tanggal Kembali -->
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_kembali_rencana" class="form-label">Tanggal Rencana Kembali <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_kembali_rencana" id="tanggal_kembali_rencana"
                               class="form-control @error('tanggal_kembali_rencana') is-invalid @enderror"
                               value="{{ old('tanggal_kembali_rencana', $peminjaman->tanggal_kembali_rencana->format('Y-m-d')) }}" required>
                        @error('tanggal_kembali_rencana')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Catatan -->
                    <div class="col-md-12 mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea name="catatan" id="catatan" rows="4"
                                  class="form-control @error('catatan') is-invalid @enderror"
                                  placeholder="Catatan tambahan (opsional)">{{ old('catatan', $peminjaman->catatan) }}</textarea>
                        @error('catatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-2 justify-content-end mt-4">
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                       <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-warning">
                        <i class="bi bi-save me-1"></i> Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Validasi tanggal kembali >= tanggal pinjam
        const tanggalPinjam = document.getElementById('tanggal_pinjam');
        const tanggalKembali = document.getElementById('tanggal_kembali_rencana');
        
        tanggalPinjam.addEventListener('change', function() {
            tanggalKembali.min = this.value;
            if (tanggalKembali.value && tanggalKembali.value < this.value) {
                tanggalKembali.value = this.value;
            }
        });
        
        if (tanggalPinjam.value) {
            tanggalKembali.min = tanggalPinjam.value;
        }
    });
    </script>
    @endpush
</x-main-layout>