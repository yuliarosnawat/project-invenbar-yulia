<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
use App\Models\Barang;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Exports\PeminjamanExport;
use Illuminate\Support\Facades\Auth;

class PeminjamanController extends Controller
{
    public function index(Request $request)
    {
        $query = Peminjaman::with(['barang', 'user']);

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('kode_peminjaman', 'like', "%{$search}%")
                    ->orWhere('nama_peminjam', 'like', "%{$search}%")
                    ->orWhere('kontak_peminjam', 'like', "%{$search}%");
            });
        }

        if ($request->has('status') && $request->status != '') {
            $query->where('status', $request->status);
        }

        $peminjaman = $query->orderBy('created_at', 'desc')->paginate(10);

        foreach ($peminjaman as $item) {
            if ($item->isTerlambat() && $item->status === 'dipinjam') {
                $item->update(['status' => 'terlambat']);
            }
        }

        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $barang = Barang::with('kategori')->get();
        return view('peminjaman.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'nama_peminjam' => 'required|string|max:255',
            'kontak_peminjam' => 'required|string|max:255',
            'divisi' => 'nullable|string|max:255',
            'sumber_dana' => 'nullable|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali_rencana' => 'required|date|after_or_equal:tanggal_pinjam',
            'kondisi_pinjam' => 'nullable|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'catatan' => 'nullable|string'
        ]);

        $barang = Barang::findOrFail($validated['barang_id']);

        // ✅ Cek stok cukup atau tidak
        if ($barang->jumlah < $validated['jumlah']) {
            return back()->with('error', 'Stok barang tidak mencukupi untuk dipinjam.');
        }

        $validated['user_id'] = Auth::id();
        $validated['status'] = 'dipinjam';

        // ✅ Kurangi stok barang
        $barang->decrement('jumlah', $validated['jumlah']);

        Peminjaman::create($validated);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil ditambahkan dan stok barang berkurang');
    }

    public function show($id)
    {
        $peminjaman = Peminjaman::with([
            'barang.kategori',
            'barang.lokasi',
            'user'
        ])->findOrFail($id);

        return view('peminjaman.show', compact('peminjaman'));
    }

    public function edit(Peminjaman $peminjaman)
    {
        if ($peminjaman->status !== 'dipinjam') {
            return redirect()->route('peminjaman.index')
                ->with('error', 'Hanya peminjaman dengan status "dipinjam" yang dapat diedit');
        }

        $barang = Barang::with('kategori')->get();
        return view('peminjaman.edit', compact('peminjaman', 'barang'));
    }

    public function update(Request $request, Peminjaman $peminjaman)
    {
        $validated = $request->validate([
            'barang_id' => 'required|exists:barangs,id',
            'nama_peminjam' => 'required|string|max:255',
            'kontak_peminjam' => 'required|string|max:255',
            'divisi' => 'nullable|string|max:255',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali_rencana' => 'required|date|after_or_equal:tanggal_pinjam',
            'kondisi_pinjam' => 'nullable|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'catatan' => 'nullable|string'
        ]);

        $peminjaman->update($validated);

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil diperbarui');
    }

    public function destroy(Peminjaman $peminjaman)
    {
        if (Auth::user()->name === 'Petugas Inventaris') {
            return redirect()->route('peminjaman.index')
                ->with('error', 'Anda tidak memiliki akses untuk menghapus data peminjaman');
        }

        $peminjaman->delete();

        return redirect()->route('peminjaman.index')
            ->with('success', 'Data peminjaman berhasil dihapus');
    }

    public function kembali($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman.kembali', compact('peminjaman'));
    }

    public function prosesKembali(Request $request, $id)
    {
        $validated = $request->validate([
            'tanggal_kembali_aktual' => 'required|date',
            'kondisi_kembali' => 'required|in:baik,rusak ringan,rusak berat',
            'catatan_pengembalian' => 'nullable|string'
        ]);

        $peminjaman = Peminjaman::findOrFail($id);

        $validated['status'] = 'dikembalikan';
        $peminjaman->update($validated);

        $barang = $peminjaman->barang;

        // ✅ Tambahkan kembali stok barang
        $barang->increment('jumlah', $peminjaman->jumlah);

        // ✅ Perbarui kondisi jika berubah
        if ($validated['kondisi_kembali'] !== $peminjaman->kondisi_pinjam) {
            $barang->update(['kondisi' => $validated['kondisi_kembali']]);
        }

        return redirect()->route('peminjaman.index')
            ->with('success', 'Barang berhasil dikembalikan dan stok kembali bertambah');
    }

    public function laporan(Request $request)
    {
        $query = Peminjaman::with(['barang', 'user']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('tanggal_awal')) {
            $query->whereDate('tanggal_pinjam', '>=', $request->tanggal_awal);
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal_pinjam', '<=', $request->tanggal_akhir);
        }

        $peminjaman = $query->orderBy('tanggal_pinjam', 'desc')->get();

        $totalPeminjaman = $peminjaman->count();
        $totalTerlambat = $peminjaman->where('status', 'terlambat')->count();
        $totalDikembalikan = $peminjaman->where('status', 'dikembalikan')->count();

        return view('peminjaman.laporan', compact(
            'peminjaman',
            'totalPeminjaman',
            'totalTerlambat',
            'totalDikembalikan'
        ));
    }

    public function cetakLaporan(Request $request)
    {
        $query = Peminjaman::with(['barang', 'user']);

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('tanggal_awal')) {
            $query->whereDate('tanggal_pinjam', '>=', $request->tanggal_awal);
        }

        if ($request->filled('tanggal_akhir')) {
            $query->whereDate('tanggal_pinjam', '<=', $request->tanggal_akhir);
        }

        $peminjaman = $query->orderBy('tanggal_pinjam', 'desc')->get();

        $data = [
            'title' => 'Laporan Data Peminjaman',
            'date' => date('d F Y'),
            'peminjaman' => $peminjaman,
        ];

        $pdf = Pdf::loadView('peminjaman.laporan-pdf', $data);

        return $pdf->stream('laporan-peminjaman-' . date('Y-m-d') . '.pdf');
    }

    public function getBarang($id)
    {
        $barang = Barang::find($id);

        if ($barang) {
            return response()->json([
                'sumber_dana' => $barang->sumber_dana ?? '',
                'kondisi' => $barang->kondisi ?? ''
            ]);
        }

        return response()->json(['error' => 'Barang tidak ditemukan'], 404);
    }
}
