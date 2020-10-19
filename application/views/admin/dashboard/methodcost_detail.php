<?php 
    // get session userdata
    $userdetails = $this->session->userdata('userdetails'); 
    $costbased_identity = $costbased_identity[0];
    $costbased_nonpaten = $costbased_nonpaten[0];
    $costbased_paten = $costbased_paten[0];

    echo '<pre>';
    // var_dump($costbased_identity);die;
    echo '</pre>';
?>

<section class="section_main_wrapper">
    <div class="form-element-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <p class="font-weight-bold">Field Input Data</p>
                        <p>A. Identitas Penelitian dan Invensi</p>
                        <div class="card">
                                <div class="card-body">
                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions" for="formGroupExampleInput"><span class="badge badge-pill  badge-warning">1</span>&nbsp;Nama Inventor 
                                            <i style="color: red">*</i> 
                                            &nbsp;
                                            <a data-toggle="popover" title="Nama Inventor" data-content="Diisi dengan nama Inventor. Jika nama inventor lebih dari 1 orang, silahkan pisahkan dengan tanda koma di antara nama inventor." class="badge badge-info text-white">Info</a>
                                            </label>
                                            <input  type="text" class="form-control form-control-sm" id="par_cb_nama_inventor" placeholder="" value="">
                                            <small>Jika Inventor yang terlibat lebih dari 1, pisahkan dengan koma</small>
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">2</span>&nbsp;Institusi Penghasil/ Pemilik Invensi <i style="color: red">*</i> 
                                            &nbsp;
                                            <a data-toggle="popover" title="Institusi Penghasil/ Pemilik Invensi " data-content="Diisi dengan nama institusi penghasil invensi/ pemilik invensi seperti nama universitas, politeknik, sekolah tinggi dan semacamnya." class="badge badge-info text-white">Info</a>
                                            </label>
                                            <input  type="text" class="form-control form-control-sm" id="par_cb_nama_institusi" placeholder="">
                                            <small>Jika Institusi yang terlibat lebih dari 1, pisahkan dengan koma</small>
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">3</span>&nbsp;Unit Kerja Penghasil/ Pemilik Invensi <i style="color: red">*</i> 
                                            &nbsp;
                                            <a data-toggle="popover" title="Unit Kerja Penghasil/ Pemilik Invensi " data-content="Diisi dengan nama unit kerja penghasil invensi/ pemilik invensi." class="badge badge-info text-white">Info</a>
                                            </label>
                                            <input type="text" class="form-control form-control-sm" id="par_cb_unit_kerja" placeholder="" value="">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">4</span>&nbsp;Judul Penelitian <i style="color: red">*</i>
                                            &nbsp;
                                            <a data-toggle="popover" title="Judul Penelitian" data-content="Diisi dengan judul penelitian terkait. (autocomplete)" class="badge badge-info text-white">Info</a>
                                            </label>
                                            <input type="text" class="form-control form-control-sm" id="par_cb_judul_riset" value="<?= $costbased_identity->judul_penelitian; ?>" placeholder="">
                                            <small>Autocomplete text</small>
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">5</span>&nbsp;Total Biaya Masukan/Realisasi Pagu Penelitian (R) <i style="color: red">*</i>
                                            &nbsp;
                                            <a data-toggle="popover" title="Unit Kerja Penghasil/ Pemilik Invensi " data-content="Diisi dengan total biaya masukan / realisasi pagu penelitian. " class="badge badge-info text-white">Info</a>
                                            </label>
                                            <input value="<?= $costbased_identity->total_biaya; ?>" type="text" class="form-control form-control-sm" id="par_pagu_riset" placeholder="">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">6</span>&nbsp;Asal Biaya Masukan Masukan/Realisasi Pagu Penelitian <i style="color: red">*</i> </label>
                                            <select value="<?= $costbased_identity->asal_biaya; ?>" id="par_cb_asal_biaya" class="custom-select custom-select-sm">
                                                <option value="Hibah Ristek">Hibah Ristek</option>
                                                <option value="Dikti Kemendikbud">Dikti Kemendikbud</option>
                                                <option value="LPDP">LPDP</option>
                                                <option value="Lainnya">Lainnya</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="captions" for="formGroupExampleInput2">Upload dokumen pendukung <i style="color: red">*</i></label>
                                            <div class="custom-file">
                                                <input id="par_cb_file" type="file" class="form-control" name="berkas[]" multiple style="height:45px;">
                                                <small>Unggah file dlm format PDF, MS Word, PPT, Images*</small>
                                            </div>
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
                                            <input class="form-control" value="<?= $costbased_nonpaten->pub_internasional; ?>" min="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="40">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Publikasi pada jurnal nasional </label>
                                            <input type="number" class="form-control" placeholder="" value="<?= $costbased_nonpaten->pub_nasional; ?>" min="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="25">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Buku Internasional </label>
                                            <input id="par_cb_buku_internasional" type="number" class="form-control" placeholder="" value="<?= $costbased_nonpaten->buku_internasional; ?>"  min="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="40">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Buku Nasional </label>
                                            <input id="par_cb_buku_nasional" type="number" class="form-control" placeholder="" value="<?= $costbased_nonpaten->buku_nasional; ?>"  min="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="30">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Publikasi pada prosiding internasional </label>
                                            <input id="par_cb_pros_internasional" type="number" class="form-control" placeholder="" value="<?= $costbased_nonpaten->pub_prod_internasional; ?>" min="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input  disabled type="number" class="form-control" placeholder="0" value="25">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Publikasi pada prosiding nasional </label>
                                            <input id="par_cb_pros_nasional"  type="number" class="form-control" placeholder="" value="<?= $costbased_nonpaten->pub_prod_nasional; ?>" min="0">
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
                                        <div style="float:right;position:relative;top:-4px;right:-10px;">
                                            <button class="btn btn-sm btn-primary" onclick="add_luaran_paten()"> Tambah Luaran Paten + </button>
                                        </div>
                                    </div>
                                    <div class="container_luaran_paten">
                                        <div class="card luaran_paten_wrapper">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="captions">Judul Invensi <i style="color: red">*</i></label>
                                                    <input type="text" class="form-control form-control-sm par_cb_daftar_invensi" id="par_cb_jd_invensi_1" onchange="data_luaran_paten(1)" placeholder="">
                                                </div>

                                                <div class="form-row form-group">
                                                    <div class="col">
                                                            <div class="form-group">
                                                                <label class="captions">Jenis Paten <i style="color: red">*</i> </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input par_cb_jenis_paten_1" type="radio" name="jpt_1"  value="paten_granted">
                                                                <label class="form-check-label" for="inlineRadio1">Paten</label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input par_cb_jenis_paten_1" type="radio" name="jpt_1"  value="paten_sederhana">
                                                                <label class="form-check-label" for="inlineRadio2">Paten Sederhana </label>
                                                            </div>
                                                    </div>
                                                    
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="captions">Status Peromohonan <i style="color: red">*</i></label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input par_cb_status_paten_1" type="radio" name="stp_1"  value="terdaftar">
                                                            <label class="form-check-label" for="inlineRadio1">Terdaftar</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input par_cb_status_paten_1" type="radio" name="stp_1" value="tersertifikasi">
                                                            <label class="form-check-label" for="inlineRadio2">Tersertifikasi</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- <div class="card">
                                                    <div class="card-body" style="padding:10px;">
                                                        <div style="margin-left:24px;">Keterangan</div>
                                                        <ul>
                                                            <li>Bobot Paten granted (tersertifikasi) = 48</li>
                                                            <li>Bobot Paten terdaftar = 14</li>
                                                            <li>Bobot Paten sederhana granted (tersertifikasi)= 33</li>
                                                            <li>Bobot Paten sederhana terdaftar = 9</li>
                                                        </ul>
                                                    </div>
                                                </div> -->
                                                <br/>
                                                <div class="form-row form-group">
                                                    <div class="col">
                                                        <label class="captions">Nomor pendaftaran (Pemohon) <i style="color: red">*</i></label>
                                                        <input type="text" class="form-control form-control-sm" id="par_cb_nodaftar_1" placeholder="">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="captions">Nomor Sertifikat Paten/Paten Sederhana </label>
                                                        <input type="text" class="form-control form-control-sm" id="par_cb_sertifikat_paten_1" placeholder="">
                                                        <small> (jika sudah granted)</small>
                                                    </div>
                                                </div>
                                                <div class="form-row form-group">
                                                    <div class="col">
                                                        <label class="captions">Asal Biaya Pendaftaran (Permohonan) Paten<i style="color: red">*</i></label>
                                                        <select class="custom-select custom-select-sm" id="par_cb_asalbiayadaftar_1"> 
                                                                <option value="">-- Silahkan pilih</option>
                                                                <option value="1">Raih KI</option>
                                                                <option value="2">Institusi Penghasil/Pemilik Invensi</option>
                                                                <option value="3">Lainnya</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label class="captions" for="formGroupExampleInput2">Unggah dokumen pendukung</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="form-control" multiple style="height:45px;" id="par_cb_file2">
                                                            <small>berupa Formulir (Bukti) pendaftaran dan/atau
                                                        Sertifikat Paten/Paten Sederhana (Unggah file dlm format PDF, MS Word, PPT)</small>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-row form-group">
                                                    <div class="col-lg-6">
                                                        <label class="captions">Biaya Proses Lainnya</label>
                                                        <input type="text" class="form-control form-control-sm" id="par_biaya_proses_1" onkeyup="biaya_proses_lainnya(1)" placeholder="" value="0" >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- <button style="margin-top:10px;" class="btn btn-sm btn-success btn-block" id="proc_data">Proses data</button> -->
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
                                        <td id="pub_np_int"><?= $costbased_nonpaten->pub_international; ?></td>
                                        <td>40</td>
                                        <td id="pub_np_int_total">0</td>
                                    </tr>
                                    <tr>
                                        <td>2.</td>
                                        <td>Publikasi pada jurnal nasional</td>
                                        <td id="pub_np_ns"><?= $costbased_nonpaten->pub_nasional; ?></td>
                                        <td>25</td>
                                        <td id="pub_np_ns_total">0</td>
                                    </tr>
                                    <tr>
                                        <td>3.</td>
                                        <td>Buku Internasional</td>
                                        <td id="buk_np_int"><?= $costbased_nonpaten->buku_internasional; ?></td>
                                        <td>40</td>
                                        <td id="buk_np_int_total">0</td>
                                    </tr>
                                    <tr>
                                        <td>4.</td>
                                        <td>Buku Nasional</td>
                                        <td id="buk_np_ns"><?= $costbased_nonpaten->buku_nasional; ?></td>
                                        <td>30</td>
                                        <td id="buk_np_ns_total">0</td>
                                    </tr>
                                    <tr>
                                        <td>5.</td>
                                        <td>Publikasi pada prosiding internasional</td>
                                        <td id="pub_prod_np_int"><?= $costbased_nonpaten->pub_prod_internasional; ?></td>
                                        <td>25</td>
                                        <td id="pub_prod_np_int_total">0</td>
                                    </tr>
                                    <tr>
                                        <td>6.</td>
                                        <td>Publikasi pada prosiding nasional</td>
                                        <td id="pub_prod_np_ns"><?= $costbased_nonpaten->pub_prod_nasional; ?></td>
                                        <td>10</td>
                                        <td id="pub_prod_np_ns_total">0</td>
                                    </tr>
                                    <tr style="background : #f1f1f1 !important;">
                                        <td></td>
                                        <td><b>Total bobot keluaran penelitian non paten (&Sigma;Qi)</b></td>
                                        <td></td>
                                        <td></td>
                                        <td style="font-weight:bold;" id="np_total_bobot">0</td>
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
                                    <tr style="background : #f1f1f1 !important;">
                                        <td></td>
                                        <td><b>Total bobot keluaran penelitian non paten (&Sigma;Ti)</b></td>
                                        <td></td>
                                        <td></td>
                                        <td style="font-weight:bold;" id="p_total_bobot">0</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div>Nilai total bobot keluaran penelitian berupa paten (&Sigma;Ti) = <span id="out_paten">0</span></div>
                            <div>Nilai total bobot keluaran penelitian non paten (&Sigma;Qi) = <span id="out_nonpaten">0</span></div>
                            <div>Nilai realisasi pagu (R) = Rp. <span id="out_pagu">0</span></div>
                            <div>Nilai keluaran untuk masing-masin Paten : </div>
                            <ul id="out_ki_list">
                            </ul>
                            <div>Total Nilai Keluaran Penelitian Berupa Paten (Ki = Ti / (&Sigma;Ti+&Sigma;Qi)× R) = Rp. <span id="out_ki">0</span></div>
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
                                </tbody>
                                <tbody>
                                    <tr style="background : #f1f1f1 !important;">
                                        <td></td>
                                        <td><b>Jumlah (Rp.)</b></td>
                                        <td id="total_biaya_pendaftaran_seluruh">0</td>
                                        <td id="total_biaya_substantif_seluruh">0</td>
                                        <td id="total_biaya_percepatan_seluruh">0</td>
                                        <td id="total_biaya_proses_lainnya">0</td>
                                        <td id="total_biaya_permohonan_seluruh">0</td>
                                    </tr>
                                </tbody>
                            </table>
                            <small id="emailHelp" class="form-text text-muted">Biaya pendaftaran, pemeriksaan substantif, dan percepatan publikasi, sesuai dengan tarif
                                                                            PNBP yang berlaku di DJKI.</small>
                            <br/>                                                                            
                            <div>Total Nilai perolehan Paten (Pi = &Sigma;A+&Sigma;B+&Sigma;C+&Sigma;D) = Rp. <span id="out_pi">0</span></div>
                        </div>
                    </div>

                    <!-- <br/>
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            <button class="btn btn-primary btn-sm">Hitung</button>
                            <button class="btn btn-success btn-sm" disabled>Simpan</button>
                        </div>
                    </div> -->
                    <br/>
                    <br/>
                    <br/>
                    <div class="row">
                        <div class="col-lg-9 col-md-9">
                            <p class="font-weight-bold">D. Nilai Aset Tak Berwujud berupa Paten/ATB-P (Vi)</p>   
                            <p>1. Nilai ATB-P masing-masing paten:</p>   
                            <ul id="out_atbp_list">
                            </ul>
                            <p style="font-weight:bold;font-size:18px;">2. Total Nilai ATB-P : Rp. <span id="out_atbp_total">0</span></p>   
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