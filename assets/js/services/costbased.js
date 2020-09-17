const par_cb_judul_riset = $('#par_cb_judul_riset');

/**
 * luaran penelitian non paten
 * add _ (underscore for view variables)
 */

 // input view
 const _par_cb_pub_internasional = $('.par_cb_pub_internasional');
 const _par_cb_pub_nasional = $('.par_cb_pub_nasional');
 const _par_cb_buku_internasional = $('.par_cb_buku_internasional');
 const _par_cb_buku_nasional = $('.par_cb_buku_nasional');
 const _par_cb_pros_internasional = $('.par_cb_pros_internasional');
 const _par_cb_pros_nasional = $('.par_cb_pros_nasional');

 // table view


$(function () {
    get_daftar_penelitian();
    get_total_publication();
});

function get_total_publication(){
    const pub_int = 40;
    const pub_ns = 25;
    
    const buk_int = 40;
    const buk_ns = 30;

    const pub_pros_int = 25;
    const pub_pros_ns = 10;


    // publikasi internasional
    let get_scopus = JSON.parse(sessionStorage.getItem('get_scopus'));
    console.log(get_scopus.length);
    _par_cb_pub_internasional.val(get_scopus.length);

    // publikasi nasional
    
}

function set_total_publication_table(){
    
}

function get_daftar_penelitian(){
    let arr_temp_research = [];
    let get_scopus = JSON.parse(sessionStorage.getItem('get_scopus'));
    for(let i=0; i < get_scopus.length; i++){
        let obj_temp = {
            'label' : 'Scopus - ' + get_scopus[i].title,
            'value' : '' + get_scopus[i].title
        }
    
        arr_temp_research.push(obj_temp);
    }

    let get_google = JSON.parse(sessionStorage.getItem('get_google'));
    for(let i=0; i < get_google.length; i++){
        let obj_temp = {
            'label' : 'Google Scholar - ' + get_google[i].title,
            'value' : '' + get_google[i].title
        }
    
        arr_temp_research.push(obj_temp);
    }

    console.log(arr_temp_research);
    par_cb_judul_riset.autocomplete({
        source : arr_temp_research
    });
    console.log('autocomplete jalan')
}

/**
 * @function add_luaran_paten
 * onclick ketika tambah luaran baru
 */
function add_luaran_paten(){
    let check_sess_storage = sessionStorage.hasOwnProperty('index_luaran_paten');
    if(check_sess_storage){
        // jika index sudah tersimpan maka tinggal get
        let current_index = parseInt(sessionStorage.getItem('index_luaran_paten')) + 1;
        let adapter = ` <br/>
                         <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="captions">Judul Invensi <i style="color: red">*</i></label>
                                    <input type="text" class="form-control form-control-sm" id="par_cb_jd_invensi_`+current_index+`" placeholder="">
                                </div>
                                

                                <div class="form-row form-group">
                                    <div class="col">
                                            <div class="form-group">
                                                <label class="captions">Jenis Paten <i style="color: red">*</i> </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jpt" id="par_cb_paten_granted_`+current_index+`" value="option1">
                                                <label class="form-check-label" for="inlineRadio1">Paten Granted </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="jpt" id="par_cb_paten_sd_`+current_index+`" value="option2">
                                                <label class="form-check-label" for="inlineRadio2">Paten Sederhana </label>
                                            </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="captions">Status Peromohonan <i style="color: red">*</i></label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="stp" id="par_cb_paten_terdaftar_`+current_index+`" value="option1">
                                            <label class="form-check-label" for="inlineRadio1">Terdaftar</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="stp" id="par_cb_paten_tersertifikasi_`+current_index+`" value="option2">
                                            <label class="form-check-label" for="inlineRadio2">Tersertifikasi</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <p>Keterangan</p>
                                        <ul>
                                            <li>Bobot Paten granted (tersertifikasi) = 48</li>
                                            <li>Bobot Paten terdaftar = 14</li>
                                            <li>Bobot Paten sederhana granted (tersertifikasi)= 33</li>
                                            <li>Bobot Paten sederhana terdaftar = 9</li>
                                        </ul>
                                    </div>
                                </div>
                                <br/>
                                <div class="form-group">
                                    <label class="captions">Nomor pendaftaran (Pemohon) <i style="color: red">*</i></label>
                                    <input type="text" class="form-control form-control-sm" id="par_cb_nodaftar_`+current_index+`" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="captions">Nomor Sertifikat Paten/Paten Sederhana (jika sudah granted) <i style="color: red">*</i></label>
                                    <input type="text" class="form-control form-control-sm" id="par_cb_sertifikat_paten_`+current_index+`" placeholder="">
                                </div>
                                <div class="form-group">
                                    <label class="captions">Asal Biaya Pendaftaran (Permohonan) Paten<i style="color: red">*</i></label>
                                    <select class="custom-select custom-select-sm" id="par_cb_asalbiayadaftar_1"> 
                                            <option value="">-- Silahkan pilih</option>
                                            <option value="1">Raih KI</option>
                                            <option value="2">Institusi Penghasil/Pemilik Invensi</option>
                                            <option value="3">Lainnya</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="captions" for="formGroupExampleInput2">Unggah dokumen pendukung berupa Formulir (Bukti) pendaftaran dan/atau
                                        Sertifikat Paten/Paten Sederhana <i style="color: red">*</i></label>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" multiple style="height:45px;" id="par_cb_asalbiayadaftar_`+current_index+`">
                                            <small id="emailHelp" class="form-text text-muted">Unggah file dlm format PDF, MS Word, PPT</small>
                                        </div>
                                </div>
                            </div>
                        </div>`;
        $('.container_luaran_paten').append(adapter);
        sessionStorage.setItem('index_luaran_paten', current_index)
    }else{
        sessionStorage.setItem('index_luaran_paten', 1);
    }

}