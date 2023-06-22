<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DB_Jenis_Downtime;
use Carbon\Carbon;

class DowntimeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dt = [
            [
                'id' => 1,
                'jenis_downtime' => 'DANDORY',
                'kategori' => 'terplanning',
                'casting' => true,
            ],
            [
                'id' => 2,
                'jenis_downtime' => 'AFTER DANDORY',
                'kategori' => 'terplanning',
                'casting' => true,
            ],
            [
                'id' => 3,
                'jenis_downtime' => 'TRIAL ENGINEERING',
                'kategori' => 'terplanning',
                'casting' => true,
            ],
            [
                'id' => 4,
                'jenis_downtime' => 'STO',
                'kategori' => 'terplanning',
                'casting' => true,
            ],
            [
                'id' => 5,
                'jenis_downtime' => 'PREVENTIVE',
                'kategori' => 'terplanning',
                'casting' => true,
            ],
            [
                'id' => 6,
                'jenis_downtime' => '5R',
                'kategori' => 'terplanning',
                'casting' => true,
            ],
            [
                'id' => 7,
                'jenis_downtime' => 'LAY OFF',
                'kategori' => 'terplanning',
                'casting' => true,
            ],
            [
                'id' => 8,
                'jenis_downtime' => 'CLEANING KF',
                'kategori' => 'terplanning',
                'casting' => true,
            ],
            [
                'id' => 9,
                'jenis_downtime' => 'MOLTEN HABIS',
                'kategori' => 'material',
                'casting' => true,
            ],

            [
                'id' => 10,
                'jenis_downtime' => 'KERETA KOSONG',
                'kategori' => 'material',
                'casting' => true,
            ],

            [
                'id' => 11,
                'jenis_downtime' => 'BASKET',
                'kategori' => 'material',
                'casting' => true,
            ],

            [
                'id' => 12,
                'jenis_downtime' => 'MOLTEN KEPENUHAN',
                'kategori' => 'material',
                'casting' => true,
            ],

            [
                'id' => 13,
                'jenis_downtime' => 'MOLTEN DROP',
                'kategori' => 'material',
                'casting' => true,
            ],

            [
                'id' => 14,
                'jenis_downtime' => 'KURAS MOLTEN',
                'kategori' => 'material',
                'casting' => true,
            ],
            [
                'id' => 15,
                'jenis_downtime' => 'AIR MATI',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 16,
                'jenis_downtime' => 'ANGIN DROP',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 17,
                'jenis_downtime' => 'BURNER TROUBLE',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 18,
                'jenis_downtime' => 'COUPLING INJECTION',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 19,
                'jenis_downtime' => 'CRANE',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 20,
                'jenis_downtime' => 'AIR MATI',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 21,
                'jenis_downtime' => 'DIE MOVEMENT',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 22,
                'jenis_downtime' => 'EXTRACTOR',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 23,
                'jenis_downtime' => 'GAS MATI',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 24,
                'jenis_downtime' => 'HOLDING BOCOR',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 25,
                'jenis_downtime' => 'HYDROLIK',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 26,
                'jenis_downtime' => 'INJECTION',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 27,
                'jenis_downtime' => 'LOCK TIE BAR',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 28,
                'jenis_downtime' => 'MONITOR',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 29,
                'jenis_downtime' => 'MOTOR',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 30,
                'jenis_downtime' => 'NITROGEN',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 31,
                'jenis_downtime' => 'PANEL MATI',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 32,
                'jenis_downtime' => 'PERBAIKAN LOUNDER',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 33,
                'jenis_downtime' => 'PLN OFF',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 34,
                'jenis_downtime' => 'ROBOT TAKE OUT',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 35,
                'jenis_downtime' => 'SAFETY DOOR',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 36,
                'jenis_downtime' => 'SAFETY HOOK',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 37,
                'jenis_downtime' => 'ANGIN BOCOR',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 38,
                'jenis_downtime' => 'HIDROLIK BOCOR',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 39,
                'jenis_downtime' => 'SETTING SENSOR ',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 40,
                'jenis_downtime' => 'SOLENOID',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 41,
                'jenis_downtime' => 'TERMO COUPLE',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 42,
                'jenis_downtime' => 'TIEBAR',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 43,
                'jenis_downtime' => 'TRIMMING PRES ',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 44,
                'jenis_downtime' => 'TROUBLE CONVEYOR',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 45,
                'jenis_downtime' => 'TROUBLE LADLE',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 46,
                'jenis_downtime' => 'ROBOT SPRAY',
                'kategori' => 'mesin',
                'casting' => true,
            ],
            [
                'id' => 47,
                'jenis_downtime' => 'ADAPTOR SLEEVE',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 48,
                'jenis_downtime' => '5R SCRAP DIES',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 49,
                'jenis_downtime' => 'CAVITY GELOMBANG',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 50,
                'jenis_downtime' => 'CLAMP DIE',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 51,
                'jenis_downtime' => 'COOLING DIES',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 52,
                'jenis_downtime' => 'CORE',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 53,
                'jenis_downtime' => 'CRACK',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 54,
                'jenis_downtime' => 'DEKOK',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 55,
                'jenis_downtime' => 'DIES EROSI',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 56,
                'jenis_downtime' => 'DIES GOMPAL',
                'kategori' => 'dies',
                'casting' => true,
            ],

            [
                'id' => 57,
                'jenis_downtime' => 'DIES KASAR',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 58,
                'jenis_downtime' => 'DIMENSI',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 59,
                'jenis_downtime' => 'DISTRIBUTOR',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 60,
                'jenis_downtime' => 'EJECTOR PIN',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 61,
                'jenis_downtime' => 'EXT.GATE',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 62,
                'jenis_downtime' => 'FLASH/ MUNCRAT',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 63,
                'jenis_downtime' => 'GUIDE PIN',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 64,
                'jenis_downtime' => 'INSERT PIN',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 65,
                'jenis_downtime' => 'MODIFIKASI DIES',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 66,
                'jenis_downtime' => 'OVER HEAT',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 67,
                'jenis_downtime' => 'PART NEMPEL',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 68,
                'jenis_downtime' => 'PLAT C',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 69,
                'jenis_downtime' => 'PLUNGER ROD',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 70,
                'jenis_downtime' => 'PLUNGER SLEEVE',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 71,
                'jenis_downtime' => 'PLUNGER TIP',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 72,
                'jenis_downtime' => 'REPAIR DIES',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 73,
                'jenis_downtime' => 'SAFETY PLATE',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 74,
                'jenis_downtime' => 'SKRAP TEBAL',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 75,
                'jenis_downtime' => 'STOPPER MACHINING',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 76,
                'jenis_downtime' => 'UNDERCUT',
                'kategori' => 'dies',
                'casting' => true,
            ],
            [
                'id' => 77,
                'jenis_downtime' => 'CEK Q TIME',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 78,
                'jenis_downtime' => 'CENTRAL DIE LUBE',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 79,
                'jenis_downtime' => 'GANTI KASET',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 80,
                'jenis_downtime' => 'GATE PATAH',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 81,
                'jenis_downtime' => 'JIG TOOL REPAIR',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 82,
                'jenis_downtime' => 'LOT MARKING',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 83,
                'jenis_downtime' => 'MAN POWER',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 84,
                'jenis_downtime' => 'MANGKUK LADLE',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 85,
                'jenis_downtime' => 'OLI HABIS',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 86,
                'jenis_downtime' => 'CEK Q TIME',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 87,
                'jenis_downtime' => 'CEK TPM',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 88,
                'jenis_downtime' => 'SET PARAMETER',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 89,
                'jenis_downtime' => 'SETTING DRILL',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 90,
                'jenis_downtime' => 'SETTING SENSOR',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 91,
                'jenis_downtime' => 'SETTING SPRAY',
                'kategori' => 'proses',
                'casting' => true,
            ],
            [
                'id' => 92,
                'jenis_downtime' => 'SHOT BEADS',
                'kategori' => 'proses',
                'casting' => true,
            ],
        ];
        DB_Jenis_Downtime::insert($dt);
    }
}
