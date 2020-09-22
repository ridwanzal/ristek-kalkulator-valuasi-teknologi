
/**
 * coding style convention
 * modul luaran penelitian non paten
 * modul luaran penelitian paten
 * hasil perhitungan luaran
 * penghitungan atb-p
 * add _ (underscore for view variables)
 */

// daftar input view
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

// daftar table view
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
const _np_total_bobot = $('#np_total_bobot'); // Qi
const _p_total_bobot = $('#p_total_bobot'); // Ti
const _luaran_paten_list = $('.luaran_paten_list');

// daftar view output luaran
const _out_paten = $('#out_paten');
const _out_nonpaten = $('#out_nonpaten');
const _out_pagu = $('#out_pagu');

const _out_ki = $('#out_ki'); // total luaran penelitian berupa paten
const _out_ki_list = $('#out_ki_list'); // daftar nilai luaran penelitian berupa paten

// non paten button process
const _proc_np_data = $('#proc_np_data');
const _proc_p_data = $('#proc_p_data');

// konstanta bobot
const pub_int = 40;
const pub_ns = 25;

const buk_int = 40;
const buk_ns = 30;

const pub_pros_int = 25;
const pub_pros_ns = 10;

// konstanta bobot paten
const granted_tersertifikat = 48;
const granted_terdaftar = 14;
const sederhana_tersertifikat = 33;
const sederhana_terdaftar = 9 ;
 
// form data to serialization
let obj_model_cb = {
     obj_identitas_pi : '', // identitas penelitian dan invensi
     obj_non_paten : '', // object terkait luaran non paten
     obj_paten : {
         data : [],
         total_bobot_seluruh : 0
     },
     tanggal : ''
};

    

$(function () {
    get_daftar_penelitian();
    luaran_nonpaten();
    luaran_paten();
});



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
        let check = validate_input_identitas(); // isi terlebih dulu form indentitas
        if(check){
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
                    total_bobot_seluruh : '' + _np_total_bobot.html()
                };
    
                obj_model_cb.obj_identitas_pi = obj_identitas_pi
                obj_model_cb.obj_non_paten  = obj_non_paten;
                console.log(obj_model_cb);
        }
        
    });
}



function luaran_paten(){
    _proc_p_data.on('click', function(){
        let check = validate_input_identitas(); // isi terlebih dulu form indentitas
        if(check){
            let container_luaran_paten = $('.luaran_paten_wrapper');
            console.log(container_luaran_paten.length);
            if(container_luaran_paten.length > 0){
                let i  = 1;
                let total_bobot_seluruh = 0;
                _luaran_paten_list.empty();
                _out_ki_list.empty();
                for(i; i <= container_luaran_paten.length; i++){
                    let _par_cb_jd_invensi= $('#par_cb_jd_invensi_' + i).val();
                    let _par_cb_jenis_paten = $('input[name="jpt_'+i+'"]:checked').val();
                    let _par_cb_status_paten = $('input[name="stp_'+i+'"]:checked').val();
                    let _par_cb_nodaftar= $('#par_cb_nodaftar_' + i).val();
                    let _par_cb_sertifikat_paten = $('#par_cb_sertifikat_paten_' + i).val();
                    let _par_cb_file2 = $('#par_cb_file2');
        
                    var bobot = 0;
                    let jumlah = 1;
                    let total_bobot = 0;
                    console.log(_par_cb_jenis_paten + '|' + _par_cb_status_paten);
                    if(_par_cb_jenis_paten === "paten_granted" && _par_cb_status_paten === "tersertifikasi"){
                        bobot = granted_tersertifikat;
                    }else if(_par_cb_jenis_paten === "paten_granted" && _par_cb_status_paten === "tedaftar"){
                        bobot = granted_terdaftar;
                    }else if(_par_cb_jenis_paten === "paten_sederhana" && _par_cb_status_paten === "tersertifikasi"){
                        bobot = sederhana_tersertifikat;
                    }else if(_par_cb_jenis_paten === "paten_sederhana" && _par_cb_status_paten === "tedaftar"){
                        bobot = sederhana_terdaftar;
                    }
                    
                    console.log('nilai bobot : ' + bobot);

                    total_bobot_per_row = parseInt(jumlah) * parseInt(bobot);
                    total_bobot_seluruh = total_bobot_seluruh + total_bobot_per_row;
                    
                    let list_adapter = 
                    `<tr>
                            <td>`+i+`</td>
                            <td>`+_par_cb_jd_invensi+`</td>
                            <td>`+jumlah+`</td>
                            <td>`+bobot+`</td>
                            <td>`+total_bobot_per_row+`</td>
                    </tr>`;
                    _luaran_paten_list.append(list_adapter);
                    _p_total_bobot.text(total_bobot_seluruh);
                    
                    // print output
                    _out_pagu.text(_par_pagu_riset.val())
                    _out_paten.text(total_bobot_seluruh)
                    _out_nonpaten.text(_np_total_bobot.text());

                    // ki = (Ki = Ti / (Total(Ti)+Total(Qi))× R)

                    let x = parseInt(total_bobot_seluruh)/ (parseInt(total_bobot_seluruh) + parseInt(_np_total_bobot.text()) );
                    let ki = x * parseInt(_par_pagu_riset.val());

                    console.log(ki);
                    _out_ki.text(ki);

                    let y = total_bobot_per_row / (parseInt(total_bobot_seluruh) + parseInt(_np_total_bobot.text()) );
                    let ki_list = y * parseInt(_par_pagu_riset.val());
                    let adapter_out_ki_list = `
                                                    <li id="list_`+i+`">`+_par_cb_jenis_paten+` `+_par_cb_status_paten+` = Rp.`+ki_list+`</li>
                                                `;
                    _out_ki_list.append(adapter_out_ki_list);


                    obj_paten = {
                        par_cb_jd_invensi : '' + _par_cb_jd_invensi,
                        par_cb_jenis_paten : '' + _par_cb_jenis_paten,
                        par_cb_status_paten : '' + _par_cb_status_paten,
                        par_cb_nodaftar : '' + _par_cb_nodaftar,
                        par_cb_sertifikat_paten : ''  + _par_cb_sertifikat_paten,
                        jumlah : 1,
                        bobot : bobot,
                        total_bobot_per_row : total_bobot_per_row,
                    };
                
                    obj_model_cb.obj_paten.data = [];
                
                    obj_model_cb.obj_paten.data.push(obj_paten);
                    obj_model_cb.obj_paten.total_bobot_seluruh = total_bobot_seluruh;
                } 
            }
        }
    });
}



function set_total_publication_table(){
    
}



function validate_input_identitas(){
    let check = false;
    let a = validate_input(_par_cb_nama_inventor) == true ? check = true : false;
    let b = validate_input(_par_cb_nama_institusi)  == true ? check = true : false;
    let c = validate_input(_par_cb_unit_kerja) == true ? check = true : false;
    let d = validate_input(_par_cb_judul_riset)  == true ? check = true : false;
    let e = validate_input(_par_pagu_riset)  == true ? check = true : false;
    let f = validate_input(_par_cb_asal_biaya)  == true ? check = true : false;
    if(a && b && c && d && e && f) {
        return true;
    }else{
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    }
}

function validate_input_luaran_paten(){

}



/**
@param el input element to validate
*/
function validate_input(el){
    if(el.val() == ''){
        el.css({
            'border' : '1px solid red'
        });
        return false;
    }else{
        el.css({
            'border' : '1px solid #ced4da'
        });
        return true;
    }
}



/**
 * @function get_daftar_penelitian
 * fetch daftar penelitian
 */
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
        // jika index sudah tersimpan maka tinggal get
        let container_luaran_paten = $('.luaran_paten_wrapper'); // get current index of dom
        let index = container_luaran_paten.length + 1;
        let adapter = ` <br/>
                            <div class="card luaran_paten_wrapper">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="captions">Judul Invensi <i style="color: red">*</i></label>
                                    <input type="text" class="form-control form-control-sm" id="par_cb_jd_invensi_`+index+`" placeholder="">
                                </div>
                                

                                <div class="form-row form-group">
                                    <div class="col">
                                            <div class="form-group">
                                                <label class="captions">Jenis Paten <i style="color: red">*</i> </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input par_cb_jenis_paten_`+index+`" type="radio" name="jpt_`+index+`"  value="paten_granted">
                                                <label class="form-check-label" for="inlineRadio1">Paten Granted </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input par_cb_jenis_paten_`+index+`" type="radio" name="jpt_`+index+`"  value="paten_sederhana">
                                                <label class="form-check-label" for="inlineRadio2">Paten Sederhana </label>
                                            </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="captions">Status Peromohonan <i style="color: red">*</i></label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input par_cb_status_paten_`+index+`" type="radio" name="stp_`+index+`"  value="tedaftar">
                                            <label class="form-check-label" for="inlineRadio1">Terdaftar</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input par_cb_status_paten_`+index+`" type="radio" name="stp_`+index+`" value="tersertifikasi">
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
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label class="captions">Nomor pendaftaran (Pemohon) <i style="color: red">*</i></label>
                                        <input type="text" class="form-control form-control-sm" id="par_cb_nodaftar_`+index+`" placeholder="">
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="captions">Nomor Sertifikat Paten/Paten Sederhana <i style="color: red">*</i></label>
                                        <input type="text" class="form-control form-control-sm" id="par_cb_sertifikat_paten_`+index+`" placeholder="">
                                        <small> (jika sudah granted)</small>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label class="captions">Asal Biaya Pendaftaran (Permohonan) Paten<i style="color: red">*</i></label>
                                        <select class="custom-select custom-select-sm" id="par_cb_asalbiayadaftar_`+index+`"> 
                                                <option value="">-- Silahkan pilih</option>
                                                <option value="1">Raih KI</option>
                                                <option value="2">Institusi Penghasil/Pemilik Invensi</option>
                                                <option value="3">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="captions" for="formGroupExampleInput2">Unggah dokumen pendukung <i style="color: red">*</i></label>
                                        <div class="custom-file">
                                            <input type="file" class="form-control" multiple style="height:45px;" id="par_cb_file2">
                                            <small>berupa Formulir (Bukti) pendaftaran dan/atau
                                        Sertifikat Paten/Paten Sederhana (Unggah file dlm format PDF, MS Word, PPT)</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>`;
        $('.container_luaran_paten').append(adapter);
}