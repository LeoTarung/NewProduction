<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbLhpMeltingSupplyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_lhpmeltingsupply', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('nrp');
            $table->string('nama');
            $table->string('shift');
            $table->string('jam_kerja');
            $table->string('forklift');
            $table->string('material');
            $table->integer('temperature')->nullable();
            $table->integer('ritase_tapping')->nullable();
            $table->integer('jumlah_tapping')->nullable();
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
        Schema::dropIfExists('db_lhpmeltingsupply');
    }
}
