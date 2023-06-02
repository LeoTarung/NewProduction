<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbForkliftMeltingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_forkliftmelting', function (Blueprint $table) {
            $table->id();
            $table->string('forklift')->unique();
            // $table->string('material')->nullable();
            $table->unsignedBigInteger('material_id')->nullable();  // => nanti ini bakal gabung ke db_namapart ( satu part bisa banyak mesin casting )
            $table->foreign('material_id')->references('id')->on('db_material')->onDelete('cascade');

            $table->integer('henkaten_mp')->default('0');
            $table->integer('henkaten_mat')->default('0');
            $table->integer('henkaten_met')->default('0');
            $table->integer('henkaten_mc')->default('0');
            $table->integer('kode_status')->default('0');
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
        Schema::dropIfExists('db_forkliftmelting');
    }
}
