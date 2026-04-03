<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Peminjaman extends Model
{
    protected $table = 'peminjamans';
    
    protected $fillable = [
        'kode_peminjaman',
        'barang_id',
        'nama_peminjam',
        'kontak_peminjam',
        'divisi',
        'sumber_dana',
        'tanggal_pinjam',
        'tanggal_kembali_rencana',
        'tanggal_kembali_aktual',
        'status',
        'kondisi_pinjam',
        'kondisi_kembali',
        'jumlah',
        'catatan',
        'catatan_pengembalian',
        'user_id'
    ];

    protected $casts = [
        'tanggal_pinjam' => 'date',
        'tanggal_kembali_rencana' => 'date',
        'tanggal_kembali_aktual' => 'date',
    ];

    // Relationship
    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // Generate kode peminjaman otomatis
    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($peminjaman) {
            if (empty($peminjaman->kode_peminjaman)) {
                $peminjaman->kode_peminjaman = 'PJM-' . date('Ymd') . '-' . str_pad(static::whereDate('created_at', today())->count() + 1, 4, '0', STR_PAD_LEFT);
            }
        });
    }

    // Check if terlambat
    public function isTerlambat(): bool
    {
        if ($this->status === 'dipinjam' && $this->tanggal_kembali_rencana < now()->startOfDay()) {
            return true;
        }
        return false;
    }
}