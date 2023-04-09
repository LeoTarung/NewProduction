<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbVendorIngotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_vendorIngot', function (Blueprint $table) {
            $table->id();
            $table->integer('kode_vendor')->unique();
            $table->string('nama_vendor')->nullable();
            $table->string('pic')->nullable();
            $table->integer('no_telp')->nullable();
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
        Schema::dropIfExists('db_vendorIngot');
    }
}
