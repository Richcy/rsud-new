<?php

namespace Database\Seeders;

use App\Models\FieldDoctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $t_doctor = array(
            array(
                "id" => 13,
                "name" => "dr. Panji Gugah Bhaskara, Sp.PD",
                "field" => "A3QsDcHptRaUr1Eg56ov9nTx",
                "office" => "Klinik Penyakit Dalam",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/2192/SIPD/DPMPTSP/2019",
                "img" => "doctor/20220818105902_dr.-panji.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-08-18 10:59:02",
                "update_date" => "2021-12-23 13:11:47",
            ),
            array(
                "id" => 14,
                "name" => "dr. Chica Pratiwi, Sp.PD",
                "field" => "A3QsDcHptRaUr1Eg56ov9nTx",
                "office" => "Klinik Penyakit Dalam",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/7204/SIPD/DPMPTSP/2021",
                "img" => "doctor/20220809094700_dr.-chica.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-08-09 09:47:00",
                "update_date" => "2021-12-23 13:13:26",
            ),
            array(
                "id" => 17,
                "name" => "dr. Jacky Junaedi, Sp.B",
                "field" => "FKVinf4XMhBHyl6NL7kePTu3",
                "office" => "Klinik Bedah",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/2729/SIPD/DPMPTSP/2019",
                "img" => "doctor/20220721165412_Foto-dr-Jacky-01.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-07-21 16:54:12",
                "update_date" => "2021-12-23 13:15:38",
            ),
            array(
                "id" => 20,
                "name" => "dr. Bambang Setiawan, Sp.JP",
                "field" => "Fhxw6df72HoIaiQ1YVgmEb5X",
                "office" => "Klinik Jantung dan Pembuluh",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/048/SIPD/DPMPTSP/2022",
                "img" => "doctor/20220803150211_dr.-bambang.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-08-03 15:02:11",
                "update_date" => "2021-12-23 13:17:34",
            ),
            array(
                "id" => 21,
                "name" => "dr. Pudyastuti Rachyanti, Sp.T.H.T.K.L",
                "field" => "7y4mqNZBLJbatwOdWnAuzXe3",
                "office" => "Klinik THT-KL",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/2359/SIPD/DPMPTSP/2021",
                "img" => "doctor/20220803135409_dr.-kiki.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-08-03 13:54:09",
                "update_date" => "2021-12-23 13:18:37",
            ),
            array(
                "id" => 22,
                "name" => "dr. Putri Ratna Palupi Puspitasari, Sp.KJ",
                "field" => "MB8vIDSJyHRCGPLfjd3Nze0b",
                "office" => "Klinik Kesehatan Jiwa",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/224/SIPD/DPMPTSP/2020",
                "img" => "doctor/20220809100324_dr.-palupi.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-08-09 10:03:24",
                "update_date" => "2021-12-23 13:19:08",
            ),
            array(
                "id" => 23,
                "name" => "drg. Intan Sri Fajarwati",
                "field" => "lsHZ92VBd3fyFK1RcMmkq8xN",
                "office" => "Klinik Gigi",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/428/SIPD/DPMPTSP/2019",
                "img" => "doctor/20220721165501_Foto-drg-Intan-01.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-07-21 16:55:01",
                "update_date" => "2021-12-23 13:20:48",
            ),
            array(
                "id" => 25,
                "name" => "dr. Hj. Hawik Muzdalifah, Sp.KFR, MARS",
                "field" => "Ud961nVCkabF5cqlp3mrRgNi",
                "office" => "Klinik Rehabilitasi Medik",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/03/S/SIPD/DPMPTSP/2021",
                "img" => "doctor/20220803140253_dr.-hawik.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-08-03 14:02:53",
                "update_date" => "2021-12-23 13:38:32",
            ),
            array(
                "id" => 26,
                "name" => "drg. Rindang Yuasari, Sp.BM",
                "field" => "lsHZ92VBd3fyFK1RcMmkq8xN",
                "office" => "Klinik Gigi",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/2329/SIPDG/DPMPTSP/2020",
                "img" => "doctor/20220721165526_Foto-drg-Rindang-01.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-07-21 16:55:26",
                "update_date" => "2021-12-23 13:39:10",
            ),
            array(
                "id" => 28,
                "name" => "drg. Indah Sukartinah",
                "field" => "lsHZ92VBd3fyFK1RcMmkq8xN",
                "office" => "Klinik Gigi",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "446.2/64.2/yankes/I16",
                "img" => "doctor/20220805100645_drg.-indah.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-08-05 10:06:45",
                "update_date" => "2021-12-23 13:42:36",
            ),
            array(
                "id" => 29,
                "name" => "drg. Dwi Anie Lestari, Sp. Orth",
                "field" => "lsHZ92VBd3fyFK1RcMmkq8xN",
                "office" => "Klinik Gigi",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/2881/SIPD/DPMPTSP/2021",
                "img" => "doctor/20220805100628_drg.-dwi-anie.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-08-05 10:06:28",
                "update_date" => "2021-12-23 13:43:10",
            ),
            array(
                "id" => 30,
                "name" => "drg. Sandy Supandi Nugraha",
                "field" => "lsHZ92VBd3fyFK1RcMmkq8xN",
                "office" => "Klinik Dokter Gigi",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "---",
                "img" => "doctor/20220806104821_drg.-Sandy.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-11-26 09:52:59",
                "update_date" => "2021-12-23 13:45:24",
            ),
            array(
                "id" => 32,
                "name" => "dr. Setyo Dwi Putranto, Sp.N",
                "field" => "L3b8dfU6iOgPmzYwRkqSulZv",
                "office" => "Klinik Saraf",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "--",
                "img" => "doctor/20220803135342_dr.-setyo.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2023-08-31 08:01:56",
                "update_date" => "2022-07-02 08:17:54",
            ),
            array(
                "id" => 34,
                "name" => "dr. Ika Fransisca, Sp.OG",
                "field" => "e7Vz8QWlaAIyj5KSNZPTMRUg",
                "office" => "Klinik OBGYN",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/807/SIPD/DPMPTSP/2022",
                "img" => "doctor/20220803095113_dr.-ika.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-08-03 12:01:44",
                "update_date" => "2022-07-02 13:54:08",
            ),
            array(
                "id" => 36,
                "name" => "dr. Yonita Aprilia, Sp.A",
                "field" => "M4VDzXWY0fbHQFaNmeyuKvlk",
                "office" => "RSUD Cimacan",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/464/SIPD/DPMPTSP/2022",
                "img" => "doctor/20220822115938_dr.-yonita.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2023-08-31 08:03:52",
                "update_date" => "2022-08-03 10:57:37",
            ),
            array(
                "id" => 37,
                "name" => "dr. Sulasmi, Sp.M",
                "field" => "f4ThlEyI62ZjmdeOC3wp01ax",
                "office" => "Poliklinik Mata",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/2209/SIPD/DPMPTSP/2022",
                "img" => "doctor/20220912110441_dr.-emi.png",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-09-12 15:06:57",
                "update_date" => "2022-09-11 08:34:08",
            ),
            array(
                "id" => 38,
                "name" => "dr. Feri Iskandar, Sp.B, FINACS",
                "field" => "FKVinf4XMhBHyl6NL7kePTu3",
                "office" => "Poliklinik Bedah Umum",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/2191/SIPD/DPMPTSP/2022",
                "img" => "",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-11-30 09:49:27",
                "update_date" => "2022-11-30 08:12:52",
            ),
            array(
                "id" => 39,
                "name" => "drg. Muhamad Irvan Zulfikar",
                "field" => "lsHZ92VBd3fyFK1RcMmkq8xN",
                "office" => "Poliklinik Gigi dan Mulut",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/2372/SIPDG/DPMPTSP/2022",
                "img" => "",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2022-11-30 08:19:52",
                "update_date" => "2022-11-30 08:19:52",
            ),
            array(
                "id" => 40,
                "name" => "dr. Reza Anestyo Pattisahusiwa, Sp.P.D.",
                "field" => "A3QsDcHptRaUr1Eg56ov9nTx",
                "office" => "Poli Penyakit Dalam",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "503/320/SIPD/DPMPTSP/2023",
                "img" => "",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2023-02-24 08:49:55",
                "update_date" => "2023-02-24 08:49:55",
            ),
            array(
                "id" => 41,
                "name" => "dr. Shelly Silvia Bintang",
                "field" => "gweuFDXZHc9vqsO6SpE28mkR",
                "office" => "MCU/VCT",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "",
                "img" => "",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2023-07-08 10:11:00",
                "update_date" => "2023-07-08 10:11:00",
            ),
            array(
                "id" => 42,
                "name" => "dr. Priaji Setiadani",
                "field" => "O4kRFVnrJjhQYSvgIPWNeb6d",
                "office" => "dots",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "122",
                "img" => "",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2023-07-08 10:12:14",
                "update_date" => "2023-07-08 10:12:14",
            ),
            array(
                "id" => 44,
                "name" => "dr. Maulana Rosyady, Sp. A",
                "field" => "M4VDzXWY0fbHQFaNmeyuKvlk",
                "office" => "Klinik Anak",
                "experience" => NULL,
                "year" => 0,
                "month" => 0,
                "alumni" => "",
                "nip" => "",
                "str" => NULL,
                "sip" => "-",
                "img" => "",
                "status" => "publish",
                "lang" => "id",
                "create_date" => "2023-09-21 11:07:36",
                "update_date" => "2023-09-21 11:07:36",
            ),
        );

        $field_doctors = FieldDoctor::get();
        // Log::info($field_doctors);

        // Log::info($field_doctors->where('name', 'Kesehatan Anak')->first());
        $bedahUmum = $field_doctors->where('name', 'Bedah Umum')->first();
        $gigiDanMulut = $field_doctors->where('name', 'Gigi dan Mulut')->first();
        $jantungDanPembuluhDarah = $field_doctors->where('name', 'Jantung dan Pembuluh Darah')->first();
        $mata = $field_doctors->where('name', 'Mata')->first();
        $mcuDanVCT = $field_doctors->where('name', 'MCU dan VCT')->first();
        $obstetrikDanGinekologi = $field_doctors->where('name', 'Obstetrik dan Ginekologi (Kandungan)')->first();
        $pediatrik = $field_doctors->where('name', 'Pediatrik (Anak)')->first();
        $penyakitDalam = $field_doctors->where('name', 'Penyakit Dalam')->first();
        $psikiatri = $field_doctors->where('name', 'Psikiatri (Jiwa)')->first();
        $rehabilitasiMedik = $field_doctors->where('name', 'Rehabilitasi Medik')->first();
        $saraf = $field_doctors->where('name', 'Saraf (Neurologi)')->first();
        $tbDots = $field_doctors->where('name', 'TB DOTS')->first();
        $tht = $field_doctors->where('name', 'Telinga Hidung Tenggorokan-Kepala dan Leher (THT)')->first();
        // Log::info($psikiatri->id);

        $doctor_payload = [];
        foreach ($t_doctor as $key => $value) {
            if($value['field'] == 'FKVinf4XMhBHyl6NL7kePTu3'){
                // Bedah Umum
                $field_id = $bedahUmum ? $bedahUmum->id : null;
            } else if($value['field'] == 'lsHZ92VBd3fyFK1RcMmkq8xN'){
                // Gigi dan Mulut
                $field_id = $gigiDanMulut ? $gigiDanMulut->id : null;
            } else if($value['field'] == 'Fhxw6df72HoIaiQ1YVgmEb5X'){
                // Jantung dan Pembuluh Darah
                $field_id = $jantungDanPembuluhDarah ? $jantungDanPembuluhDarah->id : null;
            } else if($value['field'] == 'f4ThlEyI62ZjmdeOC3wp01ax'){
                // Mata
                $field_id = $mata ? $mata->id : null;
            } else if($value['field'] == 'gweuFDXZHc9vqsO6SpE28mkR'){
                // MCU dan VCT
                $field_id = $mcuDanVCT ? $mcuDanVCT->id : null;
            } else if($value['field'] == 'e7Vz8QWlaAIyj5KSNZPTMRUg'){
                // Obstetrik dan Ginekologi (Kandungan)
                $field_id = $obstetrikDanGinekologi ? $obstetrikDanGinekologi->id : null;
            } else if($value['field'] == 'M4VDzXWY0fbHQFaNmeyuKvlk'){
                // Pediatrik (Anak)
                $field_id = $pediatrik ? $pediatrik->id : null;
            } else if($value['field'] == 'A3QsDcHptRaUr1Eg56ov9nTx'){
                // Penyakit Dalam
                $field_id = $penyakitDalam ? $penyakitDalam->id : null;
            } else if($value['field'] == 'MB8vIDSJyHRCGPLfjd3Nze0b'){
                // Psikiatri (Jiwa)
                $field_id = $psikiatri ? $psikiatri->id : null;
            } else if($value['field'] == 'Ud961nVCkabF5cqlp3mrRgNi'){
                // Rehabilitasi Medik
                $field_id = $rehabilitasiMedik ? $rehabilitasiMedik->id : null;
            } else if($value['field'] == 'L3b8dfU6iOgPmzYwRkqSulZv'){
                // Saraf (Neurologi)
                $field_id = $saraf ? $saraf->id : null;
            } else if($value['field'] == 'O4kRFVnrJjhQYSvgIPWNeb6d'){
                // TB DOTS
                $field_id = $tbDots ? $tbDots->id : null;
            } else {
                // Telinga Hidung Tenggorokan-Kepala dan Leher (THT)
                $field_id = $tht ? $tht->id : null;
            }
            // Log::info([$field_id, $value['name']]);

            if($value['status'] == 'publish'){
                $status = 1;
            } else {
                $status = 0;
            }

            $doctor_payload[] = [
                'id' => $value['id'],
                'name' => $value['name'],
                'field_id' => $field_id,
                'office' => $value['office'],
                'experience' => $value['experience'],
                'year' => $value['year'],
                'month' => $value['month'],
                'alumni' => null,
                'nip' => null,
                'str' => $value['str'],
                'sip' => $value['sip'],
                'img' => str_replace('doctor/', 'doctors/', $value['img']),
                'status' => $status,
                'lang' => 'id',
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('doctors')->insert($doctor_payload);

        $featuredDoctor = [ 
            [
                'doctor_id' => 21,
                'sort' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 20,
                'sort' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 37,
                'sort' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'doctor_id' => 30,
                'sort' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ];

        DB::table('featured_doctors')->insert($featuredDoctor);

    }
}
