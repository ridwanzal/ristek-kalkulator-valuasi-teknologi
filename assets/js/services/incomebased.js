//konstanta tombol halaman
const tombol1_kehalaman2 = $('#tombol1');
const tombol2_kehalaman3 = $('#tombol23');
const tombol2_kehalaman1 = $('#tombol21');
const tombol3_kehalaman3 = $('#tombol33');

$(function(){
    
    //untuk market share ketika diklik/change untuk prosentase
    $('#marketshare').on('change', function() {
        var m_pilihan = $(this).find(":selected").val();
        var m_size = $('#marketsize').val();
        var m_produk = 0;            
        if(m_pilihan=='persen1'){                
            m_produk = m_size * 0.25;
        }else if(m_pilihan=='persen2'){
            m_produk = m_size * 0.15;
        }else if(m_pilihan=='persen3'){
            m_produk = m_size * 0.10;
        }            
        $('#qty').val(m_produk);
    });
    //
    
    //ketika tombol dari halaman 1 ke halaman 2 diklik
    tombol1_kehalaman2.on('click', function(){
        //inisilasiasi variabel
        var inventor = $('#inventor').val();
        var periode = $("#periode option:selected").attr("value");
        var modal = $('#modal').val();
        var sukubunga = $('#sukubunga').val();
        var marketsize = $('#marketsize').val();
        var marketshare = $("#marketshare option:selected").attr("value");
        var qty = $('#qty').val();
        //masukkan variabel ke dalam session storage
        sessionStorage.setItem("inventor", inventor);
        sessionStorage.setItem("periode", periode);
        sessionStorage.setItem("modal", modal);
        sessionStorage.setItem("sukubunga", sukubunga);
        sessionStorage.setItem("marketsize", marketsize);
        sessionStorage.setItem("marketshare", marketshare);
        sessionStorage.setItem("qty", qty);
        //siapkan data untuk dikirim ke AJAX
        let session_data = {
            'inventor' : inventor,
            'periode' : periode,
            'modal' : modal,
            'sukubunga' : sukubunga,
            'marketsize' : marketsize,
            'marketshare' : marketshare,
            'qty' : qty
        }
        $.ajax({
            url : web_url + '/incomebased/data_halaman1',
            type : 'POST',
            cache : true,
            data : session_data,
            success : function(respon){
                console.log(respon);
            }
        });        
    })

    //ketika tombol dari halaman 2 ke halaman 3 diklik
    tombol2_kehalaman3.on('click', function(){ 
        //inisilasiasi variabel
        var target = $('#target').val();
        var marketshare_persen = $("#marketshare_persen").val();
        var qty_tahun1 = $('#qty_tahun1').val();
        var marketshare_tahun2 = $('#marketshare_tahun2').val();
        var harga_tahun1 = $('#harga_tahun1').val();
        var harga_tahun2 = $("#harga_tahun2").val();
        //masukkan variabel ke dalam session storage
        sessionStorage.setItem("target", target);
        sessionStorage.setItem("marketshare_persen", marketshare_persen);
        sessionStorage.setItem("qty_tahun1", qty_tahun1);
        sessionStorage.setItem("marketshare_tahun2", marketshare_tahun2);
        sessionStorage.setItem("harga_tahun1", harga_tahun1);
        sessionStorage.setItem("harga_tahun2", harga_tahun2);
        //siapkan data untuk dikirim ke AJAX
        let session_data = {
            'target' : target,
            'marketshare_persen' : marketshare_persen,
            'qty_tahun1' : qty_tahun1,
            'marketshare_tahun2' : marketshare_tahun2,
            'harga_tahun1' : harga_tahun1,
            'harga_tahun2' : harga_tahun2
        }
        $.ajax({
            url : web_url + '/incomebased/data_halaman2',
            type : 'POST',
            cache : true,
            data : session_data,
            success : function(respon){
                console.log(respon);
            }
        });        
    })

    //ketika tombol dari halaman 3 diklik
    tombol3_kehalaman3.on('click', function(){ 
        //inisilasiasi variabel
        var biaya_investasi = $('#biaya_investasi').val();
        var biaya_riset = $("#biaya_riset").val();
        var biaya_lisensi = $('#biaya_lisensi').val();
        var persen_lisensi = $('#persen_lisensi').val();
        var biaya_cogs = $('#biaya_cogs').val();
        var biaya_tetap = $("#biaya_tetap").val();
        var biaya_marketing = $("#biaya_marketing").val();
        var biaya_perawatan = $("#biaya_perawatan").val();
        var biaya_warehouse = $("#biaya_warehouse").val();
        var biaya_depresiasi = $("#biaya_depresiasi").val();
        //masukkan variabel ke dalam session storage
        sessionStorage.setItem("biaya_investasi", biaya_investasi);
        sessionStorage.setItem("biaya_riset", biaya_riset);
        sessionStorage.setItem("biaya_lisensi", biaya_lisensi);
        sessionStorage.setItem("persen_lisensi", persen_lisensi);
        sessionStorage.setItem("biaya_cogs", biaya_cogs);
        sessionStorage.setItem("biaya_tetap", biaya_tetap);
        sessionStorage.setItem("biaya_marketing", biaya_marketing);
        sessionStorage.setItem("biaya_perawatan", biaya_perawatan);
        sessionStorage.setItem("biaya_warehouse", biaya_warehouse);
        sessionStorage.setItem("biaya_depresiasi", biaya_depresiasi);
        //siapkan data untuk dikirim ke AJAX
        let session_data = {
            'biaya_investasi' : biaya_investasi,
            'biaya_riset' : biaya_riset,
            'biaya_lisensi' : biaya_lisensi,
            'persen_lisensi' : persen_lisensi,
            'biaya_cogs' : biaya_cogs,
            'biaya_tetap' : biaya_tetap,
            'biaya_marketing' : biaya_marketing,
            'biaya_perawatan' : biaya_perawatan,
            'biaya_warehouse' : biaya_warehouse,
            'biaya_depresiasi' : biaya_depresiasi
        }
        $.ajax({
            url : web_url + '/incomebased/data_halaman3',
            type : 'POST',
            cache : true,
            data : session_data,
            success : function(respon){
                console.log(respon);
            }
        });        
    })
    
});