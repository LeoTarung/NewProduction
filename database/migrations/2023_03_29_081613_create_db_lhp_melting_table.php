<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbLhpMeltingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_lhpmelting', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('nrp');
            $table->string('nama');
            $table->string('shift');
            $table->string('jam_kerja');
            $table->string('mesin');
            $table->string('material');
            $table->integer('k_value')->default('0');  // yang ini gak tau cara inputnya
            $table->integer('supply_capacity')->default('18250');
            $table->integer('ingot')->default('0');
            $table->integer('exgate')->default('0');
            $table->integer('reject_parts')->default('0');
            $table->integer('alm_treat')->default('0');
            $table->integer('basemetal')->default('0');
            $table->integer('oil_scrap')->default('0');
            $table->integer('total_return_rs')->default('0');
            $table->integer('total_charging_rs')->default('0');
            $table->integer('fluxing')->default('0');
            $table->integer('total_charging')->default('0');
            $table->decimal('persen_fluxing', $precision = 8, $scale = 1)->default('0');
            $table->decimal('persen_ingot', $precision = 8, $scale = 1)->default('0');
            $table->decimal('persen_rs', $precision = 8, $scale = 1)->default('0');
            $table->integer('tapping')->default('0');
            $table->integer('stok_molten')->default('0');
            $table->integer('temperatur_tapping')->default('0');
            $table->integer('dross')->default('0');
            $table->integer('total_loss')->default('0');
            $table->decimal('persen_losdros_material', $precision = 8, $scale = 1)->default('0');
            $table->decimal('persen_alm_treat', $precision = 8, $scale = 1)->default('0');
            $table->decimal('machine_performance', $precision = 8, $scale = 1)->default('0');
            $table->decimal('machine_utilization', $precision = 8, $scale = 1)->default('0');
            $table->integer('gas_akhir')->default('0');
            $table->decimal('gas_consum', $precision = 8, $scale = 1)->default('0');
            $table->integer('gas_awal')->default('0');
            $table->integer('melting_rate')->default('0');
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
        Schema::dropIfExists('db_lhpmelting');
    }
}
