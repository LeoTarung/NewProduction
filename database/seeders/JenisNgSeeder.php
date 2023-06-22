<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DB_Jenis_NG;

class JenisNgSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $insert = [];
        for ($i = 0; $i < 73; $i++) {
            $insert[] = [
                'jenis_reject' => 'BERCAK HITAM',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'BLISTER',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'BUSHING',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'CACAT CASTING',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'CRACK',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'DEKOK',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'DENT',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'EJECTOR PATAH',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'FLOWLINE',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'GATE NG',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'GELOMBANG',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'GOMPAL',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'INSERT PIN',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'KEROPOS',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'KULIT JERUK',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'MELENGKUNG',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'OVERHEAT',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'PART JATUH',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'PART NEMPEL',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'PARTING LINE',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'RETAK',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'SLEEVING MIRING',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'STEP',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'UNDERCUT',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'WARMING UP',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'BIMETAL',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'BLONG',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'DIMENSI',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'JOINT TUBE',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'KASAR',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'NG ASSY',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'NO JIG',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'PLATE',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'RIVET',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'SERET',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'UNCUTTING',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'LAIN PROSES',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'BOCOR',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'JAMUR',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'KURANG PROSES',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'MIRING',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'OVAL',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'OVER PROSES',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'TRIAL',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'UNFIL_RADIUS',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'COATING TERKELUPAS',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'PIN HOLE',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'SHRINKAGE',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'VISUAL KASAR',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'AMPLAS',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'BELANG',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'BLASTING KASAR',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'BUFFING KASAR',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'CRACK',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'CREATER',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'DOP',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'DUST SPRAY',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'EROSI DIES',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'EX PENSIL',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'GELAP',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'GLOSS',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'GORES',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'HANDLING',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'KECIPRATAN CAT',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'KOTOR',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'MELER',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'NON PT',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'OLI',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'ORANGE PEEL',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'PEEL OFF',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'POPPING',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'SERABUT',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'TERANG',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'TIPIS',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'WATER MARK',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'BOCOR COOLANT',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'BOCOR OLI',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'COVER RENGGANG',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'GRINDING',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'IMPELER BLONG',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'NABRAK',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'INNERPART_AMBLAS',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
            $insert[] = [
                'jenis_reject' => 'SLEEVE MIRING',
                'casting' => false,
                'machining' => false,
                'gravity' => false,
                'gravity_casting' => false,
                'gravity_finishing' => false,
                'assembling' => false,
                'painting' => false,
                'final_inspection' => false,
                'posisi' =>  $i + 1
            ];
        }

        DB_Jenis_NG::insert($insert);
    }
}
