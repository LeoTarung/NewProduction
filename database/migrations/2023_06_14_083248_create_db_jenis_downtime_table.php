<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbJenisDowntimeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_jenis_downtime', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_downtime');
            $table->string('kategori');
            $table->boolean('casting')->default(false);
            $table->boolean('machining')->default(false);
            $table->boolean('gravity')->default(false);
            $table->boolean('gravity_casting')->default(false);
            $table->boolean('gravity_finishing')->default(false);
            $table->boolean('assembling')->default(false);
            $table->boolean('final_inspection')->default(false);
            $table->boolean('painting')->default(false);
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
        Schema::dropIfExists('db_jenis_downtime');
    }
}
