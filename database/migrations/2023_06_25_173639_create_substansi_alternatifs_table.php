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
        Schema::create('substansi_alternatifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alternatif')->index();
            $table->unsignedBigInteger('id_substansi')->index();
            $table->integer('status');
            $table->integer('keterangan');
            $table->timestamps();

            $table->foreign('id_alternatif')->references('id')->on('alternatifs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_substansi')->references('id')->on('substansis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('substansi_alternatifs');
    }
};
