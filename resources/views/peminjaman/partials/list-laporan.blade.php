<table>
    <thead>
        <tr>
            <th>No</th>
            <th>Kode Peminjaman</th>
            <th>Nama Barang</th>
            <th>Peminjam</th>
            <th>Kontak</th>
            <th>Tgl. Pinjam</th>
            <th>Tgl. Kembali</th>
            <th>Status</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($peminjaman as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->kode_peminjaman }}</td>
                <td>{{ $item->barang->nama_barang ?? '-' }}</td>
                <td>{{ $item->nama_peminjam }}</td>
                <td>{{ $item->kontak_peminjam }}</td>
                <td>{{ date('d-m-Y', strtotime($item->tanggal_pinjam)) }}</td>
                <td>
                    @if($item->tanggal_kembali_aktual)
                        {{ date('d-m-Y', strtotime($item->tanggal_kembali_aktual)) }}
                    @else
                        {{ date('d-m-Y', strtotime($item->tanggal_kembali_rencana)) }}
                    @endif
                </td>
                <td>{{ ucfirst($item->status) }}</td>
            </tr>
        @empty
            <tr>
                <td colspan="8" style="text-align: center;">Tidak ada data.</td>
            </tr>
        @endforelse
    </tbody>
</table>