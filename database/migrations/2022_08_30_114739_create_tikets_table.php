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
        Schema::create('tikets', function (Blueprint $table) {
            $table->id();
            $table->string('ID_transaksi');
            $table->string('kode_berangkat');
            $table->string('kode_tiket')->unique();
            $table->bigInteger('harga');
            $table->date('jadwal_berangkat')->nullable();
            $table->time('jam_berangkat')->nullable();
            $table->date('jadwal_kembali')->nullable();
            $table->time('jam_kembali')->nullable();
            $table->timestamps();

        });
        Schema::table('tikets', function (Blueprint $table) {

            $table->foreign('ID_transaksi')->references('ID_transaksi')->on('transaksis');

            $table->foreign('kode_berangkat')->references('kode_berangkat')->on('pemberangkatans')->onDelete('cascade')->onUpdate('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tikets');
    }
};
