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
        Schema::create('alternatifs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user')->index();
            $table->integer('tahun')->nullable();
            $table->string('nomor')->nullable();
            $table->string('nama')->nullable();
            $table->string('nama_lain')->nullable();
            $table->string('tempat')->nullable();
            $table->date('tanggal');
            $table->string('persetujuan_pencatatan')->nullable();
            $table->string('sejarah_singkat')->nullable();
            $table->unsignedBigInteger('provinsi')->index();
            $table->unsignedBigInteger('kab_kota')->index();
            $table->string('kecamatan')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('alamat_penting')->nullable();
            $table->string('kodepos')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->integer('kategori1');
            $table->integer('kategori2');
            $table->integer('kategori3');
            $table->integer('kategori4');
            $table->integer('kategori5');
            $table->string('deskripsi')->nullable();
            $table->enum('kondisi', [0, 1, 2, 3, 4])->default(0);
            $table->integer('promosi1');
            $table->integer('promosi2');
            $table->integer('promosi3');
            $table->integer('promosi4');
            $table->integer('promosi5');
            $table->integer('promosi6');
            $table->string('best_practices')->nullable();
            $table->integer('dokumentasi1');
            $table->integer('dokumentasi2');
            $table->integer('dokumentasi3');
            $table->integer('dokumentasi4');
            $table->integer('dokumentasi5');
            $table->integer('dokumentasi6');
            $table->integer('dokumentasi7');
            $table->integer('dokumentasi8');
            $table->integer('dokumentasi9');
            $table->integer('dokumentasi10');
            $table->integer('dokumentasi11');
            $table->integer('dokumentasi12');
            $table->integer('dokumentasi13');
            $table->integer('dokumentasi14');
            $table->integer('dokumentasi15');
            $table->integer('dokumentasi16');
            $table->string('referensi')->nullable();
            $table->string('nama_domain')->nullable();
            $table->string('nama_pengelola_website')->nullable();
            $table->string('alamat_pengelola_website')->nullable();
            $table->string('kodepos_pengelola_website')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            //$table->foreign('provinsi')->references('id')->on('provinsis')->onDelete('restrict')->onUpdate('restrict');
            //$table->foreign('kab_kota')->references('id')->on('kab_kotas')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alternatifs');
    }
};
