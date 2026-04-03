<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('peminjamans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_peminjaman')->unique();
            $table->unsignedBigInteger('barang_id');
            $table->string('nama_peminjam');
            $table->string('kontak_peminjam');
            $table->string('divisi')->nullable();
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali_rencana');
            $table->date('tanggal_kembali_aktual')->nullable();
            $table->enum('status', ['dipinjam', 'dikembalikan', 'terlambat'])->default('dipinjam');
            $table->enum('kondisi_pinjam', ['baik', 'rusak ringan', 'rusak berat']);
            $table->enum('kondisi_kembali', ['baik', 'rusak ringan', 'rusak berat'])->nullable();
            $table->integer('jumlah')->default(1);
            $table->text('catatan')->nullable();
            $table->text('catatan_pengembalian')->nullable();
            $table->unsignedBigInteger('user_id');
            
            // Foreign key constraints
            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamans');
    }
};
