<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbCalenderOfEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_CalenderOfEvent', function (Blueprint $table) {
            $table->id();
            $table->string('group')->nullable();
            $table->string('judul')->nullable();
            $table->date('tanggal')->nullable();
            $table->time('mulai')->nullable();
            $table->time('selesai')->nullable();
            $table->string('pic')->nullable();
            $table->string('location')->nullable();
            $table->string('type')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('db_CalenderOfEvent');
    }
}
