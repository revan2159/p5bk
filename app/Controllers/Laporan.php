<?php

namespace App\Controllers;

use Dompdf\Dompdf;
use \Mpdf\Mpdf;
use Config\Database;
use App\Models\NilaiP5bk;
use App\Models\OpsiModel;
use App\Models\AspekModel;
use App\Models\SiswaModel;
use App\Models\CatatanModel;
use App\Models\DimensiModel;
use App\Models\ProjectModel;
use App\Controllers\BaseController;

class Laporan extends BaseController
{
    public function index()
    {
        $nilai = new NilaiP5bk();
        $getniilai = $nilai->getAllNilai();
        $catatan = new CatatanModel();
        $getcatatan = $catatan->getCatatanbysiswa();

        $data = [
            'title' => 'Laporan',
            'active' => 'laporan',
            'allnilai' => $getniilai,
            'allcatatan' => $getcatatan
        ];
        return view('fitur/laporan', $data);
    }

    public function update_catatan()
    {
        $catatan = new CatatanModel();
        $id_catatan = $this->request->getVar('id_catatan');
        $catatan->update($id_catatan, [
            'catatan' => $this->request->getVar('catatan')
        ]);

        session()->setFlashdata('pesan', 'Catatan berhasil diupdate');
        return redirect()->to(base_url('laporan'));
    }

    public function tambah_catatan()
    {
        $catatan = new CatatanModel();
        $id_siswa = $this->request->getVar('id_siswa');
        $isi = $this->request->getVar('catatan');
        $araymap = [
            'siswa_id' => $id_siswa,
            'catatan' => $isi
        ];
        $catatan->insert($araymap);
        session()->setFlashdata('pesan', 'Catatan berhasil ditambahkan');
        return redirect()->to(base_url('laporan'));
    }
    public function preview_nilai()
    {
        //panggil fungsi cetak
        $db = Database::connect();
        $id_siswa = $this->request->uri->getSegment(3);

        //get data siswa 
        $siswa = $db->table('tb_siswa');
        $siswa = $siswa->select('tb_siswa.siswa_id, tb_siswa.siswa_nama, tb_siswa.siswa_nis, tb_siswa.siswa_nisn, tb_siswa.siswa_jk, tb_siswa.siswa_tempat_lahir, tb_siswa.siswa_tanggal_lahir, tb_siswa.siswa_agama, tb_siswa.siswa_alamat, tb_siswa.siswa_kelas, tb_kelas.kelas_nama');
        $siswa = $siswa->join('tb_kelas', 'tb_kelas.kelas_id = tb_siswa.siswa_kelas');
        $siswa = $siswa->where('tb_siswa.siswa_id', $id_siswa);
        $siswa = $siswa->get()->getRowArray();


        //get data rencana
        $rencana = $db->table('rencana_budaya_kerja');
        $rencana = $rencana->select('rencana_budaya_kerja.rencana_id,rencana_budaya_kerja.nama, rencana_budaya_kerja.deskripsi');
        $rencana = $rencana->where('rencana_budaya_kerja.kelas_id', $siswa['siswa_kelas']);
        $rencana = $rencana->get()->getResultArray();

        //get all opsi
        $opsi = new OpsiModel();
        $opsi = $opsi->getAllopsi();

        //get data dimensi
        $dimensi = new DimensiModel();
        $dimensi = $dimensi->findAll();

        //get aspek
        $aspek = $db->table('aspek_penilaian');
        $aspek = $aspek->get()->getResultArray();


        //get data nilai dimensi
        $kueri_nilai = $db->table('nilai_p5bk');
        $kueri_nilai->select('nilai_p5bk.dimensi_id,nilai_p5bk.rencana_id,nilai_p5bk.rencana_id,nilai_p5bk.elemen_id,nilai_p5bk.opsi_id');
        $kueri_nilai->where('nilai_p5bk.siswa_id', $id_siswa);
        $nilai = $kueri_nilai->get()->getResultArray();

        //find nama proyek, name dimensi, name elemen, opsi_id with siswa_id
        $nilai_dimensi = $db->table('nilai_p5bk');
        $nilai_dimensi->select('nilai_p5bk.dimensi_id,nilai_p5bk.rencana_id,nilai_p5bk.elemen_id,nilai_p5bk.opsi_id');
        $nilai_dimensi->where('nilai_p5bk.siswa_id', $id_siswa);
        $nilai_dimensi = $nilai_dimensi->get()->getResultArray();

        //get name dimensi
        $elm = $db->table('elemen');
        $elm->select('elemen.id_elemen,elemen.dimensi_id, elemen.nama_elemen, elemen.elemen_deskripsi');
        $elm = $elm->get()->getResultArray();

        //get catatan
        $catatan = $db->table('catatan');
        $catatan->select('catatan.catatan');
        $catatan->where('catatan.siswa_id', $id_siswa);
        $cat = $catatan->get()->getRowArray();
        if ($cat == null) {
            $cat = [
                'catatan' => '-'
            ];
        } else {
            $cat['catatan'];
        }


        $data = [
            'title' => 'Preview Nilai',
            'active' => 'laporan',
            'siswa' => $siswa,
            'rencana' => $rencana,
            'opsi' => $opsi,
            'dimensi' => $dimensi,
            'nilai' => $nilai,
            'nilai_dimensi' => $nilai_dimensi,
            'elemen' => $elm,
            'aspek' => $aspek,
            'catatan' => $cat
        ];

        return view('fitur/preview', $data);
    }

    public function cetak()
    {

        $mpdf = new Mpdf([
            'mode' => 'utf-8',
            'format' => 'A4',
            'orientation' => 'P',
            'default_font_size'    => '12',
            'default_font'         => 'sans-serif',
            'title'                => 'Laporan Nilai P5BK',
            'author'               => 'SMK KESEHATAN RAHANI HUSADA',
            'display_mode'         => 'fullpage',
            'auto_language_detection'  => false,
            'margin_left' => 15,
            'margin_right' => 15,
            'margin_top' => 15,
            'margin_bottom' => 15,
            'margin_header' => 5,
            'margin_footer' => 5,
        ]);

        //font directory
        



        $id_siswa = $this->request->uri->getSegment(3);

        //get data siswa 
        $siswa = new SiswaModel();
        $siswa = $siswa->getSiswabyId($id_siswa);

        $kelas_id = $siswa['siswa_kelas'];

        $rencana = new ProjectModel();
        $rencana = $rencana->getProjecbykelas($kelas_id);

        //get all opsi
        $opsi = new OpsiModel();
        $opsi = $opsi->getAllopsi();

        //get data dimensi
        $dimensi = new DimensiModel();
        $elm = $dimensi->getElemen();
        $dimensi = $dimensi->findAll();

        $aspek = new AspekModel();
        $aspek = $aspek->getAllaspek();

        $nilai = new NilaiP5bk();
        $cat = $nilai->catatan($id_siswa);
        $nilai = $nilai->getNilai($id_siswa);

        if ($cat == null) {
            $cat = [
                'catatan' => '-'
            ];
        } else {
            $cat['catatan'];
        }

        $data = [
            'title' => 'Set Aspek',
            'siswa' => $siswa,
            'rencana' => $rencana,
            'opsi' => $opsi,
            'dimensi' => $dimensi,
            'nilai' => $nilai,
            'elemen' => $elm,
            'aspek' => $aspek,
            'catatan' => $cat
        ];

        //  return view('fitur/cetak', $data);

        //mpdf
        $stylesheet = file_get_contents('assets/css/cetak.css');
        //bootstrap /vendor/bootstrap/dist/css/bootstrap.min.css
        $stylesheet2 = file_get_contents('vendor/bootstrap/dist/css/bootstrap.min.css');
        // return view('fitur/cetak2', $data);
        $general_title = strtoupper($siswa['siswa_nama']) . ' - ' . $siswa['kelas_nama'];

        //set mpdf footer
        $mpdf->SetFooter($general_title . '|{PAGENO}|Dicetak dari E-Raport v1.0');
        $mpdf->defaultfooterfontsize = 7;
        $mpdf->defaultfooterline = 0;

        $html = view('fitur/cetak', $data);
        $mpdf->WriteHTML($stylesheet2, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($stylesheet, \Mpdf\HTMLParserMode::HEADER_CSS);
        $mpdf->WriteHTML($html, \Mpdf\HTMLParserMode::HTML_BODY);
        $mpdf->Output($general_title . '-IDENTITAS.pdf', 'D');
    }
}
