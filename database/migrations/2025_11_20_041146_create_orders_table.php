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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id');
            $table->string('akomodasi_id');
            $table->string('user_id');
            $table->date('tanggal_masuk');
            $table->date('tanggal_keluar');
            $table->string('nama_pemesan');
            $table->string('email_pemesan');
            $table->string('telepon_pemesan');
            $table->string('total_harga');
            $table->string('bukti_pembayaran')->nullable();
            $table->string('status')->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
