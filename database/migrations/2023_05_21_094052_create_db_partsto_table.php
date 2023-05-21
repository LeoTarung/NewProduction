<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbPartstoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_partsto', function (Blueprint $table) {
            $table->id();
            $table->string('tag')->unique();
            $table->string('kode_part');
            $table->string('nama_part');
            $table->integer('jumlah');
            $table->string('satuan');
            $table->integer('sloc');
            $table->string('area');
            $table->string('status');
            $table->string('keterangan')->nullable();
            $table->unsignedBigInteger('counter_id');
            $table->foreign('counter_id')->references('id')->on('db_mpsto')->onDelete('cascade');
            $table->unsignedBigInteger('verificator_id')->nullable();
            $table->foreign('verificator_id')->references('id')->on('db_mpsto')->onDelete('cascade');
            $table->string('status_sto')->default('OPEN');
            $table->string('updated_by');
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
        Schema::dropIfExists('db_partsto');
    }
}
