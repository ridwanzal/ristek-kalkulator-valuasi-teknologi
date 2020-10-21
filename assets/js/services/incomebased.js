//konstanta tombol halaman
const tombol1_kehalaman2 = $('#tombol1');
const tombol2_kehalaman3 = $('#tombol23');
const tombol2_kehalaman1 = $('#tombol21');
const tombol3_kehalaman3 = $('#tombol33');

//masking input data halaman 1
$('#modal').mask("#.##0,00", {reverse: true});
$('#sukubunga').mask('##0,00%', {reverse: true});
$('#marketsize').mask("#.##0,00", {reverse: true});
$('#discount_factor').mask('##0,00%', {reverse: true});

//masking input data halaman 2
$('#target').mask("#.##0,00", {reverse: true});
$('#marketshare_persen').mask('##0,00%', {reverse: true});
$('#qty_tahun1').mask("#.##0,00", {reverse: true});
$('#marketshare_tahun2').mask("##0,00%", {reverse: true});
$('#biaya_cogs').mask("#.##0,00", {reverse: true});
$('#harga_tahun1').mask("#.##0,00", {reverse: true});
$('#harga_tahun2').mask("##0,00%", {reverse: true});

//masking input data halaman 3
$('#biaya_investasi').mask("#.##0,00", {reverse: true});
$('#biaya_riset').mask("#.##0,00", {reverse: true});
$('#biaya_lisensi').mask("#.##0,00", {reverse: true});
$('#persen_lisensi').mask("##0,00%", {reverse: true});
$('#biaya_tetap').mask("#.##0,00", {reverse: true});
$('#biaya_marketing').mask("##0,00%", {reverse: true});
$('#biaya_perawatan').mask("#.##0,00", {reverse: true});
$('#biaya_warehouse').mask("#.##0,00", {reverse: true});
$('#biaya_depresiasi').mask("#.##0,00", {reverse: true});

$(function(){
    
    //fungsi untuk memanggil sweetalert
    function notifikasi(message, type) {
		var mixin = Swal.mixin({
			toast : true,
			position : 'top-end',
			showCloseButton : true,
			showConfirmButton : false,
			timer : 3000
		});
		mixin.fire({
			type : type,
			title : message
		});
	}
    //fungsi untuk menampilkan angka dengan pemisah ribuan (.) dan desimal dengan (,)
    //fungsi ini akan mengembalikan nilai sebanyak 2 digit di belakang koma
    function formatNumber(num) {
        return (
          num.toFixed(2).replace('.', ',').replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')
        ) 
    } 

    //untuk market share ketika diklik/change untuk prosentase
    $("#marketsize").keyup(function() {
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

        //validasi form supaya terisi
        $('#modal').attr('required', true);
        $('#sukubunga').attr('required', true);
        $('#marketsize').attr('required', true);
        $('#qty').attr('required', true);
        $('#discount_factor').attr('required', true);

        //validasi cek isi
        const _modal = $('#modal');
        const _sukubunga = $('#sukubunga');
        const _marketsize = $('#marketsize');
        const _qty = $('#qty');
        const _discount_factor = $('#discount_factor');
        //
        let v_modal = checkEmpty(_modal);
        let v_sukubunga = checkEmpty(_sukubunga);
        let v_marketsize = checkEmpty(_marketsize);
        let v_qty = checkEmpty(_qty);
        let v_discount_factor = checkEmpty(_discount_factor);
        if(!v_modal && !v_sukubunga && !v_marketsize && !v_qty && !v_discount_factor){
            var inventor = $('#inventor').val();
            var periode = $("#periode option:selected").attr("value");
            var modal = $('#modal').val();
            var sukubunga = $('#sukubunga').val();
            var marketsize = $('#marketsize').val();
            var marketshare = $("#marketshare option:selected").attr("value");
            var qty = $('#qty').val();
            var discount_factor = $('#discount_factor').val();
            
            //masukkan variabel ke dalam session storage
            sessionStorage.setItem("inventor", inventor);
            sessionStorage.setItem("periode", periode);
            sessionStorage.setItem("modal", modal);
            sessionStorage.setItem("sukubunga", sukubunga);
            sessionStorage.setItem("marketsize", marketsize);
            sessionStorage.setItem("marketshare", marketshare);
            sessionStorage.setItem("qty", qty);
            sessionStorage.setItem("discount_factor", discount_factor);
            //siapkan data untuk dikirim ke AJAX
            let session_data = {
                'inventor' : inventor,
                'periode' : periode,
                'modal' : modal,
                'sukubunga' : sukubunga,
                'marketsize' : marketsize,
                'marketshare' : marketshare,
                'qty' : qty,
                'discount_factor' : discount_factor
            }
            loader.show();
            $.ajax({
                url : web_url + '/incomebased/data_halaman1',
                type : 'POST',
                cache : true,
                data : session_data,
                success : function(respon){
                    console.log(respon);
                    loader.hide();
                    window.location.replace(web_url + '/manage/add/incomebased_calculator2');
                }
            });        
        }else{
            //alert('Please check input field');
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                type: 'error',
                title: 'Periksa Kembali Parameter Input Data'
            })
        }
    })

    //ketika tombol dari halaman 2 ke halaman 3 diklik
    tombol2_kehalaman3.on('click', function(){ 
        //validasi form supaya terisi
        $('#target').attr('required', true);
        $('#marketshare_persen').attr('required', true);
        $('#qty_tahun1').attr('required', true);
        $('#marketshare_tahun2').attr('required', true);
        $('#biaya_cogs').attr('required', true);
        $('#harga_tahun1').attr('required', true);
        $('#harga_tahun2').attr('required', true);

        //validasi cek isi
        const _target = $('#target');
        const _marketshare_persen = $('#marketshare_persen');
        const _qty_tahun1 = $('#qty_tahun1');
        const _marketshare_tahun2 = $('#marketshare_tahun2');
        const _biaya_cogs = $('#biaya_cogs');
        const _harga_tahun1 = $('#harga_tahun1');
        const _harga_tahun2 = $('#harga_tahun2');

        //
        let v_target = checkEmpty(_target);
        let v_marketshare_persen = checkEmpty(_marketshare_persen);
        let v_qty_tahun1 = checkEmpty(_qty_tahun1);
        let v_marketshare_tahun2 = checkEmpty(_marketshare_tahun2);
        let v_biaya_cogs = checkEmpty(_biaya_cogs);
        let v_harga_tahun1 = checkEmpty(_harga_tahun1);
        let v_harga_tahun2 = checkEmpty(_harga_tahun2);

        if(!v_target && !v_marketshare_persen && !v_qty_tahun1 && !v_marketshare_tahun2 && !v_biaya_cogs && !v_harga_tahun1 && !v_harga_tahun2){     
            //inisilasiasi variabel
            var target = $('#target').val();
            var marketshare_persen = $("#marketshare_persen").val();
            var qty_tahun1 = $('#qty_tahun1').val();
            var marketshare_tahun2 = $('#marketshare_tahun2').val();
            var biaya_cogs = $('#biaya_cogs').val();
            var harga_tahun1 = $('#harga_tahun1').val();
            var harga_tahun2 = $("#harga_tahun2").val();
            //masukkan variabel ke dalam session storage
            sessionStorage.setItem("target", target);
            sessionStorage.setItem("marketshare_persen", marketshare_persen);
            sessionStorage.setItem("qty_tahun1", qty_tahun1);
            sessionStorage.setItem("marketshare_tahun2", marketshare_tahun2);
            sessionStorage.setItem("biaya_cogs", biaya_cogs);
            sessionStorage.setItem("harga_tahun1", harga_tahun1);
            sessionStorage.setItem("harga_tahun2", harga_tahun2);
            //siapkan data untuk dikirim ke AJAX
            let session_data = {
                'target' : target,
                'marketshare_persen' : marketshare_persen,
                'qty_tahun1' : qty_tahun1,
                'marketshare_tahun2' : marketshare_tahun2,
                'biaya_cogs' : biaya_cogs,
                'harga_tahun1' : harga_tahun1,
                'harga_tahun2' : harga_tahun2
            }
            loader.show();
            $.ajax({
                url : web_url + '/incomebased/data_halaman2',
                type : 'POST',
                cache : true,
                data : session_data,
                success : function(respon){
                    console.log(respon);
                    loader.hide();
                    window.location.replace(web_url + '/manage/add/incomebased_calculator3');
                }
            }); 
        }else{
            //alert('Please check input field');
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                type: 'error',
                title: 'Periksa Kembali Parameter Input Data'
            })
        }       
    })

    //ketika tombol dari halaman 3 diklik
    tombol3_kehalaman3.on('click', function(){ 
        $('#biaya_investasi').attr('required', true);
        $('#biaya_riset').attr('required', true);
        $('#biaya_lisensi').attr('required', true);
        $('#persen_lisensi').attr('required', true);        
        $('#biaya_tetap').attr('required', true);
        $('#biaya_marketing').attr('required', true);
        $('#biaya_perawatan').attr('required', true);
        $('#biaya_warehouse').attr('required', true);
        $('#biaya_depresiasi').attr('required', true);

        //validasi cek isi
        const _biaya_investasi = $('#biaya_investasi');
        const _biaya_riset = $('#biaya_riset');
        const _biaya_lisensi = $('#biaya_lisensi');
        const _persen_lisensi = $('#persen_lisensi');        
        const _biaya_tetap = $('#biaya_tetap');
        const _biaya_marketing = $('#biaya_marketing');
        const _biaya_perawatan = $('#biaya_perawatan');
        const _biaya_warehouse = $('#biaya_warehouse');
        const _biaya_depresiasi = $('#biaya_depresiasi');

        //
        let v_biaya_investasi = checkEmpty(_biaya_investasi);
        let v_biaya_riset = checkEmpty(_biaya_riset);
        let v_biaya_lisensi = checkEmpty(_biaya_lisensi);
        let v_persen_lisensi = checkEmpty(_persen_lisensi);        
        let v_biaya_tetap = checkEmpty(_biaya_tetap);
        let v_biaya_marketing = checkEmpty(_biaya_marketing);
        let v_biaya_perawatan = checkEmpty(_biaya_perawatan);
        let v_biaya_warehouse = checkEmpty(_biaya_warehouse);
        let v_biaya_depresiasi = checkEmpty(_biaya_depresiasi);

        if(!v_biaya_tetap && !v_biaya_investasi && !v_biaya_depresiasi && !v_biaya_riset && !v_biaya_lisensi && !v_persen_lisensi && !v_biaya_marketing && !v_biaya_perawatan && !v_biaya_warehouse){
            //inisilasiasi variabel
            var biaya_investasi = $('#biaya_investasi').val();
            var biaya_riset = $("#biaya_riset").val();
            var biaya_lisensi = $('#biaya_lisensi').val();
            var persen_lisensi = $('#persen_lisensi').val();        
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
                'biaya_tetap' : biaya_tetap,
                'biaya_marketing' : biaya_marketing,
                'biaya_perawatan' : biaya_perawatan,
                'biaya_warehouse' : biaya_warehouse,
                'biaya_depresiasi' : biaya_depresiasi
            }
            loader.show();
            $.ajax({
                url : web_url + '/incomebased/data_halaman3',
                type : 'POST',
                cache : true,
                data : session_data,
                success : function(respon){
                    console.log(respon);
                    loader.hide();
                    window.location.replace(web_url + '/manage/add/incomebased_output');
                }
            });        
        }else{
            //alert('Please check input field');
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000
            });

            Toast.fire({
                type: 'error',
                title: 'Periksa Kembali Parameter Input Data'
            })
        }
    })    
});