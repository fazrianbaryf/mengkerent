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
        Schema::create('cars_recomends', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('car_recomend_id');
            $table->timestamps();

            $table->foreign('car_recomend_id')
                    ->references('id')
                    ->on('car-units')
                    ->onDelete('cascade') // Jika data di car_units dihapus, data di cars_recomends juga akan dihapus
                    ->onUpdate('cascade'); // Jika data di car_units diperbarui, data di cars_recomends juga akan diperbarui

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cars_recomends', function (Blueprint $table) {
            $table->dropForeign(['car_recomend_id']);
        });
        Schema::dropIfExists('cars_recomends');
    }
};
