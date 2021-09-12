<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Soal extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model("Main_model");
        $this->load->model("Other_model");
        ini_set('xdebug.var_display_max_depth', '10');
        ini_set('xdebug.var_display_max_children', '256');
        ini_set('xdebug.var_display_max_data', '1024');
    }
    

    // public function id($id_tes){
    //     $data['title'] = "TES TOAFL";

    //     $data['id'] = $id_tes;

    //     $soal = $this->Main_model->get_one("tes", ["md5(id_tes)" => $id_tes]);

    //     $data['tes'] = $soal;

    //     $listening = $this->Main_model->get_all("item_soal", ["id_soal" => $soal['id_soal'], "tipe_soal" => "Listening"], "urutan");
    //     $data['listening'] = [];
    //     $j = 1;
    //     foreach ($listening as $i => $soal) {
    //         if($soal['item'] == "soal"){
    //             $txt_soal = explode("###", $soal['data']);
                
    //             if($soal['penulisan'] == "RTL"){
    //                 $no = $this->Other_model->angka_arab($j).". ";
    //                 $txt_soal[0] = str_replace("{no}", $no, $txt_soal[0]);
    //             } else {
    //                 $no = $j.". ";
    //                 $txt_soal[0] = str_replace("{no}", $no, $txt_soal[0]);
    //             }

    //             $data['listening'][$i]['id_item'] = $soal['id_item'];
    //             $data['listening'][$i]['item'] = $soal['item'];
    //             $data['listening'][$i]['data']['soal'] = $txt_soal[0];
    //             $data['listening'][$i]['data']['pilihan'] = explode("///", $txt_soal[1]);
    //             $data['listening'][$i]['data']['jawaban'] = $txt_soal[2];
    //             $data['listening'][$i]['penulisan'] = $soal['penulisan'];
                
    //             $j++;

    //         } else if($soal['item'] == "petunjuk" || $soal['item'] == "audio"){
    //             $data['listening'][$i] = $soal;
    //             $audio = $this->Main_model->get_one("audio", ["id_audio" => $soal['data']]);
    //             $data['listening'][$i]['file'] = $audio['nama_file'];
    //             $data['listening'][$i]['nama'] = $audio['nama_audio'];
    //         }
    //     }

    //     $structure = $this->Main_model->get_all("item_soal", ["id_soal" => $soal['id_soal'], "tipe_soal" => "Structure"], "urutan");
    //     $data['structure'] = [];
    //     $j = 1;
    //     foreach ($structure as $i => $soal) {
    //         if($soal['item'] == "soal"){
    //             $txt_soal = explode("###", $soal['data']);
                
    //             if($soal['penulisan'] == "RTL"){
    //                 $no = $this->Other_model->angka_arab($j).". ";
    //                 $txt_soal[0] = str_replace("{no}", $no, $txt_soal[0]);
    //             } else {
    //                 $no = $j.". ";
    //                 $txt_soal[0] = str_replace("{no}", $no, $txt_soal[0]);
    //             }

    //             $data['structure'][$i]['id_item'] = $soal['id_item'];
    //             $data['structure'][$i]['item'] = $soal['item'];
    //             $data['structure'][$i]['data']['soal'] = $txt_soal[0];
    //             $data['structure'][$i]['data']['pilihan'] = explode("///", $txt_soal[1]);
    //             $data['structure'][$i]['data']['jawaban'] = $txt_soal[2];
    //             $data['structure'][$i]['penulisan'] = $soal['penulisan'];
                
    //             $j++;

    //         } else if($soal['item'] == "petunjuk" || $soal['item'] == "audio"){
    //             $data['structure'][$i] = $soal;
    //             $audio = $this->Main_model->get_one("audio", ["id_audio" => $soal['data']]);
    //             $data['structure'][$i]['file'] = $audio['nama_file'];
    //             $data['structure'][$i]['nama'] = $audio['nama_audio'];
    //         }
    //     }

    //     $reading = $this->Main_model->get_all("item_soal", ["id_soal" => $soal['id_soal'], "tipe_soal" => "Reading"], "urutan");
    //     $data['reading'] = [];
    //     $j = 1;
    //     foreach ($reading as $i => $soal) {
    //         if($soal['item'] == "soal"){
    //             $txt_soal = explode("###", $soal['data']);
                
    //             if($soal['penulisan'] == "RTL"){
    //                 $no = $this->Other_model->angka_arab($j).". ";
    //                 $txt_soal[0] = str_replace("{no}", $no, $txt_soal[0]);
    //             } else {
    //                 $no = $j.". ";
    //                 $txt_soal[0] = str_replace("{no}", $no, $txt_soal[0]);
    //             }

    //             $data['reading'][$i]['id_item'] = $soal['id_item'];
    //             $data['reading'][$i]['item'] = $soal['item'];
    //             $data['reading'][$i]['data']['soal'] = $txt_soal[0];
    //             $data['reading'][$i]['data']['pilihan'] = explode("///", $txt_soal[1]);
    //             $data['reading'][$i]['data']['jawaban'] = $txt_soal[2];
    //             $data['reading'][$i]['penulisan'] = $soal['penulisan'];
                
    //             $j++;

    //         } else if($soal['item'] == "petunjuk" || $soal['item'] == "audio"){
    //             $data['reading'][$i] = $soal;
    //             $audio = $this->Main_model->get_one("audio", ["id_audio" => $soal['data']]);
    //             $data['reading'][$i]['file'] = $audio['nama_file'];
    //             $data['reading'][$i]['nama'] = $audio['nama_audio'];
    //         }
    //     }

    //     $data['jumlah_soal']['listening'] = COUNT($this->Main_model->get_all("item_soal", ["id_soal" => $soal['id_soal'], "tipe_soal" => "Listening", "item" => "soal"]));
    //     $data['jumlah_soal']['structure'] = COUNT($this->Main_model->get_all("item_soal", ["id_soal" => $soal['id_soal'], "tipe_soal" => "Structure", "item" => "soal"]));
    //     $data['jumlah_soal']['reading'] = COUNT($this->Main_model->get_all("item_soal", ["id_soal" => $soal['id_soal'], "tipe_soal" => "Reading", "item" => "soal"]));
        
    //     $this->load->view("pages/soal", $data);
    // }

    public function id($id_tes){

        $data['id'] = $id_tes;

        $tes = $this->Main_model->get_one("tes", ["md5(id_tes)" => $id_tes]);
        $soal = $this->Main_model->get_one("soal", ["id_soal" => $tes['id_soal']]);
        $sesi = $this->Main_model->get_all("sesi_soal", ["id_soal" => $soal['id_soal']]);

        $data['title'] = $tes['nama_tes'];
        $data['tes'] = $tes;
        foreach ($sesi as $i => $sesi) {
            $sub_soal = $this->Main_model->get_all("item_soal", ["id_sub" => $sesi['id_sub']]);
            $data['sesi'][$i] = [];
            $j = 1;
            foreach ($sub_soal as $j => $soal) {
                if($soal['item'] == "soal"){
                    $txt_soal = explode("###", $soal['data']);
                    
                    if($soal['penulisan'] == "RTL"){
                        $no = $this->Other_model->angka_arab($j).". ";
                        $txt_soal[0] = str_replace("{no}", $no, $txt_soal[0]);
                    } else {
                        $no = $j.". ";
                        $txt_soal[0] = str_replace("{no}", $no, $txt_soal[0]);
                    }

                    $data['sesi'][$i][$j]['id_item'] = $soal['id_item'];
                    $data['sesi'][$i][$j]['item'] = $soal['item'];
                    $data['sesi'][$i][$j]['data']['soal'] = $txt_soal[0];
                    $data['sesi'][$i][$j]['data']['pilihan'] = explode("///", $txt_soal[1]);
                    $data['sesi'][$i][$j]['data']['jawaban'] = $txt_soal[2];
                    $data['sesi'][$i][$j]['penulisan'] = $soal['penulisan'];
                    
                    $j++;

                } else if($soal['item'] == "petunjuk" || $soal['item'] == "audio"){
                    $data['sesi'][$i][$j] = $soal;
                    $audio = $this->Main_model->get_one("audio", ["id_audio" => $soal['data']]);
                    $data['sesi'][$i][$j]['file'] = $audio['nama_file'];
                    $data['sesi'][$i][$j]['nama'] = $audio['nama_audio'];
                }

                $data['sesi'][$i]['jumlah_soal'] = COUNT($this->Main_model->get_all("item_soal", ["id_sub" => $sesi['id_sub'], "item" => "soal"]));
            }
        }

        $this->load->view("pages/soal", $data);

    }

    public function email_check(){
        $id_tes = $this->input->post("id");
        $email = $this->input->post("email");
        $data = $this->Main_model->get_one("peserta", ["email" => $email, 'md5(id_tes)' => $id_tes]);
        if($data) {
            echo json_encode($data['email']);
        } else {
            echo json_encode("");
        }
    }

    public function password_check(){
        $id_tes = $this->input->post("id");
        $password = $this->input->post("password");
        $data = $this->Main_model->get_one("tes", ["password" => $password, "md5(id_tes)" => $id_tes]);
        if($data) {
            echo json_encode($data['id_tes']);
        } else {
            echo json_encode("");
        }
    }

    public function add_jawaban(){
        // var_dump($_POST);
        // exit();
        $nama = $this->input->post("nama");

        if($nama != ""){

            $id_tes = $this->input->post("id_tes");
            $tes = $this->Main_model->get_one("tes", ["md5(id_tes)" => $id_tes]);
    
            // get soal listening 
            $listening = $this->Main_model->get_all("item_soal", ["id_soal" => $tes['id_soal'], "tipe_soal" => "Listening"], "urutan");
            $data['listening'] = [];
            $j = 0;
            foreach ($listening as $i => $soal) {
                if($soal['item'] == "soal"){
                    $txt_soal = explode("###", $soal['data']);

                    $data['listening'][$j] = $txt_soal[2];
                    $j++;
                }
            }
    
            $jawaban = $this->input->post("cekListening");
            $text = "";
            $nilai_listening = 0;
    
            foreach ($data['listening'] as $i => $soal) {
                if($soal == $jawaban[$i]){
                    $nilai_listening += 1;
                    $status = "benar";
                } else {
                    $status = "salah";
                }
    
                $text .= $jawaban[$i]."/".$status."###";
            }

            // get soal structure 
            $structure = $this->Main_model->get_all("item_soal", ["id_soal" => $tes['id_soal'], "tipe_soal" => "Structure"], "urutan");
            $data['structure'] = [];
            $j = 0;
            foreach ($structure as $i => $soal) {
                if($soal['item'] == "soal"){
                    $txt_soal = explode("###", $soal['data']);

                    $data['structure'][$j] = $txt_soal[2];
                    $j++;
                }
            }
    
            $jawaban = $this->input->post("cekStructure");
            $text = "";
            $nilai_structure = 0;
    
            foreach ($data['structure'] as $i => $soal) {
                if($soal == $jawaban[$i]){
                    $nilai_structure += 1;
                    $status = "benar";
                } else {
                    $status = "salah";
                }
    
                $text .= $jawaban[$i]."/".$status."###";
            }

            // get soal reading 
            $reading = $this->Main_model->get_all("item_soal", ["id_soal" => $tes['id_soal'], "tipe_soal" => "Reading"], "urutan");
            $data['reading'] = [];
            $j = 0;
            foreach ($reading as $i => $soal) {
                if($soal['item'] == "soal"){
                    $txt_soal = explode("###", $soal['data']);

                    $data['reading'][$j] = $txt_soal[2];
                    $j++;
                }
            }
    
            $jawaban = $this->input->post("cekReading");
            $text = "";
            $nilai_reading = 0;
    
            foreach ($data['reading'] as $i => $soal) {
                if($soal == $jawaban[$i]){
                    $nilai_reading += 1;
                    $status = "benar";
                } else {
                    $status = "salah";
                }
    
                $text .= $jawaban[$i]."/".$status."###";
            }
            
            $data = [
                "email" => $this->input->post("email"),
                "nama" => $this->input->post("nama"),
                "no_wa" => $this->input->post("no_wa"),
                "t4_lahir" => $this->input->post("t4_lahir"),
                "tgl_lahir" => $this->input->post("tgl_lahir"),
                "alamat" => $this->input->post("alamat"),
                "alamat_pengiriman" => $this->input->post("alamat_pengiriman"),
                "nilai_listening" => $nilai_listening,
                "nilai_structure" => $nilai_structure,
                "nilai_reading" => $nilai_reading,
                "text" => $text,
                "id_tes" => $tes['id_tes'],
                "id_soal" => $tes['id_soal'],
            ];
    
            $this->Main_model->add_data("peserta", $data);

            $data = [
                "nama" => $this->input->post("nama"),
                "ttl" => $data['t4_lahir'] . ", " . $this->tgl_indo(date("d-m-Y", strtotime($data['tgl_lahir']))),
                "alamat" => $data['alamat_pengiriman'],
                "no_wa" => $data['no_wa'],
                "hari_pengumuman" => $this->hari_ini(date("D", strtotime($tes['tgl_pengumuman']))),
                "tgl_pengumuman" => $this->tgl_indo(date("d-m-Y", strtotime($tes['tgl_pengumuman']))),
                "tgl_tes" => $this->tgl_indo(date("d-m-Y", strtotime($tes['tgl_tes']))),
            ];

            $this->session->set_flashdata('pesan', $data);
        } else {
            $this->session->set_flashdata('pesan', $data);
        }
        
        redirect(base_url("soal/id/".$id_tes), $data);
    }

    public function keterangan($nilai) {
        // if($nilai >= 401 && $nilai <= 450) $nilai = "مقبول";
        if($nilai <= 450) $nilai = "مقبول";
        else if($nilai >= 451 && $nilai <= 500) $nilai = "جيد";
        else if($nilai >= 501 && $nilai <= 600) $nilai = "جيد جدا";
        else if($nilai >= 601 && $nilai <= 680) $nilai = "ممتاز";

        return $nilai;
    }

    public function istima($nilai){
        switch ($nilai) {
            case 0:
                $data = 24;
                break;
            case 1:
                $data = 25;
                break;
            case 2:
                $data = 26;
                break;
            case 3:
                $data = 27;
                break;
            case 4:
                $data = 28;
                break;
            case 5:
                $data = 29;
                break;
            case 6:
                $data = 30;
                break;
            case 7:
                $data = 31;
                break;
            case 8:
                $data = 32;
                break;
            case 9:
                $data = 32;
                break;
            case 10:
                $data = 33;
                break;
            case 11:
                $data = 35;
                break;
            case 12:
                $data = 37;
                break;
            case 13:
                $data = 37;
                break;
            case 14:
                $data = 38;
                break;
            case 15:
                $data = 41;
                break;
            case 16:
                $data = 41;
                break;
            case 17:
                $data = 42;
                break;
            case 18:
                $data = 43;
                break;
            case 19:
                $data = 44;
                break;
            case 20:
                $data = 45;
                break;
            case 21:
                $data = 45;
                break;
            case 22:
                $data = 46;
                break;
            case 23:
                $data = 47;
                break;
            case 24:
                $data = 47;
                break;
            case 25:
                $data = 48;
                break;
            case 26:
                $data = 48;
                break;
            case 27:
                $data = 49;
                break;
            case 28:
                $data = 49;
                break;
            case 29:
                $data = 50;
                break;
            case 30:
                $data = 51;
                break;
            case 31:
                $data = 51;
                break;
            case 32:
                $data = 52;
                break;
            case 33:
                $data = 52;
                break;
            case 34:
                $data = 53;
                break;
            case 35:
                $data = 54;
                break;
            case 36:
                $data = 54;
                break;
            case 37:
                $data = 55;
                break;
            case 38:
                $data = 56;
                break;
            case 39:
                $data = 57;
                break;
            case 40:
                $data = 57;
                break;
            case 41:
                $data = 58;
                break;
            case 42:
                $data = 59;
                break;
            case 43:
                $data = 60;
                break;
            case 44:
                $data = 61;
                break;
            case 45:
                $data = 62;
                break;
            case 46:
                $data = 63;
                break;
            case 47:
                $data = 65;
                break;
            case 48:
                $data = 66;
                break;
            case 49:
                $data = 67;
                break;
            case 50:
                $data = 68;
                break;
        }
        return $data;
    }
    
    public function tarakib($nilai){
        switch ($nilai) {
            case 0:
                $data = 20;
                break;
            case 1:
                $data = 20;
                break;
            case 2:
                $data = 21;
                break;
            case 3:
                $data = 22;
                break;
            case 4:
                $data = 23;
                break;
            case 5:
                $data = 25;
                break;
            case 6:
                $data = 26;
                break;
            case 7:
                $data = 27;
                break;
            case 8:
                $data = 29;
                break;
            case 9:
                $data = 31;
                break;
            case 10:
                $data = 33;
                break;
            case 11:
                $data = 35;
                break;
            case 12:
                $data = 36;
                break;
            case 13:
                $data = 37;
                break;
            case 14:
                $data = 38;
                break;
            case 15:
                $data = 40;
                break;
            case 16:
                $data = 40;
                break;
            case 17:
                $data = 41;
                break;
            case 18:
                $data = 42;
                break;
            case 19:
                $data = 43;
                break;
            case 20:
                $data = 44;
                break;
            case 21:
                $data = 45;
                break;
            case 22:
                $data = 46;
                break;
            case 23:
                $data = 47;
                break;
            case 24:
                $data = 48;
                break;
            case 25:
                $data = 49;
                break;
            case 26:
                $data = 50;
                break;
            case 27:
                $data = 51;
                break;
            case 28:
                $data = 52;
                break;
            case 29:
                $data = 53;
                break;
            case 30:
                $data = 54;
                break;
            case 31:
                $data = 55;
                break;
            case 32:
                $data = 56;
                break;
            case 33:
                $data = 57;
                break;
            case 34:
                $data = 58;
                break;
            case 35:
                $data = 60;
                break;
            case 36:
                $data = 61;
                break;
            case 37:
                $data = 63;
                break;
            case 38:
                $data = 65;
                break;
            case 39:
                $data = 67;
                break;
            case 40:
                $data = 68;
                break;
        }
        return $data;
    }

    public function qiroah($nilai){
        switch ($nilai) {
            case 0:
                $data = 20;
                break;
            case 1:
                $data = 21;
                break;
            case 2:
                $data = 22;
                break;
            case 3:
                $data = 23;
                break;
            case 4:
                $data = 23;
                break;
            case 5:
                $data = 24;
                break;
            case 6:
                $data = 25;
                break;
            case 7:
                $data = 26;
                break;
            case 8:
                $data = 28;
                break;
            case 9:
                $data = 28;
                break;
            case 10:
                $data = 29;
                break;
            case 11:
                $data = 30;
                break;
            case 12:
                $data = 31;
                break;
            case 13:
                $data = 32;
                break;
            case 14:
                $data = 34;
                break;
            case 15:
                $data = 35;
                break;
            case 16:
                $data = 36;
                break;
            case 17:
                $data = 37;
                break;
            case 18:
                $data = 38;
                break;
            case 19:
                $data = 39;
                break;
            case 20:
                $data = 40;
                break;
            case 21:
                $data = 41;
                break;
            case 22:
                $data = 42;
                break;
            case 23:
                $data = 43;
                break;
            case 24:
                $data = 43;
                break;
            case 25:
                $data = 44;
                break;
            case 26:
                $data = 45;
                break;
            case 27:
                $data = 46;
                break;
            case 28:
                $data = 46;
                break;
            case 29:
                $data = 47;
                break;
            case 30:
                $data = 48;
                break;
            case 31:
                $data = 48;
                break;
            case 32:
                $data = 49;
                break;
            case 33:
                $data = 50;
                break;
            case 34:
                $data = 51;
                break;
            case 35:
                $data = 52;
                break;
            case 36:
                $data = 52;
                break;
            case 37:
                $data = 53;
                break;
            case 38:
                $data = 54;
                break;
            case 39:
                $data = 54;
                break;
            case 40:
                $data = 55;
                break;
            case 41:
                $data = 56;
                break;
            case 42:
                $data = 57;
                break;
            case 43:
                $data = 58;
                break;
            case 44:
                $data = 59;
                break;
            case 45:
                $data = 60;
                break;
            case 46:
                $data = 61;
                break;
            case 47:
                $data = 63;
                break;
            case 48:
                $data = 65;
                break;
            case 49:
                $data = 66;
                break;
            case 50:
                $data = 67;
                break;
        }
        return $data;
    }

    public function tgl_indo($tgl){
        $data = explode("-", $tgl);
        $hari = $data[0];
        $bulan = $data[1];
        $tahun = $data[2];

        if($bulan == "01") $bulan = "Januari";
        if($bulan == "02") $bulan = "Februari";
        if($bulan == "03") $bulan = "Maret";
        if($bulan == "04") $bulan = "April";
        if($bulan == "05") $bulan = "Mei";
        if($bulan == "06") $bulan = "Juni";
        if($bulan == "07") $bulan = "Juli";
        if($bulan == "08") $bulan = "Agustus";
        if($bulan == "09") $bulan = "September";
        if($bulan == "10") $bulan = "Oktober";
        if($bulan == "11") $bulan = "November";
        if($bulan == "12") $bulan = "Desember";

        return $hari . " " . $bulan . " " . $tahun;
    }
     
    function hari_ini($hari){
        // $hari = date ("D");
    
        switch($hari){
            case 'Sun':
                $hari_ini = "Ahad";
            break;
    
            case 'Mon':			
                $hari_ini = "Senin";
            break;
    
            case 'Tue':
                $hari_ini = "Selasa";
            break;
    
            case 'Wed':
                $hari_ini = "Rabu";
            break;
    
            case 'Thu':
                $hari_ini = "Kamis";
            break;
    
            case 'Fri':
                $hari_ini = "Jumat";
            break;
    
            case 'Sat':
                $hari_ini = "Sabtu";
            break;
            
            default:
                $hari_ini = "Tidak di ketahui";		
            break;
        }
    
        return $hari_ini;
    
    }
}

/* End of file Peserta.php */
