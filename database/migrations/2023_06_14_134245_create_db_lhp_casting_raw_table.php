<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbLhpCastingRawTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_lhpcasting_raw', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lhp');
            $table->foreign('id_lhp')->references('id')->on('db_lhpcasting')->onDelete('cascade');
            $table->unsignedBigInteger('id_ng')->nullable();
            $table->foreign('id_ng')->references('id')->on('db_jenis_ng')->onDelete('cascade');
            $table->unsignedBigInteger('id_dt')->nullable();
            $table->foreign('id_dt')->references('id')->on('db_jenis_downtime')->onDelete('cascade');
            $table->integer('tp_00')->default(0);
            $table->integer('tp_01')->default(0);
            $table->integer('tp_02')->default(0);
            $table->integer('tp_03')->default(0);
            $table->integer('tp_04')->default(0);
            $table->integer('tp_05')->default(0);
            $table->integer('tp_06')->default(0);
            $table->integer('tp_07')->default(0);
            $table->integer('tp_08')->default(0);
            $table->integer('tp_09')->default(0);
            $table->integer('tp_10')->default(0);
            $table->integer('tp_11')->default(0);
            $table->integer('tp_12')->default(0);
            $table->integer('tp_13')->default(0);
            $table->integer('tp_14')->default(0);
            $table->integer('tp_15')->default(0);
            $table->integer('tp_16')->default(0);
            $table->integer('tp_17')->default(0);
            $table->integer('tp_18')->default(0);
            $table->integer('tp_19')->default(0);
            $table->integer('tp_20')->default(0);
            $table->integer('tp_21')->default(0);
            $table->integer('tp_22')->default(0);
            $table->integer('tp_23')->default(0);
            $table->integer('tn_00')->default(0);
            $table->integer('tn_01')->default(0);
            $table->integer('tn_02')->default(0);
            $table->integer('tn_03')->default(0);
            $table->integer('tn_04')->default(0);
            $table->integer('tn_05')->default(0);
            $table->integer('tn_06')->default(0);
            $table->integer('tn_07')->default(0);
            $table->integer('tn_08')->default(0);
            $table->integer('tn_09')->default(0);
            $table->integer('tn_10')->default(0);
            $table->integer('tn_11')->default(0);
            $table->integer('tn_12')->default(0);
            $table->integer('tn_13')->default(0);
            $table->integer('tn_14')->default(0);
            $table->integer('tn_15')->default(0);
            $table->integer('tn_16')->default(0);
            $table->integer('tn_17')->default(0);
            $table->integer('tn_18')->default(0);
            $table->integer('tn_19')->default(0);
            $table->integer('tn_20')->default(0);
            $table->integer('tn_21')->default(0);
            $table->integer('tn_22')->default(0);
            $table->integer('tn_23')->default(0);
            $table->time('td_00')->default(0);
            $table->time('td_01')->default(0);
            $table->time('td_02')->default(0);
            $table->time('td_03')->default(0);
            $table->time('td_04')->default(0);
            $table->time('td_05')->default(0);
            $table->time('td_06')->default(0);
            $table->time('td_07')->default(0);
            $table->time('td_08')->default(0);
            $table->time('td_09')->default(0);
            $table->time('td_10')->default(0);
            $table->time('td_11')->default(0);
            $table->time('td_12')->default(0);
            $table->time('td_13')->default(0);
            $table->time('td_14')->default(0);
            $table->time('td_15')->default(0);
            $table->time('td_16')->default(0);
            $table->time('td_17')->default(0);
            $table->time('td_18')->default(0);
            $table->time('td_19')->default(0);
            $table->time('td_20')->default(0);
            $table->time('td_21')->default(0);
            $table->time('td_22')->default(0);
            $table->time('td_23')->default(0);
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
        Schema::dropIfExists('db_lhpcasting_raw');
    }
}
