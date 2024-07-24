<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CareerSeeder extends Seeder
{
    protected function generateRandomString($length = 5) {
        $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $t_career = array(
            array(
                "id" => 4,
                "title" => "Analis Laboratorium",
                "sub_desc" => "",
                "description" => "RSUD Cimacan membuka peluang dan kesempatan bergabung bagi:<br />Analis Laboratorium<br />(Jumlah: 4 orang)<br /><br />Kriteria:<br />- Pria/Wanita<br />- Usia maksimal 35 tahun<br />- Kemampuan komunikasi yang baik<br />- Jujur, cekatan, bertanggung jawab<br />- Dapat bekerja sama dalam tim<br />- Menguasai Microsoft Office (Word, Excel, PPT)<br />- Bersedia bekerja dalam shift<br /><br />Yuk kirimkan surat lamaran, CV, foto terbaru, dan kelengkapan<br />melalui e-mail ke : umpeg.rsudcimacan@gmail.com",
                "img" => "career/20220105140612_analis_laboratorium_Desember.jpg",
                "url" => "",
                "status" => "unpublish",
                "create_date" => "2021-12-20 14:06:12",
                "update_date" => "2022-01-05 14:06:12",
            ),
            array(
                "id" => 6,
                "title" => "Tenaga Kesehatan",
                "sub_desc" => "",
                "description" => "RSUD Cimacan membuka peluang dan kesempatan bergabung bagi:<br />1. Apoteker<br />2. Tenaga Teknis Kefarmasian (TTK)<br />3. Asisten TTK<br /><br />Kriteria:<br />- Pria/Wanita<br />- Kemampuan komunikasi yang baik<br />- Jujur, cekatan, bertanggung jawab<br />- Dapat bekerja sama dalam tim<br />- Menguasai Microsoft Office (Word, Excel, PPT)<br />- Bersedia bekerja dalam shift<br /><br />Kirimkan surat lamaran, CV, foto terbaru, dan kelengkapan<br />melalui e-mail ke : umpeg.rsudcimacan@gmail.com",
                "img" => "career/20230903021138_20220106090336_recruitment_opteker_ttk_asttk.jpg",
                "url" => "",
                "status" => "unpublish",
                "create_date" => "2021-12-04 09:03:36",
                "update_date" => "2022-01-06 09:03:36",
            ),
            array(
                "id" => 7,
                "title" => "Perawat",
                "sub_desc" => "RSD Cimacan membuka peluang dan kesempatan bergabung bagi:\r\nPerawat\r\n(Jumlah: 33 orang)\r\n\r\nKriteria:\r\n- Pendidikan minimal D3 Keperawatan\r\n- Diutamakan program Profesi Ners\r\n- Memiliki STR/Serk",
                "description" => "RSD Cimacan membuka peluang dan kesempatan bergabung bagi:<br />Perawat<br />(Jumlah: 33 orang)<br /><br />Kriteria:<br />- Pendidikan minimal D3 Keperawatan<br />- Diutamakan program Profesi Ners<br />- Memiliki STR/Serkom<br />- Diutamakan mempunyaj Sertifikat Pelatihan Khusus (Bedah, ICU, HD, dll)<br />- Kemampuan komunikasi yang baik<br />- Jujur, cekatan, bertanggung jawab<br />- Dapat bekerja sama dalam tim<br />- Bersedia bekerja dalam shift<br /><br />Periode pendaftaran dibuka dari tanggal 14 hingga 20 Januari 2022.<br />Yuk segera kirimkan surat lamaran, CV, foto terbaru, dan kelengkapan<br />melalui e-mail ke: umpeg.rsudcimacan@gmail.com",
                "img" => "career/20220117091353_271904694_910159676368644_5753862463631661069_n.jpg",
                "url" => "",
                "status" => "unpublish",
                "create_date" => "2022-01-15 09:13:53",
                "update_date" => "2022-01-17 09:13:53",
            ),
            array(
                "id" => 8,
                "title" => "Dokter Umum",
                "sub_desc" => "",
                "description" => "RSD Cimacan membuka peluang dan kesempatan bergabung bagi:<br />Dokter Umum<br />(Jumlah: 3 orang)<br /><br />Kriteria:<br />- Pendidikan Profesi Dokter<br />- Memiliki STR aktif<br />- Memiliki sertifikat ACLS/ATLS<br />- Kemampuan komunikasi yang baik<br />- Jujur, cekatan, bertanggung jawab<br />- Dapat bekerja sama dalam tim<br />- Bersedia bekerja dalam shift<br />- Memiliki sertifikat pelatihan, seminar/workshop yang mendukung profesi<br /><br />Yuk segera kirimkan surat lamaran, CV, foto terbaru, dan kelengkapan melalui e-mail ke: umpeg.rsudcimacan@gmail.com",
                "img" => "career/20230912214202_20220119091738_Lowongan-Dokter-Umum.jpg",
                "url" => "",
                "status" => "unpublish",
                "create_date" => "2022-01-19 09:17:38",
                "update_date" => "2022-01-19 09:17:38",
            ),
            array(
                "id" => 9,
                "title" => "Admin Ruangan",
                "sub_desc" => "",
                "description" => "RSD Cimacan membuka peluang dan kesempatan bergabung bagi:<br />Admin Ruangan<br />(Jumlah: 1 orang)<br /><br />Kriteria:<br />- Lulusan SMA/SMK<br />- Handal mengoperasikan sistem komputer<br />- Kemampuan komunikasi yang baik<br />- Jujur, cekatan, bertanggung jawab<br />- Dapat bekerja sama dalam tim<br />- Bersedia bekerja dalam shift<br /><br />Yuk segera kirimkan surat lamaran, CV, foto terbaru, dan kelengkapan<br />melalui e-mail ke: umpeg.rsudcimacan@gmail.com",
                "img" => "career/20220121112411_lowongan-admin-ruangan.jpg",
                "url" => "",
                "status" => "unpublish",
                "create_date" => "2022-01-21 11:24:12",
                "update_date" => "2022-01-21 11:24:12",
            ),
            array(
                "id" => 10,
                "title" => "Dokter Umum",
                "sub_desc" => "Halo Sobat Cimacan !!\r\n\r\nMinCan mau berbagi informasi lowongan pekerjaan nih di RSUD Cimacan !\r\n\r\nRSUD Cimacan membuka peluang dan kesempatan bergabung di bagian:\r\nDokter Umum dengan jumlah 2 orang",
                "description" => "Halo Sobat Cimacan !!<br /><br />MinCan mau berbagi informasi lowongan pekerjaan nih di RSUD Cimacan !<br /><br />RSUD Cimacan membuka peluang dan kesempatan bergabung di bagian:<br />Dokter Umum dengan jumlah 2 orang<br /><br />Kriteria:<br />1.Pria/Wanita<br />2.Usia &lt;35 tahun<br />3.Pendidikan Profesi Dokter<br />4.Memiliki STR aktif<br />5.Memiliki sertifikat ACL/ATLS<br />6.Kemampuan komunikasi yang baik<br />7.Jujur dan bertanggungjawab<br />8.Bersedia Bekerja secara Shif<br />9.Memiliki sertifikat pelatihan atau seminar yang mendukung profesi<br /><br />Yuk segerakan kirim kelengkapan data berikut:<br />-surat lamaran<br />-CV<br />-KTP<br />-Ijazah<br />-Berkas dukungan lainnya<br />Di jadikan 1 file PDf dan kirim ke email:<br />rekrutmenpegawairscimacan@gmail.com<br />Periode: 12-19 Agustus 2023",
                "img" => "career/20230815105547_13-08-2023.jpg",
                "url" => "",
                "status" => "unpublish",
                "create_date" => "2022-01-30 11:24:40",
                "update_date" => "2022-01-30 11:24:40",
            ),
            array(
                "id" => 11,
                "title" => "IPSRS RSUD Cimacan",
                "sub_desc" => "RSUD Cimacan membuka peluang dan kesempatan bergabung bagi:\r\nPegawai Instalasi Pemeliharaan Sarana Rumah Sakit (IPSRS)\r\n(Jumlah: 4 orang)\r\n\r\nKriteria Pelamar IPSRS RSUD Cimacan:\r\n1. Lulusan SMK/D3 Teknik Mesin, Tata Udara dan SMK Bangunan\r\n2. Memiliki ser",
                "description" => "RSUD Cimacan membuka peluang dan kesempatan bergabung bagi:<br />Pegawai Instalasi Pemeliharaan Sarana Rumah Sakit (IPSRS)<br />(Jumlah: 4 orang)<br /><br />Kriteria Pelamar IPSRS RSUD Cimacan:<br />1. Lulusan SMK/D3 Teknik Mesin, Tata Udara dan SMK Bangunan<br />2. Memiliki sertifikat pelatihan teknik mesin, pelatihan tenaga kelistrikan dan pelatihan tenaga kerja pada ketinggian tingkat 1<br />3. Minimal umur 24 tahun, maksimal 35 tahun<br />4. Diutamakan berpengalaman 1 tahun kerja dibidang tersebut<br />5. Bisa mengoperasikan mesin dan komputer<br />6. Dapat bekerja secara tim<br />7. Dapat bekerja dibawah tekanan<br />8. Dapat bekerja secara shift<br /><br />Yuk segera kirimkan kelengkapan data berupa:<br />- Surat lamaran<br />- CV<br />- Pas foto terbaru<br />- Ijazah terakhir<br />- Transkrip nilai<br />- KK dan KTP<br />- Surat keterangan kerja dari tempat bekerja sebelumnya<br />- Sertifikat dan pendukung lainnya<br /><br />Yuk, tunggu apa lagi?<br />Segera kirimkan kelengkapan data digabungkan dalam 1 file PDF dan di upload melalui link berikut: bit.ly/pelamarIPSRSrsudcimacan<br /><br />Periode pendaftaran: 25 Maret hingga 1 April 2022",
                "img" => "career/20220405092115_IPSRS-2022.jpg",
                "url" => "http://bit.ly/pelamarIPSRSrsudcimacan",
                "status" => "unpublish",
                "create_date" => "2022-04-05 09:21:15",
                "update_date" => "2022-04-05 09:21:15",
            ),
            array(
                "id" => 12,
                "title" => "Dokter Spesialis Radiologi",
                "sub_desc" => "",
                "description" => "RSUD Cimacan membuka peluang dan kesempatan bergabung bagi:<br />Dokter Spesialis Radiologi<br /><br />Kriteria Pelamar Dokter Spesialis Radiologi RSUD Cimacan:<br />1. Pria / Wanita<br />2. Memiliki STR Aktif<br />3. Jujur dan Bertanggung Jawab<br />4. Berkomitmen Tinggi<br />5. Dapat Bekerja Sama Dalam Tim<br />6. Kemampuan Komunikasi Baik<br />7. Memiliki Inisiatif Tinggi<br />8. Diharapkan Full Timer<br /><br />Yuk segera kirimkan kelengkapan data berupa:<br />- Surat lamaran<br />- CV<br />- Pas foto terbaru<br />- Ijazah terakhir<br />- Transkrip nilai<br />- KK dan KTP<br />- Surat keterangan kerja dari tempat bekerja sebelumnya<br />- Sertifikat dan pendukung lainnya<br /><br />Yuk, tunggu apa lagi?<br />Segera kirimkan kelengkapan data digabungkan dalam 1 file PDF dan di upload melalui link yang telah disediakan pada laman ini",
                "img" => "career/20220514111222_lowongan-dokter-spesialis-radiologi.jpeg",
                "url" => "https://docs.google.com/forms/d/e/1FAIpQLSeOkZBYniXrVAzXIIY9f9fngGjdnHTJ0C49L4hJtzcMfMR99g/viewform",
                "status" => "unpublish",
                "create_date" => "2022-05-14 11:12:22",
                "update_date" => "2022-05-14 11:12:22",
            ),
            array(
                "id" => 13,
                "title" => "Dokter Umum IGD RSUD Cimacan 2022",
                "sub_desc" => "RSUD Cimacan membuka peluang dan kesempatan bergabung bagi:\r\nDokter Umum\r\n\r\nKriteria Pelamar Dokter Umum RSUD Cimacan:\r\n1. Pria/Wanita\r\n2. Usia <35 tahun\r\n3. Pendidikan Profesi Dokter\r\n4. Memiliki STR aktif\r\n5. Memiliki Sertifikat ACLS & ATLS\r\n6. Kemampua",
                "description" => "RSUD Cimacan membuka peluang dan kesempatan bergabung bagi:<br />Dokter Umum<br /><br />Kriteria Pelamar Dokter Umum RSUD Cimacan:<br />1. Pria/Wanita<br />2. Usia &lt;35 tahun<br />3. Pendidikan Profesi Dokter<br />4. Memiliki STR aktif<br />5. Memiliki Sertifikat ACLS &amp; ATLS<br />6. Kemampuan komunikasi yang baik<br />7. Jujur &amp; bertanggung jawab<br />8. Surat keterangan kerja dari tempat bekerja sebelumnya<br />9. Bersedia bekerja secara shift<br />10. Memiliki sertifikat pelatihan atau seminar yang mendukung profesi<br /><br />Yuk segera kirimkan kelengkapan data berupa:<br />- Surat lamaran<br />- CV<br />- Pas foto terbaru<br />- Ijazah terakhir<br />- Transkrip nilai<br />- KK dan KTP<br />- Surat keterangan kerja dari tempat bekerja sebelumnya<br />- Sertifikat dan pendukung lainnya<br /><br />Yuk, tunggu apa lagi?<br />Segera kirimkan kelengkapan data digabungkan dalam 1 file PDF dan di upload melalui link yang telah disediakan pada laman ini",
                "img" => "career/20220609114258_rekrut-dokter-umum-rsud-cimacan.jpeg",
                "url" => "https://docs.google.com/forms/d/e/1FAIpQLSfclrKzJp4IYPsTjn6F5x1hPAN9OLW3B48jci6eX3Iao_-7Wg/viewform",
                "status" => "unpublish",
                "create_date" => "2022-06-09 11:42:58",
                "update_date" => "2022-06-09 11:42:58",
            ),
            array(
                "id" => 14,
                "title" => "Refraksionis",
                "sub_desc" => "Halo Sahabat Cimacan..\r\nMincan mau berbagi info lowongan pekerjaan lagi nih di RSUD Cimacan!",
                "description" => "Halo Sahabat Cimacan..<br />Mincan mau berbagi info lowongan pekerjaan lagi nih di RSUD Cimacan!<br /><br />RSUD Cimacan membuka peluang dan kesempatan bergabung bagi:<br />Refraksionis<br />(Jumlah: 1 orang)<br /><br />Kriteria:<br />1. Pria / wanita, usia &lt;27 tahun<br />2. Minimal D3 Refraksionis<br />3. Memiliki STR aktif<br />4. Mempunyai kemampuan tinggi untuk<br />adaptasi dan belajar<br />5. Mampu berkomunikasi dengan baik<br />6. Dapat bekerja sama dalam tim<br />7. Fresh graduate are welcome<br /><br />Yuk segera kirimkan kelengkapan data berikut:<br />- Surat lamaran<br />- CV<br />- Pas foto terbaru ukuran 3x4<br />- Ijazah terakhir<br />- Transkrip nilai<br />- KK dan KTP<br />- STR aktif<br />Dijadikan dalam 1 file PDF dan dikirimkan ke email: umumkepegawaianrscimacan@gmail.com<br />Periode: 25-31 Agustus 2022",
                "img" => "career/20221003083058_301106539_461694669184116_3888941747429991624_n.jfif",
                "url" => "",
                "status" => "unpublish",
                "create_date" => "2022-10-03 08:30:58",
                "update_date" => "2022-10-03 08:30:58",
            ),
            array(
                "id" => 15,
                "title" => "OKUPASI TERAPI",
                "sub_desc" => "Halo Sahabat Cimacan!\r\nMincan mau berbagi info lowongan pekerjaan lagi nih di RSUD Cimacan!",
                "description" => "Halo Sahabat Cimacan!<br />Mincan mau berbagi info lowongan pekerjaan lagi nih di RSUD Cimacan!<br /><br />RSUD Cimacan membuka peluang dan kesempatan bergabung bagi:<br />Okupasi Terapi<br />(Jumlah: 1 orang)<br /><br />Kriteria:<br />1. Pria / wanita usia maks. 35 tahun<br />2. Lulusan D3 Okupasi terapi<br />3. Memiliki STR Okupsi terapi aktif<br />4. Menguasai semua bidang Okupasi terapi aktif<br />5. Pengalaman min. 1 tahun dibidangnya<br />6. Sehat jasmani dan rohani<br />7. Memiliki integritas dan dedikasi yang tinggi terhadap pekerjaan<br />8. Jujur, disiplin, cekatan, komunikatif dan bertanggung jawab<br />9. Mampu bekerja sama dengan team/individu<br />10. Memiliki loyalitas tinggi terhadap RSUD Cimacan<br />11. Bersedia membuat surat pernyataan tidak akan melakukan Inner Promotion saat menjadi karyawan RSUD Cimacan<br /><br />Yuk segera kirimkan kelengkapan data berikut:<br />- Surat lamaran<br />- CV<br />- Pas foto terbaru ukuran 3x4<br />- Ijazah terakhir<br />- Transkrip nilai<br />- KK dan KTP<br />- STR aktif<br />Dijadikan dalam 1 file PDF dan dikirimkan ke email: umumkepegawaianrscimacan@gmail.com<br />Periode: 14-21 Oktober 2022",
                "img" => "career/20221018133426_311593175_1164968194428794_6305522457648013678_n.jpg",
                "url" => "",
                "status" => "unpublish",
                "create_date" => "2022-10-14 13:34:26",
                "update_date" => "2022-10-18 13:34:26",
            ),
            array(
                "id" => 16,
                "title" => "PERAWAT GIGI",
                "sub_desc" => "",
                "description" => "Halo Sahabat Cimacan..<br />Mincan mau berbagi info lowongan pekerjaan lagi nih di RSUD Cimacan!<br /><br />RSUD Cimacan membuka peluang dan kesempatan bergabung bagi:<br />Perawat Gigi<br />(Jumlah: 1 orang)<br /><br />Kriteria:<br />1. Pria / wanita<br />2. Minimal D3 Keperawatan Gigi<br />3. Memiliki STR aktif<br />4. Mempunyai kemampuan tinggi untuk adaptasi dan belajar<br />5. Mampu berkomunikasi dengan baik<br />6. Dapat bekerja sama dalam tim<br />7. Fresh graduate are welcome<br /><br />Yuk segera kirimkan kelengkapan data berikut:<br />- Surat lamaran<br />- CV<br />- Pas foto terbaru ukuran 3x4<br />- Ijazah terakhir<br />- Transkrip nilai<br />- KK dan KTP<br />- STR aktif<br />Dijadikan dalam 1 file PDF dan dikirimkan ke email: umumkepegawaianrscimacan@gmail.com<br />Periode: 12-18 November 2022",
                "img" => "career/20221114155750_315150952_501996548623798_88968011308402248_n.jfif",
                "url" => "",
                "status" => "unpublish",
                "create_date" => "2022-11-14 15:57:50",
                "update_date" => "2022-11-14 15:57:50",
            ),
            array(
                "id" => 17,
                "title" => "Open Recruitmen",
                "sub_desc" => "",
                "description" => "Open Recruitmen yang diselenggarakan oleh RSUD Cimacan di bidang perawat resmi ditutup pada tanggal 11 Januari 2023.<br /><br />Dengan demikian kepada para calon pegawai, untuk sementara sedang dilaksanakannya proses seleksi administrasi calon pegawai, maka dari itu, mohon menunggu hasil dan intruksi selanjutnya agar prosedur rekrutmen dapat terselenggara dengan baik.",
                "img" => "career/20230329153525_325869629_463441696005066_3969598815381543135_n-(1).jpg",
                "url" => "",
                "status" => "unpublish",
                "create_date" => "2023-01-16 15:35:25",
                "update_date" => "2023-03-29 15:35:25",
            ),
        );
    
        $payload_career = [];
        foreach ($t_career as $key => $value) {
            if($value['status'] == 'publish'){
                $status = 1;
            } else {
                $status = 0;
            }

            $payload_career[] = [
                'title' => $value['title'],
                'slug' => str_replace(' ', '-', strtolower($value['title'])) . '-' . $this->generateRandomString(5),
                'sub_desc' => $value['sub_desc'] == '' ? null : $value['sub_desc'],
                'description' => $value['description'],
                'image' => $value['img'],
                'url' => $value['url'] == '' ? null : $value['url'],
                'status' => $status,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        DB::table('careers')->insert($payload_career);
    }
}
