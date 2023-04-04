<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbBadnewsfirstTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_badnewsfirst', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->string('nama_customer')->nullable();
            $table->string('nama_part')->nullable();
            $table->string('problem')->nullable();
            $table->string('pic')->nullable();
            $table->string('pic_qc')->nullable();
            $table->string('pic_penerima')->nullable();
            $table->string('occure')->nullable();
            $table->string('occure_deskripsi')->nullable();
            $table->string('outflow')->nullable();
            $table->string('outflow_deskripsi')->nullable();
            $table->integer('bocor')->nullable()->default('0');
            $table->integer('flowline')->nullable()->default('0');
            $table->integer('mach_other')->nullable()->default('0');
            $table->integer('no_tap')->nullable()->default('0');
            $table->integer('paint_meler')->nullable()->default('0');
            $table->integer('paint_tipis')->nullable()->default('0');
            $table->integer('dent')->nullable()->default('0');
            $table->integer('gompal')->nullable()->default('0');
            $table->integer('ng_assy')->nullable()->default('0');
            $table->integer('other')->nullable()->default('0');
            $table->integer('paint_other')->nullable()->default('0');
            $table->integer('porosity')->nullable()->default('0');
            $table->integer('dimensi_cast')->nullable()->default('0');
            $table->integer('jamur')->nullable()->default('0');
            $table->integer('ng_assy_mach')->nullable()->default('0');
            $table->integer('o_proses_f')->nullable()->default('0');
            $table->integer('paint_peel_off')->nullable()->default('0');
            $table->integer('retak')->nullable()->default('0');
            $table->integer('dimensi_mach')->nullable()->default('0');
            $table->integer('k_proses_fin')->nullable()->default('0');
            $table->integer('ng_assy_sc')->nullable()->default('0');
            $table->integer('paint_kotor')->nullable()->default('0');
            $table->integer('paint_scratch')->nullable()->default('0');
            $table->integer('undercut')->nullable()->default('0');
            $table->string('kategori_claim')->nullable();
            $table->string('kejadian_claim')->nullable();
            $table->string('kategori_claim_market')->nullable();
            $table->string('no_dpwc')->nullable();
            $table->string('status_bnf')->nullable();
            $table->string('opl')->nullable();
            $table->integer('customer')->nullable()->default('0');
            $table->integer('selog')->nullable()->default('0');
            $table->integer('delsi')->nullable()->default('0');
            $table->integer('PDC')->nullable()->default('0');
            $table->integer('FSCM')->nullable()->default('0');
            $table->integer('NM')->nullable()->default('0');
            $table->integer('total_ng')->nullable()->default('0');
            $table->integer('stock')->nullable()->default('0');
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
        Schema::dropIfExists('db_badnewsfirst');
    }
}
