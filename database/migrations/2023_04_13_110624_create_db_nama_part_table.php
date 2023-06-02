<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbNamaPartTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_namapart', function (Blueprint $table) {
            $table->id();
            $table->string('kode_part')->unique();
            $table->string('nama_part')->nullable();
            $table->string('material')->nullable();
            $table->string('proses')->nullable();
            $table->string('kode_customer')->nullable();
            $table->string('customer')->nullable();
            $table->decimal('berat_part', $precision = 8, $scale = 3)->default('0');
            $table->decimal('berat_shot', $precision = 8, $scale = 3)->default('0');
            $table->integer('std_packaging')->nullable();
            $table->string('customer_material')->nullable();
            $table->string('jenis_material')->nullable();
            $table->integer('cavity')->default('0');
            $table->integer('cycle_time')->default('0');
            $table->integer('std_hanger')->default('0');
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
        Schema::dropIfExists('db_namapart');
    }
}
