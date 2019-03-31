<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('id_tagihan');
            $table->unsignedInteger('id_pelanggan');
            $table->dateTime('tgl_pembayaran');
            $table->integer('biaya_admin');
            $table->decimal('total_bayar' , 10 , 2);
            $table->unsignedInteger('id_admin')->nullable();

            $table->foreign('id_tagihan')->references('id')->on('tagihan')->onDelete('cascade');
            $table->foreign('id_pelanggan')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_admin')->references('id')->on('users')->onDelete('set null');

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
        Schema::dropIfExists('pembayaran');
    }
}
