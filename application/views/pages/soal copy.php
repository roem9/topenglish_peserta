<?php $this->load->view("_partials/header")?>
    <div class="wrapper" id="elementtoScrollToID">
        <div class="sticky-top">
            <?php $this->load->view("_partials/navbar-header")?>
        </div>
        <div class="page-wrapper" id="">
            <div class="page-body">
                <div class="container-xl">
                    <div class="row row-cards FieldContainer" data-masonry='{"percentPosition": true }'>
                        <form action="<?= base_url()?>soal/add_jawaban" method="post" id="formSoal">
                            <input type="hidden" name="id_tes" value="<?= $id?>">
                            <div id="dataDiri">
                                <div class="card mb-3">
                                    <div class="card-header">
                                        <h3 class="card-title">Data Diri</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-floating mb-3">
                                            <input type="text" name="email" id="email" class="form-control required">
                                            <label>Alamat Email</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="nama" id="nama" class="form-control required">
                                            <label>Nama Lengkap</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="no_wa" id="no_wa" class="form-control required">
                                            <label>No Whatsapp</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="text" name="t4_lahir" id="t4_lahir" class="form-control required">
                                            <label>Tempat Lahir</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control required">
                                            <label>Tgl Lahir</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea name="alamat" class="form-control required" style="height: 100px"></textarea>
                                            <label for="" class="col-form-label">Alamat</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <textarea name="alamat_pengiriman" class="form-control required" style="height: 100px"></textarea>
                                            <label for="" class="col-form-label">Alamat Pengiriman</label>
                                            <small id="emailHelp" class="form-text text-danger">Form Alamat pengiriman diisi jika memesan sertifikat</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-md btn-success btnNext">
                                            Next
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="soalListening" style="display:none">
                                <div class="form-floating mb-3">
                                    <select name="fontSize" class="form-control required">
                                        <option value="">Pilih Ukuran Tulisan</option>
                                        <option value="">Default</option>
                                        <option value="20px">20px</option>
                                        <option value="25px">25px</option>
                                        <option value="30px">30px</option>
                                    </select>
                                    <label>Ukuran Tulisan</label>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-md btn-success btnBack">
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-left" />
                                            </svg> 
                                            Back</button>
                                        <button type="button" class="btn btn-md btn-success btnNext">
                                            Next
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <?php foreach ($listening as $i => $data) :
                                    $item = "";
                                ?>
                                    <?php if($data['item'] == "soal") :?>
                                        <?php if($data['penulisan'] == "RTL") :?>
                                            <?php $soal = '<div dir="rtl" class="mb-3">'.$data['data']['soal'].'</div>' ?>
                                            <input type="hidden" name="cekListening[]" data-id="<?= $i?>" id="cekListening<?= $i?>" value="null">
                                            <?php $pilihan = "";?>
                                            <?php foreach ($data['data']['pilihan'] as $k => $choice) :?>
                                                <?php $pilihan .= '
                                                    <div class="mb-3">
                                                    <div class="form-check">
                                                        <div class="text-right" dir="rtl">
                                                            <label>
                                                                <input type="radio" class="soal_listening" data-id="'.$i.'" id="soal_listening'.$i.$k.'" name="soal_listening['.$i.']" value="'.$choice.'" checked> 
                                                                '.$choice.'
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>' ?>
                                            <?php endforeach;?>
                                            <?php $item = $soal.$pilihan;?>
                                        <?php else :?>
                                            <?php $soal = '<div class="mb-3">'.$data['data']['soal'].'</div>' ?>
                                            <input type="hidden" name="cekListening[]" data-id="<?= $i?>" id="cekListening<?= $i?>" value="null">
                                            <?php $pilihan = "";?>
                                            <?php foreach ($data['data']['pilihan'] as $choice) :?>
                                                <?php $pilihan .= '
                                                    <div class="mb-3">
                                                    <div class="form-check">
                                                        <label>
                                                            <input type="radio" class="soal_listening" data-id="'.$i.'" id="soal_listening'.$i.$k.'" name="soal_listening['.$i.']" value="'.$choice.'" checked> 
                                                            '.$choice.'
                                                        </label>
                                                    </div>
                                                </div>' ?>
                                            <?php endforeach;?>
                                            <?php $item = $soal.$pilihan;?>
                                        <?php endif;?>
                                    <?php elseif($data['item'] == "petunjuk") :
                                            if($data['penulisan'] == "RTL"){
                                                $item = '<div dir="rtl" class="mb-3">'.$data['data'].'</div>';
                                            } else {
                                                $item = '<div dir="ltr" class="mb-3">'.$data['data'].'</div>';
                                            }?>
                                    <?php elseif($data['item'] == "audio") :
                                        $item = '<center><audio controls controlsList="nodownload"><source src="https://admincbt.mrscholae.com/assets/myaudio/'.$data['data'].'" type="audio/mpeg"></audio></center>';
                                    ?>
                                    <?php endif;?>
                                    <div class="shadow card mb-3 soal">
                                        <div class="card-body" id="soalListening<?= $i?>">
                                            
                                            <?= $item?>
                        
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between">
                                        <button type="button" class="btn btn-md btn-success btnBack">
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-left" />
                                            </svg> 
                                            Back</button>
                                        <button type="button" class="btn btn-md btn-success btnNext">
                                            Next
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>

                            <div id="soalStructure" style="display:none">
                                <div class="form-floating mb-3">
                                    <select name="fontSize" class="form-control required">
                                        <option value="">Pilih Ukuran Tulisan</option>
                                        <option value="">Default</option>
                                        <option value="20px">20px</option>
                                        <option value="25px">25px</option>
                                        <option value="30px">30px</option>
                                    </select>
                                    <label>Ukuran Tulisan</label>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-md btn-success btnNext">
                                            Next
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                                <?php foreach ($structure as $i => $data) :
                                    $item = "";
                                ?>
                                    <?php if($data['item'] == "soal") :?>
                                        <?php if($data['penulisan'] == "RTL") :?>
                                            <?php $soal = '<div dir="rtl" class="mb-3">'.$data['data']['soal'].'</div>' ?>
                                            <input type="hidden" name="cekStructure[]" data-id="<?= $i?>" id="cekStructure<?= $i?>" value="null">
                                            <?php $pilihan = "";?>
                                            <?php foreach ($data['data']['pilihan'] as $k => $choice) :?>
                                                <?php $pilihan .= '
                                                    <div class="mb-3">
                                                    <div class="form-check">
                                                        <div class="text-right" dir="rtl">
                                                            <label>
                                                                <input type="radio" class="soal_structure" data-id="'.$i.'" id="soal_structure'.$i.$k.'" name="soal_structure['.$i.']" value="'.$choice.'" checked> 
                                                                '.$choice.'
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>' ?>
                                            <?php endforeach;?>
                                            <?php $item = $soal.$pilihan;?>
                                        <?php else :?>
                                            <?php $soal = '<div class="mb-3">'.$data['data']['soal'].'</div>' ?>
                                            <input type="hidden" name="cekStructure[]" data-id="<?= $i?>" id="cekStructure<?= $i?>" value="null">
                                            <?php $pilihan = "";?>
                                            <?php foreach ($data['data']['pilihan'] as $choice) :?>
                                                <?php $pilihan .= '
                                                    <div class="mb-3">
                                                    <div class="form-check">
                                                        <label>
                                                            <input type="radio" class="soal_structure" data-id="'.$i.'" id="soal_structure'.$i.$k.'" name="soal_structure['.$i.']" value="'.$choice.'" checked> 
                                                            '.$choice.'
                                                        </label>
                                                    </div>
                                                </div>' ?>
                                            <?php endforeach;?>
                                            <?php $item = $soal.$pilihan;?>
                                        <?php endif;?>
                                    <?php elseif($data['item'] == "petunjuk") :
                                            if($data['penulisan'] == "RTL"){
                                                $item = '<div dir="rtl" class="mb-3">'.$data['data'].'</div>';
                                            } else {
                                                $item = '<div dir="ltr" class="mb-3">'.$data['data'].'</div>';
                                            }?>
                                    <?php elseif($data['item'] == "audio") :
                                        $item = '<center><audio controls controlsList="nodownload"><source src="https://admincbt.mrscholae.com/assets/myaudio/'.$data['data'].'" type="audio/mpeg"></audio></center>';
                                    ?>
                                    <?php endif;?>
                                    <div class="shadow card mb-3 soal">
                                        <div class="card-body" id="soalStructure<?= $i?>">

                                            <?= $item?>
                        
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-md btn-success btnNext">
                                            Next
                                            <svg width="20" height="20">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            
                            <div id="soalReading" style="display:none">
                                <div class="form-floating mb-3">
                                    <select name="fontSize" class="form-control required">
                                        <option value="">Pilih Ukuran Tulisan</option>
                                        <option value="">Default</option>
                                        <option value="20px">20px</option>
                                        <option value="25px">25px</option>
                                        <option value="30px">30px</option>
                                    </select>
                                    <label>Ukuran Tulisan</label>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-md btn-primary btnNext">
                                            <svg width="20" height="20" class="me-1">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-device-floppy" />
                                            </svg>
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                                <?php foreach ($reading as $i => $data) :
                                    $item = "";
                                ?>
                                    <?php if($data['item'] == "soal") :?>
                                        <?php if($data['penulisan'] == "RTL") :?>
                                            <?php $soal = '<div dir="rtl" class="mb-3">'.$data['data']['soal'].'</div>' ?>
                                            <input type="hidden" name="cekReading[]" data-id="<?= $i?>" id="cekReading<?= $i?>" value="null">
                                            <?php $pilihan = "";?>
                                            <?php foreach ($data['data']['pilihan'] as $k => $choice) :?>
                                                <?php $pilihan .= '
                                                    <div class="mb-3">
                                                    <div class="form-check">
                                                        <div class="text-right" dir="rtl">
                                                            <label>
                                                                <input type="radio" class="soal_reading" data-id="'.$i.'" id="soal_reading'.$i.$k.'" name="soal_reading['.$i.']" value="'.$choice.'" checked> 
                                                                '.$choice.'
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>' ?>
                                            <?php endforeach;?>
                                            <?php $item = $soal.$pilihan;?>
                                        <?php else :?>
                                            <?php $soal = '<div class="mb-3">'.$data['data']['soal'].'</div>' ?>
                                            <input type="hidden" name="cekReading[]" data-id="<?= $i?>" id="cekReading<?= $i?>" value="null">
                                            <?php $pilihan = "";?>
                                            <?php foreach ($data['data']['pilihan'] as $choice) :?>
                                                <?php $pilihan .= '
                                                    <div class="mb-3">
                                                    <div class="form-check">
                                                        <label>
                                                            <input type="radio" class="soal_reading" data-id="'.$i.'" id="soal_reading'.$i.$k.'" name="soal_reading['.$i.']" value="'.$choice.'" checked> 
                                                            '.$choice.'
                                                        </label>
                                                    </div>
                                                </div>' ?>
                                            <?php endforeach;?>
                                            <?php $item = $soal.$pilihan;?>
                                        <?php endif;?>
                                    <?php elseif($data['item'] == "petunjuk") :
                                            if($data['penulisan'] == "RTL"){
                                                $item = '<div dir="rtl" class="mb-3">'.$data['data'].'</div>';
                                            } else {
                                                $item = '<div dir="ltr" class="mb-3">'.$data['data'].'</div>';
                                            }?>
                                    <?php elseif($data['item'] == "audio") :
                                        $item = '<center><audio controls controlsList="nodownload"><source src="https://admincbt.mrscholae.com/assets/myaudio/'.$data['data'].'" type="audio/mpeg"></audio></center>';
                                    ?>
                                    <?php endif;?>
                                    <div class="shadow card mb-3 soal">
                                        <div class="card-body" id="soalReading<?= $i?>">

                                            <?= $item?>
                        
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-end">
                                        <button type="button" class="btn btn-md btn-primary btnNext">
                                            <svg width="20" height="20" class="me-1">
                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-device-floppy" />
                                            </svg>
                                            Simpan
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <?php $this->load->view("_partials/footer-bar")?>
        </div>
    </div>
<?php $this->load->view("_partials/footer")?>

<script>
    // $("#soalListening").hide();
    // $("#soalStructure").hide();
    // $("#soalReading").hide();

    $("select[name='fontSize']").change(function(){
        let size = $(this).val();
        $(".soal").css("font-size",size);
        $(this).val(size)
    })

    $('input:radio.soal_listening').click(function () {
        let value = $(this).val();
        let id = $(this).data("id");
        $("#cekListening"+id).val(value)
    });

    $('input:radio.soal_structure').click(function () {
        let value = $(this).val();
        let id = $(this).data("id");
        $("#cekStructure"+id).val(value)
    });

    $('input:radio.soal_reading').click(function () {
        let value = $(this).val();
        let id = $(this).data("id");
        $("#cekReading"+id).val(value)
    });

    var click = 0;

    $("#dataDiri .btnNext").click(function(){
        let form = "#dataDiri";

        let email = $(form+" input[name='email']").val();
        let nama = $(form+" input[name='nama']").val();
        let no_wa = $(form+" input[name='no_wa']").val();
        let t4_lahir = $(form+"  input[name='t4_lahir']").val();
        let tgl_lahir = $(form+"  input[name='tgl_lahir']").val();
        let alamat = $(form+"  textarea[name='alamat']").val();
        let id = "<?= $id?>"
        
        if(email == "" || nama == "" || no_wa == "" || t4_lahir == "" || tgl_lahir == "" || alamat == ""){
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Lengkapi data terlebih dahulu',
            })
        } else {
            $.ajax({
                url: "<?= base_url()?>soal/email_check",
                data: {email:email, id:id},
                dataType: "JSON",
                method: "POST",
                success: function(result){
                    if(result) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Maaf email Anda telah digunakan',
                        })
                    } else {
                        click++;
                        $("#soalListening").show();
                        $("#soalStructure").hide();
                        $("#soalReading").hide();
                        $("#dataDiri").hide()

                        if(click == 1){
                            sec = <?= $tes['waktu']?> * 60,
                            countDiv = document.getElementById("waktu"),
                            secpass,
                            countDown = setInterval(function () {
                                'use strict';
                                secpass();
                            }, 1000);
                        }
                        
                        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                            $([document.documentElement, document.body]).animate({
                                scrollTop: $("#elementtoScrollToID").offset().top
                            }, 1000);
                        }
                    }
                }
            })
        }
    })

    $("#soalListening .btnBack").click(function(){
        $("#soalListening").hide();
        $("#soalStructure").hide();
        $("#soalReading").hide();
        $("#dataDiri").show()
        
        if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            $([document.documentElement, document.body]).animate({
                scrollTop: $("#elementtoScrollToID").offset().top
            }, 1000);
        }
    })

    $("#soalListening .btnNext").click(function(){
        if($('input:radio.soal_listening:checked').length != <?= $jumlah_soal['listening']?>){
            
            $.each($("input[name='cekListening[]']"), function(){
                id = $(this).data("id");
                $("#soalListening"+id).removeClass("list-group-item-danger")

                if($(this).val() == "null"){
                    $("#soalListening"+id).addClass("list-group-item-danger")
                }
            })

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda belum menyelesaikan soal pada sesi ini',
            })
        } else {
            Swal.fire({
                icon: 'question',
                html: 'Yakin akan pindah ke sesi soal selanjutnya?<br><small style="font-size: 0.70em" class="form-text text-danger">Anda tidak akan bisa kembali ke sesi ini</small>',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then(function (result) {
                if (result.value) {
                    $("#soalListening").hide();
                    $("#soalStructure").show();
                    $("#soalReading").hide();
                    
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#elementtoScrollToID").offset().top
                        }, 1000);
                    }
                }
            })
        }
    })

    $("#soalStructure .btnNext").click(function(){
        if($('input:radio.soal_structure:checked').length != <?= $jumlah_soal['structure']?>){
            
            $.each($("input[name='cekStructure[]']"), function(){
                id = $(this).data("id");
                $("#soalStructure"+id).removeClass("list-group-item-danger")

                if($(this).val() == "null"){
                    $("#soalStructure"+id).addClass("list-group-item-danger")
                }
            })

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda belum menyelesaikan soal pada sesi ini',
            })
        } else {
            Swal.fire({
                icon: 'question',
                html: 'Yakin akan pindah ke sesi soal selanjutnya?<br><small style="font-size: 0.70em" class="form-text text-danger">Anda tidak akan bisa kembali ke sesi ini</small>',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then(function (result) {
                if (result.value) {
                    $("#soalListening").hide();
                    $("#soalStructure").hide();
                    $("#soalReading").show();
                    
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#elementtoScrollToID").offset().top
                        }, 1000);
                    }
                }
            })
        }
    })

    $("#soalReading .btnNext").click(function(){
        if($('input:radio.soal_reading:checked').length != <?= $jumlah_soal['reading']?>){
            
            $.each($("input[name='cekReading[]']"), function(){
                id = $(this).data("id");
                $("#soalReading"+id).removeClass("list-group-item-danger")

                if($(this).val() == "null"){
                    $("#soalReading"+id).addClass("list-group-item-danger")
                }
            })

            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Anda belum menyelesaikan soal pada sesi ini',
            })
        } else {
            Swal.fire({
                icon: 'question',
                html: 'Yakin telah menyelesaikan tes Anda?',
                showCloseButton: true,
                showCancelButton: true,
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then(function (result) {
                if (result.value) {
                    formSubmitting = true;
                    $("#formSoal").submit()
                }
            })
        }
    })

    $.fn.inputFilter = function(inputFilter) {
        return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
        if (inputFilter(this.value)) {
            this.oldValue = this.value;
            this.oldSelectionStart = this.selectionStart;
            this.oldSelectionEnd = this.selectionEnd;
        } else if (this.hasOwnProperty("oldValue")) {
            this.value = this.oldValue;
            this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
        } else {
            this.value = "";
        }
        });
    };

    $("#no_wa").inputFilter(function(value) {
        return /^\d*$/.test(value);    // Allow digits only, using a RegExp
    });

    function secpass() {
        'use strict';
        
        var min     = Math.floor(sec / 60),
            remSec  = sec % 60;
        
        if (remSec < 10) {
            
            remSec = '0' + remSec;
        
        }
        if (min < 10) {
            
            min = '0' + min;
        
        }
        countDiv.innerHTML = min + ":" + remSec;
        
        if (sec > 0) {
            sec = sec - 1;
        } else {
            clearInterval(countDown);
            // formSubmitting = true;
            // $("#formSoal").submit();
            // countDiv.innerHTML = 'countdown done';
        }
    }

    var formSubmitting = false;
    window.onload = function() {
        window.addEventListener("beforeunload", function (e) {
            if (formSubmitting) {
                return undefined;
            }

            var confirmationMessage = 'It looks like you have been editing something. '
                                    + 'If you leave before saving, your changes will be lost.';

            (e || window.event).returnValue = confirmationMessage; //Gecko + IE
            return confirmationMessage; //Gecko + Webkit, Safari, Chrome etc.
        });
    };
</script>