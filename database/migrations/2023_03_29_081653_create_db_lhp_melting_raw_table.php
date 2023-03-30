<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbLhpMeltingRAWTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_lhpmeltingraw', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lhp');
            $table->foreign('id_lhp')->references('id')->on('db_lhpmelting')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam');
            $table->string('shift');
            $table->string('mesin');
            $table->integer('berat_kereta')->default('0');  // yang ini gak tau cara inputnya
            $table->integer('k_value')->default('0');  // yang ini gak tau cara inputnya
            $table->integer('ingot')->default('0');
            $table->integer('exgate')->default('0');
            $table->integer('reject_parts')->default('0');
            $table->integer('alm_treat')->default('0');
            $table->integer('basemetal')->default('0');
            $table->integer('oil_scrap')->default('0');
            $table->integer('fluxing')->default('0');
            $table->integer('tapping')->default('0');
            $table->integer('temperatur_tapping')->default('0');
            $table->integer('dross')->default('0');
            $table->integer('gas_awal')->default('0');
            $table->integer('gas_akhir')->default('0');
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
        Schema::dropIfExists('db_lhpmeltingRAW');
    }
}
