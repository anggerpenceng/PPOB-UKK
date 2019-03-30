<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihan', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_pelanggan');
            $table->unsignedInteger('id_penggunaan');
            $table->tinyInteger('bulan');
            $table->year('tahun');
            $table->double('jumlah_meter');
            $table->tinyInteger('status');            

            $table->foreign('id_pelanggan')->references('id')->on('users')->onDelete('no action');
            $table->foreign('id_penggunaan')->references('id')->on('penggunaan')->onDelete('no action');

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
        Schema::dropIfExists('tagihan');
    }
}
