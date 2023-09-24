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
        Schema::create('lampiran_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alternatif')->index();
            $table->string('keterangan')->nullable();
            $table->string('file')->nullable();
            $table->string('namaFile')->nullable();
            $table->enum('kategori', [0, 1]);
            $table->timestamps();

            $table->foreign('id_alternatif')->references('id')->on('alternatifs')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lampiran_files');
    }
};
