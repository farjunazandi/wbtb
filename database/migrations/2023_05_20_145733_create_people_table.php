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
        Schema::create('persons', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alternatif')->index();
            $table->string('nama');
            $table->string('alamat')->nullable();
            $table->string('kode_pos')->nullable();
            $table->string('no_phone')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();
            $table->enum('category', [0, 1, 2])->default(0);
            $table->timestamps();

            $table->foreign('id_alternatif')->references('id')->on('alternatifs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('persons');
    }
};
