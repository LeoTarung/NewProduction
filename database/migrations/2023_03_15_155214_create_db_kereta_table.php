<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbKeretaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_kereta', function (Blueprint $table) {
            $table->id();
            $table->integer('no_kereta');
            $table->unsignedBigInteger('material_id')->nullable();  // => nanti ini bakal gabung ke db_namapart ( satu part bisa banyak mesin casting )
            $table->foreign('material_id')->references('id')->on('db_material')->onDelete('cascade');
            $table->integer('berat');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
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
        Schema::dropIfExists('db_kereta');
    }
}
