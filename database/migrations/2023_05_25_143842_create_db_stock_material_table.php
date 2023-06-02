<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbStockMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_stockmaterial', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('material_id')->nullable();  // => nanti ini bakal gabung ke db_namapart ( satu part bisa banyak mesin casting )
            $table->foreign('material_id')->references('id')->on('db_material')->onDelete('cascade');
            $table->integer('sloc')->nullable();
            $table->integer('kebutuhan_mrp')->default('0');
            $table->integer('kebutuhan_daily')->default('0');
            $table->integer('min_stock')->default('0');
            $table->integer('max_stock')->default('0');
            $table->decimal('actual_stock', $precision = 8, $scale = 1)->default('0');
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
        Schema::dropIfExists('db_stockmaterial');
    }
}
