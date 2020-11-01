//konstanta tombol halaman
const tombol_simpan_kalkulasi = $('#tombol_simpan');

$(function(){
    //ketika tombol dari halaman 1 ke halaman 2 diklik
    tombol_simpan_kalkulasi.on('click', function(){

        var periode = $('#f_periode').val();
        var modal = $('#f_modal').val();
        var sukubunga = $('#f_sukubunga').val();
        var marketsize = $('#f_marketsize').val();
        var marketshare = $('#f_marketshare').val();
        var pagu_maksimal = $('#f_pagu_maksimal').val();
        var discount_factor = $('#f_discount_factor').val();
        //
        var target = $('#f_target').val();
        var marketshare_persen = $('#f_marketshare_persen').val();
        var qty_tahun1 = $('#f_qty_tahun1').val();
        var marketshare_tahun2 = $('#f_marketshare_tahun2').val();
        var biaya_cogs = $('#f_biaya_cogs').val();
        var harga_tahun1 = $('#f_harga_tahun1').val();
        var harga_tahun2 = $('#f_harga_tahun2').val();
        //
        var biaya_investasi = $('#f_biaya_investasi').val();
        var biaya_riset = $('#f_biaya_riset').val();
        var biaya_lisensi = $('#f_biaya_lisensi').val();
        var persen_lisensi = $('#f_persen_lisensi').val();
        var biaya_tetap = $('#f_biaya_tetap').val();
        var biaya_marketing = $('#f_biaya_marketing').val();
        var biaya_perawatan = $('#f_biaya_perawatan').val();
        var biaya_warehouse = $('#f_biaya_warehouse').val();
        var biaya_depresiasi = $('#f_biaya_depresiasi').val();
        var nilai_npv = $('#f_nilai_npv').val();
        //siapkan data untuk dikirim ke AJAX
        let session_data = {
            'periode' : periode,
            'modal' : modal,
            'sukubunga' : sukubunga,
            'marketsize' : marketsize,
            'marketshare' : marketshare,
            'pagu_maksimal' : pagu_maksimal,
            'discount_factor' : discount_factor,
            'target' : target,
            'marketshare_persen' : marketshare_persen,
            'qty_tahun1' : qty_tahun1,
            'marketshare_tahun2' : marketshare_tahun2,
            'biaya_cogs' : biaya_cogs,
            'harga_tahun1' : harga_tahun1,
            'harga_tahun2' : harga_tahun2,
            'biaya_investasi' : biaya_investasi,
            'biaya_riset' : biaya_riset,
            'biaya_lisensi' : biaya_lisensi,
            'persen_lisensi' : persen_lisensi,
            'biaya_tetap' : biaya_tetap,
            'biaya_marketing' : biaya_marketing,
            'biaya_perawatan' : biaya_perawatan,
            'biaya_warehouse' : biaya_warehouse,
            'biaya_depresiasi' : biaya_depresiasi,
            'nilai_npv' : nilai_npv
        }
        // alert('MARKETSIZE: ' + marketsize + ' PAGU: ' + pagu_maksimal);
        loader.show();
        $.ajax({
            url : web_url + '/incomebased/simpan_kalkulasi',
            type : 'POST',
            cache : true,
            data : session_data,
            success : function(respon){
                console.log(respon);
                loader.hide();
                window.location.replace(web_url + '/manage/add/incomebased_output');
                Swal.fire(
                    'Sukses',
                    'Simpan Data Kalkulasi',
                    'success'
                )
            }
        });        
    })
});