<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbHenkatenMeltingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_henkatenMelting', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_henkaten')->nullable();
            $table->string('furnace')->nullable();
            $table->string('shift')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('problem')->nullable();
            $table->string('countermeasure')->nullable();
            $table->string('plan')->nullable();
            $table->string('safety')->nullable();
            $table->string('kakotora')->nullable();
            $table->string('job_setup')->nullable();
            $table->string('wi_proses')->nullable();
            $table->string('trial_ns')->nullable();
            $table->string('cp_cpk')->nullable();
            $table->string('trial_proses')->nullable();
            $table->string('cycle_time')->nullable();
            $table->string('verifikasi_proses')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('db_henkatenMelting');
    }
}
