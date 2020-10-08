const ambil_sinta = $('#sinkronisasi');

$(function(){
    ambil_sinta.on('click', function(){
        sinkronisasi_ipr();
    })
});
/**
 * semua informasi terkait HKI (Intellectual Property Rights) /
 */

function sinkronisasi_ipr(){
    let check_sess_storage = sessionStorage.hasOwnProperty('get_ipr');
    if(check_sess_storage){   
        let get_ipr = JSON.parse(sessionStorage.getItem('get_ipr'));
        if(get_ipr.length > 0){
            var j = 0;
            for(let i=0; i < get_ipr.length; i++){
                j = j + 1;
                console.log(get_ipr);                
                let sinta_data = {
                    'id' : get_ipr[i].id,
                    'kategori' : get_ipr[i].kategori,
                    'nomor_permohonan' : get_ipr[i].nomor_permohonan,
                    'title' : get_ipr[i].title,
                    'tahun_permohonan' : get_ipr[i].tahun_permohonan,
                    'pemegang_paten' : get_ipr[i].pemegang_paten,
                    'inventor' : get_ipr[i].inventor,
                    'status' : get_ipr[i].status,
                    'no_publikasi' : get_ipr[i].no_publikasi,
                    'tgl_publikasi' : get_ipr[i].tgl_publikasi,
                    'no_registrasi' : get_ipr[i].no_registrasi,
                    'tgl_registrasi' : get_ipr[i].tgl_registrasi
                }
                loader.show();
                $.ajax({
                    url : web_url + '/incomebased/sinkronisasi_ipr',
                    type : 'POST',
                    cache : true,
                    data : sinta_data,
                    success : function(respon){
                        console.log(respon);
                        loader.hide();
                        window.location.replace(web_url + '/manage/add/incomebased');
                    }
                });
            }       
            //alert("Sinkronisasi Data SINTA Berhasil");  
            Swal.fire('Sinkronisasi Data SINTA Berhasil');   
            //const Toast = Swal.mixin({
            //    toast: true,
            //    position: 'top-end',
            //    showConfirmButton: false,
            //    timer: 3000
            //});

            //Toast.fire({
            //    type: 'error',
            //    title: 'Signed in successfully'
            //})
            loader.hide();
        }else{
            let adapter = `<tr class="alert alert-secondary" role="alert">
                            <td colspan=3>Data IPR Tidak Ditemukan</td>
                            </tr>`;
            $('.pesan').html(adapter);
        }
    }else{
        /**
         * @param userdetails.sinta_id //userdetails diambil dari localstorage
        */
        let api_endpoint = base_url_api + '/author/detail/ipr/' + userdetails.sinta_id;
        $.ajax({
            url : api_endpoint,
            type : 'GET',
            cache : true,
            success : function(res){
                console.log(res);
                let results = res.author.hki.results;
                if(results.length > 0){
                    sessionStorage.setItem('get_ipr', JSON.stringify(results));
                    for(let i=0; i < results.length; i++){
                        console.log(results);
                        let sinta_data = {
                            'id' : get_ipr[i].id,
                            'kategori' : get_ipr[i].kategori,
                            'nomor_permohonan' : get_ipr[i].nomor_permohonan,
                            'title' : get_ipr[i].title,
                            'tahun_permohonan' : get_ipr[i].tahun_permohonan,
                            'pemegang_paten' : get_ipr[i].pemegang_paten,
                            'inventor' : get_ipr[i].inventor,
                            'status' : get_ipr[i].status,
                            'no_publikasi' : get_ipr[i].no_publikasi,
                            'tgl_publikasi' : get_ipr[i].tgl_publikasi,
                            'no_registrasi' : get_ipr[i].no_registrasi,
                            'tgl_registrasi' : get_ipr[i].tgl_registrasi
                        }
                        loader.show();
                        $.ajax({
                            url : web_url + '/incomebased/sinkronisasi_ipr',
                            type : 'POST',
                            cache : true,
                            data : sinta_data,
                            success : function(respon){
                                console.log(respon);
                                loader.hide();
                                window.location.replace(web_url + '/manage/add/incomebased');                                
                            }
                        });
                    }
                    //alert("Sinkronisasi Data SINTA Berhasil");
                    Swal.fire('Sinkronisasi Data SINTA Berhasil');
                    loader.hide();
                }else{
                    let empty_arr = [];
                    sessionStorage.setItem('get_ipr', JSON.stringify(results));
                    let adapter = `<tr class="alert alert-secondary" role="alert">
                            <td colspan=3>Data IPR Tidak Ditemukan</td>
                            </tr>`;
                    $('.pesan').html(adapter);
                }
            }
        })
    }
}