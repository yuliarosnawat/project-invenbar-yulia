<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('peminjamans', function (Blueprint $table) { 
            $table->string('sumber_dana')->nullable()->after('divisi');
        });
    }

    public function down(): void
    {
        Schema::table('peminjamans', function (Blueprint $table) {  
            $table->dropColumn('sumber_dana');
        });
    }
};