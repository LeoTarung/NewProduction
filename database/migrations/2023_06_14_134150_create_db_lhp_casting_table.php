<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbLhpCastingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_lhpcasting', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_mesincasting')->nullable();
            $table->integer('nrp1')->default('0')->nullable();
            $table->integer('nrp2')->default('0')->nullable();
            $table->integer('nrp3')->default('0')->nullable();
            $table->integer('nrp4')->default('0')->nullable();
            $table->integer('nrp5')->default('0')->nullable();
            $table->integer('nrp6')->default('0')->nullable();
            $table->date('tanggal')->nullable();
            $table->string('shift')->default('0');
            $table->time('jam_available')->default('0');
            $table->time('jam_running')->default('0');
            $table->string('nama_part')->default('0');
            $table->string('nomor_dies')->default("#");
            $table->integer('cavity')->default("1");
            $table->integer('target')->default('0');
            $table->integer('total_produksi')->default('0');
            $table->integer('total_ok')->default('0');
            $table->integer('total_ng')->default('0');
            $table->time('total_downtime')->default('0');
            $table->unsignedBigInteger('status_dt')->default('0');
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
        Schema::dropIfExists('db_lhpcasting');
    }
}
