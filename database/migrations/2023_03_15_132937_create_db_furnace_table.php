<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbFurnaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_furnace', function (Blueprint $table) {
            $table->id();
            $table->string('furnace')->unique();
            $table->string('material');
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
        Schema::dropIfExists('db_furnace');
    }
}
