<x-main-layout :title-page="__('Tambah Peminjaman')">
    <div class="card">
        <div class="card-body p-4">
            <form action="{{ route('peminjaman.store') }}" method="POST">
                @csrf

            <div class="row">
                <!-- Kolom Kiri -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="barang_id" class="form-label fw-semibold">Barang <span class="text-danger">*</span></label>
                        <select name="barang_id" id="barang_id" class="form-select @error('barang_id') is-invalid @enderror" required>
                            <option value="">-- Pilih Barang --</option>
                            @foreach($barang as $item)
                                <option value="{{ $item->id }}">{{ $item->nama_barang }} - {{ $item->kategori->nama_kategori ?? '-' }}</option>
                            @endforeach
                        </select>
                        @error('barang_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="nama_peminjam" class="form-label fw-semibold">Nama Peminjam <span class="text-danger">*</span></label>
                        <input type="text" name="nama_peminjam" id="nama_peminjam" class="form-control @error('nama_peminjam') is-invalid @enderror" required>
                        @error('nama_peminjam')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="kontak_peminjam" class="form-label fw-semibold">Kontak Peminjam <span class="text-danger">*</span></label>
                        <input type="text" name="kontak_peminjam" id="kontak_peminjam" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="divisi" class="form-label fw-semibold">Divisi / Organisasi</label>
                        <input type="text" name="divisi" id="divisi" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label for="sumber_dana" class="form-label fw-semibold">Sumber Dana</label>
                        <input type="text" name="sumber_dana" id="sumber_dana" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="jumlah" class="form-label fw-semibold">Jumlah <span class="text-danger">*</span></label>
                        <input type="number" name="jumlah" id="jumlah" class="form-control" value="1" min="1" required>
                    </div>
                </div>

                <!-- Kolom Kanan -->
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="tanggal_pinjam" class="form-label fw-semibold">Tanggal Pinjam <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="form-control" value="{{ date('Y-m-d') }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="tanggal_kembali_rencana" class="form-label fw-semibold">Tanggal Rencana Kembali <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_kembali_rencana" id="tanggal_kembali_rencana" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="kondisi_pinjam" class="form-label fw-semibold">Kondisi Barang Saat Dipinjam</label>
                        <input type="text" name="kondisi_pinjam" id="kondisi_pinjam" class="form-control" readonly>
                    </div>

                    <div class="mb-3">
                        <label for="catatan" class="form-label fw-semibold">Catatan</label>
                        <textarea name="catatan" id="catatan" rows="5" class="form-control" placeholder="Catatan tambahan (opsional)"></textarea>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-between mt-4 pt-3 border-top">
                <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Kembali</a>
                <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Simpan Peminjaman</button>
            </div>
        </form>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const barangSelect = document.querySelector('select[name="barang_id"]');
        const sumberDanaInput = document.querySelector('input[name="sumber_dana"]');
        const kondisiInput = document.querySelector('input[name="kondisi_pinjam"]');

        barangSelect.addEventListener('change', function () {
            const id = this.value;

            if (id) {
                fetch(`/get-barang-detail/${id}`)
                    .then(response => response.json())
                    .then(data => {
                        sumberDanaInput.value = data.sumber_dana || '';
                        kondisiInput.value = data.kondisi || '';
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                sumberDanaInput.value = '';
                kondisiInput.value = '';
            }
        });
    });
</script>


</x-main-layout>
