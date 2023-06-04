<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbQualityMeasurementPartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_qualitymeasurementpart', function (Blueprint $table) {
            $table->id();
            $table->string('shift')->nullable();
            $table->string('proses')->nullable();
            $table->string('kategori')->nullable();
            $table->string('nama_part_dies')->nullable();
            $table->integer('qty')->default(0);
            $table->integer('judgement')->default(0);
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
        Schema::dropIfExists('db_qualitymeasurementpart');
    }
}
