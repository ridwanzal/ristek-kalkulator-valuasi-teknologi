
/**
 * coding style convention
 * luaran penelitian non paten
 * add _ (underscore for view variables)
 */

// input view
const _par_cb_nama_inventor = $('#par_cb_nama_inventor');
const _par_cb_nama_institusi = $('#par_cb_nama_institusi');
const _par_cb_unit_kerja = $('#par_cb_unit_kerja');
const _par_cb_judul_riset = $('#par_cb_judul_riset');
const _par_pagu_riset = $('#par_pagu_riset');
const _par_cb_asal_biaya = $('#par_cb_asal_biaya');
const _par_cb_pub_internasional = $('#par_cb_pub_internasional');
const _par_cb_pub_nasional = $('#par_cb_pub_nasional');
const _par_cb_buku_internasional = $('#par_cb_buku_internasional');
const _par_cb_buku_nasional = $('#par_cb_buku_nasional');
const _par_cb_pros_internasional = $('#par_cb_pros_internasional');
const _par_cb_pros_nasional = $('#par_cb_pros_nasional');


// table view
const _pub_np_int = $('#pub_np_int');
const _pub_np_int_total = $('#pub_np_int_total')
const _pub_np_ns = $('#pub_np_ns');
const _pub_np_ns_total = $('#pub_np_ns_total')
const _buk_np_int = $('#buk_np_int');
const _buk_np_int_total = $('#buk_np_int_total')
const _buk_np_ns = $('#buk_np_ns');
const _buk_np_ns_total = $('#buk_np_ns_total')
const _pub_prod_np_int = $('#pub_prod_np_int');
const _pub_prod_np_int_total = $('#pub_prod_np_int_total');
const _pub_prod_np_ns = $('#pub_prod_np_ns');
const _pub_prod_np_ns_total = $('#pub_prod_np_ns_total');
const _np_total_bobot = $('#np_total_bobot');

 // non paten button process
 const _proc_np_data = $('#proc_np_data');

 // konstanta bobot
 const pub_int = 40;
 const pub_ns = 25;
 
 const buk_int = 40;
 const buk_ns = 30;
 
 const pub_pros_int = 25;
 const pub_pros_ns = 10;

 // form data to serialization
 let obj_model_cb = {
    obj_identitas_pi : '', // identitas penelitian dan invensi
    obj_non_paten : '', // object terkait luaran non paten
    obj_paten : '',
 };


 $(function () {
    get_daftar_penelitian();
    luaran_nonpaten();
    luaran_paten();
});

function luaran_paten(){
    let luaranpaten = $('.luaran_paten_wrapper').length;
    console.log(luaranpaten);
}

function luaran_nonpaten(){

    // publikasi internasional
    let get_scopus = JSON.parse(sessionStorage.getItem('get_scopus'));
    if(get_scopus.length > 0){
        let total_bobot = get_scopus.length * pub_int;
        _par_cb_pub_internasional.val(get_scopus.length);
        _pub_np_int.text(get_scopus.length);
        _pub_np_int_total.text(total_bobot);
    }

    // on change input
    _par_cb_pub_internasional.on('change', function(){
        let total_bobot = _par_cb_pub_internasional.val() * pub_int;
        _pub_np_int.text(_par_cb_pub_internasional.val());
        _pub_np_int_total.text(total_bobot);
    });


    _par_cb_pub_nasional.on('change', function(){
        let total_bobot = _par_cb_pub_nasional.val() * pub_ns;
        _pub_np_ns.text(_par_cb_pub_nasional.val());
        _pub_np_ns_total.text(total_bobot);
    });

    _par_cb_buku_internasional.on('change', function(){
        let total_bobot = _par_cb_buku_internasional.val() * buk_int;
        _buk_np_int.text(_par_cb_buku_internasional.val());
        _buk_np_int_total.text(total_bobot);
    });

    _par_cb_buku_nasional.on('change', function(){
        let total_bobot = _par_cb_buku_nasional.val() * buk_ns;
        _buk_np_ns.text(_par_cb_buku_nasional.val());
        _buk_np_ns_total.text(total_bobot);
    });


    _par_cb_pros_internasional.on('change', function(){
        let total_bobot = _par_cb_pros_internasional.val() * pub_pros_int;
        _pub_prod_np_int.text(_par_cb_pros_internasional.val());
        _pub_prod_np_int_total.text(total_bobot);
    });

    _par_cb_pros_nasional.on('change', function(){
        let total_bobot = _par_cb_pros_nasional.val() * pub_pros_ns;
        _pub_prod_np_ns.text(_par_cb_pros_nasional.val());
        _pub_prod_np_ns_total.text(total_bobot);
    });

    _proc_np_data.on('click', function(){
        let total_np = 
        parseInt(_pub_np_int_total.html()) +
        parseInt(_pub_np_ns_total.html()) +
        parseInt(_buk_np_int_total.html()) +
        parseInt(_buk_np_ns_total.html()) +
        parseInt(_pub_prod_np_int_total.html()) +
        parseInt(_pub_prod_np_ns_total.html());
        _np_total_bobot.text(total_np);

        let obj_non_paten = {
            pub_np_int : '' + _pub_np_int.html(),
            pub_np_ns : '' + _pub_np_ns.html(),
            buk_np_int : ''  + _buk_np_int.html(),
            buk_np_ns : ''  + _buk_np_ns.html(),
            pub_prod_np_int : ''  + _pub_prod_np_int.html(),
            pub_prod_np_ns : ''  + _pub_prod_np_ns.html(),
            pub_np_int_total : '' + _pub_np_int_total.text(),
            pub_np_ns_total : '' + _pub_np_ns_total.text(),
            buk_np_int_total : '' + _buk_np_int_total.text(),
            buk_np_ns_total : '' + _buk_np_ns_total.text(),
            pub_prod_np_int_total : '' + _pub_prod_np_int_total.text() ,
            pub_prod_np_ns_total : '' + _pub_prod_np_ns_total.text(),
            np_total_bobot : ''  + _np_total_bobot.html()
         };

         let obj_identitas_pi = {
            par_cb_nama_inventor : '' + _par_cb_nama_inventor.val(),
            par_cb_nama_institusi : '' + _par_cb_nama_institusi.val(),
            par_cb_unit_kerja : '' + _par_cb_unit_kerja.val(),
            par_cb_judul_riset : '' + _par_cb_judul_riset.val() ,
            par_pagu_riset : '' + _par_pagu_riset.val(),
            par_cb_asal_biaya : '' + _par_cb_asal_biaya.val(),
         };

         obj_model_cb.obj_identitas_pi = obj_identitas_pi
         obj_model_cb.obj_non_paten  = obj_non_paten;
         console.log(obj_model_cb);
         validate_all_input();
        
    });
}

function set_total_publication_table(){
    
}
function validate_all_input(){
    validate_input(_par_cb_nama_inventor)
    validate_input(_par_cb_nama_institusi)
    validate_input(_par_cb_unit_kerja)
    validate_input(_par_cb_judul_riset)
    validate_input(_par_pagu_riset)
    validate_input(_par_cb_asal_biaya)
}


/**
@param el element
*/
function validate_input(el){
    if(el.val() == ''){
        el.css({
            'border' : '1px solid red'
        });
    }else{
        el.css({
            'border' : '1px solid #ced4da'
        });
    }
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
    _par_cb_judul_riset.autocomplete({
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
                         <div class="card luaran_paten_wrapper">
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
                                    <div class="card-body" style="padding:10px;">
                                        <div style="margin-left:24px;">Keterangan</div>
                                        <ul>
                                            <li>Bobot Paten granted (tersertifikasi) = 48</li>
                                            <li>Bobot Paten terdaftar = 14</li>
                                            <li>Bobot Paten sederhana granted (tersertifikasi)= 33</li>
                                            <li>Bobot Paten sederhana terdaftar = 9</li>
                                        </ul>
                                    </div>
                                </div>
                                <br/>
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
    }
}