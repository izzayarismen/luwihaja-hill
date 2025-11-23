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
        Schema::create('akomodasis', function (Blueprint $table) {
            $table->id();
            $table->text('gambar');
            $table->string('tipe');
            $table->text('deskripsi');
            $table->integer('harga_asli');
            $table->integer('harga_diskon')->nullable();
            $table->string('checkin');
            $table->string('checkout');
            $table->integer('jumlah_tamu');
            $table->integer('luas');
            $table->string('tipe_kasur');
            $table->text('fasilitas');
            $table->boolean('smoking');
            $table->boolean('rekomendasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('akomodasis');
    }
};
