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
        Schema::create('barang_keluars', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang_keluar')->unique();
            $table->string('kode_barang');
            $table->integer('jumlah_keluar');
            $table->string('tujuan');
            $table->date('tgl_keluar');
            $table->timestamps();

                // foreign key
            $table->foreign('kode_barang')
                    ->references('kode_barang')->on('barangs')
                    ->onDelete('CASCADE')
                    ->onUpdate('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_keluars');
    }
};
