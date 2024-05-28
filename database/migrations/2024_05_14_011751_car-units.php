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
        Schema::create('car-units', function (Blueprint $table) {
            $table->id();
            $table->string('id_units', 50);
            $table->string('nama_mobil', 100);
            $table->string('merk_mobil', 50);
            $table->string('jenis_mobil', 50);
            $table->integer('tahun_mobil');
            $table->enum('transmisi',['matic','manual']);
            $table->enum('car_category',['suv','mvp','sedan']);
            $table->string('car_photo')->nullable();
            $table->integer('price_6jam');
            $table->integer('price_12jam');
            $table->integer('price_24jam');
            $table->date('expired_at');
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
        //
    }
};