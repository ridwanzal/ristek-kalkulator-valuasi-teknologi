<?php
//echo print_r($sikav_discount_factor);
//ambil beberapa session yang telah didefinisikan sebelumnya pada input parameter halaman 1,2, dan 3
//untuk dilakukan proses perhitungan menggunakan metode incomebased
($this->session->userdata('periode')!==null) ? $periode = $this->session->userdata('periode'): $periode=0.00;
($this->session->userdata('modal')!==null) ? $modal = $this->session->userdata('modal'): $modal=0.00;
($this->session->userdata('sukubunga')!==null) ? $sukubunga = $this->session->userdata('sukubunga'): $sukubunga=0.00;
($this->session->userdata('marketsize')!=null) ? $marketsize = $this->session->userdata('marketsize'): $marketsize=0.00;
($this->session->userdata('marketshare')!=null) ? $marketshare = $this->session->userdata('marketshare'): $marketshare=null;
($this->session->userdata('pagu_maksimal')!=null) ? $pagu_maksimal = $this->session->userdata('pagu_maksimal'): $pagu_maksimal=0.00;
($this->session->userdata('discount_factor')!==null) ? $discount_factor = $this->session->userdata('discount_factor'): $discount_factor=0.00;

//variabel dari halaman 2
($this->session->userdata('target')!=null) ? $target = $this->session->userdata('target'): $target=null;
($this->session->userdata('marketshare_persen')!=null) ? $marketshare_persen = $this->session->userdata('marketshare_persen'): $marketshare_persen=null;
($this->session->userdata('qty_tahun1')!=null) ? $qty_tahun1 = $this->session->userdata('qty_tahun1'): $qty_tahun1=null;
($this->session->userdata('marketshare_tahun2')!=null) ? $marketshare_tahun2 = $this->session->userdata('marketshare_tahun2'): $marketshare_tahun2=null;
($this->session->userdata('biaya_cogs')!=null) ? $biaya_cogs = $this->session->userdata('biaya_cogs'): $biaya_cogs=null;
($this->session->userdata('harga_tahun1')!=null) ? $harga_tahun1 = $this->session->userdata('harga_tahun1'): $harga_tahun1=null;
($this->session->userdata('harga_tahun2')!=null) ? $harga_tahun2 = $this->session->userdata('harga_tahun2'): $harga_tahun2=null;

// ($this->session->userdata('target')!==null) ? $target = $this->session->userdata('target'): $target=0.00;
// ($this->session->userdata('qty_tahun1')!==null) ? $qty_tahun1 = $this->session->userdata('qty_tahun1'): $qty_tahun1=0.00;
// ($this->session->userdata('marketshare_tahun2')!==null) ? $marketshare_tahun2 = $this->session->userdata('marketshare_tahun2'): $marketshare_tahun2=0.00;
// ($this->session->userdata('harga_tahun1')!==null) ? $harga_tahun1 = $this->session->userdata('harga_tahun1'): $harga_tahun1=0.00;
// ($this->session->userdata('harga_tahun2')!==null) ? $harga_tahun2 = $this->session->userdata('harga_tahun2'): $harga_tahun2=0.00;

//variabel dari halaman 3
($this->session->userdata('biaya_investasi')!==null) ? $biaya_investasi = $this->session->userdata('biaya_investasi'): $biaya_investasi=0.00;
($this->session->userdata('biaya_riset')!==null) ? $biaya_riset = $this->session->userdata('biaya_riset'): $biaya_riset=0.00;
($this->session->userdata('biaya_lisensi')!==null) ? $biaya_lisensi = $this->session->userdata('biaya_lisensi'): $biaya_lisensi=0.00;
($this->session->userdata('persen_lisensi')!==null) ? $persen_lisensi = $this->session->userdata('persen_lisensi'): $persen_lisensi=0.00;
($this->session->userdata('biaya_cogs')!==null) ? $biaya_cogs = $this->session->userdata('biaya_cogs'): $biaya_cogs=0.00;
($this->session->userdata('biaya_tetap')!==null) ? $biaya_tetap = $this->session->userdata('biaya_tetap'): $biaya_tetap=0.00;
($this->session->userdata('biaya_marketing')!==null) ? $biaya_marketing = $this->session->userdata('biaya_marketing'): $biaya_marketing=0.00;
($this->session->userdata('biaya_perawatan')!==null) ? $biaya_perawatan = $this->session->userdata('biaya_perawatan'): $biaya_perawatan=0.00;
($this->session->userdata('biaya_warehouse')!==null) ? $biaya_warehouse = $this->session->userdata('biaya_warehouse'): $biaya_warehouse=0.00;
($this->session->userdata('biaya_depresiasi')!==null) ? $biaya_depresiasi = $this->session->userdata('biaya_depresiasi'): $biaya_depresiasi=0.00;

//inisialisasi variabel untuk perhitungan proyeksi
$periode = get_numeric($periode);
$modal = get_numeric($modal);
$sukubunga = get_numeric($sukubunga);
$marketsize = get_numeric($marketsize);
$marketshare = get_numeric($marketshare);
$pagu_maksimal = get_numeric($pagu_maksimal);
$discount_factor = get_numeric($discount_factor);
//
$target = get_numeric($target);
$marketshare_persen = get_numeric($marketshare_persen);
$qty_tahun1 = get_numeric($qty_tahun1);
$marketshare_tahun2 = get_numeric($marketshare_tahun2);
$biaya_cogs = get_numeric($biaya_cogs);
$harga_tahun1 = get_numeric($harga_tahun1);
$harga_tahun2 = get_numeric($harga_tahun2);
//
$biaya_investasi = get_numeric($biaya_investasi);
$biaya_riset = get_numeric($biaya_riset);
$biaya_lisensi = get_numeric($biaya_lisensi);
$persen_lisensi = get_numeric($persen_lisensi);
$biaya_tetap = get_numeric($biaya_tetap);
$biaya_marketing = get_numeric($biaya_marketing);
$biaya_perawatan = get_numeric($biaya_perawatan);
$biaya_warehouse = get_numeric($biaya_warehouse);
$biaya_depresiasi = get_numeric($biaya_depresiasi);

//echo "<script>alert(".$harga_tahun2.")</script>";
//fungsi untuk menampilkan angka dalam rupiah
function rupiah($angka){
	$hasil_rupiah = number_format($angka,2,',','.');
	return $hasil_rupiah;
}
//fungsi membuat titik (.) dan mengganti koma (,) dengan titik(.) kemudian jika ada persen (%) dibuang
function get_numeric($angka){
    $angka= str_replace(".", "", $angka);
    $angka= str_replace(",", ".", $angka);
    $angka= str_replace("%", "", $angka);
    return $angka;
}

//perhitungan variabel proyeksi
$indeks = $periode;
$arr_modal = array();
$arr_biaya_investasi = array();
$arr_biaya_riset = array();
$arr_qty_tahun1 = array();
$arr_biaya_lisensi = array();
$arr_biaya_cogs = array();
$arr_biaya_tetap = array();
$arr_biaya_marketing = array();
$arr_biaya_perawatan = array();
$arr_biaya_warehouse = array();
$arr_biaya_depresiasi = array();

//variabel dummy untuk cashflow.volume
$qty = array();
for($q=1;$q<=$indeks;$q++){
    if($q==1){
        $qty[$q] = $qty_tahun1;
    }else{
        $qty[$indeks-($indeks-$q)] = ($marketshare_tahun2/100) * $target;
    }
}

//variabel dummy untuk cashflow.harga
$harga = array();
for($h=1;$h<=$indeks;$h++){
    if($h==1){
        $harga[$h] = $harga_tahun1;
    }else{
        $harga[$indeks-($indeks-$h)] = $harga[$h-1] * ($harga_tahun2/100);
    }
}

//variabel dummy cashflow.total cash received
$total_cash_received = array();
for($t=1;$t<=$indeks;$t++){
    $total_cash_received[$indeks-($indeks-$t)] = $qty[$t] * $harga[$t];
}

//variabel dummy cashflow.biaya_lisensi
$lisensi = array();
for($l=1;$l<=$indeks;$l++){
    if($l==1){
        $lisensi[$l] = $biaya_lisensi;
    }elseif($l==2){
        $lisensi[$l] = $biaya_lisensi-($biaya_lisensi*(15/100)); 
    }else{
        $lisensi[$indeks-($indeks-$l)] = $biaya_lisensi-($biaya_lisensi*(50/100));
    }
}
//jumlahkan isi array lisensi
$total_lisensi = array_sum($lisensi);

//variabel dummy cashflow.biaya_cogs
$cogs = array();
for($c=1;$c<=$indeks;$c++){
    if($c==1){
        $cogs[$c] = $biaya_cogs*$qty[$c];
    }elseif($c==2){
        $cogs[$c] = $biaya_cogs*($harga_tahun2/100)*$qty[$c]; 
    }else{
        $cogs[$indeks-($indeks-$c)] = $cogs[$c-1]*($harga_tahun2/100);
    }
}

//variabel dummy cashflow.biaya_tetap
$tetap = array();
for($t=1;$t<=$indeks;$t++){
    if($t==1){
        $tetap[$t] = $biaya_tetap*12;
    }else{
        $tetap[$t] = $tetap[$t-1]*($harga_tahun2/100); 
    }
}

//variabel dummy cashflow.biaya_marketing
$marketing = array();
for($m=1;$m<=$indeks;$m++){
    $marketing[$m] = $cogs[$m]*($biaya_marketing/100);
}

//variabel dummy cashflow.biaya_perawatan
$perawatan = array();
for($p=1;$p<=$indeks;$p++){
    $perawatan[$p] = $biaya_perawatan;
}

//variabel dummy cashflow.biaya_warehouse
$warehouse = array();
for($w=1;$w<=$indeks;$w++){
    $warehouse[$w] = $biaya_warehouse;
}

//variabel dummy cashflow.biaya_depresiasi
$depresiasi = array();
for($d=1;$d<=$indeks;$d++){
    $depresiasi[$d] = $biaya_depresiasi;
}

//variabel dummy cashflow.total_expenditure
$total_expenditure = array();
for($te=1;$te<=$indeks;$te++){
    if($te==1){
        $total_expenditure[$te] = $biaya_investasi+$biaya_riset+$lisensi[$te]+$cogs[$te]+$tetap[$te]+$marketing[$te]+$perawatan[$te]+$warehouse[$te]+$depresiasi[$te];
    }else{
        $total_expenditure[$te] = $lisensi[$te]+$cogs[$te]+$tetap[$te]+$marketing[$te]+$perawatan[$te]+$warehouse[$te]+$depresiasi[$te];
    }    
}

//variabel dummy cashflow.surplus
$surplus = array();
for($i=1;$i<=$indeks;$i++){
    $surplus[$i] = $total_cash_received[$i]-$total_expenditure[$i];   
}

//variabel dummy cashflow.investment_capital
$investment_capital = $biaya_investasi+$biaya_riset+$total_lisensi;

//variabel dummy cashflow.investment_capital
$working_capital = $modal-$investment_capital;

//variabel dummy cashflow.investment_capital_credit
$investment_capital_credit = array();
for($i=1;$i<=$indeks;$i++){
    $investment_capital_credit[$i] = $investment_capital/$indeks;   
}

//variabel dummy cashflow.working_capital_credit
$working_capital_credit = array();
for($i=1;$i<=$indeks;$i++){
    $working_capital_credit[$i] = $working_capital/$indeks;   
}

//variabel dummy cashflow.interest_investment_capital
$interest_investment_capital = array();
for($i=1;$i<=$indeks;$i++){
    $interest_investment_capital[$i] = ($sukubunga/100)*$investment_capital;
}

//variabel dummy cashflow.angsuran_modal
$angsuran_modal = array();
for($i=1;$i<=$indeks;$i++){
    $angsuran_modal[$i] = $investment_capital_credit[$i]+$working_capital_credit[$i];
}

//variabel dummy cashflow.interest_working_capital
$interest_working_capital = array();
for($i=1;$i<=$indeks;$i++){
    $var0 = $working_capital;
    $var1[$i] = $var0/$indeks;
    if($i==1){
        $var2[$i] = $var0-$var1[$i];
    }else{
        $var2[$i] = $var2[$i-1]-$var1[$i];
    }
    if($i==1){
        $interest_working_capital[$i] = $var0*($sukubunga/100);
    }else{
        $interest_working_capital[$i] = $var2[$i-1]*($sukubunga/100);
    }
}

//variabel dummy cashflow.begining_balance && cashflow.ending_balance
$begining_balance = array();
$ending_balance = array();
for($i=1;$i<=$indeks;$i++){
    if($i==1){
        $begining_balance[$i] = $modal;
        $ending_balance[$i] = $begining_balance[$i]+$surplus[$i]-$investment_capital_credit[$i]-$working_capital_credit[$i]-$interest_investment_capital[$i]-$interest_working_capital[$i];
    }else{
        $begining_balance[$i] = $ending_balance[$i-1];
        $ending_balance[$i] = $begining_balance[$i]+$surplus[$i]-$investment_capital_credit[$i]-$working_capital_credit[$i]-$interest_investment_capital[$i]-$interest_working_capital[$i];
    }
}

//variabel dummy profit_loss.gross_profit
$gross_profit = array();
for($i=1;$i<=$indeks;$i++){
    $gross_profit[$i] = $total_cash_received[$i]-$cogs[$i];
}

//variabel dummy profit_loss.ebitda
$ebitda = array();
for($i=1;$i<=$indeks;$i++){
    $ebitda[$i] = $total_cash_received[$i]-$cogs[$i]-$tetap[$i]-$marketing[$i]-$warehouse[$i];
}

//variabel dummy profit_loss.ebit
$ebit = array();
for($i=1;$i<=$indeks;$i++){
    $ebit[$i] = $ebitda[$i]-$depresiasi[$i];
}

//variabel dummy profit_loss.interest
$interest = array();
for($i=1;$i<=$indeks;$i++){
    $interest[$i] = $interest_investment_capital[$i]+$interest_working_capital[$i];
}

//variabel dummy profit_loss.pkp
$pkp = array();
for($i=1;$i<=$indeks;$i++){
    $pkp[$i] = ($ebit[$i]-$interest[$i])-4800000000;
}

//variabel dummy profit_loss.pajak_penjualan
$pajak_penjualan = array();
for($i=1;$i<=$indeks;$i++){
    $pajak_penjualan[$i] = $total_cash_received[$i]*0.025;
}

//variabel dummy profit_loss.pph_badan
$pph_badan = array();
for($i=1;$i<=$indeks;$i++){
    $pagu = 4800000000;
    $pkp_fasilitas[$i] = $pagu*$pkp[$i]/$total_cash_received[$i];
    $pkp_non_fasilitas[$i] = $pkp[$i]-$pkp_fasilitas[$i];
    $fasilitas[$i] = 0.5*0.25*$pkp_fasilitas[$i];
    $non_fasilitas[$i] = 0.25*$pkp_non_fasilitas[$i];
    $pph_badan[$i] = $fasilitas[$i]+$non_fasilitas[$i];
    if($pph_badan[$i]<=0){$pph_badan[$i]=0;}
}

//variabel dummy profit_loss.eat
$eat = array();
for($i=1;$i<=$indeks;$i++){
    $eat[$i] = $ebit[$i]-$interest[$i]-$pajak_penjualan[$i]-$pph_badan[$i];
}

//variabel dummy profit_loss.capital_expenditure
$capital_expenditure = array();
for($i=1;$i<=$indeks;$i++){
    $capital_expenditure[$i] = $angsuran_modal[$i]+$perawatan[$i];
}

//variabel dummy profit_loss.total_expenditure
$total_expenditure = array();
for($i=1;$i<=$indeks;$i++){
    $total_expenditure[$i] = $cogs[$i]+$tetap[$i]+$marketing[$i]+$warehouse[$i]+$depresiasi[$i]+$interest[$i]+$pajak_penjualan[$i]+$pph_badan[$i]+$capital_expenditure[$i];
}

//variabel dummy profit_loss.fcf
$fcf = array();
for($i=1;$i<=$indeks;$i++){
    $fcf[$i] = $eat[$i]+$depresiasi[$i]-$capital_expenditure[$i];
}

//variabel dummy profit_loss.discount (Tabel Discount Factor)
$discount = array();
foreach ($sikav_discount_factor as $object) {
    $discount[] = $object->df;
}
//echo print_r($discount);
//variabel dummy profit_loss.discount_fcf
$discount_fcf = array();
for($i=1;$i<=$indeks;$i++){
    $discount_fcf[$i] = $fcf[$i]*$discount[$i-1];
}

//jumlahkan isi array discount_fcf untuk memperoleh profit_loss.npv
$npv = array_sum($discount_fcf);
//tempatkan nilai NPV dalam session untuk proses penyimpanan
$this->session->set_userdata('sesi_npv', $npv);

//variabel dummy npv.npv2
$npv2 = array();
for($i=1;$i<=$indeks;$i++){
    if($i==1){
        $npv2[$i] = $discount_fcf[$i];
    }else{
        $npv2[$i] = $discount_fcf[$i]+$npv2[$i-1];
    }
}

?>
<div class="container mt-3 mb-3">
    <div class="row mb-3">
        <div class="col-md-12 center">
            <div class="card text-center">
                <div class="card-header bg-info text-white">
                    Identitas Penelitian dan Invensi 
                </div>
                <div class="card-body">
                    <div class="form-group row">                        
                        <label for="inventor" class="col-sm-4 col-form-label text-right">Nama Inventor</label>
                        <div class="col-sm-8">
                            <textarea  class="form-control  form-control-sm col-sm-12" id="inventor" aria-describedby="marketsiezeDesc" readonly><?=$this->session->userdata('sesi_inventor'); ?></textarea>
                            <small id="inventorDesc" class="form-text text-muted text-left">Nama Inventor</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="judul" class="col-sm-4 col-form-label text-right">Judul Invensi</label>
                        <div class="col-sm-8">
                            <textarea  class="form-control  form-control-sm col-sm-12" id="judul" aria-describedby="marketsiezeDesc" readonly><?=$this->session->userdata('sesi_judul'); ?></textarea>
                            <small id="judulDesc" class="form-text text-muted text-left">Judul Invensi</small>
                        </div>
                    </div>
                    <!-- untuk tombol previous next -->
                    <div class="form-group row">                    
                        <div class="col-md-2 text-right">
                        <a href="<?=base_url() ?>manage/add/incomebased_calculator3" id="tombol32" name="tombol32" class="btn btn-xs btn-outline-danger btn-block">Input Parameter</a>
                        </div>
                    <!-- </div> -->
                    <!-- untuk tombol simpan ke DB -->
                    <!-- <div class="form-group row">                     -->
                        <div class="col-md-2 text-right">
                        <!-- variabel untuk dikirim melalui AJAX ke Controller Incomebased.php -->
                        <!-- <input type="hidden" id="f_sinta_id" name="f_sinta_id" value="<?=$npv; ?>"> -->
                        <!-- <input type="hidden" id="f_hki_id" name="f_hki_id" value="<?=$npv; ?>"> -->
                        <!-- <input type="hidden" id="f_hki_inventor" name="f_hki_inventor" value="<?=$npv; ?>"> -->
                        <!-- <input type="hidden" id="f_hki_judul" name="f_hki_judul" value="<?=$npv; ?>"> -->
                        <input type="hidden" id="f_periode" name="f_periode" value="<?=$periode; ?>">
                        <input type="hidden" id="f_modal" name="f_modal" value="<?=$modal; ?>">
                        <input type="hidden" id="f_sukubunga" name="f_sukubunga" value="<?=$sukubunga; ?>">
                        <input type="hidden" id="f_marketsize" name="f_marketsize" value="<?=$marketsize; ?>">
                        <input type="hidden" id="f_marketshare" name="f_marketshare" value="<?=$marketshare; ?>">
                        <input type="hidden" id="f_pagu_maksimal" name="f_pagu_maksimal" value="<?=$pagu_maksimal; ?>">
                        <input type="hidden" id="f_discount_factor" name="f_discount_factor" value="<?=$discount_factor; ?>">
                        <input type="hidden" id="f_target" name="f_target" value="<?=$target; ?>">
                        <input type="hidden" id="f_marketshare_persen" name="f_marketshare_persen" value="<?=$marketshare_persen; ?>">
                        <input type="hidden" id="f_qty_tahun1" name="f_qty_tahun1" value="<?=$qty_tahun1; ?>">
                        <input type="hidden" id="f_marketshare_tahun2" name="f_marketshare_tahun2" value="<?=$marketshare_tahun2; ?>">
                        <input type="hidden" id="f_biaya_cogs" name="f_biaya_cogs" value="<?=$biaya_cogs; ?>">
                        <input type="hidden" id="f_harga_tahun1" name="f_harga_tahun1" value="<?=$harga_tahun1; ?>">
                        <input type="hidden" id="f_harga_tahun2" name="f_harga_tahun2" value="<?=$harga_tahun2; ?>">
                        <input type="hidden" id="f_biaya_investasi" name="f_biaya_investasi" value="<?=$biaya_investasi; ?>">
                        <input type="hidden" id="f_biaya_riset" name="f_biaya_riset" value="<?=$biaya_riset; ?>">
                        <input type="hidden" id="f_biaya_lisensi" name="f_biaya_lisensi" value="<?=$biaya_lisensi; ?>">
                        <input type="hidden" id="f_persen_lisensi" name="f_persen_lisensi" value="<?=$persen_lisensi; ?>">
                        <input type="hidden" id="f_biaya_tetap" name="f_biaya_tetap" value="<?=$biaya_tetap; ?>">
                        <input type="hidden" id="f_biaya_marketing" name="f_biaya_marketing" value="<?=$biaya_marketing; ?>">
                        <input type="hidden" id="f_biaya_perawatan" name="f_biaya_perawatan" value="<?=$biaya_perawatan; ?>">
                        <input type="hidden" id="f_biaya_warehouse" name="f_biaya_warehouse" value="<?=$biaya_warehouse; ?>">
                        <input type="hidden" id="f_biaya_depresiasi" name="f_biaya_depresiasi" value="<?=$biaya_depresiasi; ?>">
                        <input type="hidden" id="f_nilai_npv" name="f_nilai_npv" value="<?=$npv; ?>">
                        <!-- END variabel untuk dikirim melalui AJAX ke Controller Incomebased.php -->
                        <button id="tombol_simpan" name="tombol_simpan" class="btn btn-xs btn-outline-success btn-block">Simpan Kalkulasi</button>
                        <!-- <a href="<?=base_url() ?>incomebased/simpan_kalkulasi" id="tombol_simpan" name="tombol_simpan" class="btn btn-xs btn-outline-success btn-block">Simpan Kalkulasi</a> -->
                        </div>
                        <div class="col-md-4 text-left">
                            <div class="loader"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" href="#cashflow" role="tab" data-toggle="tab">1. Cash Flow</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#profitlost" role="tab" data-toggle="tab">2. Profit Lost</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#npv" role="tab" data-toggle="tab">3. Net Present Value</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">        
        <!-- Tab Cashflow -->
        <div role="tabpanel" class="tab-pane fade" id="cashflow">
            <div class="row mt-3 mb-3">
                <div class="col-md-12 center">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            Proyeksi Cash Flow
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-responsive table-hover table-sm">
                            <thead>
                                <tr class="bg-warning">
                                    <th>Tahun </th>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>Tahun $i</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-warning">
                                    <td>IN FLOW</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td class=\"text-right\">".rupiah($modal)."</td>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($total_cash_received[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Volume</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i>=1){
                                            echo "<td class=\"text-right\">".rupiah($qty[$i])."</td>";
                                        }else{
                                            echo "<th>&nbsp;</th>";
                                        }
                                    }
                                    ?>
                                </tr> 
                                <tr>
                                    <td class="text-left">Harga</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<th>&nbsp;</th>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($harga[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>   
                                <tr class="bg-light">
                                    <td class="text-left">TOTAL CASH RECEIVED</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<th>&nbsp;</th>";
                                        }else{
                                            echo "<td>".rupiah($total_cash_received[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>        
                                <tr>
                                    <td class="text-left">Modal Pinjaman</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td>".rupiah($modal)."</td>";
                                        }else{
                                            echo "<td>&nbsp;</td>";
                                        }
                                    }
                                    ?>
                                </tr>  
                                <tr>
                                    <td class="text-left">Investment Capital</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td>".rupiah($investment_capital)."</td>";
                                        }else{
                                            echo "<td>&nbsp;</td>";
                                        }
                                    }
                                    ?>
                                </tr>    
                                <tr>
                                    <td class="text-left">Working Capital</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td>".rupiah($working_capital)."</td>";
                                        }else{
                                            echo "<td>&nbsp;</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left bg-light">OutFlow</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<td>&nbsp;</td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Machine+vehicle+equipment</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if(($i==0)||($i==1)){
                                            echo "<td class=\"text-right\">".rupiah($biaya_investasi)."</td>";
                                        }else{
                                            echo "<td class=\"text-right\">&nbsp;</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Riset</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if(($i==0)||($i==1)){
                                            echo "<td class=\"text-right\">".rupiah($biaya_riset)."</td>";
                                        }else{
                                            echo "<td class=\"text-right\">&nbsp;</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Biaya Perizinan dan Legalitas</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td class=\"text-right\">".rupiah($total_lisensi)."</td>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($lisensi[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-left">Operating Expense</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">COGS</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td class=\"text-right\">&nbsp;</td>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($cogs[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Fixed Cost</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td class=\"text-right\">&nbsp;</td>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($tetap[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Marketing</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td class=\"text-right\">&nbsp;</td>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($marketing[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Maintenance</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td class=\"text-right\">&nbsp;</td>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($perawatan[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Biaya sewa aset (warehouse)</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td class=\"text-right\">&nbsp;</td>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($warehouse[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Depreciation</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td class=\"text-right\">&nbsp;</td>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($depresiasi[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-left">TOTAL EXPENDITURE</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td class=\"text-right\">&nbsp;</td>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($total_expenditure[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-left">Surplus</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<td class=\"text-right\">".rupiah($modal)."</td>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($surplus[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-left">Cash Flow Finance</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Installment Invest. Cap. Credit</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<th>&nbsp;</th>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($investment_capital_credit[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Installment Working Cap. Credit</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<th>&nbsp;</th>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($working_capital_credit[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Interest Investment Cap </td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<th>&nbsp;</th>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($interest_investment_capital[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Interest Working Cap </td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<th>&nbsp;</th>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($interest_working_capital[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Angsuran Modal </td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<th>&nbsp;</th>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($angsuran_modal[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-left">Beginning Balance</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<th>".rupiah($modal)."</th>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($begining_balance[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-left">Ending Balance</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        if($i==0){
                                            echo "<th>".rupiah($modal)."</th>";
                                        }else{
                                            echo "<td class=\"text-right\">".rupiah($ending_balance[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab Cashflow END-->
        <!-- Tab Profit Lost -->
        <div role="tabpanel" class="tab-pane fade" id="profitlost">
        <div class="row mt-3 mb-3">
                <div class="col-md-12 center">
                    <div class="card text-center">
                        <div class="card-header bg-success text-white">
                            PROYEKSI PROFIT - LOSS
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-responsive table-hover table-sm">
                            <thead>
                                <tr class="bg-success">
                                    <th>Tahun </th>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>Tahun $i</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-success">
                                    <td>KOMPONEN</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";                                        
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Sales (Penjualan)</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($total_cash_received[$i])."</td>";
                                    }
                                    ?>                                    
                                </tr> 
                                <tr>
                                    <td class="text-left">COGs</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($cogs[$i])."</td>";
                                    }
                                    ?>
                                </tr>   
                                <tr class="bg-secondary text-white">
                                    <td class="text-center">Gross Profit</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($gross_profit[$i])."</td>";
                                    }
                                    ?>
                                </tr>        
                                <tr>
                                    <td class="text-left">Fixed Cost</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($tetap[$i])."</td>";
                                    }
                                    ?>
                                </tr>  
                                <tr>
                                    <td class="text-left">Marketing</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($marketing[$i])."</td>";
                                    }
                                    ?>
                                </tr>    
                                <tr>
                                    <td class="text-left">Biaya sewa aset (warehouse)</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($warehouse[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-secondary text-white">
                                    <td class="text-center">Operation Profit (EBITDA)</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($ebitda[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Depresiasi</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($depresiasi[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-secondary text-white">
                                    <td class="text-center">EBIT</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($ebit[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Interest</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($interest[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-secondary text-white">
                                    <td class="text-center">Penghasilan Kena Pajak</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($pkp[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Pajak Penjualan 2.5%</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($pajak_penjualan[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">PPH Badan</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        if($pph_badan[$i]<=0){
                                            echo "<td>".rupiah("0.00")."</td>";
                                        }else{
                                            echo "<td>".rupiah($pph_badan[$i])."</td>";
                                        }
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-secondary text-white">
                                    <td class="text-center">Eearning After Tax (EAT)</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($eat[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Depresiasi</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($depresiasi[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Capital Expenditure</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($capital_expenditure[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-secondary text-white">
                                    <td class="text-center">Total Expenditure</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($total_expenditure[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Net Cash Flow/FCF</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($fcf[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-light">
                                    <td class="text-left">Discount Factor at interest <?=$discount_factor ?></td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".$discount[$i-1]."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-warning text-blue">
                                    <td class="text-center">Discounted FCF</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<td>".rupiah($discount_fcf[$i])."</td>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-success text-white">
                                    <td class="text-left">Net Present Value (NPV)</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        if($i==1){
                                            echo "<td>".rupiah($npv)."</td>";
                                        }else{
                                            echo "<td>&nbsp</td>";
                                        }
                                    }
                                    ?>
                                </tr>                                
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab Profit Lost END-->
        <!-- Tab NPV-->
        <div role="tabpanel" class="tab-pane fade" id="npv">
        <div class="row mt-3 mb-3">
                <div class="col-md-12 center">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            Net Present Value (NPV)
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr class="bg-primary text-white">
                                <th scope="col">Tahun</th>
                                <th scope="col">FCF</th>
                                <th scope="col">Disc Rate</th>
                                <th scope="col">Disc FCF</th>
                                <th scope="col">Cum Disc FCF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php for($i=1;$i<=$periode;$i++){ ?>
                                    <tr>
                                        <th scope="row" class="text-left">Tahun <?=$i ?></th>
                                        <td><?= rupiah($fcf[$i]) ?></td>
                                        <td><?= $discount[$i] ?></td>
                                        <td><?= rupiah($discount_fcf[$i]) ?></td>
                                        <td><?= rupiah($npv2[$i]) ?></td>
                                    </tr> 
                                <?php } ?>           
                                <tr>
                                    <th scope="row" class="text-right" colspan="4">Nilai NPV = </th>
                                    <td class="bg-primary text-white"><?= rupiah($npv) ?></td>
                                </tr>    
                            </tbody>
                            </table>
                            <div class="col-12 text-white text-left bg-info">
                                NPV bermanfaat untuk mengukur kemampuan dan peluang dalam menjalankan investasi hingga beberapa tahun yang akan datang, dikala nilai mata uang berubah dan berdampak pada cash flow. Secara sederhana, NPV adalah perkiraan keuntungan yang didapatkan sebuah usaha dimasa depan jika kita menanamkan modal dengan nilai uang yang sekarang. Sehingga kita bisa memutuskan apakah investasi tersebut layak untuk kita jalankan ataukah tidak.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab NPV END-->
    <!-- Tab panes END-->
    </div>    

</div>
<script type="text/javascript" src="<?php echo base_url('assets/frontview/js/jquery-3.3.1.min.js') ?>"></script>
<script>
    $(document).ready(function(){
        $('.nav-tabs a[href="#profitlost"]').tab('show');
        $('.nav-tabs a[href="#cashflow"]').trigger('click');
        //$('.nav-tabs a[href="#cashflow"]').tab('show');        
        //$('.nav-tabs a[href="#profitlost"]').trigger('click');
    });
</script>