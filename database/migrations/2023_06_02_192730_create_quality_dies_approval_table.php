<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQualityDiesApprovalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_qualitydiesapproval', function (Blueprint $table) {
            $table->id();
            $table->string('nama_part')->nullable();
            $table->string('no_dies')->nullable();
            $table->integer('sample_approval')->default(0)->nullable();
            $table->integer('document_approval')->default(0)->nullable();
            $table->integer('status_pengukuran')->default(0)->nullable();
            $table->integer('status_submit_sample')->default(0)->nullable();
            $table->integer('status_submit_pa')->default(0)->nullable();
            $table->integer('status_submit_ipp')->default(0)->nullable();
            $table->integer('status_submit_masspro')->default(0)->nullable();
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
        Schema::dropIfExists('db_qualitydiesapproval');
    }
}
