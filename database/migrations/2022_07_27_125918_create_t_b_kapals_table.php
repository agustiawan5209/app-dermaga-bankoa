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
        Schema::create('t_b_kapals', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kapal', 30);
            $table->string('jenis_kapal', 20);
            $table->foreign('detail_kapal');
            $table->integer('jumlah_muatan');
            $table->enum('status', ['bersandar', 'full', 'berangkat']);
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
        Schema::dropIfExists('t_b_kapals');
    }
};
