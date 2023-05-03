<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbPrintQrFGTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_printqrfg', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('nama_part')->nullable();
            $table->string('material')->nullable();
            $table->string('kode_customer')->nullable();
            $table->string('customer_material')->nullable();
            $table->integer('std_packaging')->default('0');
            $table->string('qrtag')->nullable();
            $table->string('status')->nullable();
            $table->string('location')->nullable();
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
        Schema::dropIfExists('db_printqrfg');
    }
}
