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
        Schema::create('kab_kotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_provinsi')->index();
            $table->string('nama');
            $table->timestamps();

            $table->foreign('id_provinsi')->references('id')->on('provinsis')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kab_kotas');
    }
};
