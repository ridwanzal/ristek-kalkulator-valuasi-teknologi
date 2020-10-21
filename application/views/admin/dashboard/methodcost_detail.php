<?php 
    // get session userdata
    $userdetails = $this->session->userdata('userdetails'); 
    $costbased_identity = $costbased_identity[0];
    $costbased_identity_lampiran =  json_decode($costbased_identity->lampiran, true);
    // var_dump($costbased_identity_lampiran);die;
    $costbased_nonpaten = $costbased_nonpaten[0];
    $costbased_paten = $costbased_paten;
    
    // var_dump($costbased_paten);

    $total_biaya_daftar = 0;
    $total_biaya_substantif = 0;
    $total_biaya_percepatan = 0;
    $total_biaya_proses_lain = 0;
    $hasil = 0;
    echo '<pre>';   
    // var_dump($costbased_identity);die;
    echo '</pre>';
?>

<section class="section_main_wrapper">
    <div class="form-element-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="font-weight-bold" style="font-size:22px;color:#444;"><?= $costbased_identity->judul_penelitian; ?></p>
                        <p>A. Identitas Penelitian dan Invensi</p>
                        <div class="card">
                                <div class="card-body">
                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions" for="formGroupExampleInput"><span class="badge badge-pill  badge-warning">1</span>&nbsp;Nama Inventor 
                                            <i style="color: red">*</i> 
                                            </label>
                                            <input  disabled type="text" class="form-control form-control-sm" id="par_cb_nama_inventor" placeholder="" value="">
                                            <small>Jika Inventor yang terlibat lebih dari 1, pisahkan dengan koma</small>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">2</span>&nbsp;Institusi Penghasil/ Pemilik Invensi <i style="color: red">*</i> 
                                            </label>
                                            <input disabled type="text" class="form-control form-control-sm" id="par_cb_nama_institusi" placeholder="">
                                            <small>Jika Institusi yang terlibat lebih dari 1, pisahkan dengan koma</small>
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">3</span>&nbsp;Unit Kerja Penghasil/ Pemilik Invensi <i style="color: red">*</i> 
                                            </label>
                                            <input disabled type="text" class="form-control form-control-sm" id="par_cb_unit_kerja" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">4</span>&nbsp;Judul Penelitian <i style="color: red">*</i>
                                            </label>
                                            <input disabled type="text" class="form-control form-control-sm" id="par_cb_judul_riset" value="<?= $costbased_identity->judul_penelitian; ?>" placeholder="">
                                            <small>Autocomplete text</small>
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">5</span>&nbsp;Total Biaya Masukan/Realisasi Pagu Penelitian (R) <i style="color: red">*</i>
                                            </label>
                                            <input disabled value="<?= $costbased_identity->total_biaya; ?>" type="text" class="form-control form-control-sm" id="par_pagu_riset" placeholder="">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">6</span>&nbsp;Asal Biaya Masukan Masukan/Realisasi Pagu Penelitian <i style="color: red">*</i> </label>
                                            <!-- <select value="<?= $costbased_identity->asal_biaya; ?>" id="par_cb_asal_biaya" class="custom-select custom-select-sm">
                                                <option value="Hibah Ristek">Hibah Ristek</option>
                                                <option value="Dikti Kemendikbud">Dikti Kemendikbud</option>
                                                <option value="LPDP">LPDP</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select> -->
                                            <input disabled type="text" class="form-control form-control-sm" id="par_cb_unit_kerja" placeholder="" value="<?= $costbased_identity->asal_biaya; ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="captions" for="formGroupExampleInput2">Upload dokumen pendukung <i style="color: red">*</i></label>
                                        <?php 
                                            if($costbased_identity_lampiran != 'kosong'){
                                                foreach($costbased_identity_lampiran as $items){
                                                    ?>
                                                        <div>
                                                            <img class='image_lists' src="<?php echo base_url();?>assets/uploads/costbased/<?php echo $items['image_name'];?>">
                                                        </div>
                                                    <?php
                                                }
                                            }
                                        ?>
                                        <!-- <div class="custom-file">
                                            <input id="par_cb_file" type="file" class="form-control" name="berkas[]" multiple style="height:45px;">
                                            <small>Unggah file dlm format PDF, MS Word, PPT, Images*</small>
                                        </div> -->
                                    </div>
                                    <!-- <button id="testupload">Test upload</button> -->
                                </div>
                        </div>
                            <br/>
                            <!-- separator =============================== -->
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">7</span>&nbsp;Luaran Penelitian <i style="color: red">*</i>   </label>
                                    </div>
                                    <div class="alert alert-secondary" role="alert">
                                        Luaran penelitian non paten (diisi jumlah luaran yang dihasilkan dari penelitian)
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Publikasi pada jurnal internasional </label>
                                            <input disabled class="form-control" value="<?= $costbased_nonpaten->pub_internasional; ?>" min="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="40">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Publikasi pada jurnal nasional </label>
                                            <input disabled type="number" class="form-control" placeholder="" value="<?= $costbased_nonpaten->pub_nasional; ?>" min="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="25">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Buku Internasional </label>
                                            <input disabled id="par_cb_buku_internasional" type="number" class="form-control" placeholder="" value="<?= $costbased_nonpaten->buku_internasional; ?>"  min="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="40">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Buku Nasional </label>
                                            <input disabled id="par_cb_buku_nasional" type="number" class="form-control" placeholder="" value="<?= $costbased_nonpaten->buku_nasional; ?>"  min="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="30">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Publikasi pada prosiding internasional </label>
                                            <input disabled id="par_cb_pros_internasional" type="number" class="form-control" placeholder="" value="<?= $costbased_nonpaten->pub_prod_internasional; ?>" min="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input  disabled type="number" class="form-control" placeholder="0" value="25">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Publikasi pada prosiding nasional </label>
                                            <input  disabled id="par_cb_pros_nasional"  type="number" class="form-control" placeholder="" value="<?= $costbased_nonpaten->pub_prod_nasional   ; ?>" min="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="1" value="10" min="0">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <br/>

                            <!-- separator =============================== -->

                                                <div class="card">
                                                    <div class="card-body">
                                                        <div class="alert alert-secondary" role="alert">
                                                            Luaran penelitian berupa paten
                                                        </div>
                                            <?php
                                                    $i = 0;
                                                    foreach($costbased_paten as $item){
                                                        $i = $i + 1;
                                                            // var_dump($item->judul_invensi);die
                                                        ?>
                                                        <div class="container_luaran_paten">
                                                            <div class="card luaran_paten_wrapper">
                                                                <div class="card-body">
                                                                    <div class="form-group">
                                                                        <label class="captions">Judul Invensi <i style="color: red">*</i></label>
                                                                        <input disabled type="text" class="form-control form-control-sm par_cb_daftar_invensi" id="par_cb_jd_invensi_edit_<?php echo $i;?>" value="<?php echo $item->judul_invensi;?>">
                                                                    </div>

                                                                    <div class="form-row form-group">
                                                                        <div class="col">
                                                                                <div class="form-group">
                                                                                    <label class="captions">Jenis Paten <i style="color: red">*</i> </label>
                                                                                </div>
                                                                                <div class="form-group">
                                                                                    <?php
                                                                                        if($item->jenis_paten == 'paten_granted'){
                                                                                            ?>
                                                                                                <input disabled type="text" class="form-control form-control-sm" id="par_cb_jenis_paten_edit_<?php echo $i;?>" value="Paten">
                                                                                            <?php
                                                                                        }else{
                                                                                            ?>
                                                                                                <input disabled type="text" class="form-control form-control-sm" id="par_cb_jenis_paten_edit_<?php echo $i;?>" value="Paten Sederhana">
                                                                                            <?php
                                                                                        }
                                                                                    ?>
                                                                                </div>
                                                                        </div>
                                                                        
                                                                        <div class="col-lg-6">
                                                                            <div class="form-group">
                                                                                <label class="captions">Status Peromohonan <i style="color: red">*</i></label>
                                                                            </div>
                                                                            <?php
                                                                                        if($item->status_permohonan == 'tersertifikasi'){
                                                                                            ?>
                                                                                                <input disabled type="text" class="form-control form-control-sm" id="par_cb_jenis_paten_edit_<?php echo $i;?>" value="Tersertifikasi">
                                                                                            <?php
                                                                                        }else{
                                                                                            ?>
                                                                                                <input disabled type="text" class="form-control form-control-sm" id="par_cb_jenis_paten_edit_<?php echo $i;?>" value="Terdaftar">
                                                                                            <?php
                                                                                        }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <br/>
                                                                    <div class="form-row form-group">
                                                                        <div class="col">
                                                                            <label class="captions">Nomor pendaftaran (Pemohon) <i style="color: red">*</i></label>
                                                                            <input disabled type="text" class="form-control form-control-sm" id="par_cb_nodaftar_edit_<?php echo $i;?>" value="<?php echo $item->no_pendaftaran;?>">
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <label class="captions">Nomor Sertifikat Paten/Paten Sederhana </label>
                                                                            <?php
                                                                                if($item->sertifikat != ''){
                                                                                    ?>
                                                                                        <input disabled type="text" class="form-control form-control-sm" id="par_cb_sertifikat_paten_1" placeholder="" value="<?php echo $item->sertifikat; ?>">
                                                                                    <?php
                                                                                }else{
                                                                                    ?>
                                                                                        <input type="text" class="form-control form-control-sm" id="par_cb_sertifikat_paten_1" placeholder="" value='-'>
                                                                                    <?php
                                                                                }
                                                                            ?>
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row form-group">
                                                                        <div class="col">
                                                                            <label class="captions">Asal Biaya Pendaftaran (Permohonan) Paten<i style="color: red">*</i></label>
                                                                            <input disabled type="text" class="form-control form-control-sm" id="par_cb_asalbiayadaftar_edit_<?php echo $i;?>" placeholder="" value='<?php echo $item->asal_biaya_pendaftaran;?>'>
                                                                        </div>
                                                                        <div class="col-lg-6">
                                                                            <label class="captions">Biaya Proses Lainnya</label>
                                                                            <input disabled type="text" class="form-control form-control-sm" id="par_biaya_proses_edit_<?php echo $i;?>" onkeyup="biaya_proses_lainnya(1)" placeholder="" value="<?php echo $item->biaya_proses_lain;?>" >
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-row form-group">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <br/>
                                                                <?php
                                                            }
                                                    ?>
                                                    </div>
                                                </div>
                            <br/>
                    </div>
                </div>
                <br/>
                <br/>
                <div class="container_all_output" style="display:block;">
                    <!-- POIN B -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <p class="font-weight-bold">B. Nilai Keluaran Penelitian Berupa Paten (Ki)</p>
                            <table class="table table-sm table-bordered">
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
                                        <td>A.</td>
                                        <td>Luaran Penelitian Non Paten</td>
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
                                        <td>B.</td>
                                        <td>Luaran Penelitian Paten</td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tbody class="luaran_paten_list">
                                    
                                    </tbody>
                                    <!-- <tr>
                                        <td>1.</td>
                                        <td>Publikasi pada jurnal internasional</td>
                                        <td>1</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Publikasi pada jurnal internasional</td>
                                        <td>1</td>
                                        <td>40</td>
                                        <td>40</td>
                                    </tr> -->
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
                            <div>Nilai total bobot keluaran penelitian berupa paten (&Sigma;Ti) = <span id="out_paten"><?php echo '' .intval($costbased_identity->ti);?></span></div>
                            <div>Nilai total bobot keluaran penelitian non paten (&Sigma;Qi) = <span id="out_nonpaten"><?php echo '' .intval($costbased_identity->qi);?></span></div>
                            <div>Nilai realisasi pagu (R) = Rp. <span id="out_pagu"><?php echo '' .intval($costbased_identity->total_biaya);?></span></div>
                            <div>Nilai keluaran untuk masing-masin Paten : </div>
                            <ul id="out_ki_list">
                                <?php
                                    foreach($costbased_paten as $itemx){
                                        $y = intval($itemx->total_bobot) / (intval($costbased_identity->qi + intval($costbased_identity->ti)));
                                        $ki_list = $y * $costbased_identity->total_biaya;
                                        ?>
                                            <li><?php echo $itemx->jenis_paten .' '. $item->status_permohonan; ?> : Rp.<?php echo $ki_list;?></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                            <div>Total Nilai Keluaran Penelitian Berupa Paten (Ki = Ti / (&Sigma;Ti+&Sigma;Qi)× R) = Rp. <span id="out_ki"><?php echo '' .$costbased_identity->ki;?></span></div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <br/>
                    <!-- POIN C -->
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-xs-12">
                            <p class="font-weight-bold">C. Nilai Perolehan Paten (Pi)</p>   
                            <table class="table table-sm table-bordered">
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
                                                            <td><?php echo $item->biaya_pendaftaran;?></td>
                                                            <td><?php echo $item->biaya_substantif;?></td>
                                                            <td><?php echo $item->biaya_percepatan;?></td>
                                                            <td><?php echo $item->biaya_proses_lain;?></td>
                                                            <td>
                                                                <?php 
                                                                    $hasilku = intval($item->biaya_pendaftaran) + intval($item->biaya_substantif) + intval($item->biaya_percepatan)  +intval($item->biaya_proses_lain) ;
                                                                    echo ''.$hasilku; 
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
                                     
                                        <td id=""><?php echo $total_biaya_daftar; ?></td>
                                        <td id=""><?php echo $total_biaya_substantif; ?></td>
                                        <td id=""><?php echo $total_biaya_percepatan; ?></td>
                                        <td id=""><?php echo $total_biaya_proses_lain; ?></td>
                                        <td id=""><?php echo $hasil; ?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <small id="emailHelp" class="form-text text-muted">Biaya pendaftaran, pemeriksaan substantif, dan percepatan publikasi, sesuai dengan tarif
                                                                            PNBP yang berlaku di DJKI.</small>
                            <br/>                                                                            
                            <div>Total Nilai perolehan Paten (Pi = &Sigma;A+&Sigma;B+&Sigma;C+&Sigma;D) = Rp. <span id="out_pi"><?php echo '' .$costbased_identity->pi;?></span></div>
                        </div>
                    </div>
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            <p class="font-weight-bold">D. Nilai Aset Tak Berwujud berupa Paten/ATB-P (Vi)</p>   
                            <p>1. Nilai ATB-P masing-masing paten:</p>   
                            <ul id="out_atbp_list">
                                <?php
                                    foreach($costbased_paten as $itemx){
                                        $y2 = doubleval($itemx->total_bobot) / (doubleval($costbased_identity->qi) + doubleval($costbased_identity->ti));
                                        $ki_list2 = doubleval($y2) * doubleval($costbased_identity->total_biaya);
                                        $total_biaya_permohonan = intval($itemx->biaya_pendaftaran) + intval($itemx->biaya_substantif) + intval($itemx->biaya_percepatan)  +intval($itemx->biaya_proses_lain) ;
                                        $atbp_lists = doubleval($ki_list2) + doubleval($total_biaya_permohonan);
                                        ?>
                                            <li><?php echo $itemx->jenis_paten .' '. $itemx->status_permohonan; ?> : Rp.<?php echo $atbp_lists;?></li>
                                        <?php
                                    }
                                ?>
                            </ul>
                            <p style="font-weight:bold;font-size:18px;">2. Total Nilai ATB-P : Rp. <span id="out_atbp_total"><?php echo '' .$costbased_identity->atbp;?></span></p>   
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" id="container_simpan_export" style="display:none;">
                            <button id="tosave" class="btn btn-success btn-sm">Simpan</button> 
                            <button id="topdf" class="btn btn-primary btn-sm">Export PDF</button> 
                        </div>
                    </div>
                </div>

            </div>
        </div>
</section>