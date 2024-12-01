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
        Schema::create('cucian', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nama_id')->constrained(
                table: 'pelanggan', indexName: 'cucian_nama_id'
            );
            $table->string('barang');
            $table->string('jumlah_kilo');
            $table->string('kategory');
            $table->string('jenis_cucian');
            $table->string('pelayanan');
            $table->string('harga');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->string('status_pembayaran');
            $table->string('status')->default('sedang dicuci'); //Nilai default
            $table->string('nota')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cucian');
    }
};
