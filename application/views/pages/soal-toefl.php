<?php $this->load->view("_partials/header")?>
    <div class="page page-center" id="login">
        <div class="container-tight py-4">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mb-4">
                        <a href="javascript:void()"><img src="<?= $link['value']?>/assets/img/logo.png" height="80" alt=""></a>
                    </div>
                    <h2 class="card-title text-center mb-4"><?= $title?></h2>
                    <?php if( $this->session->flashdata('pesan') ) : ?>
                        <?= $this->session->flashdata('pesan')?>
                    <?php else: ?>
                        <div class="mb-2">
                            <label class="form-label">
                            Password
                            </label>
                            <div class="input-group input-group-flat">
                            <input type="password" name="password" class="form-control"  placeholder="Password"  autocomplete="off">
                            <span class="input-group-text">
                                <a href="javascript:void(0)" class="link-secondary" title="Show password" data-bs-toggle="tooltip">
                                <svg width="24" height="24" id="showPassword">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-eye" />
                                </svg>
                                <svg width="24" height="24" id="hidePassword" style="display:none">
                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-eye-off" />
                                </svg>
                                </a>
                            </span>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="button" class="btn btn-primary w-100 btnSignIn">Log In</button>
                        </div>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </div>
    <div id="soal_tes" style="display: none">
        <div class="wrapper" id="elementtoScrollToID">
            <div class="sticky-top">
                <?php $this->load->view("_partials/navbar-header")?>
            </div>
            <div class="page-wrapper" id="">
                <div class="page-body">
                    <div class="container-xl">
                        <div class="row row-cards FieldContainer" data-masonry='{"percentPosition": true }'>
                            <?php if($soal['tipe_soal'] == "TOAFL" || $soal['tipe_soal'] == "TOEFL") :?>
                                <form action="<?= base_url()?>soal/add_jawaban_toefl" method="post" id="formSoal">
                            <?php else :?>
                                <form action="<?= base_url()?>soal/add_jawaban" method="post" id="formSoal">
                            <?php endif;?>
                                <input type="hidden" name="id_tes" value="<?= $id?>">
                                <div id="sesi-0">
                                    <div class="card mb-3">
                                        <div class="card-header">
                                            <h3 class="card-title">Personal Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <?= $form?>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn btn-md btn-success btnNext" data-id="sesi-1">
                                                Next
                                                <svg width="20" height="20">
                                                    <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <!-- tambahan -->
                                <div id="worksheet">
                                    <?php 
                                        $index = 1;
                                        $jumlah_sesi = COUNT($sesi);
                                        foreach ($sesi as $sesi) :?>
                                        <div id="sesi-<?=$index?>" style="display: none">

                                            <div class="form-floating mb-3">
                                                <select name="fontSize" class="form-control required">
                                                    <option value="">Adjust the font size</option>
                                                    <option value="">Default</option>
                                                    <option value="20px">20px</option>
                                                    <option value="25px">25px</option>
                                                    <option value="30px">30px</option>
                                                </select>
                                                <label>Font Size</label>
                                            </div>
                                            <div class="mb-3">
                                                <!-- jika index = 1, tampilkan tombol back else hanya tampilkan tombol next  -->
                                                <?php if($index == $jumlah_sesi && $jumlah_sesi != 1) :?>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-md btn-primary btnSimpan" data-id="sesi-<?= $index + 1?>">
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-device-floppy" />
                                                            </svg>
                                                            Save
                                                        </button>
                                                    </div>
                                                <?php elseif($index == $jumlah_sesi && $jumlah_sesi == 1) :?>
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button" class="btn btn-md btn-success btnBack" data-id="sesi-<?= $index - 1?>">
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-left" />
                                                            </svg> 
                                                            Back</button>
                                                        <button type="button" class="btn btn-md btn-primary btnSimpan" data-id="sesi-<?= $index + 1?>">
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-device-floppy" />
                                                            </svg>
                                                            Save
                                                        </button>
                                                    </div>
                                                <?php elseif($index == 1) :?>
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button" class="btn btn-md btn-success btnBack" data-id="sesi-<?= $index - 1?>">
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-left" />
                                                            </svg> 
                                                            Back</button>
                                                        <button type="button" class="btn btn-md btn-success btnNext" data-id="sesi-<?= $index + 1?>">
                                                            Next
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                <?php else :?>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-md btn-success btnNext" data-id="sesi-<?= $index + 1?>">
                                                            Next
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                <?php endif;?>
                                            </div>
                                            <input type="hidden" name="sesi-<?=$index + 1?>" value="<?= $sesi['jumlah_soal']?>">
                                            <input type="hidden" name="kunci_sesi[]" value="<?= $sesi['id_sub']?>">
                                            <?php foreach ($sesi['soal'] as $i => $data) :
                                                $item = "";
                                                ?>
                                                <?php if($data['item'] == "soal") :?>
                                                    <?php if($data['penulisan'] == "RTL") :?>
                                                        <?php $soal = '<div dir="rtl" class="mb-3">'.$data['data']['soal'].'</div>' ?>
                                                        <input type="hidden" name="jawaban_sesi_<?= $index?>[]" data-id="soal-<?= $i?>" id="jawaban_sesi_<?= $index?><?= $i?>" value="null">
                                                        <?php $pilihan = "";?>
                                                        <?php foreach ($data['data']['pilihan'] as $k => $choice) :?>
                                                            <?php $pilihan .= '
                                                                <div class="mb-3">
                                                                    <div class="form-check">
                                                                        <div class="text-right" dir="rtl">
                                                                            <label>
                                                                                <input type="radio" data-jawaban="jawaban_sesi_'.$index.''.$i.'" data-id="'.$index.'|'.$i.'"  name="radio-'.$index.'['.$i.']" value="'.$choice.'"> 
                                                                                '.$choice.'
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>' ?>
                                                        <?php endforeach;?>
                                                        <?php $item = $soal.$pilihan;?>
                                                    <?php else :?>
                                                        <?php $soal = '<div class="mb-3">'.$data['data']['soal'].'</div>' ?>
                                                        <input type="hidden" name="jawaban_sesi_<?= $index?>[]" data-id="soal-<?= $i?>" id="jawaban_sesi_<?= $index?><?= $i?>" value="null">
                                                        <?php $pilihan = "";?>
                                                        <?php foreach ($data['data']['pilihan'] as $k => $choice) :?>
                                                            <?php $pilihan .= '
                                                                <div class="mb-3">
                                                                    <label>
                                                                        <input type="radio" data-jawaban="jawaban_sesi_'.$index.''.$i.'" data-id="'.$index.'|'.$i.'"  name="radio-'.$index.'['.$i.']" value="'.$choice.'"> 
                                                                        '.$choice.'
                                                                    </label>
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
                                                    $item = '<center>
                                                                <audio id="audio-'.$data['id_item'].'" class="audio" data-id="'.$data['id_item'].'"><source src="'.$link['value'].'/assets/myaudio/'.$data['data'].'?t='.time().'" type="audio/mpeg"></audio>
                                                                <progress id="seekbar-'.$data['id_item'].'" value="0" max="1" style="width:100%;"></progress><br>
                                                                <button class="btn btn-success btnAudio" data-id="'.$data['id_item'].'" type="button">'.tablerIcon("player-play", "").' play</button>
                                                                <p><small class="text-danger"><i>Note : the audio can only be played once</i></small></p>
                                                            </center>
                                                            ';
                                                ?>
                                                <?php endif;?>
                                                
                                                <?php if($data['tampil'] == "Ya") :?>
                                                    <div class="shadow card mb-3 soal">
                                                        <div class="card-body" id="soal-<?= $i?>">
                                                            <?php if($data['id_text'] != 0) :?>
                                                                <?php $text = textReading($data['id_text']) ;?>
                                                                <div class="row">
                                                                    <div class="col-sm-12 col-lg-8">
                                                                        <?= $text['data'];?>
                                                                    </div>
                                                                    <div class="col-sm-12 col-lg-4">
                                                                        <?= $item?>
                                                                    </div>
                                                                </div>
                                                            <?php else :?>
                                                                <?= $item;?>
                                                            <?php endif;?>
                                                        </div>
                                                    </div>
                                                <?php endif;?>
                                            <?php endforeach;?>

                                            <div class="mb-3">
                                                <!-- jika index = 1, tampilkan tombol back else hanya tampilkan tombol next  -->
                                                <?php if($index == $jumlah_sesi && $jumlah_sesi != 1) :?>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-md btn-primary btnSimpan" data-id="sesi-<?= $index + 1?>">
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-device-floppy" />
                                                            </svg>
                                                            Save
                                                        </button>
                                                    </div>
                                                <?php elseif($index == $jumlah_sesi && $jumlah_sesi == 1) :?>
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button" class="btn btn-md btn-success btnBack" data-id="sesi-<?= $index - 1?>">
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-left" />
                                                            </svg> 
                                                            Back</button>
                                                        <button type="button" class="btn btn-md btn-primary btnSimpan" data-id="sesi-<?= $index + 1?>">
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-device-floppy" />
                                                            </svg>
                                                            Save
                                                        </button>
                                                    </div>
                                                <?php elseif($index == 1) :?>
                                                    <div class="d-flex justify-content-between">
                                                        <button type="button" class="btn btn-md btn-success btnBack" data-id="sesi-<?= $index - 1?>">
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-left" />
                                                            </svg> 
                                                            Back</button>
                                                        <button type="button" class="btn btn-md btn-success btnNext" data-id="sesi-<?= $index + 1?>">
                                                            Next
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                <?php else :?>
                                                    <div class="d-flex justify-content-end">
                                                        <button type="button" class="btn btn-md btn-success btnNext" data-id="sesi-<?= $index + 1?>">
                                                            Next
                                                            <svg width="20" height="20">
                                                                <use xlink:href="<?= base_url()?>assets/tabler-icons-1.39.1/tabler-sprite.svg#tabler-arrow-narrow-right" />
                                                            </svg>
                                                        </button>
                                                    </div>
                                                <?php endif;?>
                                            </div>

                                        </div>
                                    <?php 
                                        $index++;
                                        endforeach;?>
                                </div>

                            </form>

                            <!-- tambahan  -->
                            <div class="modal modal-blur bg-danger" id="alertModal" tabindex="-1" role="dialog" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Alert</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Leaving the worksheet is not allowed. You'll lose your progress and your test result will be unvalid</p>
                                            <p>You will lose your progress in <span id="count">10</span> seconds</p>
                                        </div>
                                        <div class="modal-footer">
                                        <div class="d-flex justify-content-end">
                                            <button type="button" class="btn me-auto mr-3 btn-primary" data-bs-dismiss="modal">Stay on the Worksheet</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <?php $this->load->view("_partials/footer-bar")?>
            </div>
        </div>
    </div>

    <?php  
        if(isset($js)) :
            foreach ($js as $i => $js) :?>
                <script src="<?= base_url()?>assets/myjs/<?= $js?>"></script>
                <?php 
            endforeach;
        endif;    
    ?>

<?php $this->load->view("_partials/footer")?>

<script>
    // tambahan 
    let start = false;

    // localStorage
    var audioArray = [];

    $(document).ready(function() {
        
        // localStorage digunakan untuk menghitung lama peserta meninggalkan page
        let now = new Date();
        let hours = now.getHours() * 60 * 60;
        let minutes = now.getMinutes() * 60;
        let seconds = now.getSeconds();
        let totalTime = parseInt(hours + minutes + seconds);

        if(totalTime - localStorage.getItem('currentTime') >=  <?= $time_reload['value']?>){
            localStorage.clear();
        }
        // localStorage digunakan untuk menghitung lama peserta meninggalkan page


        // localStorage menghitung waktu sekarang
        if (!localStorage.getItem('currentTime')) {
            updateTimeInLocalStorage();
        }
        
        setInterval(updateTimeInLocalStorage, 1000);
        // localStorage menghitung waktu sekarang

        // localStorage jumlah reload dan proses yang terjadi ketika reload
        let reloadCount = localStorage.getItem('reload');
    
        if (reloadCount === null) {
            // Jika tidak ada nilai localStorage reload, atur ke 3
            localStorage.setItem('reload', <?= $reload_page['value']?>);
        } else {
            if(localStorage.getItem('sesi')){
                // Jika ada nilai localStorage reload, kurangi 1
                reloadCount = parseInt(reloadCount);
                localStorage.setItem('reload', reloadCount - 1);
            }

            // Hapus localStorage jika reload = 0
            if (localStorage.getItem('reload') < 0) {
                localStorage.clear();
                localStorage.setItem('reload', <?= $reload_page['value']?>);
            }
        }
        // localStorage jumlah reload dan proses yang terjadi ketika reload
        
        // localStorage jika data sudah berhasil diinput maka lakukan clear storage
        <?php if( $this->session->flashdata('pesan') ) : ?>
            localStorage.clear();
        <?php endif;?>
        // localStorage jika data sudah berhasil diinput maka lakukan clear storage

        // localStorage untuk menyimpan semua hasil input
        $('form input, form select, form textarea').on('input change', function() {
            // Simpan nilai elemen ke localStorage
            localStorage.setItem($(this).attr('name'), $(this).val());
        });
        // localStorage untuk menyimpan semua hasil input

        // localStorage untuk mengambil semua hasil input
        $('form input:not([type="radio"]), form select, form textarea').each(function() {
            // Ambil nilai dari localStorage berdasarkan id elemen
            const storedValue = localStorage.getItem($(this).attr('name'));
            if (storedValue !== null) {
                // Setel nilai elemen dari localStorage jika ada
                $(this).val(storedValue);
            }
        });
        // localStorage untuk mengambil semua hasil input

        // localStorage untuk mengambil semua hasil input jawaban
        for (let i = 0; i < localStorage.length; i++) {
            const key = localStorage.key(i);
            
            // Periksa apakah kunci mengandung kata 'jawaban_sesi_'
            if (key.includes('jawaban_sesi_')) {
                const value = localStorage.getItem(key);
                
                // Temukan elemen form yang sesuai dengan kunci (name attribute)
                // Misalnya, jika key adalah 'jawaban_sesi_1', maka cari elemen dengan name='jawaban_sesi_1[]'
                // atau sesuaikan dengan struktur name attribute Anda
                const $element = $(`[id="${key}"]`);
                
                // Periksa apakah elemen ditemukan
                if ($element.length > 0) {
                    // Setel nilai elemen form dari localStorage
                    $element.val(value);

                    var radios = $(`[data-jawaban="${key}"]`) // list of radio buttons
                    for(var r=0;r<radios.length;r++){
                        if(radios[r].value == value){
                            radios[r].checked = true; // marking the required radio as checked
                        }
                    }

                }
            }
        }
        // localStorage untuk mengambil semua hasil input jawaban

        // localStorage mengatur semua yang terjadi jika terset localStorage item
        if(localStorage.getItem('sesi')){
            let id = localStorage.getItem('sesi');
            start = true;

            $("#login").hide();
            $("#soal_tes").show();
            
            // hide all id 
            $("div[id^='sesi-']").hide();
            // show sesi 
            $("#"+id).show();

            // audio 
            if(localStorage.getItem('audioArray') && localStorage.getItem('audioTime')){

                // Retrieve the array from localStorage
                const storedAudioArray = localStorage.getItem('audioArray');
    
                // Parse the JSON string back into a JavaScript array
                const storedAudio = JSON.parse(storedAudioArray) || []; // Initialize as empty array if no data found
    
                audioArray = storedAudio;
    
                // Get the last item from the array
                const lastItem = storedAudio[storedAudio.length - 1];
    
                storedAudio.forEach(audio => {
                    if(audio != lastItem){
                        $(`button[data-id="${audio}"]`).hide();
                    }
                });
    
                const audioElement = $('#audio-'+lastItem)[0]; // Select audio element by ID
    
                const audioTime = localStorage.getItem('audioTime');
                audioElement.currentTime = audioTime;
            }


            if(id != 'sesi-1'){
                sec = localStorage.getItem('time');
                countDiv = document.getElementById("waktu"),
                secpass,
                countDown = setInterval(function () {
                    'use strict';
                    secpass(id);
                }, 1000);
            }
        }
        // localStorage mengatur semua yang terjadi jika terset localStorage item

        $('.audio').on('timeupdate', function() {
            let id = $(this).data("id");
            $('#seekbar-'+id).attr("value", this.currentTime / this.duration);

            localStorage.setItem('audioTime', this.currentTime);
        });

        $("#hidePassword").hide();
        
        $("#showPassword").click(function(){
            $("input[name='password']").prop('type', 'text');
            $("#showPassword").hide();
            $("#hidePassword").show()
        })
        
        $("#hidePassword").click(function(){
            $("input[name='password']").prop('type', 'password');
            $("#showPassword").show();
            $("#hidePassword").hide()
        })

        $("select[name='fontSize']").change(function(){
            let size = $(this).val();
            $(".soal").css("font-size",size);
            $(this).val(size)
        })

        $(".btnSignIn").click(function(){
            let id_tes = $("input[name='id_tes']").val();
            let password = $("input[name='password']").val();

            $.ajax({
                url: "<?= base_url()?>soal/password_check",
                method: "POST",
                data: {id:id_tes, password:password},
                success: function(result){
                    if(result){
                        Swal.fire({
                            icon: 'success',
                            title: '',
                            text: 'Success!',
                            showConfirmButton: false,
                            timer: 1500
                        })
                        $("#login").hide();
                        $("#soal_tes").show();
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'Invalid password. Try again.'
                        })
                    }
                }
            })
        })

        $(".btnAudio").click(function(){
            id = $(this).data("id");
            $("#audio-"+id)[0].play();
            $(this).hide();

            // localStorage mengatur audio
            audioArray.push(id)
            const arrayString = JSON.stringify(audioArray);
            localStorage.setItem('audioArray', arrayString);
            // localStorage mengatur audio
        })

        var click = false;
        $(".btnNext").click(function(){
            let id = $(this).data("id");

            if(id == "sesi-1"){

                let form = "#sesi-0";

                let email = $(form+" [name='email']").val();
                let id_tes = "<?= $id?>"

                
                let eror = required(form);
                
                if(eror == 1){
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Please complete all of the fields and input valid e-mail address. ',
                    })
                } else {
                    let table = "<?= $table?>";
                    
                    $.ajax({
                        url: "<?= base_url()?>soal/email_check/"+table,
                        data: {email:email, id:id_tes},
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
                                if(click == false) {
                                    Swal.fire({
                                        icon: 'question',
                                        html: 'Start the session now?',
                                        showCloseButton: true,
                                        showCancelButton: true,
                                        confirmButtonText: 'Yes',
                                        cancelButtonText: 'No'
                                    }).then(function (result) {
                                        if (result.value) {
                                            // hide all id 
                                            $("div[id^='sesi-']").hide();
                                            // show sesi 
                                            $("#"+id).show();
                                            
                                            // tambahan 
                                            start = true;
                                            
                                            // localStorage menympan data sesi
                                            localStorage.setItem('sesi', id);
                                            // localStorage menympan data sesi

                                            // scroll to top 
                                            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                                                $([document.documentElement, document.body]).animate({
                                                    scrollTop: $("#elementtoScrollToID").offset().top
                                                }, 1000);
                                            }

                                        } else {
                                            return;
                                        }
                                    })
                                } else {
                                    // hide all id 
                                    $("div[id^='sesi-']").hide();
                                    // show sesi 
                                    $("#"+id).show();
                                    
                                    // scroll to top 
                                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                                        $([document.documentElement, document.body]).animate({
                                            scrollTop: $("#elementtoScrollToID").offset().top
                                        }, 1000);
                                    }
                                }
                            }
                        }
                    })
                }
                
            } else {

                jumlah_soal = $("[name='"+id+"']").val();

                sesi = id.replace("sesi-", "");
                sesi = parseInt(sesi-1);

                if($('#sesi-'+sesi+' input:radio:checked').length != jumlah_soal){
                
                    $.each($("#sesi-"+sesi+" [name='jawaban_sesi_"+sesi+"[]']"), function(){
                        index = $(this).data("id");
                        $("#sesi-"+sesi+" #"+index).removeClass("list-group-item-danger")

                        if($(this).val() == "null"){
                            $("#sesi-"+sesi+" #"+index).addClass("list-group-item-danger")
                        }
                    })

                    if(id == 'sesi-2'){
                        Swal.fire({
                            icon: 'question',
                            html: `You haven't submitted your answer. Are you sure you want to move to the next session?<br><small style="font-size: 0.70em" class="form-text text-danger">You will not be able to return to this session</small>`,
                            showCloseButton: true,
                            showCancelButton: true,
                            confirmButtonText: 'Yes',
                            cancelButtonText: 'No'
                        }).then(function (result) {
                            if (result.value) {
                                if(typeof countDown != 'undefined'){
                                    clearInterval(countDown);
                                }

                                if(id == 'sesi-2'){
                                    
                                    var audios = document.getElementsByTagName('audio');  
                                    for(var i = 0, len = audios.length; i < len;i++){  
                                        if(audios[i]){  
                                            audios[i].pause();  
                                        }  
                                    }

                                    // sec = 25 * 1;
                                    sec = 25 * 60;

                                    // localStorage menympan data sesi
                                    localStorage.setItem('sesi', id);
                                    // localStorage menympan data sesi
                                } else if(id == 'sesi-3'){
                                    // sec = 55 * 1;
                                    sec = 55 * 60;

                                    // localStorage menympan data sesi
                                    localStorage.setItem('sesi', id);
                                    // localStorage menympan data sesi
                                }

                                countDiv = document.getElementById("waktu"),
                                secpass,
                                countDown = setInterval(function () {
                                    'use strict';
                                    secpass(id);
                                }, 1000);

                                // hide all id 
                                $("div[id^='sesi-']").hide();
                                // show sesi 
                                $("#"+id).show();
                                
                                // scroll to top 
                                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                                    $([document.documentElement, document.body]).animate({
                                        scrollTop: $("#elementtoScrollToID").offset().top
                                    }, 1000);
                                }
                            }
                        })
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Oops...',
                            text: 'You haven’t submitted your answer in this session',
                        })
                    }
                } else {
                    Swal.fire({
                        icon: 'question',
                        html: 'Move to the next session?<br><small style="font-size: 0.70em" class="form-text text-danger">You will not be able to return to this session</small>',
                        showCloseButton: true,
                        showCancelButton: true,
                        confirmButtonText: 'Ya',
                        cancelButtonText: 'Tidak'
                    }).then(function (result) {
                        if (result.value) {
                            if(typeof countDown != 'undefined'){
                                clearInterval(countDown);
                            }

                            if(id == 'sesi-2'){
                                
                                var audios = document.getElementsByTagName('audio');  
                                for(var i = 0, len = audios.length; i < len;i++){  
                                    if(audios[i]){  
                                        audios[i].pause();  
                                    }  
                                }

                                // sec = 25 * 1;
                                sec = 25 * 60;
                            } else if(id == 'sesi-3'){
                                // sec = 55 * 1;
                                sec = 55 * 60;
                            }

                            // localStorage menympan data sesi
                            localStorage.setItem('sesi', id);
                            // localStorage menympan data sesi

                            countDiv = document.getElementById("waktu"),
                            secpass,
                            countDown = setInterval(function () {
                                'use strict';
                                secpass(id);
                            }, 1000);

                            // hide all id 
                            $("div[id^='sesi-']").hide();
                            // show sesi 
                            $("#"+id).show();
                            
                            // scroll to top 
                            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                                $([document.documentElement, document.body]).animate({
                                    scrollTop: $("#elementtoScrollToID").offset().top
                                }, 1000);
                            }
                        }
                    })
                }
            }
        })
        
        $(".btnBack").click(function(){
            let id = $(this).data("id");
            $("div[id^='sesi-']").hide();
            $("#"+id).show();
        })

        $(".btnSimpan").click(function(){
            let id = $(this).data("id");
            jumlah_soal = $("[name='"+id+"']").val();

            sesi = id.replace("sesi-", "");
            sesi = parseInt(sesi-1);

            if($('#sesi-'+sesi+' input:radio:checked').length != jumlah_soal){
            
                $.each($("#sesi-"+sesi+" [name='jawaban_sesi_"+sesi+"[]']"), function(){
                    index = $(this).data("id");
                    $("#sesi-"+sesi+" #"+index).removeClass("list-group-item-danger")

                    if($(this).val() == "null"){
                        $("#sesi-"+sesi+" #"+index).addClass("list-group-item-danger")
                    }
                })

                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'You haven’t submitted your answer in this session',
                })
            } else {
                Swal.fire({
                    icon: 'question',
                    html: 'Finish the test?',
                    showCloseButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'No'
                }).then(function (result) {
                    if (result.value) {
                        swal.fire({
                            html: '<h4>Saving your answer ...</h4>',
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            onBeforeOpen: () => {
                                Swal.showLoading()
                            },
                        });

                        $(".btnSimpan").html("Saving...");
                        $(".btnSimpan").prop("disabled", true);
                        $(".btnBack").prop("disabled", true);
                        $("#formSoal").submit()
                    }
                })
            }
        })

        $('input:radio').click(function () {
            let id = $(this).data("id");
            id = id.split("|");
            let value = $(this).val();
            $("#jawaban_sesi_"+id[0]+""+id[1]).val(value);

            localStorage.setItem("jawaban_sesi_"+id[0]+""+id[1], value);
        });
    });

    $(document).mouseleave(function () {
        showAlertWithCountdown(10)
    });

    $(document).mouseenter(function () {
        returnWorkSheet()
    });

    function secpass(id) {
        'use strict';
        var min = Math.floor(sec / 60),
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

            // localStorage store data waktu
            localStorage.setItem('time', sec);
            // localStorage store data waktu
        } else {
            if(id == 'sesi-2'){
                clearInterval(countDown);
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: 'Waktu Anda telah habis untuk mengerjakan soal structure',
                    allowOutsideClick: false,
                }).then(function (result) {
                    
                    // scroll to top 
                    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                        $([document.documentElement, document.body]).animate({
                            scrollTop: $("#elementtoScrollToID").offset().top
                        }, 1000);
                    }

                    // hide all id 
                    $("div[id^='sesi-']").hide();
                    // show sesi 
                    $("#sesi-3").show();
                    localStorage.setItem('sesi', 'sesi-3');

                    // sec = 55 * 1;
                    sec = 55 * 60
                    countDown = setInterval(function () {
                        'use strict';
                        secpass('sesi-3');
                    }, 1000);
                })
            } else {
                clearInterval(countDown);

                // scroll to top 
                if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $("#elementtoScrollToID").offset().top
                    }, 1000);
                }

                swal.fire({
                    title: 'Waktu Anda Telah Habis',
                    html: '<h4>Saving your answer ...</h4>',
                    allowOutsideClick: false,
                    showConfirmButton: false,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                    },
                });

                $(".btnSimpan").html("Saving...");
                $(".btnSimpan").prop("disabled", true);
                $(".btnBack").prop("disabled", true);
                $("#formSoal").submit()
            }
        }
    }

    document.addEventListener('play', function(e){  
        var audios = document.getElementsByTagName('audio');  
        for(var i = 0, len = audios.length; i < len;i++){  
            if(audios[i] != e.target){  
                audios[i].pause();  
            }  
        }  
    }, true);

    // tambahan 
    let countdownInterval;

    function showAlertWithCountdown(seconds) {
        if(start){
            clearInterval(countdownInterval);
            $("#count").html(`<b>10</b>`);
            $("#alertModal").modal('show');
            countdownInterval = setInterval(() => {
                $("#count").html(`<b>${seconds}</b>`);
                seconds--;
    
                if(seconds === 0){
                    clearInterval(countdownInterval);
                    location.reload();
                }
            }, 1000);
        }
    }

    function returnWorkSheet() {
        if(start){
            // $("#alertModal").modal('hide');
            clearInterval(countdownInterval);
        }
    }

    // localStorage function untuk menentukan current time
    function getCurrentTime() {
        let now = new Date();
        let hours = now.getHours() * 60 * 60;
        let minutes = now.getMinutes() * 60;
        let seconds = now.getSeconds();
        return parseInt(hours + minutes + seconds);
    }

    function updateTimeInLocalStorage() {
        let currentTime = getCurrentTime();
        localStorage.setItem('currentTime', currentTime);
    }
    // localStorage function untuk menentukan current time
</script>