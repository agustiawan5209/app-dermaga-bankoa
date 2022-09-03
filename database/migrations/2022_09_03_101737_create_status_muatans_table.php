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
        Schema::create('status_muatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kapal_id')->constrained('tabel_kapals')->onDelete('cascade');
            $table->integer('batas_muatan');
            $table->integer('jumlah_tiket');
            $table->string('kode_berangkat');
            $table->foreign('kode_berangkat')->references('kode_berangkat')->on('pemberangkatans')->onUpdate('cascade');
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
        Schema::dropIfExists('status_muatans');
    }
};
