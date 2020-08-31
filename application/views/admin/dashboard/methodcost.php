<section class="section_main_wrapper">
    <div class="form-element-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                        <h3 class="font-weight-bold">Field Input Data</h3>
                        <p>A. Identitas Penelitian dan Invensi</p>
                        <br/>
                        <form>
                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput"><span class="badge badge-pill  badge-warning">1</span>&nbsp;Nama Inventor <i style="color: red">*</i> </label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">2</span>&nbsp;Institusi Penghasil/ Pemilik Invensi <i style="color: red">*</i> </label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">3</span>&nbsp;Unit Kerja Penghasil/ Pemilik Invensi <i style="color: red">*</i> </label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">4</span>&nbsp;Judul Penelitian <i style="color: red">*</i> </label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">5</span>&nbsp;Total Biaya Masukan/Realisasi Pagu Penelitian (R) <i style="color: red">*</i></label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>
                            
                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">6</span>&nbsp;Asal Biaya Masukan Masukan/Realisasi Pagu Penelitian <i style="color: red">*</i> </label>
                                    <select class="custom-select custom-select-sm">
                                        <option value="">-- Silahkan pilih</option>
                                        <option value="1">Hibah Ristek</option>
                                        <option value="2">Dikti Kemendikbud</option>
                                        <option value="3">Lainnya</option>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2">Upload dokumen pendukung <i style="color: red">*</i></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <small id="emailHelp" class="form-text text-muted">Unggah file dlm format PDF, MS Word, PPT</small>
                                    </div>
                            </div>
                            <!-- <hr class="dashed"> -->
                            <!-- separator =============================== -->
                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">7</span>&nbsp;Luaran Penelitian <i style="color: red">*</i>   </label>
                            </div>
                            <div class="alert alert-secondary" role="alert">
                                Luaran penelitian non paten (diisi jumlah luaran yang dihasilkan dari penelitian)
                            </div>
                            <div class="form-row form-group">
                                <div class="col">
                                    <label class="captions">Publikasi pada jurnal internasional <i style="color: red">*</i></label>
                                    <input type="number" class="form-control" placeholder="" value="1">
                                </div>
                                <div class="col-lg-6">
                                    <label class="captions">Bobot</label>
                                    <input disabled type="number" class="form-control" placeholder="0" value="40">
                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col">
                                    <label class="captions">Publikasi pada jurnal nasional <i style="color: red">*</i></label>
                                    <input type="number" class="form-control" placeholder="" value="1">
                                </div>
                                <div class="col-lg-6">
                                    <label class="captions">Bobot</label>
                                    <input disabled type="number" class="form-control" placeholder="0" value="25">
                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col">
                                    <label class="captions">Buku Internasional <i style="color: red">*</i></label>
                                    <input type="number" class="form-control" placeholder="" value="1">
                                </div>
                                <div class="col-lg-6">
                                    <label class="captions">Bobot</label>
                                    <input disabled type="number" class="form-control" placeholder="0" value="40">
                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col">
                                    <label class="captions">Publikasi pada prosiding internasional <i style="color: red">*</i></label>
                                    <input type="number" class="form-control" placeholder="" value="1">
                                </div>
                                <div class="col-lg-6">
                                    <label class="captions">Bobot</label>
                                    <input disabled type="number" class="form-control" placeholder="1" value="40">
                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col">
                                    <label class="captions">Publikasi pada prosiding nasional <i style="color: red">*</i></label>
                                    <input type="number" class="form-control" placeholder="" value="1">
                                </div>
                                <div class="col-lg-6">
                                    <label class="captions">Bobot</label>
                                    <input disabled type="number" class="form-control" placeholder="1" value="10">
                                </div>
                            </div>

                            <!-- separator =============================== -->
                            <div class="alert alert-secondary" role="alert">
                                Luaran penelitian berupa paten
                            </div>
                            <div class="form-group">
                                <label for="formGroupExampleInput2">Judul Invensi <i style="color: red">*</i></label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="captions">Jenis Paten <i style="color: red">*</i> </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jpt" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Paten</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="jpt" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Paten Sederhana</label>
                            </div>
                            <br/>
                            <br/>
                            <div class="form-group">
                                <label class="captions">Status Peromohonan <i style="color: red">*</i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stp" id="inlineRadio1" value="option1">
                                <label class="form-check-label" for="inlineRadio1">Terdaftar</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="stp" id="inlineRadio2" value="option2">
                                <label class="form-check-label" for="inlineRadio2">Tersertifikasi</label>
                            </div>
                            <br/>
                            <br/>
                            <div class="form-group">
                                <label class="captions">Nomor pendaftaran (Pemohon) <i style="color: red">*</i></label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="captions">Nomor Sertifikat Paten/Paten Sederhana (jika sudah granted) <i style="color: red">*</i></label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="captions">Asal Biaya Pendaftaran (Permohonan) Paten, misal Raih KI, Institusi Penghasil/Pemilik Invensi, dll <i style="color: red">*</i></label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2">Unggah dokumen pendukung berupa Formulir (Bukti) pendaftaran dan/atau
Sertifikat Paten/Paten Sederhana <i style="color: red">*</i></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <small id="emailHelp" class="form-text text-muted">Unggah file dlm format PDF, MS Word, PPT</small>
                                    </div>
                            </div>
                            <br/>
                        </form>
                    </div>
                </div>

                <!-- POIN B -->
                <div class="row">
                    <div class="col-lg-9 col-md-9">
                        <p>B. Identitas Penelitian dan Invensi</p>
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
                                    <td>Total bobot keluaran penelitian non paten (Qi)</td>
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
                                    <td>Total bobot keluaran penelitian non paten (Ti)</td>
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
                        <p>C. Identitas Penelitian dan Invensi</p>   
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
                        <button class="btn btn-success btn-sm">Simpan</button>
                    </div>
                </div>

            </div>
        </div>
</section>