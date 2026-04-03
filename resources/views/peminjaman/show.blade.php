<x-main-layout :title-page="__('Detail Peminjaman')">
    <div class="d-flex justify-content-between align-items-center mb-4">
    </div>

    <div class="row">
        <!-- Informasi Peminjaman -->
        <div class="col-lg-8 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0"><i class="bi bi-file-text me-2"></i> Informasi Peminjaman</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <tbody>
                                <tr>
                                    <th width="220" class="text-muted">Kode Peminjaman</th>
                                    <td class="fw-bold">{{ $peminjaman->kode_peminjaman }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Status</th>
                                    <td>
                                        @if($peminjaman->status === 'dipinjam')
                                            <span class="badge bg-warning text-dark">Dipinjam</span>
                                        @elseif($peminjaman->status === 'dikembalikan')
                                            <span class="badge bg-success">Dikembalikan</span>
                                        @else
                                            <span class="badge bg-danger">Terlambat</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Nama Peminjam</th>
                                    <td>{{ $peminjaman->nama_peminjam }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Kontak Peminjam</th>
                                    <td>{{ $peminjaman->kontak_peminjam }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Divisi</th>
                                    <td>{{ $peminjaman->divisi ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Sumber Dana</th>
                                    <td>
                                        @if($peminjaman->sumber_dana)
                                            <span class="badge bg-info">{{ $peminjaman->sumber_dana }}</span>
                                        @else
                                            <span class="text-muted">-</span>
                                        @endif
                                    </td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Jumlah</th>
                                    <td>{{ $peminjaman->jumlah }} Unit</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Tanggal Pinjam</th>
                                    <td>{{ $peminjaman->tanggal_pinjam->format('d F Y') }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Tanggal Kembali (Rencana)</th>
                                    <td>
                                        {{ $peminjaman->tanggal_kembali_rencana->format('d F Y') }}
                                        @if($peminjaman->status !== 'dikembalikan' && $peminjaman->tanggal_kembali_rencana < now())
                                            <span class="badge bg-danger ms-2">Terlambat</span>
                                        @endif
                                    </td>
                                </tr>
                                @if($peminjaman->tanggal_kembali_aktual)
                                <tr>
                                    <th class="text-muted">Tanggal Kembali (Aktual)</th>
                                    <td>
                                        {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali_aktual)->format('d F Y') }}
                                        @if($peminjaman->tanggal_kembali_aktual > $peminjaman->tanggal_kembali_rencana)
                                            <span class="badge bg-warning text-dark ms-2">
                                                Terlambat {{ \Carbon\Carbon::parse($peminjaman->tanggal_kembali_rencana)->diffInDays($peminjaman->tanggal_kembali_aktual) }} hari
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <th class="text-muted">Kondisi Saat Pinjam</th>
                                    <td>
                                        @if($peminjaman->kondisi_pinjam === 'baik')
                                            <span class="badge bg-success">Baik</span>
                                        @elseif($peminjaman->kondisi_pinjam === 'rusak ringan')
                                            <span class="badge bg-warning text-dark">Rusak Ringan</span>
                                        @else
                                            <span class="badge bg-danger">Rusak Berat</span>
                                        @endif
                                    </td>
                                </tr>
                                @if($peminjaman->kondisi_kembali)
                                <tr>
                                    <th class="text-muted">Kondisi Saat Kembali</th>
                                    <td>
                                        @if($peminjaman->kondisi_kembali === 'baik')
                                            <span class="badge bg-success">Baik</span>
                                        @elseif($peminjaman->kondisi_kembali === 'rusak ringan')
                                            <span class="badge bg-warning text-dark">Rusak Ringan</span>
                                        @else
                                            <span class="badge bg-danger">Rusak Berat</span>
                                        @endif
                                    </td>
                                </tr>
                                @endif
                                @if($peminjaman->catatan)
                                <tr>
                                    <th class="text-muted align-top">Catatan Peminjaman</th>
                                    <td>{{ $peminjaman->catatan }}</td>
                                </tr>
                                @endif
                                @if($peminjaman->catatan_pengembalian)
                                <tr>
                                    <th class="text-muted align-top">Catatan Pengembalian</th>
                                    <td>{{ $peminjaman->catatan_pengembalian }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <th class="text-muted">Diinput Oleh</th>
                                    <td>{{ $peminjaman->user->name ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-muted">Tanggal Input</th>
                                    <td>{{ $peminjaman->created_at->format('d F Y H:i') }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Informasi Barang -->
        <div class="col-lg-4 mb-4">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="bi bi-box-seam me-2"></i> Informasi Barang</h5>
                </div>
                <div class="card-body">
                    @if($peminjaman->barang)
                        <div class="table-responsive">
                            <table class="table table-hover align-middle mb-0">
                                <tbody>
                                    <tr>
                                        <th class="text-muted">Kode Barang</th>
                                        <td class="fw-bold">{{ $peminjaman->barang->kode_barang }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Nama Barang</th>
                                        <td>{{ $peminjaman->barang->nama_barang }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Kategori</th>
                                        <td>{{ $peminjaman->barang->kategori->nama_kategori ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Lokasi</th>
                                        <td>{{ $peminjaman->barang->lokasi->nama_lokasi ?? '-' }}</td>
                                    </tr>
                                    <tr>
                                        <th class="text-muted">Kondisi Barang</th>
                                        <td>
                                            @php
                                                $kondisi = strtolower(trim($peminjaman->barang->kondisi));
                                            @endphp
                                            
                                            @if($kondisi === 'baik')
                                                <span class="badge bg-success">Baik</span>
                                            @elseif($kondisi === 'rusak ringan')
                                                <span class="badge bg-warning text-dark">Rusak Ringan</span>
                                            @elseif($kondisi === 'rusak berat')
                                                <span class="badge bg-danger">Rusak Berat</span>
                                            @else
                                                <span class="badge bg-secondary">{{ ucfirst($peminjaman->barang->kondisi) }}</span>
                                            @endif
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <div class="mt-3">
                            <a href="{{ route('barang.show', $peminjaman->barang->id) }}" 
                               class="btn btn-sm btn-outline-primary w-100">
                                <i class="bi bi-eye me-1"></i> Lihat Detail Barang
                            </a>
                        </div>
                    @else
                        <p class="text-muted mb-0">Data barang tidak ditemukan</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    
    <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>
</x-main-layout>