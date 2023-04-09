<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_material', function (Blueprint $table) {
            $table->id();
            $table->string('kode_sap')->unique();
            $table->string('material')->nullable();
            $table->string('initial')->nullable();
            $table->integer('kebutuhan_mrp')->default('0');
            $table->integer('kebutuhan_daily')->default('0');
            $table->integer('min_stock')->default('0');
            $table->integer('max_stock')->default('0');
            $table->integer('actual_stock')->default('0');
            $table->string('warna')->nullable();
            $table->string('status')->default('Belum dicek');
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
        Schema::dropIfExists('db_material');
    }
}
