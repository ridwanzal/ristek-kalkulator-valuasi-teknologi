<?php
//ambil beberapa session yang telah didefinisikan sebelumnya pada input parameter halaman 1,2, dan 3
//untuk dilakukan proses perhitungan menggunakan metode incomebased
($this->session->userdata('periode')!==null) ? $periode = $this->session->userdata('periode'): $periode=0.00;
($this->session->userdata('modal')!==null) ? $modal = $this->session->userdata('modal'): $modal=0.00;
($this->session->userdata('sukubunga')!==null) ? $sukubunga = $this->session->userdata('sukubunga'): $sukubunga=0.00;

//variabel dari halaman 2
($this->session->userdata('target')!==null) ? $target = $this->session->userdata('target'): $target=0.00;
($this->session->userdata('qty_tahun1')!==null) ? $qty_tahun1 = $this->session->userdata('qty_tahun1'): $qty_tahun1=0.00;
($this->session->userdata('marketshare_tahun2')!==null) ? $marketshare_tahun2 = $this->session->userdata('marketshare_tahun2'): $marketshare_tahun2=0.00;
($this->session->userdata('harga_tahun1')!==null) ? $harga_tahun1 = $this->session->userdata('harga_tahun1'): $harga_tahun1=0.00;
($this->session->userdata('harga_tahun2')!==null) ? $harga_tahun2 = $this->session->userdata('harga_tahun2'): $harga_tahun2=0.00;
//variabel dari halaman 3
($this->session->userdata('biaya_investasi')!==null) ? $biaya_investasi = $this->session->userdata('biaya_investasi'): $biaya_investasi=0.00;
($this->session->userdata('biaya_riset')!==null) ? $biaya_riset = $this->session->userdata('biaya_riset'): $biaya_riset=0.00;
($this->session->userdata('biaya_lisensi')!==null) ? $biaya_lisensi = $this->session->userdata('biaya_lisensi'): $biaya_lisensi=0.00;
//perhitungan variabel proyeksi
$indeks = $periode;
$arr_modal = array();
$arr_biaya_investasi = array();
$arr_biaya_riset = array();
$arr_qty_tahun1 = array();
$arr_biaya_lisensi = array();

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

//fungsi untuk menampilkan angka dalam rupiah
function rupiah($angka){
	$hasil_rupiah = number_format($angka,2,',','.');
	return $hasil_rupiah;
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
                        <label for="marketsize" class="col-sm-4 col-form-label text-right">Nama Inventor</label>
                        <div class="col-sm-8">
                            <input type="text" value="Air Media Persada" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc" readonly>
                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Nama Pemilik/Lembaga Invensi</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="marketsize" class="col-sm-4 col-form-label text-right">Judul Penelitian/Invensi</label>
                        <div class="col-sm-8">
                            <textarea  class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc" readonly>Prototipe alat pendeteksi kebocoran gas beracun CO pada mobil menggunakan Array Sensor berbasis SMS Gateway</textarea>
                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Judul Penelitian/Invensi</small>
                        </div>
                    </div>
                    <!-- untuk tombol previous next -->
                    <div class="form-group row">                    
                        <div class="col-md-3 text-right">
                        <a href="<?=base_url() ?>manage/add/incomebased_calculator3" id="tombol32" name="tombol32" class="btn btn-warning btn-sm">Kembali Input Parameter Kalkulasi</a>
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
                                        echo "<td>&nbsp;</td>";
                                    }
                                    ?>
                                </tr>    
                                <tr>
                                    <td class="text-left">Working Capital</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<td>&nbsp;</td>";
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
                                    <td class="text-left" style="text-indent: 30px;">License + ISO9001</td>
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
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Fixed Cost</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Marketing</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Maintenance</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Warehouse</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Depreciation</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-left">TOTAL EXPENDITURE</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-left">Surplus</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
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
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Installment Working Cap. Credit</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Interest Investment Cap </td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Interest Working Cap </td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left" style="text-indent: 30px;">Angsuran Modal </td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-left">Beginning Balance</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-warning">
                                    <td class="text-left">Ending Balance</td>
                                    <?php
                                    for($i=0;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
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
                                <tr class="bg-light">
                                    <th>Tahun </th>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>Tahun $i</th>";
                                    }
                                    ?>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="bg-light">
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
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr> 
                                <tr>
                                    <td class="text-left">COGs</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>   
                                <tr class="bg-light">
                                    <td class="text-left">Gross Profit</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>        
                                <tr>
                                    <td class="text-left">Fixed Cost</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>  
                                <tr>
                                    <td class="text-left">Marketing</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>    
                                <tr>
                                    <td class="text-left">Warehouse</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left bg-light">Operation Profit (EBITDA)</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Depresiasi</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left bg-light">EBIT</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Interest</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left bg-light">Penghasilan Kena Pajak</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Pajak Penjualan 2.5%</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">PPH Badan</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left bg-light">Eearning After Tax (EAT)</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Depresiasi</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Capital Expenditure</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left bg-light">Total Expenditure</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Net Cash Flow/FCF</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr>
                                    <td class="text-left">Net Cash Flow/FCF</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-light">
                                    <td class="text-left">Discount Factor at interest rate 10%</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-light">
                                    <td class="text-left">Discounted FCF</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
                                    }
                                    ?>
                                </tr>
                                <tr class="bg-success">
                                    <td class="text-left">Net Present Value (NPV)</td>
                                    <?php
                                    for($i=1;$i<=$periode;$i++){
                                        echo "<th>&nbsp;</th>";
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
                            <table class="table table-bordered table-hover">
                            <thead>
                                <tr class="bg-warning">
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
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr> 
                                <?php } ?>           
                                <tr>
                                    <th scope="row" class="text-right" colspan="4">i</th>
                                    <td class="bg-primary text-white">Nilai NPV</td>
                                </tr>    
                            </tbody>
                            </table>
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