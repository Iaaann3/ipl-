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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
            $table->integer('keamanan')->default(0); 
            $table->integer('kebersihan')->default(0);
            $table->date('tanggal');
            $table->enum('status', ['belum terbayar', 'menunggu konfirmasi', 'pembayaran berhasil'])->default('belum terbayar');
            $table->string('bukti_pembayaran')->nullable();
            $table->integer('total')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
