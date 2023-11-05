<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tabel_kapals', function (Blueprint $table) {
            $table->id();
            $table->integer('pemilik')->nullable();
            $table->string('gambar')->nullable();
            $table->string('nama_kapal', 30);
            $table->string('jenis_kapal', 20)->nullable();
            $table->string('Pengantar', 40);
            $table->integer('jumlah_muatan');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tabel_kapals');
    }
};
