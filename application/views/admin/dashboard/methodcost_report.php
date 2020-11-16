<?php 
    // get session userdata
    $userdetails = $this->session->userdata('userdetails'); 
    $costbased_identity = $costbased_identity[0];
    $costbased_identity_lampiran =  json_decode($costbased_identity->lampiran, true);
    // var_dump($costbased_identity_lampiran);die;
    $costbased_nonpaten = $costbased_nonpaten[0];
    $costbased_paten = $costbased_paten;
    $costbased_pateninflasis = $costbased_pateninflasi;
    
    // var_dump($costbased_paten);

    $total_biaya_daftar = 0;
    $total_biaya_substantif = 0;
    $total_biaya_percepatan = 0;
    $total_biaya_proses_lain = 0;
    $hasil = 0;
    echo '<pre>';   
    // var_dump($costbased_identity);die;
    echo '</pre>';

    function format_money($money){
        return number_format($money, 2, ",", ".");
    }

?>

<section class="section_main_wrapper">
    <div class="form-element-area">
            <div class="container cost_report" id="cost_report_id">
                <div class="row  justify-content-md-center report_container">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">   
                        <center>
                            <h5>Laporan</h5>
                            <h5>KALKULATOR VALUASI TEKNOLOGI</h5>
                            <h5>Pendekatan Biaya untuk menghitung nilai Aset Tak Berwujud berupa Paten (ATB-P)</h5>
                            <hr/>
                        </center>
                        <br/>
                        <h5>A. Identitas Penelitian dan Invensi</h5>
                        <ol>
                            <li>
                                Nama Inventor :  <b><?= $costbased_identity->nama_inventor; ?></b>
                            </li>
                            <li>
                                Institusi Penghasil/Pemilik Invensi :  <b><?= $costbased_identity->institusi; ?></b>
                            </li>
                            <li>
                                Unit Kerja Penghasil/Pemilik Invensi : <b><?= $costbased_identity->unit_kerja; ?></b>
                            </li>
                            <li>
                                Judul Penelitian :  <b><?= $costbased_identity->judul_penelitian; ?></b>
                            </li>
                            <li>
                                Total Biaya Masukan/Realisasi Pagu Penelitian (R): Rp :  <b><?= format_money($costbased_identity->total_biaya); ?></b>
                            </li>
                            <li>
                                Asal Biaya Masukan Masukan/Realisasi Pagu Penelitian, misal Hibah Ristek, Dikti
                                Kemendikbud, dll:  <b><?= $costbased_identity->asal_biaya; ?></b>
                            </li>
                            <li>
                                Luaran Penelitian: 
                                <div class="report_list">Luaran Penelitian Non Paten</div>
                                <ul>
                                    <li>
                                        Publikasi pada jurnal internasional = <b><?= $costbased_nonpaten->pub_internasional; ?></b>
                                    </li>
                                    <li>
                                        Publikasi pada jurnal nasional = <b><?= $costbased_nonpaten->pub_nasional; ?></b>
                                    </li>
                                    <li>
                                        Buku internasional = <b><?= $costbased_nonpaten->buku_internasional; ?></b>
                                    </li>
                                    <li>
                                        Buku nasional = <b><?= $costbased_nonpaten->buku_nasional; ?></b>
                                    </li>
                                    <li>
                                        Publikasi pada prosiding internasional = <b><?= $costbased_nonpaten->pub_prod_internasional; ?></b>
                                    </li>
                                    <li>
                                        Publikasi pada prosiding nasional = <b><?= $costbased_nonpaten->pub_prod_nasional; ?></b>
                                    </li>
                                </ul>
                                <div class="report_list">Luaran Penelitian Paten</div>
                                <ol>
                                    <?php 
                                        $i = 0;
                                        foreach($costbased_paten as $item){
                                            $i = $i + 1;
                                    ?>
                                    <li>
                                        Judul Invensi: <b><?= $item->judul_invensi; ?></b>
                                        <div class="report_list">Jenis Paten: &nbsp;
                                        <?php
                                            if($item->sertifikat != ''){
                                                ?>
                                                    <b>Paten</b>
                                                <?php
                                            }else{
                                                ?>
                                                    <b>Paten Sederhana</b>
                                                <?php
                                            }
                                        ?>
                                        </div>
                                        <div class="report_list">Status Permohonan:&nbsp;
                                        <?php
                                            if($item->status_permohonan == 'tersertifikasi'){
                                                ?>
                                                    <b>Tersertifikasi</b>
                                                <?php
                                            }else{
                                                ?>
                                                    <b>Terdaftar</b>
                                                <?php
                                            }
                                        ?>
                                        </div>
                                        <div class="report_list">Nomor Pendaftaran (Permohonan):&nbsp;<b><?php echo $item->no_pendaftaran;?></b></div>
                                        <div class="report_list">Nomor Sertifikat Paten/Paten Sederhana (jika sudah granted):&nbsp;<b><?php echo $item->sertifikat;?></b></div>
                                        <div class="report_list">Asal Biaya Pendaftaran (Permohonan) Paten :&nbsp;<b><?php echo $item->asal_biaya_pendaftaran;?></b></div>
                                            <br/>
                                    </li>
                                    <?php
                                        }
                                    ?>
                                </ol>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="row justify-content-md-center report_container">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <p class="font-weight-bold">B. Nilai Keluaran Penelitian Berupa Paten (Ki)</p>
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Luaran Penelitian</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Bobot</th>
                                        <th scope="col">Total Bobot</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><b>A.</b></td>
                                        <td><b>Luaran Penelitian Non Paten</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td>1.</td>
                                        <td>Publikasi pada jurnal internasional</td>
                                        <td id="pub_np_int"><?= $costbased_nonpaten->pub_internasional; ?></td>
                                        <td>40</td>
                                        <td id="pub_np_int_total"><?php echo '' .intval($costbased_nonpaten->pub_internasional) * 40;?></td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Publikasi pada jurnal nasional</td>
                                        <td id="pub_np_ns"><?= $costbased_nonpaten->pub_nasional; ?></td>
                                        <td>25</td>
                                        <td id="pub_np_ns_total"><?php echo '' .intval($costbased_nonpaten->pub_nasional) * 25;?></td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Buku Internasional</td>
                                        <td id="buk_np_int"><?= $costbased_nonpaten->buku_internasional; ?></td>
                                        <td>40</td>
                                        <td id="buk_np_int_total"><?php echo '' .intval($costbased_nonpaten->pub_nasional) * 40;?></td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Buku Nasional</td>
                                        <td id="buk_np_ns"><?= $costbased_nonpaten->buku_nasional; ?></td>
                                        <td>30</td>
                                        <td id="buk_np_ns_total"><?php echo '' .intval($costbased_nonpaten->pub_nasional) * 30;?></td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Publikasi pada prosiding internasional</td>
                                        <td id="pub_prod_np_int"><?= $costbased_nonpaten->pub_prod_internasional; ?></td>
                                        <td>25</td>
                                        <td id="pub_prod_np_int_total"><?php echo '' .intval($costbased_nonpaten->pub_prod_internasional) * 25;?></td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Publikasi pada prosiding nasional</td>
                                        <td id="pub_prod_np_ns"><?= $costbased_nonpaten->pub_prod_nasional; ?></td>
                                        <td>10</td>
                                        <td id="pub_prod_np_ns_total"><?php echo '' .intval($costbased_nonpaten->pub_prod_nasional) * 10;?></td>
                                    </tr>
                                    <tr style="background : #f1f1f1 !important;">
                                        <td></td>
                                        <td><b>Total bobot keluaran penelitian non paten (&Sigma;Qi)</b></td>
                                        <td></td>
                                        <td></td>
                                        <td style="font-weight:bold;" id="np_total_bobot"><?php echo '' .intval($costbased_identity->qi);?></td>
                                    </tr>
                                    <tr class="luaran_penelitan_title">
                                        <td><b>B.</b></td>
                                        <td><b>Luaran Penelitian Paten</b></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tbody class="luaran_paten_list">
                                    
                                    </tbody>
                                    <?php
                                        $x = 0;
                                        foreach($costbased_paten as $item){
                                            $x = $x + 1;
                                            ?>
                                                <tr>
                                                    <td><?php echo $x; ?></td>
                                                    <td><?php echo $item->judul_invensi;?></td>
                                                    <td><?php echo '1';?></td>
                                                    <td><?php echo $item->bobot;?></td>
                                                    <td><?php echo $item->total_bobot;?></td>
                                                </tr>
                                            <?php
                                        }
                                    ?>
                                    <tr style="background : #f1f1f1 !important;">
                                        <td></td>
                                        <td><b>Total bobot keluaran penelitian non paten (&Sigma;Ti)</b></td>
                                        <td></td>
                                        <td></td>
                                        <td style="font-weight:bold;" id="p_total_bobot"><?php echo '' .intval($costbased_identity->ti);?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <br/>
                            <div class="report_list">Nilai total bobot keluaran penelitian berupa paten (&Sigma;Ti) = <span id="out_paten"><?php echo '' .intval($costbased_identity->ti);?></span></div>
                            <div class="report_list">Nilai total bobot keluaran penelitian non paten (&Sigma;Qi) = <span id="out_nonpaten"><?php echo '' .intval($costbased_identity->qi);?></span></div>
                            <div class="report_list">Nilai realisasi pagu (R) = Rp. <span id="out_pagu"><?php echo '' .format_money(intval($costbased_identity->total_biaya));?></span></div>
                            <div class="report_list">Nilai keluaran untuk masing-masin Paten : </div>
                            <ul id="out_ki_list">
                                <?php
                                    foreach($costbased_paten as $itemx){
                                        $y = intval($itemx->total_bobot) / (intval($costbased_identity->qi + intval($costbased_identity->ti)));
                                        $ki_list = $y * $costbased_identity->total_biaya;
                                        ?>
                                            <li><?php echo $itemx->jenis_paten .' '. $item->status_permohonan; ?> : Rp.<?php echo format_money($ki_list);?></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                            <div class="report_list">Total Nilai Keluaran Penelitian Berupa Paten (Ki = &Sigma;Ti / (&Sigma;Ti+&Sigma;Qi)× R) = Rp. <span id="out_ki"><?php echo '' .format_money($costbased_identity->ki);?></span></div>
                            <br/>
                        </div>
                    </div>
                    
                    <br/>
                    <div class="row justify-content-md-center report_container">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <p class="font-weight-bold">C. Nilai Perolehan Paten (Pi)</p>   
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th class="align-middle" scope="col">No</th>
                                        <th class="align-middle" scope="col">Nomor
                                                        Pendaftaran/Sertifikat
                                                        Paten/Paten
                                                        Sederhana *</th>
                                        <th class="align-middle" scope="col">Biaya
                                                        Pendaftaran
                                                        (Rp.)</th>
                                        <th class="align-middle" scope="col">Biaya
                                                        Pemeriksaan
                                                        Substantif
                                                        (Rp.)</th>
                                        <th class="align-middle" scope="col">Biaya
                                                        Percepatan
                                                        Publikasi
                                                        (Rp.)</th>
                                        <th class="align-middle" scope="col">Biaya
                                                        Proses
                                                        Lainnya
                                                        (Rp.)</th>
                                        <th class="align-middle" scope="col">Jumlah
                                                        (Rp.)</th>
                                    </tr>
                                </thead>
                                <tbody id="nilai_luaran_paten_list">
                                        <?php 
                                                $y = 0;
                                                
                                                foreach($costbased_paten as $item){
                                                    $y = $y  + 1;
                                                    $total_biaya_daftar = $total_biaya_daftar + $item->biaya_pendaftaran;
                                                    $total_biaya_substantif = $total_biaya_substantif + $item->biaya_substantif;
                                                    $total_biaya_percepatan = $total_biaya_percepatan + $item->biaya_percepatan;
                                                    $total_biaya_proses_lain = $total_biaya_proses_lain + $item->biaya_proses_lain;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $y;?></td>
                                                            <td><?php echo $item->no_pendaftaran;?></td>
                                                            <td><?php echo format_money($item->biaya_pendaftaran);?></td>
                                                            <td><?php echo format_money($item->biaya_substantif);?></td>
                                                            <td><?php echo format_money($item->biaya_percepatan);?></td>
                                                            <td><?php echo format_money($item->biaya_proses_lain);?></td>
                                                            <td>
                                                                <?php 
                                                                    $hasilku = intval($item->biaya_pendaftaran) + intval($item->biaya_substantif) + intval($item->biaya_percepatan)  +intval($item->biaya_proses_lain) ;
                                                                    echo ''.format_money($hasilku); 
                                                                ?>
                                                            </td>
                                                        </tr>
                                                    <?php
                                                    $hasil = $hasil + $hasilku;
                                                }
                                        ?>
                                </tbody>
                                <tbody>
                                    <tr style="background : #f1f1f1 !important;">
                                        <td></td>
                                        <td><b>Jumlah (Rp.)</b></td>
                                    
                                        <td id=""><?php echo format_money($total_biaya_daftar); ?></td>
                                        <td id=""><?php echo format_money($total_biaya_substantif); ?></td>
                                        <td id=""><?php echo format_money($total_biaya_percepatan); ?></td>
                                        <td id=""><?php echo format_money($total_biaya_proses_lain); ?></td>
                                        <td id=""><?php echo format_money($hasil); ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <small id="emailHelp" class="form-text text-muted">Biaya pendaftaran, pemeriksaan substantif, dan percepatan publikasi, sesuai dengan tarif
                                                                            PNBP yang berlaku di DJKI.</small>
                            <br/>                                                                            
                            <div class="report_list">Total Nilai perolehan Paten (Pi = &Sigma;A+&Sigma;B+&Sigma;C+&Sigma;D) = Rp. <span id="out_pi"><?php echo '' .format_money($costbased_identity->pi);?></span></div>
                        </div>
                    </div>
                    <br/>
                    <div class="row justify-content-md-center report_container">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <p class="font-weight-bold">D. Nilai Aset Tak Berwujud berupa Paten/ATB-P (Vi)</p>   
                            <b><p>a. Nilai ATB-P masing-masing paten tanpa memperhitungkan inflasi (jika penghitungan/valuasi dilakukan < 1 tahun sejak tanggal pendaftaran paten):</p></b>
                            <ul id="out_atbp_list">
                                <?php
                                    foreach($costbased_paten as $itemx){
                                        $y2 = doubleval($itemx->total_bobot) / (doubleval($costbased_identity->qi) + doubleval($costbased_identity->ti));
                                        $ki_list2 = doubleval($y2) * doubleval($costbased_identity->total_biaya);
                                        $total_biaya_permohonan = intval($itemx->biaya_pendaftaran) + intval($itemx->biaya_substantif) + intval($itemx->biaya_percepatan)  +intval($itemx->biaya_proses_lain) ;
                                        $atbp_lists = doubleval($ki_list2) + doubleval($total_biaya_permohonan);
                                        ?>
                                            <li><?php echo $itemx->jenis_paten .' '. $itemx->status_permohonan; ?> : Rp.<?php echo format_money($atbp_lists);?></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                            <b><p>b. Nilai ATB-P masing-masing paten dengan memperhitungkan inflasi (jika penghitungan/valuasi dilakukan > 1 tahun sejak tanggal pendaftaran paten):</p></b>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>
                                                No. Pendaftaran / Sertifikat
                                            </th>
                                            <th>
                                                Tahun ke - n
                                            </th>
                                            <th>
                                                Tingkat Inflasi (%)
                                            </th>
                                            <th>
                                                Nilai Paten (Rp.)
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($costbased_pateninflasi as $itemy){
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?= $itemy->no_pendaftaran; ?>
                                                        </td>
                                                        <td>
                                                            <?= 'Tahun ke -' .$itemy->tahunke; ?>
                                                        </td>
                                                        <td>
                                                            <?= format_money($itemy->nilai_inflasi); ?>
                                                        </td>
                                                        <td>
                                                            <?= format_money($itemy->nilai_atbp_paten_inflasi); ?>
                                                        </td>
                                                    </tr>
                                                <?php
                                            }   
                                        ?>
                                    </tbody>
                                </table>
                            <p style="font-weight:bold;font-size:18px;">c. Total Nilai ATB-P : Rp. <span id="out_atbp_total"><?php echo '' .format_money($costbased_identity->atbp);?></span></p>   
                        </div>
                    </div>

            </div>
            <div class="container">
                <div class="row justify-content-md-center export_pdf">
                    <div class="col-lg-12 col-md-12 col-xs-12">
                        <button id="topdf" class="btn btn-primary btn-sm"><ion-icon name="download-outline"></ion-icon>&nbsp;Export PDF</button> 
                    </div>
                </div>
            </div>
        </div>
</section>