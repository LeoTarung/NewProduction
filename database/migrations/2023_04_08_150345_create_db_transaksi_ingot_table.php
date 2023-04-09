<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbTransaksiIngotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_transaksi_ingot', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sap')->nullable();
            $table->string('material')->nullable();
            $table->integer('nrp_penimbang')->nullable();
            $table->string('nama_penimbang')->nullable();
            $table->integer('id_vendor')->nullable();
            $table->string('nama_vendor')->nullable();
            $table->decimal('berat', $precision = 8, $scale = 1)->default('0');
            $table->string('lot_bundle')->nullable();
            $table->string('store_location')->nullable();
            $table->string('bisnis_unit')->nullable();
            $table->dateTime('kedatangan')->nullable();
            $table->dateTime('diverifikasi')->nullable();
            $table->dateTime('digunakan')->nullable();
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
        Schema::dropIfExists('db_transaksi_ingot');
    }
}
