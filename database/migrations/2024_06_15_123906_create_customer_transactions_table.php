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
        Schema::create('customer_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('customer_name');
            $table->unsignedBigInteger('car_unit_id');
            $table->string('nama_mobil');
            $table->string('plat_mobil');
            $table->integer('harga');
            $table->string('no_telfon');
            $table->string('pelayanan');
            $table->string('alamat');
            $table->string('status')->default('proses');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('car_unit_id')->references('id')->on('car-units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_transactions');
    }
};