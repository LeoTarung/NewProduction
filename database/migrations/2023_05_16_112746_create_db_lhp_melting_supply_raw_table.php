<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbLhpMeltingSupplyRawTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_lhpmeltingsupplyraw', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lhp');
            $table->foreign('id_lhp')->references('id')->on('db_lhpmeltingsupply')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('shift');
            $table->string('forklift');
            $table->integer('no_mc');
            $table->foreign('no_mc')->references('mc')->on('db_mesincasting')->onDelete('cascade');
            $table->string('furnace');
            $table->integer('jumlah_tapping');
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
        Schema::dropIfExists('db_lhpmeltingsupplyraw');
    }
}
