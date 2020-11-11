
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
const _par_cb_file = $('#par_cb_file');

const _par_cb_asal_biaya = $('#par_cb_asal_biaya');
const _par_cb_pub_internasional = $('#par_cb_pub_internasional');
const _par_cb_pub_nasional = $('#par_cb_pub_nasional');
const _par_cb_buku_internasional = $('#par_cb_buku_internasional');
const _par_cb_buku_nasional = $('#par_cb_buku_nasional');
const _par_cb_pros_internasional = $('#par_cb_pros_internasional');
const _par_cb_pros_nasional = $('#par_cb_pros_nasional');
const _par_cb_daftar_invensi = $('.par_cb_daftar_invensi');

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
const _nilai_luaran_paten_list = $('#nilai_luaran_paten_list');

const _total_biaya_pendaftaran_seluruh = $('#total_biaya_pendaftaran_seluruh');
const _total_biaya_substantif_seluruh = $("#total_biaya_substantif_seluruh");
const _total_biaya_percepatan_seluruh = $('#total_biaya_percepatan_seluruh');
const _total_biaya_permohonan_seluruh = $('#total_biaya_permohonan_seluruh');
const _total_biaya_proses_lainnya = $('#total_biaya_proses_lainnya');

// daftar view output luaran
const _out_container_parent = $('.container_all_output');
const _out_paten = $('#out_paten');
const _out_nonpaten = $('#out_nonpaten');
const _out_pagu = $('#out_pagu');

const _out_ki = $('#out_ki'); // total luaran penelitian berupa paten
const _out_pi = $('#out_pi');
const _out_ki_list = $('#out_ki_list'); // daftar nilai luaran penelitian berupa paten
const _out_atbp_total = $('#out_atbp_total');
const _out_atbp_list = $('#out_atbp_list');
const _out_atbp_table_inflasi = $('#out_atbp_table_inflasi');

const _container_simpan_export = $("#container_simpan_export");

const _tosave = $('#tosave');
const _topdf = $('#topdf');

// non paten button process
const _proc_data = $('#proc_data');

// konstanta bobot
const pub_int = 40;
const pub_ns = 25;

const buk_int = 40;
const buk_ns = 30;

const pub_pros_int = 25;
const pub_pros_ns = 10;

// konstanta biaya permohonan paten

/**
 * referensi terkait tarif permohonan poten di :
 * https://dgip.go.id/tarif-paten
 */

const biaya_permohonan_paten = 350000;
const biaya_permohonan_paten_sederhana = 200000;
const biaya_substantif_paten = 3000000;
const biaya_substantif_paten_sederhana = 500000;
const biaya_percepatan_pengumuman_publikasi = 400000;


// konstanta bobot paten
const granted_tersertifikat = 48;
const granted_terdaftar = 14;
const sederhana_tersertifikat = 33;
const sederhana_terdaftar = 9 ;
 
// form data to serialization
let obj_model_cb = {
     obj_id_sinta : '' + userdetails.sinta_id,
     obj_id_google : '' + userdetails.google_id, 
     obj_email : '' + userdetails.email,
     obj_id_afiliasi : '' + userdetails.afiliasi.id,
     obj_identitas_pi : '', // identitas penelitian dan invensi
     obj_non_paten : '', // object terkait luaran non paten
     obj_paten : {
         data : [],
         total_bobot_seluruh : 0,
        },
    obj_paten_inflasi : {
        data : []
    },
    ti : 0,
    tanggal : '',
    pi : 0,
    ki : 0,
    total_atbp : 0
};

         
/**
 * on ready state
 */
$(function () {
    // get_daftar_publikasi();
    init();
    get_daftar_penelitian();
    get_daftar_ipr();
});

function getPDF(){

    var HTML_Width = $(".cost_report").width();
    var HTML_Height = $(".cost_report").height();
    var top_left_margin = 5;
    var PDF_Width = HTML_Width+(top_left_margin*2);
    var PDF_Height = (PDF_Width*1.5)+(top_left_margin*2);
    var canvas_image_width = HTML_Width;
    var canvas_image_height = HTML_Height;
    
    var totalPDFPages = Math.ceil(HTML_Height/PDF_Height)-1;
    
    html2canvas(document.querySelector(".cost_report"), {
        scale: 1,
        removeContainer : true,
        onrendered: function(canvas) {
            var imgData = canvas.toDataURL("image/png");
            var pdf = new jsPDF('p', 'mm', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'PNG', top_left_margin, top_left_margin, canvas_image_width,canvas_image_height);
            
            for (var i = 1; i <= totalPDFPages; i++) { 
                pdf.addPage(PDF_Width, PDF_Height);
                // pdf.addImage(imgData, 'PNG', top_left_margin, -(PDF_Height*i)+(top_left_margin*2), canvas_image_width, canvas_image_height);
                pdf.addImage(imgData, 'PNG', top_left_margin, -(PDF_Height*i)+(top_left_margin*2), canvas_image_width, canvas_image_height);
            }
            
            pdf.save("HTML-Document.pdf");
        }
    });
};

function init(){
    $('#topdf').on('click', function(){
        getPDF();
        // html2canvas(document.querySelector(".cost_report"), {
        //     scale: 4,
        //     allowTaint:true,
        //     removeContainer : true,
        //     onrendered: function(canvas) {
        //         var imgData = canvas.toDataURL('image/png');
        //         console.log('Report Image URL: '+imgData);
        //         var doc = new jsPDF('p', 'mm', 'a4'); 
        //         pageHeight= doc.internal.pageSize.height;
        //         y = 500 // Height position of new content
        //         doc.addImage(imgData, 'PNG', 20, 20);
        //         if (y >= pageHeight)
        //         {
        //             doc.addPage();
        //             doc.addImage(imgData, 'PNG', 20, 20);
        //             y = 0 // Restart height position
        //         }
        //         doc.save('sample.pdf');
        //     }
        // });
    });

    _par_cb_unit_kerja.val(author_overview.prodi.nama);
    _par_cb_nama_inventor.val(author_overview.name);
    _par_cb_nama_institusi.val(author_overview.afiliation.name);

    // publikasi internasional
    let get_scopus = JSON.parse(sessionStorage.getItem('get_scopus'));
    if(get_scopus.length > 0){
        let total_bobot = get_scopus.length * pub_int;
        _par_cb_pub_internasional.val(get_scopus.length);
        _pub_np_int.text(get_scopus.length);
        _pub_np_int_total.text(total_bobot);
    }

    _par_pagu_riset.on('keyup', function(){
        let result = money.format(_par_pagu_riset.val());
        _par_pagu_riset.val(result);
    });

    _par_cb_judul_riset.on('change', function(){
        let val = _par_cb_judul_riset.val();
        let i = 0;
        let data = author_research.researchs.results;
        for(i; i < data.length; i++){
            if(data[i].judul === val){
                let money_data = data[i].dana_disetujui
                let remove_dollar_sign = money_data.split('$')[1];
                let remove_format_00 = remove_dollar_sign.split('.')[0];
                let remove_comma_format = remove_format_00.replace(/,/g, '');
                let result = money.format(remove_comma_format);
                _par_pagu_riset.val(result);
            }
        }
    });

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
    
    /** onclick submit to process data */
    _proc_data.on('click', function(){
        let check = validate_input_identitas(); // isi terlebih dulu form indentitas
        if(check){
            luaran_nonpaten();
            luaran_paten();
            _out_container_parent.show();
            _container_simpan_export.show();
        }
    });

    // save data to databases;
    _tosave.on('click', function(){
        $.ajax({
            url : web_url + '/costbased/add',
            type : 'POST',
            data : {
                'datas' : JSON.stringify(obj_model_cb)
            },
            error : function(e){
                alert('Data tidak tersimpan');
            },
            success : function(res){
                console.log('berhasil')
                console.log(res);
                res = JSON.parse(res);
                console.log(res);
                if(res.status == 'success'){
                    _tosave.attr('disabled', 'disabled');
                    _tosave.text('Tersimpan');
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Data berhasil di submit',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    // console.log('upload dokumen pendukung');
                    // // upload dokumen pendukung
                    // var form_data = new FormData();
                    // var totalfiles = document.getElementById('par_cb_file').files.length;
                    // for (var index = 0; index < totalfiles; index++) {
                    //     form_data.append("berkas[]", document.getElementById('par_cb_file').files[index]);
                    // }
                    // console.log(form_data);
                    // console.log(res.insert_id);
                    // console.log(web_url + '/uploads/multiple/costbased/'+res.insert_id+'');

                    // $.ajax({
                    //     url: web_url + '/uploads/multiple/costbased/'+res.insert_id+'',
                    //     type: 'post',
                    //     data: form_data,
                    //     dataType: 'json',
                    //     contentType: false,
                    //     processData: false,
                    //     success: function (response) {
                    //         if(response.status == 'success'){
                    //             _tosave.attr('disabled', 'disabled');
                    //             _tosave.text('Tersimpan');
                    //             // bootbox.hideAll();
                    //             Swal.fire({
                    //                 position: 'top-end',
                    //                 icon: 'success',
                    //                 title: 'Data berhasil di submit',
                    //                 showConfirmButton: false,
                    //                 timer: 1500
                    //             })
                    //         }
                    //     },
                    //     done : function(){
                    //         // bootbox.hideAll();
                    //         _tosave.attr('disabled', 'disabled');
                    //         _tosave.text('Tersimpan');
                    //     },failed : function(e){
                    //         console.log(e)
                    //     }, error : function(e){
                    //         console.log('error');
                    //         console.log(e);
                    //     }
                    // });
                }
            }
        });



    });

}

function luaran_nonpaten(){
    total_np = 
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
        np_total_bobot : ''  + _np_total_bobot.html(),
        total_bobot_seluruh : '' + _np_total_bobot.html(),
        qi : '' + _np_total_bobot.html()
        };

        let obj_identitas_pi = {
            par_cb_nama_inventor : '' + _par_cb_nama_inventor.val(),
            par_cb_nama_institusi : '' + _par_cb_nama_institusi.val(),
            par_cb_unit_kerja : '' + _par_cb_unit_kerja.val(),
            par_cb_judul_riset : '' + _par_cb_judul_riset.val() ,
            par_pagu_riset : '' + money.reverse(_par_pagu_riset.val()),
            par_cb_asal_biaya : '' + _par_cb_asal_biaya.val()
        };

        obj_model_cb.obj_identitas_pi = obj_identitas_pi
        obj_model_cb.obj_non_paten  = obj_non_paten;

}



function luaran_paten(){
            obj_model_cb.obj_paten.data = []; // empty the data if trigger clicked
            let container_luaran_paten = $('.luaran_paten_wrapper');
            if(container_luaran_paten.length > 0){
                let i  = 1;
                let total_bobot_seluruh = 0;
                let total_biaya_permohonan_seluruh = 0; // pi
                let total_biaya_pendaftaran_seluruh = 0;
                let total_biaya_substantif_seluruh = 0;
                let total_biaya_percepatan_seluruh = 0;
                let total_biaya_proses_lainnya = 0;

                let total_luaran_penelitian_paten = 0; // ki
                let total_atbp = 0;
                _luaran_paten_list.empty();
                _out_ki_list.empty();
                _out_atbp_list.empty();
                _out_atbp_table_inflasi.empty();
                _nilai_luaran_paten_list.empty();
                obj_model_cb.obj_paten_inflasi.data = [];
                for(i; i <= container_luaran_paten.length; i++){
                    let _par_cb_jd_invensi= $('#par_cb_jd_invensi_' + i).val();
                    let _par_cb_jenis_paten = $('input[name="jpt_'+i+'"]:checked').val();
                    let _par_cb_status_paten = $('input[name="stp_'+i+'"]:checked').val();
                    let _par_cb_nodaftar= $('#par_cb_nodaftar_' + i).val();
                    let _par_biaya_proses = money.reverse($('#par_biaya_proses_' + i).val());
                    let _par_cb_sertifikat_paten = $('#par_cb_sertifikat_paten_' + i).val();
                    let _par_cb_asalbiayadaftar = $('#par_cb_asalbiayadaftar_' + i).val();
                    let _par_tgl_daftar_paten = $('#par_tgl_daftar_paten_' + i).val();
                    let _par_tgl_hitung_paten = $('#par_tgl_hitung_paten_' + i).val();

                    var bobot = 0;
                    let jumlah = 1;
                    let biaya_pendaftaran;
                    let biaya_substantif;
                    let biaya_percepatan;
                    let total_biaya_permohonan = 0;
                    let total_bobot = 0;

                    if(_par_cb_jenis_paten === "paten_granted" && _par_cb_status_paten === "tersertifikasi"){
                        bobot = granted_tersertifikat;
                        biaya_pendaftaran = biaya_permohonan_paten;
                        biaya_substantif = biaya_substantif_paten;
                        biaya_percepatan = biaya_percepatan_pengumuman_publikasi;
                    }else if(_par_cb_jenis_paten === "paten_granted" && _par_cb_status_paten === "terdaftar"){
                        bobot = granted_terdaftar;
                        biaya_pendaftaran = biaya_permohonan_paten;
                        biaya_substantif = biaya_substantif_paten;
                        biaya_percepatan = biaya_percepatan_pengumuman_publikasi;
                    }else if(_par_cb_jenis_paten === "paten_sederhana" && _par_cb_status_paten === "tersertifikasi"){
                        bobot = sederhana_tersertifikat;
                        biaya_pendaftaran = biaya_permohonan_paten_sederhana;
                        biaya_substantif = biaya_substantif_paten_sederhana;
                        biaya_percepatan = 0;
                    }else if(_par_cb_jenis_paten === "paten_sederhana" && _par_cb_status_paten === "terdaftar"){
                        bobot = sederhana_terdaftar;
                        biaya_pendaftaran = biaya_permohonan_paten_sederhana;
                        biaya_substantif = biaya_substantif_paten_sederhana;
                        biaya_percepatan = 0;
                    }

                    total_biaya_permohonan = parseInt(biaya_pendaftaran) + parseInt(biaya_substantif) + parseInt(biaya_percepatan) + parseInt(_par_biaya_proses)
                    
                    total_biaya_pendaftaran_seluruh = parseInt(total_biaya_pendaftaran_seluruh) + parseInt(biaya_pendaftaran);
                    total_biaya_substantif_seluruh = parseInt(total_biaya_substantif_seluruh) + parseInt(biaya_substantif);
                    total_biaya_percepatan_seluruh = parseInt(total_biaya_percepatan_seluruh) + parseInt(biaya_percepatan);
                    total_biaya_permohonan_seluruh = parseInt(total_biaya_permohonan_seluruh) + parseInt(total_biaya_permohonan);
                    total_biaya_proses_lainnya = parseInt(total_biaya_proses_lainnya) + parseInt(_par_biaya_proses);

                    total_bobot_per_row = parseInt(jumlah) * parseInt(bobot);
                    total_bobot_seluruh = total_bobot_seluruh + total_bobot_per_row;
                    
                    let list_adapter = 
                    `<tr>
                            <td>`+i+`.</td>
                            <td>`+_par_cb_jd_invensi+`</td>
                            <td>`+jumlah+`</td>
                            <td>`+bobot+`</td>
                            <td>`+total_bobot_per_row+`</td>
                    </tr>`;
                    _luaran_paten_list.append(list_adapter);
                    
                    let list_adapter_nilai = `<tr>
                    <td>`+i+`.</td>
                            <td>`+_par_cb_nodaftar+`</td>
                            <td>`+money.init(biaya_pendaftaran)+`</td>
                            <td>`+money.init(biaya_substantif)+`</td>
                            <td>`+money.init(biaya_percepatan)+`</td>
                            <td>`+money.init(_par_biaya_proses)+`</td>
                            <td>`+money.init(total_biaya_permohonan)+`</td>
                            </tr>
                            `;
                    _nilai_luaran_paten_list.append(list_adapter_nilai);
                    _p_total_bobot.text(total_bobot_seluruh);


                    // print output
                    _out_pagu.text(_par_pagu_riset.val())
                    _out_paten.text(total_bobot_seluruh)
                    _out_nonpaten.text(_np_total_bobot.text());



                    // ki = (Ki = Ti / (Total(Ti)+Total(Qi))× R)

                    let x = parseInt(total_bobot_seluruh)/ (parseInt(total_bobot_seluruh) + parseInt(_np_total_bobot.text()) );
                    let ki = x * parseInt(money.reverse(_par_pagu_riset.val()));
                    total_luaran_penelitian_paten = ki;

                    _out_ki.text(money.formatdec(ki));

                    console.log(total_bobot_per_row + '/' + total_bobot_seluruh + '+' + _np_total_bobot)
                    let y = total_bobot_per_row / (parseInt(total_bobot_seluruh) + parseInt(_np_total_bobot.text()) );
                    let ki_list = y * parseInt(money.reverse(_par_pagu_riset.val()));
                    let _jen_paten = '';
                    if(_par_cb_jenis_paten === 'paten_granted') {
                        _jen_paten = 'paten'
                    }else{
                        _jen_paten = _par_cb_jenis_paten
                    }
                    let adapter_out_ki_list = `<li id="list_`+i+`">`+_jen_paten+` `+_par_cb_status_paten+` = Rp. `+money.init(ki_list)+`</li>`;
                    _out_ki_list.append(adapter_out_ki_list);



                    // atbp masing-masing luaran
                    let atbp_list = ki_list + total_biaya_permohonan;
                    let adapter_out_atbp_list = `<li id="list_`+i+`">`+_par_cb_nodaftar+` = Rp. `+money.init(atbp_list)+`</li>`;
                    _out_atbp_list.append(adapter_out_atbp_list); 

                    // let adapter_out_atbp_table_inflasi = 
                    // `<tr>
                    //   <td id="list_inflasi_`+i+`">`+_par_cb_nodaftar+`</td>
                    //   <td></td>
                    //   <td></td>
                    //   <td>`+money.init(ki_list)+`</td>
                    // </tr>`;
                    // _out_atbp_table_inflasi.append(adapter_out_atbp_table_inflasi);



                    obj_paten = {
                        par_cb_jd_invensi : '' + _par_cb_jd_invensi,
                        par_cb_jenis_paten : '' + _par_cb_jenis_paten,
                        par_cb_status_paten : '' + _par_cb_status_paten,
                        par_cb_nodaftar : '' + _par_cb_nodaftar,
                        par_cb_sertifikat_paten : ''  + _par_cb_sertifikat_paten,
                        par_cb_asal_biaya_permohonan : '' + _par_cb_asalbiayadaftar,
                        par_biaya_proses : '' + money.reverse(_par_biaya_proses),
                        biaya_pendaftaran : '' + biaya_pendaftaran,
                        biaya_substantif : '' + biaya_substantif,
                        biaya_percepatan : '' + biaya_percepatan,
                        par_tgl_daftar_paten : '' + _par_tgl_daftar_paten,
                        par_tgl_hitung_paten : '' + _par_tgl_hitung_paten,
                        par_selisih_tahun : '' + dateInYearsdiff(_par_tgl_daftar_paten,_par_tgl_hitung_paten), 
                        total_biaya_permohonan : '' + total_biaya_permohonan,
                        nilai_atbp_paten : atbp_list,
                        jumlah : 1,
                        bobot : bobot,
                        total_bobot_per_row : total_bobot_per_row,
                    };

                   
                    let k = 0;
                    let years_diff_inflasi = dateInYearsdiff(_par_tgl_daftar_paten,_par_tgl_hitung_paten) + 1;
                    for(k; k < years_diff_inflasi; k++){
                        let nilai_inflasi;
                        if(k == 0){
                            nilai_inflasi = 0;
                        }else{
                            nilai_inflasi = 0.5;
                        }
                        let obj_paten_inflasi = {
                            par_cb_nodaftar : '' + _par_cb_nodaftar,
                            tahunke : k + 1,
                            inflasi : nilai_inflasi,
                            nilai_atbp_paten : atbp_list,
                        }
                        obj_model_cb.obj_paten_inflasi.data.push(obj_paten_inflasi);

                    }
                    obj_model_cb.obj_paten.data.push(obj_paten);
                    obj_model_cb.obj_paten.total_bobot_seluruh = total_bobot_seluruh;
                } 
                
                if(total_biaya_pendaftaran_seluruh == '' || total_biaya_pendaftaran_seluruh == NaN){
                    total_biaya_pendaftaran_seluruh = 0;
                }
                
                if(total_biaya_substantif_seluruh == '' || total_biaya_substantif_seluruh == NaN){
                    total_biaya_substantif_seluruh = 0;
                }

                if(total_biaya_percepatan_seluruh == '' || total_biaya_percepatan_seluruh == NaN){
                    total_biaya_percepatan_seluruh = 0;
                }
                
                if(total_biaya_proses_lainnya == '' || total_biaya_proses_lainnya == NaN){
                    total_biaya_proses_lainnya = 0;
                }

                _total_biaya_pendaftaran_seluruh.text(money.init(total_biaya_pendaftaran_seluruh));
                _total_biaya_substantif_seluruh.text(money.init(total_biaya_substantif_seluruh));
                _total_biaya_percepatan_seluruh.text(money.init(total_biaya_percepatan_seluruh));
                _total_biaya_proses_lainnya.text(money.init(total_biaya_proses_lainnya));
                
                
                /**
                 * pi = total a + total b + total c + total d ;
                 * pi = total_biaya_pendaftaran_seluruh
                 */
                
                _total_biaya_permohonan_seluruh.text(money.init(total_biaya_permohonan_seluruh));
                _out_pi.text(money.init(total_biaya_permohonan_seluruh));


                 /**
                 * atbp (Vi) = total Ki + total Pi;
                 */

                total_atbp = total_luaran_penelitian_paten + total_biaya_permohonan_seluruh;
                _out_atbp_total.text(money.init(total_atbp));

                obj_model_cb.ti = total_bobot_seluruh;
                obj_model_cb.ki = total_luaran_penelitian_paten
                obj_model_cb.pi = total_biaya_permohonan_seluruh;
                obj_model_cb.total_atbp = total_atbp;

                let h = 0;
                let obj_inflasi = obj_model_cb.obj_paten_inflasi.data 
                for(h; h < obj_inflasi.length; h++){
                    let adapter_out_atbp_table_inflasi = 
                    `<tr>
                    <td id="list_inflasi_`+h+`">`+obj_inflasi[h].par_cb_nodaftar+`</td>
                    <td>Tahun ke - `+obj_inflasi[h].tahunke+`</td>
                    <td>`+obj_inflasi[h].inflasi+`</td>
                    <td>`+money.init(obj_inflasi[h].nilai_atbp_paten)+`</td>
                    </tr>`;
                    _out_atbp_table_inflasi.append(adapter_out_atbp_table_inflasi);
                }

                
                console.log(obj_model_cb);
            }
}

/**
 * hitung selisih tahun
 */
function dateInYearsdiff(start, end){
    let s = moment(start)
    let e = moment(end)
    let diffs =  e.diff(s, 'years');
    return diffs;
}


/**
 * Data yang perlu dihitung
 * - Total Nilai Keluaran berupa Paten
 * - Total Nilai Perolehan Paten
 * - Total Nilai ATBP
 * - 
 */


function validate_input_identitas(){
    let check = false;
    let a = validate_input(_par_cb_nama_inventor) == true ? check = true : false;
    let b = validate_input(_par_cb_nama_institusi)  == true ? check = true : false;
    let c = validate_input(_par_cb_unit_kerja) == true ? check = true : false;
    let d = validate_input(_par_cb_judul_riset)  == true ? check = true : false;
    let e = validate_input(_par_pagu_riset)  == true ? check = true : false;
    let f = validate_input(_par_cb_asal_biaya)  == true ? check = true : false;
    // let g = validate_input(_par_cb_file) == true ? check = true : false;
    if(a && b && c && d && e && f) {
        return true;
    }else{
        $("html, body").animate({ scrollTop: 0 }, "slow");
        return false;
    }
}



/**
 * @function get_daftar_penelitian
 * fetch daftar penelitian
 */
function get_daftar_penelitian(){
    let arr_temp_research = [];
    let get_research = JSON.parse(sessionStorage.getItem('get_research'));
    for(let i=0; i < get_research.researchs.results.length; i++){
        let obj_temp = {
            'label' : '' + get_research.researchs.results[i].judul,
            'value' : '' + get_research.researchs.results[i].judul
        }
    
        arr_temp_research.push(obj_temp);
    }

    _par_cb_judul_riset.autocomplete({
        source : arr_temp_research
    });
}


/**
 * @function get_daftar_publikasi
 * fetch daftar penelitian          
 */
function get_daftar_publikasi(){
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
}


/**
 * @function get_daftar_ipr
 * fetch daftar invensi
 */
function get_daftar_ipr(){
    let arr_temp = [];
    let get_ipr = JSON.parse(sessionStorage.getItem('get_ipr'));
    for(let i=0; i < get_ipr.length; i++){
        let obj_temp = {
            'label' : '' + get_ipr[i].title,
            'value' : '' + get_ipr[i].title
        }
    
        arr_temp.push(obj_temp);
    }

    _par_cb_daftar_invensi.autocomplete({
        source : arr_temp
    });
}

function get_daftar_iprs(dom){
    let arr_temp = [];
    let get_ipr = JSON.parse(sessionStorage.getItem('get_ipr'));
    for(let i=0; i < get_ipr.length; i++){
        let obj_temp = {
            'label' : '' + get_ipr[i].title,
            'value' : '' + get_ipr[i].title
        }
    
        arr_temp.push(obj_temp);
    }

    dom.autocomplete({
        source : arr_temp
    });
}


/**
 * @function data_luaran_paten(index)
 * @param index // index reference of the list
 */
function data_luaran_paten(index){
    val = $('#par_cb_jd_invensi_' + index).val();
    let data = author_ipr;
    console.log('data ipr');
    console.log(data);
    let i = 0;
    for(i; i < data.length; i++){
        if(data[i].hasOwnProperty('title')){
            console.log(data[i].hasOwnProperty('title'))
            if(data[i].title === val){  
                $('#par_cb_nodaftar_'+index).val(data[i].nomor_permohonan);
                $('#par_cb_sertifikat_paten_'+index).val(data[i].no_registrasi);
                $('#par_tgl_daftar_paten_'+index).val(data[i].tgl_publikasi);
                $('#par_tgl_hitung_paten_'+index).val(moment().format('YYYY-MM-DD'));

                if(data[i].kategori== 'paten'){
                    $("input[name='jpt_"+index+"'][value='paten_granted']").attr('checked', 'checked');
                }else{
                    $("input[name='jpt_"+index+"'][value='paten_sederhana']").attr('checked', 'checked');
                }
                if(data[i].no_registrasi !== ''){
                    $("input[name='stp_"+index+"'][value='tersertifikasi']").attr('checked', 'checked');
                }else{
                    $("input[name='stp_"+index+"'][value='terdaftar']").attr('checked', 'checked');
                }
            }
        }
    }
}


/**
 * @function biaya_proses_lainnya
 * @param index // index reference of the list
 */
function biaya_proses_lainnya(index){
    val = $('#par_biaya_proses_' + index).val();
    $('#par_biaya_proses_' + index).val(money.format(val));
}


function closeme(obj){
    let attr = $(obj).attr('class');
    $(obj).parent('div').remove();
}


/**
 * @function add_luaran_paten
 * onclick ketika tambah luaran baru
 */
function add_luaran_paten(){
        // jika index sudah tersimpan maka tinggal get
        let container_luaran_paten = $('.luaran_paten_wrapper'); // get current index of dom
        let index = container_luaran_paten.length + 1;
        let adapter = `<div class="card luaran_paten_wrapper">
                            <div title="Hapus Form ini" onclick="closeme(this)" class="close closedivs" >
                                <span aria-hidden="true">&times;</span>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="captions">Judul Invensi <i style="color: red">*</i>&nbsp;<a class="badge badge-secondary text-white">autocomplete</a></label>
                                    <input type="text" onchange="data_luaran_paten(`+index+`)" class="form-control form-control-sm par_cb_daftar_invensi" id="par_cb_jd_invensi_`+index+`" placeholder="">
                                </div>
                                

                                <div class="form-row form-group">
                                    <div class="col">
                                            <div class="form-group">
                                                <label class="captions">Jenis Paten <i style="color: red">*</i> </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input par_cb_jenis_paten_`+index+`" type="radio" name="jpt_`+index+`"  value="paten_granted">
                                                <label class="form-check-label" for="inlineRadio1">Paten </label>
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
                                            <input class="form-check-input par_cb_status_paten_`+index+`" type="radio" name="stp_`+index+`"  value="terdaftar">
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
                                            <li>Bobot Paten (tersertifikasi) = 48</li>
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
                                        <label class="captions">Nomor Sertifikat Paten/Paten Sederhana</label>
                                        <input type="text" class="form-control form-control-sm" id="par_cb_sertifikat_paten_`+index+`" placeholder="">
                                        <small> (jika sudah granted)</small>
                                    </div>
                                </div>
                                <div class="form-row form-group">
                                    <div class="col">
                                        <label class="captions">Asal Biaya Pendaftaran (Permohonan) Paten<i style="color: red">*</i></label>
                                        <select class="custom-select custom-select-sm" id="par_cb_asalbiayadaftar_`+index+`"> 
                                                <option value="">-- Silahkan pilih</option>
                                                <option value="Raih KI">Raih KI</option>
                                                <option value="Institusi Penghasil/Pemilik Invensi">Institusi Penghasil/Pemilik Invensi</option>
                                                <option value="Lainnya">Lainnya</option>
                                        </select>
                                    </div>
                                    <div class="col-lg-6">
                                        <label class="captions">Biaya Proses Lainnya</label>
                                        <input type="text" class="form-control form-control-sm" id="par_biaya_proses_`+index+`" onkeyup="biaya_proses_lainnya(`+index+`)" placeholder="" value="">
                                    </div>
                                </div>
                               
                                <div class="form-row form-group">
                                    <div class="col-lg-3">
                                        <label class="captions">Tanggal Pendaftaran Paten</label>
                                        <input id="par_tgl_daftar_paten_`+index+`" class="form-control form-control-sm" type="text" placeholder="YYYY-mm-ddd"/>
                                    </div>
                                    <div class="col-lg-3">
                                        <label class="captions">Tanggal Penghitungan Valuasi  </label>
                                        <input id="par_tgl_hitung_paten_`+index+`" class="form-control form-control-sm" type="text" placeholder="YYYY-mm-ddd"/>
                                    </div>
                                </div> 
                            </div>
                        </div>`;
        $('.container_luaran_paten').append(adapter);
        /**
         * invoke autocomplete to render daftar ipr in new dom
         */
        get_daftar_iprs($('#par_cb_jd_invensi_' + index));
        
}

