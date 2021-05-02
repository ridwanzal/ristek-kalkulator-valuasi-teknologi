<?php 
    // get session userdata
    $userdetails = $this->session->userdata('userdetails'); 
    // var_dump($record_incomebased);die;

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

    //jika data diambil dari data non SINTA
    foreach ($record_incomebased as $rs_incomebased) {  
        //halaman 1 
        $id = $rs_incomebased->id;
        $sinta_id = $rs_incomebased->sinta_id;
        $hki_id = $rs_incomebased->hki_id;
        $hki_inventor = $rs_incomebased->hki_inventor;
        $hki_judul = $rs_incomebased->hki_judul;
        $periode = $rs_incomebased->periode;
        $modal = $rs_incomebased->modal;
        $sukubunga = $rs_incomebased->sukubunga;
        $marketsize = $rs_incomebased->marketsize;
        $marketshare = $rs_incomebased->marketshare;
        $pagu_maksimal = $rs_incomebased->pagu_maksimal;
        $discount_factor = $rs_incomebased->discount_factor;
        //halaman 2
        $target = $rs_incomebased->target;
        $marketshare_persen = $rs_incomebased->marketshare_persen;
        $qty_tahun1 = $rs_incomebased->qty_tahun1;
        $marketshare_tahun2 = $rs_incomebased->marketshare_tahun2;
        $biaya_cogs = $rs_incomebased->biaya_cogs;
        $harga_tahun1 = $rs_incomebased->harga_tahun1;
        $harga_tahun2 = $rs_incomebased->harga_tahun2;
        //halaman 3
        $biaya_tetap = $rs_incomebased->biaya_tetap;
        $biaya_investasi = $rs_incomebased->biaya_investasi;
        $biaya_depresiasi = $rs_incomebased->biaya_depresiasi;
        $biaya_riset = $rs_incomebased->biaya_riset;
        $biaya_lisensi = $rs_incomebased->biaya_lisensi;
        $persen_lisensi = $rs_incomebased->persen_lisensi;
        $biaya_marketing = $rs_incomebased->biaya_marketing;
        $biaya_perawatan = $rs_incomebased->biaya_perawatan;
        $biaya_warehouse = $rs_incomebased->biaya_warehouse;
        //tanggal
        $tanggal = $rs_incomebased->tanggal;
    }

    //inisialisasi variabel untuk perhitungan proyeksi
    // $periode = get_numeric($periode);
    // $modal = get_numeric($modal);
    // $sukubunga = get_numeric($sukubunga);
    // $marketsize = get_numeric($marketsize);
    // $marketshare = get_numeric($marketshare);
    // $pagu_maksimal = get_numeric($pagu_maksimal);
    // $discount_factor = get_numeric($discount_factor);
    //
    // $target = get_numeric($target);
    // $marketshare_persen = get_numeric($marketshare_persen);
    // $qty_tahun1 = get_numeric($qty_tahun1);
    // $marketshare_tahun2 = get_numeric($marketshare_tahun2);
    // $biaya_cogs = get_numeric($biaya_cogs);
    // $harga_tahun1 = get_numeric($harga_tahun1);
    // $harga_tahun2 = get_numeric($harga_tahun2);
    //
    // $biaya_investasi = get_numeric($biaya_investasi);
    // $biaya_riset = get_numeric($biaya_riset);
    // $biaya_lisensi = get_numeric($biaya_lisensi);
    // $persen_lisensi = get_numeric($persen_lisensi);
    // $biaya_tetap = get_numeric($biaya_tetap);
    // $biaya_marketing = get_numeric($biaya_marketing);
    // $biaya_perawatan = get_numeric($biaya_perawatan);
    // $biaya_warehouse = get_numeric($biaya_warehouse);
    // $biaya_depresiasi = get_numeric($biaya_depresiasi);

    //menentukan nilai inflasi dari harga jual tahun ke - 2
    //dikurangkan dengan 100
    $inflasi = $harga_tahun2 - 100;

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
            //=Simulasi!C38*D5
            $cogs[$c] = $biaya_cogs*$qty[$c];
        }elseif($c==2){
            // =(Simulasi!C38*E5)+((Simulasi!C38*E5)*(Simulasi!F27/100)); formula excel inflasi
            //$cogs[$c] = $biaya_cogs*($harga_tahun2/100)*$qty[$c]; formula lama sebelum inflasi
            $cogs[$c] = ($biaya_cogs*$qty[$c])+(($biaya_cogs*$qty[$c])*($inflasi/100)); 
        }else{
            //=(E17)+(E17*(Simulasi!F27/100)); formula excel inflasi
            //$cogs[$indeks-($indeks-$c)] = $cogs[$c-1]*($harga_tahun2/100); formula lama sebelum inflasi
            $cogs[$indeks-($indeks-$c)] = ($cogs[$c-1])+($cogs[$c-1]*($inflasi/100));
        }
    }

    //variabel dummy cashflow.biaya_tetap
    $tetap = array();
    for($t=1;$t<=$indeks;$t++){
        if($t==1){
            //=Simulasi!C39*12; formula excel inflasi
            $tetap[$t] = $biaya_tetap*12;
        }else{
            //=D18+(D18*(Simulasi!F27/100)); formula excel inflasi
            //$tetap[$t] = $tetap[$t-1]*($harga_tahun2/100); formula lama sebelum inflasi
            $tetap[$t] = $tetap[$t-1]+($tetap[$t-1]*($inflasi/100));
        }
    }

    //variabel dummy cashflow.biaya_marketing
    $marketing = array();
    for($m=1;$m<=$indeks;$m++){
        if($m==1){
            //=D17*(Simulasi!C40/100); formula excel inflasi
            $marketing[$m] = $cogs[$m]*($biaya_marketing/100);
        }else{
            //=(E17*(Simulasi!C40/100))+((E17*(Simulasi!C40/100))*(Simulasi!F27/100)); formula excel inflasi
            $marketing[$m] = ($cogs[$m]*($biaya_marketing/100))+(($cogs[$m]*($biaya_marketing/100))*($inflasi/100));
        }
    }

    //variabel dummy cashflow.biaya_perawatan
    $perawatan = array();
    for($p=1;$p<=$indeks;$p++){
        if($p==1){
            //=Simulasi!C41; formula excel inflasi
            $perawatan[$p] = $biaya_perawatan;
        }else{
            //=D20+(D20*(Simulasi!F27/100)); formula excel inflasi
            //$perawatan[$p] = $biaya_perawatan; formula lama sebelum inflasi
            $perawatan[$p] = $perawatan[$p-1]+($perawatan[$p-1]*($inflasi/100));
        }
    }

    //variabel dummy cashflow.biaya_warehouse
    $warehouse = array();
    for($w=1;$w<=$indeks;$w++){
        if($w==1){
            //=Simulasi!C42; formula excel inflasi
            $warehouse[$w] = $biaya_warehouse;
        }else{
            //=D21+(D21*(Simulasi!F27/100)); formula excel inflasi
            //$warehouse[$w] = $biaya_warehouse; formula lama sebelum inflasi
            $warehouse[$w] = $warehouse[$w-1]+($warehouse[$w-1]*($inflasi/100));
        }
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
    $discount_factor = floatval($discount_factor)."%";
    $sikav_discount_factor = $this->incomebased_model->get_discount_factor_item($discount_factor);
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

<section class="section_main_wrapper">
    <div class="form-element-area">
            <div class="container cost_report" id="income_report_id">
                <div class="row  justify-content-md-center report_container">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                        <center>
                            <h5>LAPORAN</h5>
                            <h5>KALKULATOR VALUASI TEKNOLOGI</h5>
                            <h5>PENDEKATAN METODE INCOME BASED</h5>
                            <?php 
                                $datetime = $tanggal; 
                                $date = explode(" ", $datetime);
                                $dateform = explode("-", $date[0]);
                                $str = date($dateform[0].$dateform[1].$dateform[2]);
                                echo 'Tanggal Kalkulasi : ' .date('d F Y', strtotime($str));
                            ?>
                            <hr/>
                        </center>
                        <br/>
                        <h5>1. Identitas Invensi dan Parameter Proyeksi</h5>
                        <ol>
                            <li>
                                Nama Inventor :  <b><?= $hki_inventor; ?></b>
                            </li>                            
                            <li>
                                Judul Invensi :  <b><?= $hki_judul; ?></b>
                            </li>
                            <li>
                                Periode Proyeksi :  <b><?= $periode; ?> &nbsp; Tahun</b>
                            </li>
                            <li>
                                Modal Awal/Pinjaman Modal :  <b><?= "Rp. " . rupiah($modal); ?></b>
                            </li>
                            <li>
                                Suku Bunga (Interest) Bank :  <b><?= rupiah($sukubunga) . " %"; ?></b>
                            </li>
                            <li>
                                Market Size  :  <b><?= rupiah($marketsize) . " Unit"; ?></b>
                            </li>
                            <li>
                                Market Share  :  <b> 
                                
                                <?php
                                    // var_dump($marketshare);die;
                                    if($marketshare=="persen2"){
                                        echo "Superior/Breakthrough Technology (<=25%)";
                                    }elseif($marketshare=="persen2"){
                                        echo "Improvement Technology (<=15%)";
                                    }else{
                                        echo "Alternative Technology (<=10%)";
                                    }
                                ?>
                                </b>
                            </li>
                            <li>
                                Pagu maksimal jumlah produksi :  <b><?= rupiah($pagu_maksimal) . " Unit"; ?></b>
                            </li>
                            <li>
                                Discount Factor :  <b><?= rupiah((float) $discount_factor) . " %"; ?></b>
                            </li>                            
                        </ol>
                        <h5>2. Proyeksi Penjualan</h5>
                        <ol>
                            <li>
                                Target Produksi :  <b><?= $target . " Unit"; ?></b>
                            </li>
                            <li>
                                Proyeksi Market Share di Tahun Pertama :  <b><?= $marketshare_persen . " %"; ?></b>
                            </li>
                            <li>
                                Jumlah Produk di Tahun Pertama :  <b><?= $qty_tahun1 . " Unit"; ?></b>
                            </li>
                            <li>
                                Proyeksi Market Share mulai Tahun Ke -2 :  <b><?= $marketshare_tahun2 . " %"; ?></b>
                            </li>
                            <li>
                                Biaya Cost of Goods Sold (Biaya Investasi Produk) :  <b><?= "Rp. " . rupiah($biaya_cogs); ?></b>
                            </li>
                            <li>
                                Harga Jual Produk (Tahun Pertama) :  <b><?= "Rp. " . rupiah($harga_tahun1); ?></b>
                            </li>
                            <li>
                                Harga Jual Produk mulai Tahun ke - 2 :  <b><?= $harga_tahun2 . " %"; ?></b>
                            </li>
                        </ol>
                        <h5>3. Proyeksi Biaya Operasional (Operating Expense) </h5>
                        <ol>
                            <li>
                                Biaya Operasional Tetap (Fixed Cost) per bulan :  <b><?= "Rp. " . rupiah($biaya_tetap); ?></b>
                            </li>
                            <li>
                                Biaya Investasi :  <b><?= "Rp. " . rupiah($biaya_investasi); ?></b>
                            </li>
                            <li>
                                Biaya Depresiasi :  <b><?= "Rp. " . rupiah($biaya_depresiasi); ?></b>
                            </li>
                            <li>
                                Biaya Riset dan Pengembangan :  <b><?= "Rp. " . rupiah($biaya_riset); ?></b>
                            </li>
                            <li>
                                Biaya Perizinan dan Legalitas (Tahun Pertama) :  <b><?= "Rp. " . rupiah($biaya_lisensi); ?></b>
                            </li>
                            <li>
                                Biaya Perizinan dan Legalitas mulai tahun ke-2 :  <b><?= $persen_lisensi . " %"; ?></b>
                            </li>
                            <li>
                                Biaya Marketing :  <b><?= $biaya_marketing . " %"; ?></b>
                            </li>
                            <li>
                                Biaya Maintenance (Perawatan) :  <b><?= "Rp. " . rupiah($biaya_perawatan); ?></b>
                            </li>
                            <li>
                                Biaya sewa aset (warehouse) :  <b><?= "Rp. " . rupiah($biaya_warehouse); ?></b>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- Cash Flow -->
                <div class="row justify-content-md-center report_container">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <p class="font-weight-bold">Proyeksi Cash Flow</p>
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
                <!-- Cash Flow End -->
                <!-- Profit - Loss -->
                <div class="row justify-content-md-center report_container">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <p class="font-weight-bold">PROYEKSI PROFIT - LOSS</p>
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
                <!-- Profit Loss End -->
                <!-- NPV -->
                <div class="row justify-content-md-center report_container">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <p class="font-weight-bold">Proyeksi Net Present Value (NPV)</p>
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
                <!-- NPV End -->
            </div>
            <div class="container">
                <div class="row justify-content-md-center export_pdf">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <button id="income_topdf" class="btn btn-primary btn-sm"><ion-icon name="download-outline"></ion-icon>&nbsp;Export PDF</button> 
                    </div>
                </div>
            </div>
        </div>
</section>