<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbSpectroMeltingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_spectromelting', function (Blueprint $table) {
            $table->id();
            $table->string('furnace')->nullable();
            $table->integer('a')->default(0)->nullable();
            $table->integer('b')->default(0)->nullable();
            $table->integer('aa')->default(0)->nullable();
            $table->integer('bb')->default(0)->nullable();
            $table->integer('aaa')->default(0)->nullable();
            $table->integer('bbb')->default(0)->nullable();
            $table->string('area')->nullable();
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
        Schema::dropIfExists('db_spectromelting');
    }
}
