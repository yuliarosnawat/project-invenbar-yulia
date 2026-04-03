<x-main-layout :title-page="__('Pengembalian Barang')">
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

    <!-- Informasi Peminjaman -->
    <div class="card border-0 shadow-sm mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">
                <i class="bi bi-info-circle me-2"></i> Informasi Peminjaman
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th width="200">Kode Peminjaman</th>
                            <td>: <strong>{{ $peminjaman->kode_peminjaman }}</strong></td>
                        </tr>
                        <tr>
                            <th>Nama Barang</th>
                            <td>: {{ $peminjaman->barang->nama_barang ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Nama Peminjam</th>
                            <td>: {{ $peminjaman->nama_peminjam }}</td>
                        </tr>
                        <tr>
                            <th>Kontak</th>
                            <td>: {{ $peminjaman->kontak_peminjam }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-6">
                    <table class="table table-borderless mb-0">
                        <tr>
                            <th width="200">Tanggal Pinjam</th>
                            <td>: {{ optional($peminjaman->tanggal_pinjam)->format('d-m-Y') ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Rencana Kembali</th>
                            <td>: {{ optional($peminjaman->tanggal_kembali_rencana)->format('d-m-Y') ?? '-' }}
                                @if($peminjaman->tanggal_kembali_rencana < now())
                                    <span class="badge bg-danger ms-2">Terlambat</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Kondisi Saat Dipinjam</th>
                            <td>:
                                @if($peminjaman->kondisi_pinjam === 'baik')
                                    <span class="badge bg-success">Baik</span>
                                @elseif($peminjaman->kondisi_pinjam === 'rusak ringan')
                                    <span class="badge bg-warning text-dark">Rusak Ringan</span>
                                @else
                                    <span class="badge bg-danger">Rusak Berat</span>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td>: {{ $peminjaman->jumlah }} Unit</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Form Pengembalian -->
    <div class="card border-0 shadow-sm">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">
                <i class="bi bi-arrow-return-left me-2"></i> Form Pengembalian
            </h5>
        </div>
        <div class="card-body">
            <form action="{{ route('peminjaman.prosesKembali', $peminjaman->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="tanggal_kembali_aktual" class="form-label">
                            Tanggal Pengembalian <span class="text-danger">*</span>
                        </label>
                        <input type="date"
                               name="tanggal_kembali_aktual"
                               id="tanggal_kembali_aktual"
                               class="form-control @error('tanggal_kembali_aktual') is-invalid @enderror"
                               value="{{ old('tanggal_kembali_aktual', date('Y-m-d')) }}"
                               min="{{ $peminjaman->tanggal_pinjam->format('Y-m-d') }}"
                               required>
                        <small class="text-muted">Minimal tanggal: {{ $peminjaman->tanggal_pinjam->format('d-m-Y') }}</small>
                        @error('tanggal_kembali_aktual')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6 mb-3">
                        <label for="kondisi_kembali" class="form-label">
                            Kondisi Barang Saat Dikembalikan <span class="text-danger">*</span>
                        </label>
                        <select name="kondisi_kembali"
                                id="kondisi_kembali"
                                class="form-select @error('kondisi_kembali') is-invalid @enderror"
                                required>
                            <option value="">-- Pilih Kondisi --</option>
                            <option value="baik" {{ old('kondisi_kembali', $peminjaman->kondisi_pinjam) == 'baik' ? 'selected' : '' }}>Baik</option>
                            <option value="rusak ringan" {{ old('kondisi_kembali', $peminjaman->kondisi_pinjam) == 'rusak ringan' ? 'selected' : '' }}>Rusak Ringan</option>
                            <option value="rusak berat" {{ old('kondisi_kembali', $peminjaman->kondisi_pinjam) == 'rusak berat' ? 'selected' : '' }}>Rusak Berat</option>
                        </select>
                        @error('kondisi_kembali')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-12 mb-3">
                        <label for="catatan_pengembalian" class="form-label">
                            Catatan Pengembalian
                        </label>
                        <textarea name="catatan_pengembalian"
                                  id="catatan_pengembalian"
                                  class="form-control @error('catatan_pengembalian') is-invalid @enderror"
                                  rows="4"
                                  placeholder="Masukkan catatan pengembalian (opsional)">{{ old('catatan_pengembalian') }}</textarea>
                        <small class="text-muted">Contoh: Barang dikembalikan dalam kondisi baik, tidak ada kerusakan</small>
                        @error('catatan_pengembalian')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="d-flex gap-2 justify-content-end mt-4">
                    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
                       <i class="bi bi-arrow-left"></i> Kembali
                     </a>
                    <button type="submit" class="btn btn-success">
                        <i class="bi bi-check-circle me-1"></i> Proses Pengembalian
                    </button>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
    <script>
    // Set default kondisi kembali sama dengan kondisi pinjam
    document.addEventListener('DOMContentLoaded', function() {
        const kondisiPinjam = "{{ $peminjaman->kondisi_pinjam }}";
        const kondisiKembaliSelect = document.getElementById('kondisi_kembali');
        
        if (!kondisiKembaliSelect.value) {
            kondisiKembaliSelect.value = kondisiPinjam;
        }
    });
    </script>
    @endpush
</x-main-layout>
