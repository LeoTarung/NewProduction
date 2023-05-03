<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbScanShippingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_scanshipping', function (Blueprint $table) {
            $table->id();
            $table->string('isiqr')->unique();
            $table->string('customer')->nullable();
            $table->string('plant')->nullable();
            $table->string('nama_part')->nullable();
            $table->string('material')->nullable();
            $table->string('customer_material')->nullable();
            $table->integer('qty')->nullable();
            $table->date('lot')->nullable();
            $table->integer('ritase')->nullable();
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('db_scanshipping');
    }
}
