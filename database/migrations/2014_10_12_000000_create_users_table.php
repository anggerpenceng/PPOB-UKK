<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('username');
            $table->string('password');
            $table->integer('nomor_kwh')->default(0);
            $table->text('alamat');
            $table->unsignedInteger('id_role');
            $table->unsignedInteger('id_tarif')->nullable();

            $table->foreign('id_role')->references('id')->on('roles')->onDelete('no action');
            $table->foreign('id_tarif')->references('id')->on('tarif')->onDelete('no action');  

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
