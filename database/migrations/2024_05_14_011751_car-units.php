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
            $table->string('nama_mobil', 100);
            $table->string('plat_mobil', 50);
            $table->string('merk_mobil', 50);
            $table->integer('tahun_mobil');
            $table->enum('transmisi',['matic','manual']);
            $table->enum('car_category',['suv','mvp','sedan']);
            $table->string('car_photo')->nullable();
            $table->integer('seats');
            $table->string('kapasitas_mesin', 50);
            $table->string('warna', 50);
            $table->integer('price_6jam');
            $table->integer('price_12jam');
            $table->integer('price_24jam');
            $table->enum('status', ['tersedia', 'proses', 'diterima'])->default('tersedia');
            $table->date('expired_at')->nullable();
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