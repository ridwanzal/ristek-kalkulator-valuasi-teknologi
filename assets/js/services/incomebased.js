//konstanta tombol halaman
const tombol1_kehalaman2 = $('#tombol1');
const tombol2_kehalaman3 = $('#tombol23');
const tombol2_kehalaman1 = $('#tombol21');
const tombol3_kehalaman3 = $('#tombol33');

//masking input data halaman 1
$('#modal').mask("#.##0,00", {reverse: true});
$('#sukubunga').mask('##0,00%', {reverse: true});
$('#marketsize').mask("#.##0,00", {reverse: true});

//masking input data halaman 2
$('#target').mask("#.##0,00", {reverse: true});
$('#marketshare_persen').mask('##0,00%', {reverse: true});
$('#qty_tahun1').mask("#.##0,00", {reverse: true});
$('#marketshare_tahun2').mask("##0,00%", {reverse: true});
$('#harga_tahun1').mask("#.##0,00", {reverse: true});
$('#harga_tahun2').mask("##0,00%", {reverse: true});

//masking input data halaman 3
$('#biaya_investasi').mask("#.##0,00", {reverse: true});
$('#biaya_riset').mask("#.##0,00", {reverse: true});
$('#biaya_lisensi').mask("#.##0,00", {reverse: true});
$('#persen_lisensi').mask("##0,00%", {reverse: true});
$('#biaya_cogs').mask("#.##0,00", {reverse: true});
$('#biaya_tetap').mask("#.##0,00", {reverse: true});
$('#biaya_marketing').mask("##0,00%", {reverse: true});
$('#biaya_perawatan').mask("#.##0,00", {reverse: true});
$('#biaya_warehouse').mask("#.##0,00", {reverse: true});
$('#biaya_depresiasi').mask("#.##0,00", {reverse: true});

$(function(){
    //fungsi untuk menampilkan angka dengan pemisah ribuan (.) dan desimal dengan (,)
    //fungsi ini akan mengembalikan nilai sebanyak 2 digit di belakang koma
    function formatNumber(num) {
        return (
          num.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
        ) 
    } 

    //untuk market share ketika diklik/change untuk prosentase
    $('#marketshare').on('change', function() {
        var m_pilihan = $(this).find(":selected").val();
        var m_size = parseFloat($('#marketsize').val().replace(/[^\d,]/g,'').replace(',','.')); 
        var m_produk = 0;            
        if(m_pilihan=='persen1'){                
            m_produk = m_size * 0.25;
        }else if(m_pilihan=='persen2'){
            m_produk = m_size * 0.15;
        }else if(m_pilihan=='persen3'){
            m_produk = m_size * 0.10;
        }            
        $('#qty').val(formatNumber(m_produk));
    });
    
    //untuk perhitungan di halaman ke - 2
    $("#marketshare_persen").keyup(function() {
        var m_target = parseFloat($('#target').val().replace(/[^\d,]/g,'').replace(',','.'));
        var m_marketshare_persen = parseFloat($('#marketshare_persen').val().replace(/[^\d,]/g,'').replace(',','.'));
        var m_qty_tahun1 = (m_target * m_marketshare_persen)/100;
        $('#qty_tahun1').val(formatNumber(m_qty_tahun1));
    });
    
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