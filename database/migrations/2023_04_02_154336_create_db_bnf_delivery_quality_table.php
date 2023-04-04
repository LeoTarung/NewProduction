<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDbBnfDeliveryQualityTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('db_bnfdeliveryquality', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal')->nullable();
            $table->integer('all_customer')->nullable()->default('0');
            $table->integer('ppm_all')->nullable()->default('0');
            $table->integer('adm')->nullable()->default('0');
            $table->integer('ppm_adm')->nullable()->default('0');
            $table->integer('ahm_p1')->nullable()->default('0');
            $table->integer('ppm_ahm_p1')->nullable()->default('0');
            $table->integer('ahm_p2')->nullable()->default('0');
            $table->integer('ppm_ahm_p2')->nullable()->default('0');
            $table->integer('ahm_p3')->nullable()->default('0');
            $table->integer('ppm_ahm_p3')->nullable()->default('0');
            $table->integer('ahm_p4')->nullable()->default('0');
            $table->integer('ppm_ahm_p4')->nullable()->default('0');
            $table->integer('ahm_p5')->nullable()->default('0');
            $table->integer('ppm_ahm_p5')->nullable()->default('0');
            $table->integer('ahm_rem')->nullable()->default('0');
            $table->integer('ppm_ahm_rem')->nullable()->default('0');
            $table->integer('aisin')->nullable()->default('0');
            $table->integer('ppm_aisin')->nullable()->default('0');
            $table->integer('aspira')->nullable()->default('0');
            $table->integer('ppm_aspira')->nullable()->default('0');
            $table->integer('cai')->nullable()->default('0');
            $table->integer('ppm_cai')->nullable()->default('0');
            $table->integer('denso')->nullable()->default('0');
            $table->integer('ppm_denso')->nullable()->default('0');
            $table->integer('dnp')->nullable()->default('0');
            $table->integer('ppm_dnp')->nullable()->default('0');
            $table->integer('hino')->nullable()->default('0');
            $table->integer('ppm_hino')->nullable()->default('0');
            $table->integer('hpm')->nullable()->default('0');
            $table->integer('ppm_hpm')->nullable()->default('0');
            $table->integer('igp')->nullable()->default('0');
            $table->integer('ppm_igp')->nullable()->default('0');
            $table->integer('j_tekt')->nullable()->default('0');
            $table->integer('ppm_j_tekt')->nullable()->default('0');
            $table->integer('kawasaki')->nullable()->default('0');
            $table->integer('ppm_kawasaki')->nullable()->default('0');
            $table->integer('kubota')->nullable()->default('0');
            $table->integer('ppm_kubota')->nullable()->default('0');
            $table->integer('kayaba')->nullable()->default('0');
            $table->integer('ppm_kayaba')->nullable()->default('0');
            $table->integer('mhask')->nullable()->default('0');
            $table->integer('ppm_mhask')->nullable()->default('0');
            $table->integer('mii')->nullable()->default('0');
            $table->integer('ppm_mii')->nullable()->default('0');
            $table->integer('mkm')->nullable()->default('0');
            $table->integer('ppm_mkm')->nullable()->default('0');
            $table->integer('nissan')->nullable()->default('0');
            $table->integer('ppm_nissan')->nullable()->default('0');
            $table->integer('nki')->nullable()->default('0');
            $table->integer('ppm_nki')->nullable()->default('0');
            $table->integer('okamoto')->nullable()->default('0');
            $table->integer('ppm_okamoto')->nullable()->default('0');
            $table->integer('suzuki')->nullable()->default('0');
            $table->integer('ppm_suzuki')->nullable()->default('0');
            $table->integer('skc')->nullable()->default('0');
            $table->integer('ppm_skc')->nullable()->default('0');
            $table->integer('tmmin')->nullable()->default('0');
            $table->integer('ppm_tmmin')->nullable()->default('0');
            $table->integer('toyoda_gosai')->nullable()->default('0');
            $table->integer('ppm_toyoda_gosai')->nullable()->default('0');
            $table->integer('yamaha')->nullable()->default('0');
            $table->integer('ppm_yamaha')->nullable()->default('0');
            $table->integer('yutaka')->nullable()->default('0');
            $table->integer('ppm_yutaka')->nullable()->default('0');
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
        Schema::dropIfExists('db_bnfdeliveryquality');
    }
}
