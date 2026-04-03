<x-main-layout :title-page="__('Peminjaman')">
    <div class="card">
        <div class="card-body">
            <!-- Action Buttons & Search -->
            <div class="row">
                <div class="col-lg-6 mb-2 mb-lg-0">
                    <a href="{{ route('peminjaman.create') }}" class="btn btn-primary">
                        <i class="bi bi-plus-lg"></i> Tambah Peminjaman
                    </a>

                    <!-- Tombol Laporan -->
                    <a href="{{ route('peminjaman.laporan') }}" class="btn btn-success">
                        <i class="bi bi-printer"></i> Cetak Laporan Peminjaman 
                    </a>
                </div>
                <div class="col-lg-6">
                    <form action="{{ route('peminjaman.index') }}" method="GET" class="d-flex gap-2">
                        <input type="text" 
                               name="search" 
                               class="form-control" 
                               placeholder="Cari nama peminjam atau kode..." 
                               value="{{ request('search') }}">
                        <select name="status" class="form-select" style="max-width: 180px;">
                            <option value="">Semua Status</option>
                            <option value="dipinjam" {{ request('status') == 'dipinjam' ? 'selected' : '' }}>Dipinjam</option>
                            <option value="dikembalikan" {{ request('status') == 'dikembalikan' ? 'selected' : '' }}>Dikembalikan</option>
                            <option value="terlambat" {{ request('status') == 'terlambat' ? 'selected' : '' }}>Terlambat</option>
                        </select>
                        <button type="submit" class="btn btn-primary px-3">
                            <i class="bi bi-search"></i>
                        </button>
                        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary px-3">
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>
                    </form>
                </div>
            </div>

            <x-notif-alert class="mt-4" />
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Peminjam</th>
                        <th>Kontak</th>
                        <th>Tgl Pinjam</th>
                        <th>Tgl Kembali</th>
                        <th>Status</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($peminjaman as $key => $item)
                    <tr>
                        <td>{{ $peminjaman->firstItem() + $key }}</td>
                        <td>{{ $item->kode_peminjaman }}</td>
                        <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                        <td>{{ $item->nama_peminjam }}</td>
                        <td>{{ $item->kontak_peminjam }}</td>
                        <td>{{ $item->tanggal_pinjam->format('d-m-Y') }}</td>
                        <td>{{ $item->tanggal_kembali_rencana->format('d-m-Y') }}</td>
                        <td>
                            @if($item->status === 'dipinjam')
                                <span class="badge bg-warning text-dark">Dipinjam</span>
                            @elseif($item->status === 'dikembalikan')
                                <span class="badge bg-success">Dikembalikan</span>
                            @else
                                <span class="badge bg-danger">Terlambat</span>
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ route('peminjaman.show', $item->id) }}" 
                               class="btn btn-sm btn-info text-white" 
                               title="Detail"
                               data-bs-toggle="tooltip">
                                <i class="bi bi-eye"></i>
                            </a>
                            
                            @if($item->status === 'dipinjam' || $item->status === 'terlambat')
                            <a href="{{ route('peminjaman.kembali', $item->id) }}" 
                               class="btn btn-sm btn-success text-white" 
                               title="Pengembalian"
                               data-bs-toggle="tooltip">
                                <i class="bi bi-arrow-return-left"></i>
                            </a>
                            
                            <a href="{{ route('peminjaman.edit', $item->id) }}" 
                               class="btn btn-sm btn-warning text-white" 
                               title="Edit"
                               data-bs-toggle="tooltip">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            @endif

                            {{-- Tombol Delete TIDAK MUNCUL untuk Petugas Inventaris --}}
                            @if(Auth::user()->name !== 'Petugas Inventaris')
                            <button type="button" 
                                    class="btn btn-sm btn-danger text-white" 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#deleteModal{{ $item->id }}"
                                    title="Hapus">
                                <i class="bi bi-x-circle"></i>
                            </button>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal{{ $item->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog" style="max-width: 480px; margin-top: 3rem;">
                                    <div class="modal-content" style="border-radius: 8px; border: none; box-shadow: 0 2px 10px rgba(0,0,0,0.1);">
                                        <div class="modal-header" style="border-bottom: none; padding: 1.5rem 1.5rem 0.5rem;">
                                            <h5 class="modal-title d-flex align-items-center" style="font-size: 1.1rem; font-weight: 600; color: #212529;">
                                                <i class="bi bi-exclamation-diamond text-danger me-2" style="font-size: 1.3rem;"></i>
                                                Konfirmasi Hapus
                                            </h5>
                                        </div>
                                        <div class="modal-body" style="padding: 0.5rem 1.5rem 1.25rem;">
                                            <p class="mb-0" style="color: #6c757d; font-size: 0.95rem; line-height: 1.5;">
                                                Apakah Anda yakin ingin menghapus data ini?
                                            </p>
                                        </div>
                                        <div class="modal-footer" style="border-top: none; padding: 0 1.5rem 1.25rem; gap: 0.5rem; justify-content: flex-end;">
                                            <button type="button" 
                                                    class="btn" 
                                                    data-bs-dismiss="modal" 
                                                    style="background-color: #f8f9fa; border: 1px solid #dee2e6; color: #6c757d; padding: 0.45rem 1.25rem; font-size: 0.9rem; border-radius: 4px;">
                                                Cancel
                                            </button>
                                            <form action="{{ route('peminjaman.destroy', $item->id) }}" method="POST" style="display: inline; margin: 0;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" 
                                                        class="btn btn-danger" 
                                                        style="padding: 0.45rem 1.25rem; font-size: 0.9rem; border-radius: 4px;">
                                                    Ya, Hapus!
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center py-4">
                            <div class="text-muted">
                                <i class="bi bi-inbox" style="font-size: 3rem;"></i>
                                <p class="mt-2">Tidak ada data peminjaman</p>
                            </div>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="card-body">
            {{ $peminjaman->links() }}
        </div>
    </div>

    @push('scripts')
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
    });
    </script>
    @endpush
</x-main-layout>