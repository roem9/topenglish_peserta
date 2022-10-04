<?php


defined('BASEPATH') OR exit('No direct script access allowed');

class Sertifikat extends CI_Controller {

    
    public function __construct(){
        parent::__construct();
        $this->load->model("Main_model");
    }
    
    public function no($id){
        $peserta = $this->Main_model->get_one("peserta_toefl", ["md5(id)" => $id]);
        $peserta['link'] = $this->Main_model->get_one("config", ['field' => "web admin"]);
        if($peserta){
            $tes = $this->Main_model->get_one("tes", ["id_tes" => $peserta['id_tes']]);
            $peserta['nama'] = $peserta['nama'];
            $peserta['title'] = "Sertifikat ".$peserta['nama'];
            $peserta['t4_lahir'] = ucwords(strtolower($peserta['t4_lahir']));
            $peserta['hari'] = date('d', strtotime($tes['tgl_tes']));
            $peserta['tahun'] = date('y', strtotime($tes['tgl_tes']));
            $peserta['bulan'] = getHurufBulan(date('m', strtotime($tes['tgl_tes'])));
            $peserta['listening'] = poin("Listening", $peserta['nilai_listening']);
            $peserta['structure'] = poin("Structure", $peserta['nilai_structure']);
            $peserta['reading'] = poin("Reading", $peserta['nilai_reading']);
            $peserta['tgl_tes'] = date('Y-m-d', strtotime($peserta['tgl_input']));
            $peserta['tgl_berakhir'] = date('Y-m-d', strtotime('+1 year', strtotime($peserta['tgl_input'])));

            $peserta['link_foto'] = config();

            $skor = ((poin("Listening", $peserta['nilai_listening']) + poin("Structure", $peserta['nilai_structure']) + poin("Reading", $peserta['nilai_reading'])) * 10) / 3;
            $peserta['skor'] = $skor;

            $peserta['no_doc'] = "T.{$peserta['no_doc']}{$peserta['hari']}{$peserta['bulan']}{$peserta['tahun']}";
        }

        // $this->load->view("pages/layout/header-sertifikat", $peserta);
        // $this->load->view("pages/soal/".$page, $data);
        $peserta['background'] = $this->Main_model->get_one("config", ["field" => 'background']);
        $this->load->view("pages/sertifikat", $peserta);
        // $this->load->view("pages/layout/footer");
    }
}

/* End of file Sertifikat.php */
