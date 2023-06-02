<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbMasterPartstoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_masterpartsto', function (Blueprint $table) {
            $table->id();
            $table->string('material')->nullable();
            $table->string('nama_part')->nullable();
            $table->integer('sloc')->nullable();
            $table->string('mat_comp_bom1')->nullable();
            $table->text('desc_comp_bom1')->nullable();
            $table->integer('qty_comp_bom1')->nullable();
            $table->string('unit_comp_bom1')->nullable();
            $table->string('mat_comp_bom2')->nullable();
            $table->text('desc_comp_bom2')->nullable();
            $table->integer('qty_comp_bom2')->nullable();
            $table->string('unit_comp_bom2')->nullable();
            $table->string('mat_comp_bom3')->nullable();
            $table->text('desc_comp_bom3')->nullable();
            $table->integer('qty_comp_bom3')->nullable();
            $table->string('unit_comp_bom3')->nullable();
            $table->string('mat_comp_bom4')->nullable();
            $table->text('desc_comp_bom4')->nullable();
            $table->integer('qty_comp_bom4')->nullable();
            $table->string('unit_comp_bom4')->nullable();
            $table->string('mat_comp_bom5')->nullable();
            $table->text('desc_comp_bom5')->nullable();
            $table->integer('qty_comp_bom5')->nullable();
            $table->string('unit_comp_bom5')->nullable();
            $table->string('mat_comp_bom6')->nullable();
            $table->text('desc_comp_bom6')->nullable();
            $table->integer('qty_comp_bom6')->nullable();
            $table->string('unit_comp_bom6')->nullable();
            $table->string('mat_comp_bom7')->nullable();
            $table->text('desc_comp_bom7')->nullable();
            $table->integer('qty_comp_bom7')->nullable();
            $table->string('unit_comp_bom7')->nullable();
            $table->string('mat_comp_bom8')->nullable();
            $table->text('desc_comp_bom8')->nullable();
            $table->integer('qty_comp_bom8')->nullable();
            $table->string('unit_comp_bom8')->nullable();
            $table->string('mat_comp_bom9')->nullable();
            $table->text('desc_comp_bom9')->nullable();
            $table->integer('qty_comp_bom9')->nullable();
            $table->string('unit_comp_bom9')->nullable();
            $table->string('mat_comp_bom10')->nullable();
            $table->text('desc_comp_bom10')->nullable();
            $table->integer('qty_comp_bom10')->nullable();
            $table->string('unit_comp_bom10')->nullable();
            $table->string('mat_comp_bom11')->nullable();
            $table->text('desc_comp_bom11')->nullable();
            $table->integer('qty_comp_bom11')->nullable();
            $table->string('unit_comp_bom11')->nullable();
            $table->string('mat_comp_bom12')->nullable();
            $table->text('desc_comp_bom12')->nullable();
            $table->integer('qty_comp_bom12')->nullable();
            $table->string('unit_comp_bom12')->nullable();
            $table->string('mat_comp_bom13')->nullable();
            $table->text('desc_comp_bom13')->nullable();
            $table->integer('qty_comp_bom13')->nullable();
            $table->string('unit_comp_bom13')->nullable();
            $table->string('mat_comp_bom14')->nullable();
            $table->text('desc_comp_bom14')->nullable();
            $table->integer('qty_comp_bom14')->nullable();
            $table->string('unit_comp_bom14')->nullable();
            $table->string('mat_comp_bom15')->nullable();
            $table->text('desc_comp_bom15')->nullable();
            $table->integer('qty_comp_bom15')->nullable();
            $table->string('unit_comp_bom15')->nullable();
            $table->string('mat_comp_bom16')->nullable();
            $table->text('desc_comp_bom16')->nullable();
            $table->integer('qty_comp_bom16')->nullable();
            $table->string('unit_comp_bom16')->nullable();
            $table->string('mat_comp_bom17')->nullable();
            $table->text('desc_comp_bom17')->nullable();
            $table->integer('qty_comp_bom17')->nullable();
            $table->string('unit_comp_bom17')->nullable();
            $table->string('mat_comp_bom18')->nullable();
            $table->text('desc_comp_bom18')->nullable();
            $table->integer('qty_comp_bom18')->nullable();
            $table->string('unit_comp_bom18')->nullable();
            $table->string('mat_comp_bom19')->nullable();
            $table->text('desc_comp_bom19')->nullable();
            $table->integer('qty_comp_bom19')->nullable();
            $table->string('unit_comp_bom19')->nullable();
            $table->string('mat_comp_bom20')->nullable();
            $table->text('desc_comp_bom20')->nullable();
            $table->integer('qty_comp_bom20')->nullable();
            $table->string('unit_comp_bom20')->nullable();
                    $table->string('mat_comp_bom21')->nullable();
                    $table->text('desc_comp_bom21')->nullable();
                    $table->integer('qty_comp_bom21')->nullable();
                    $table->string('unit_comp_bom21')->nullable();
                    $table->string('mat_comp_bom22')->nullable();
                    $table->text('desc_comp_bom22')->nullable();
                    $table->integer('qty_comp_bom22')->nullable();
                    $table->string('unit_comp_bom22')->nullable();
                    $table->string('mat_comp_bom23')->nullable();
                    $table->text('desc_comp_bom23')->nullable();
                    $table->integer('qty_comp_bom23')->nullable();
                    $table->string('unit_comp_bom23')->nullable();
                    $table->string('mat_comp_bom24')->nullable();
                    $table->text('desc_comp_bom24')->nullable();
                    $table->integer('qty_comp_bom24')->nullable();
                    $table->string('unit_comp_bom24')->nullable();
                    $table->string('mat_comp_bom25')->nullable();
                    $table->text('desc_comp_bom25')->nullable();
                    $table->integer('qty_comp_bom25')->nullable();
                    $table->string('unit_comp_bom25')->nullable();
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
        Schema::dropIfExists('db_masterpartsto');
    }
}
