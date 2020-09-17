<?php 
    // get session userdata
    $userdetails = $this->session->userdata('userdetails'); 
?>

<section class="section_main_wrapper">
    <div class="form-element-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9 col-md-9 col-sm-9 col-xs-12">
                        <p class="font-weight-bold">Field Input Data</p>
                        <p>A. Identitas Penelitian dan Invensi</p>
                        <br/>
                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput"><span class="badge badge-pill  badge-warning">1</span>&nbsp;Nama Inventor <i style="color: red">*</i> </label>
                                <input value="<?= $userdetails['name'];?>" type="text" class="form-control form-control-sm" id="par_cb_nama_inventor" placeholder="">
                                <small>Jika Inventor yang terlibat lebih dari 1, pisahkan dengan koma</small>
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">2</span>&nbsp;Institusi Penghasil/ Pemilik Invensi <i style="color: red">*</i> </label>
                                <input value="<?= $userdetails['afiliasi']['name']; ?>" type="text" class="form-control form-control-sm" id="par_cb_nama_institusi" placeholder="">
                                <small>Jika Institusi yang terlibat lebih dari 1, pisahkan dengan koma</small>
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">3</span>&nbsp;Unit Kerja Penghasil/ Pemilik Invensi <i style="color: red">*</i> </label>
                                <input type="text" class="form-control form-control-sm" id="par_cb_unit_kerja" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">4</span>&nbsp;Judul Penelitian <i style="color: red">*</i> </label>
                                <input type="text" class="form-control form-control-sm" id="par_cb_judul_riset" placeholder="">
                                <small>Autocomplete text</small>
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">5</span>&nbsp;Total Biaya Masukan/Realisasi Pagu Penelitian (R) <i style="color: red">*</i></label>
                                <input type="number" class="form-control form-control-sm" id="par_pagu_riset" placeholder="">
                            </div>
                            
                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">6</span>&nbsp;Asal Biaya Masukan Masukan/Realisasi Pagu Penelitian <i style="color: red">*</i> </label>
                                    <select id="par_cb_asal_biaya" class="custom-select custom-select-sm">
                                        <option value="">-- Silahkan pilih</option>
                                        <option value="1">Hibah Ristek</option>
                                        <option value="2">Dikti Kemendikbud</option>
                                        <option value="3">LPDP</option>
                                        <option value="0">Lainnya</option>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2">Upload dokumen pendukung <i style="color: red">*</i></label>
                                    <div class="custom-file">
                                        <input id="par_cb_file1" type="file" class="form-control" multiple style="height:45px;">
                                        <small>Unggah file dlm format PDF, MS Word, PPT</small>
                                    </div>
                            </div>
                            <br/>
                            <!-- separator =============================== -->
                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">7</span>&nbsp;Luaran Penelitian <i style="color: red">*</i>   </label>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="alert alert-secondary" role="alert">
                                        Luaran penelitian non paten (diisi jumlah luaran yang dihasilkan dari penelitian)
                                    </div>
                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Publikasi pada jurnal internasional <i style="color: red">*</i></label>
                                            <input id="par_cb_pub_internasional" type="number" class="form-control" placeholder="" value="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="40">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Publikasi pada jurnal nasional <i style="color: red">*</i></label>
                                            <input id="par_cb_pub_nasional" type="number" class="form-control" placeholder="" value="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="25">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Buku Internasional <i style="color: red">*</i></label>
                                            <input id="par_cb_buku_internasional" type="number" class="form-control" placeholder="" value="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="40">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Buku Nasional <i style="color: red">*</i></label>
                                            <input id="par_cb_buku_nasional" type="number" class="form-control" placeholder="" value="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="0" value="30">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Publikasi pada prosiding internasional <i style="color: red">*</i></label>
                                            <input id="par_cb_pros_internasional" type="number" class="form-control" placeholder="" value="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input  disabled type="number" class="form-control" placeholder="0" value="25">
                                        </div>
                                    </div>

                                    <div class="form-row form-group">
                                        <div class="col">
                                            <label class="captions">Publikasi pada prosiding nasional <i style="color: red">*</i></label>
                                            <input id="par_cb_pros_nasional"  type="number" class="form-control" placeholder="" value="0">
                                        </div>
                                        <div class="col-lg-6">
                                            <label class="captions">Bobot</label>
                                            <input disabled type="number" class="form-control" placeholder="1" value="10">
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
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="form-group">
                                                    <label class="captions">Judul Invensi <i style="color: red">*</i></label>
                                                    <input type="text" class="form-control form-control-sm" id="par_cb_jd_invensi_1" placeholder="">
                                                </div>
                                                

                                                <div class="form-row form-group">
                                                    <div class="col">
                                                            <div class="form-group">
                                                                <label class="captions">Jenis Paten <i style="color: red">*</i> </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="jpt" id="par_cb_paten_granted_1" value="option1">
                                                                <label class="form-check-label" for="inlineRadio1">Paten Granted </label>
                                                            </div>
                                                            <div class="form-check form-check-inline">
                                                                <input class="form-check-input" type="radio" name="jpt" id="par_cb_paten_sd_1" value="option2">
                                                                <label class="form-check-label" for="inlineRadio2">Paten Sederhana </label>
                                                            </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="captions">Status Peromohonan <i style="color: red">*</i></label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="stp" id="par_cb_paten_terdaftar_1" value="option1">
                                                            <label class="form-check-label" for="inlineRadio1">Terdaftar</label>
                                                        </div>
                                                        <div class="form-check form-check-inline">
                                                            <input class="form-check-input" type="radio" name="stp" id="par_cb_paten_tersertifikasi_1" value="option2">
                                                            <label class="form-check-label" for="inlineRadio2">Tersertifikasi</label>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="card">
                                                    <div class="card-body">
                                                        <p>Keterangan</p>
                                                        <ul>
                                                            <li>Bobot Paten granted (tersertifikasi) = 48</li>
                                                            <li>Bobot Paten terdaftar = 14</li>
                                                            <li>Bobot Paten sederhana granted (tersertifikasi)= 33</li>
                                                            <li>Bobot Paten sederhana terdaftar = 9</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <br/>
                                                <div class="form-group">
                                                    <label class="captions">Nomor pendaftaran (Pemohon) <i style="color: red">*</i></label>
                                                    <input type="text" class="form-control form-control-sm" id="par_cb_nodaftar_1" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="captions">Nomor Sertifikat Paten/Paten Sederhana (jika sudah granted) <i style="color: red">*</i></label>
                                                    <input type="text" class="form-control form-control-sm" id="par_cb_sertifikat_paten_1" placeholder="">
                                                </div>
                                                <div class="form-group">
                                                    <label class="captions">Asal Biaya Pendaftaran (Permohonan) Paten<i style="color: red">*</i></label>
                                                    <select class="custom-select custom-select-sm" id="par_cb_asalbiayadaftar_1"> 
                                                            <option value="">-- Silahkan pilih</option>
                                                            <option value="1">Raih KI</option>
                                                            <option value="2">Institusi Penghasil/Pemilik Invensi</option>
                                                            <option value="3">Lainnya</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label class="captions" for="formGroupExampleInput2">Unggah dokumen pendukung berupa Formulir (Bukti) pendaftaran dan/atau
                                                        Sertifikat Paten/Paten Sederhana <i style="color: red">*</i></label>
                                                        <div class="custom-file">
                                                            <input type="file" class="form-control" multiple style="height:45px;" id="par_cb_asalbiayadaftar_1">
                                                            <small>Unggah file dlm format PDF, MS Word, PPT</small>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                    </div>
                </div>

                <!-- POIN B -->
                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <p>B. Nilai Keluaran Penelitian Berupa Paten (Ki)</p>
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
                                    <td id="pub_np_int">0</td>
                                    <td>40</td>
                                    <td id="pub_np_int_total">0</td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>Publikasi pada jurnal nasional</td>
                                    <td id="pub_np_ns">0</td>
                                    <td>25</td>
                                    <td id="pub_np_ns_total">0</td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>Buku Internasional</td>
                                    <td id="buk_np_int">0</td>
                                    <td>40</td>
                                    <td id="buk_np_int_total">0</td>
                                </tr>
                                <tr>
                                    <td>4.</td>
                                    <td>Buku Nasional</td>
                                    <td id="buk_np_ns">0</td>
                                    <td>30</td>
                                    <td id="buk_np_ns_total">0</td>
                                </tr>
                                <tr>
                                    <td>5.</td>
                                    <td>Publikasi pada prosiding internasional</td>
                                    <td>0</td>
                                    <td>25</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td>6.</td>
                                    <td>Publikasi pada prosiding nasional</td>
                                    <td>0</td>
                                    <td>10</td>
                                    <td>0</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>Total bobot keluaran penelitian non paten (Qi)</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>B.</td>
                                    <td>Luaran Penelitian Paten</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
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
                                </tr>
                                <tr>
                                    <td></td>
                                    <td><b>Total bobot keluaran penelitian non paten (Ti)</b></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <br/>
                <!-- POIN C -->
                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <p>C. Nilai Perolehan Paten (Pi)</p>   
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
                            <tbody>
                                <tr>
                                   <td>1.</td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                </tr>
                                <tr>
                                   <td>2. </td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                   <td></td>
                                </tr>
                            </tbody>
                        </table>
                        <small id="emailHelp" class="form-text text-muted">Biaya pendaftaran, pemeriksaan substantif, dan percepatan publikasi, sesuai dengan tarif
                                                                           PNBP yang berlaku di DJKI.</small>
                    </div>
                </div>

                <br/>
                <br/>

                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <p>D. Nilai Aset Tak Berwujud berupa Paten/ATB-P (Vi)</p>   
                        <p>1. Nilai ATB-P masing-masing paten:</p>   
                        <div class="form-group">
                            <label class="captions" for="formGroupExampleInput2">Paten Terdaftar : </label>
                            <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                        </div>
                        <div class="form-group">
                            <label class="captions" for="formGroupExampleInput2">Paten Sederhana Terdaftar S : </label>
                            <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                        </div>
                        <p>2. Total Nilai ATB-P :</p>   
                        <div class="form-group">
                            <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <button class="btn btn-primary btn-sm">Hitung</button>
                        <button class="btn btn-success btn-sm" disabled>Simpan</button>
                    </div>
                </div>

            </div>
        </div>
</section>