<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\DB_Furnace;
use App\Models\DB_Timbangan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $inputUser = [
            [
                'name' => "Admin Digital",
                'nrp' => 35511365,
                'role' => 1,
                'photo' => "profile.png",
                'seksi' => "Digitalization",
                'departemen' => "Process Engineering",
                'divisi' => "Engineering",
                'email' => "admin.digital@aop.component.astra.co.id",
                'password' => Hash::make("Komponen1!"),
                'status' => "ENABLED",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        $InputFurnace = [
            [
                'furnace' => "STRIKO-1",
                'material' => "HD-4",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => "STRIKO-2",
                'material' => "ADC12",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => "STRIKO-3",
                'material' => "HD-2",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'furnace' => "SWIF ASIA",
                'material' => "HD-2",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        $InputTimbangan = [
            [
                'area' => 'melting',
                'nama_timbangan' => 'Melting_A',
                'berat' => 0.0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];
        User::insert($inputUser);
        DB_Furnace::insert($InputFurnace);
        DB_Timbangan::insert($InputTimbangan);
    }
}
