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
        Schema::create('pemberangkatans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_berangkat')->unique();
            $table->foreignId('destinasi_id')->constrained('destinasis');
            $table->integer('harga');
            // $table->date('tgl_berangkat')->nullable();
            // $table->string('jam')->nullable();
            $table->foreignId('kapal_id')->constrained('tabel_kapals');
            $table->enum('status', ['bersandar', 'full', 'berangkat']);
            $table->string('deskripsi')->nullable();
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
        Schema::dropIfExists('pemberangkatans');
    }
};
