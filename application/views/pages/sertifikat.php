<?php $this->load->view("_partials/header")?>
    
    <div class="wrapper" id="elementtoScrollToID">
        <!-- <div class="sticky-top">
            <?php $this->load->view("_partials/navbar-header")?>
        </div> -->
        <div class="page-wrapper" id="">
            <div class="page-body">
                <div class="container-xl">
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6">
                                <?php if(isset($nama)) :?>
                                    <div class="card shadow mb-4">
                                        <div class="card-body text-gray-900">
                                            <center>
                                                <img src="<?= $link_foto[0]['value']?>/assets/img/logo.png?t=<?= time()?>" width=150 class="img-fluid mb-3" alt="">
                                            </center>
                                            <h5 class="m-0 font-weight-bold text-dark">No. Sertifikat : </i><?= $no_doc?></h5><br>
                                            <p>
                                                Nama : <?= ucwords(strtolower($nama))?>
                                                <br>
                                                TTL : <?= $t4_lahir?>, <?= tgl_indo($tgl_lahir)?>
                                                <br>
                                                Alamat : <?= ucwords(strtolower($alamat))?>
                                            </p>
                                            <br>
                                            <p>
                                                <b>Hasil TOEFL Prediction Test</b>
                                                <br>
                                                Listening : <?= $listening?>
                                                <br>
                                                Structure : <?= $structure?>
                                                <br>
                                                Reading : <?= $reading?>
                                                <br>
                                                Total Score : <?= round($skor)?>
                                            </p>
                                            <br>
                                            <p>
                                                Tanggal Tes : <?= tgl_indo($tgl_tes)?>
                                                <br>
                                                Berlaku Sampai : <?= tgl_indo($tgl_berakhir)?>
                                            </p>
                                            <br>
                                            <p><small class="text-danger"><i>Note: Sertifikat dianggap valid jika data yang tertera pada sertifikat sama dengan data di atas. Jika terdapat kejanggalan, hubungi Rumah Belajar TOP English di 088807111144.</i></small></p>
                                        </div>
                                    </div>
                                <?php else :?>
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                            <h6 class="m-0 font-weight-bold text-dark">Sertifikat Tidak Tersedia</i></h6>
                                        </div>
                                        <div class="card-body text-gray-900">
                                            <div class="alert alert-warning"><i class="fa fa-exclamation-circle text-warning mr-3"></i>Maaf Sertifikat Anda Tidak Ditemukan</div>
                                        </div>
                                    </div>
                                <?php endif;?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view("_partials/footer")?>