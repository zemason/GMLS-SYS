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
        Schema::create('lokasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('desa_id')->constrained()->cascadeOnDelete();
            $table->foreignId('relawan_id')->constrained()->cascadeOnDelete();
            $table->string('nama_lokasi');
            $table->text('alamat_lokasi');
            $table->float('luas_lokasi');
            $table->integer('kapasitas_pengungsi');
            $table->string('gambar_lokasi');
            $table->string('latitude');
            $table->string('longitude');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lokasis');
    }
};
