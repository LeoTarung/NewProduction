<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\DB_Spectromelting;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class QualityInsertSpectroMelting extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'Panda:InsertQuality-SpectroMelting';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $InputSpectroMelting = [
            // MELTING HEIGHT PRESSURE DIE CASTING
            [
                'furnace' => 'STRIKO-1 - HD-4',
                'area' => 'hpdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'STRIKO-2 - ADC 12',
                'area' => 'hpdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'STRIKO-3 - HD-2',
                'area' => 'hpdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'SWIF ASIA - HD-2',
                'area' => 'hpdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            // MELTING GRAVITY DIE CASTING
            [
                'furnace' => 'HF01 - AC4B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF02 - AC4B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF03 - OFF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF04 - AC4CH',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF05 - OFF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF06 - AC4CH',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF07 - OFF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF08 - AC2B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF09 - OFF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF10 - AC2B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF11 - AC2B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF12 - AC2BF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF13 - AC2B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF14 - AC2B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF15 - AC2B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF16 - AC2B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF17 - AC2B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF18 - AC2BF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF19 - AC4CH',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF20 - OFF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF21 - AC4CH',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF22 - OFF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF23 - OFF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF24 - AC2B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF25 - AC2B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF26 - AC2BF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF27 - AC2BF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF28 - AC2BF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF29 - AC2B',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => 'HF30 - AC2BF',
                'area' => 'gdc',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB_Spectromelting::insert($InputSpectroMelting);
        Log::info('CORN INSERT SPECTRO MELTING BERHASIL!');
    }
}
