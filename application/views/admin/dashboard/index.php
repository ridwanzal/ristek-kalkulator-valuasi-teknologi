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
                                <label class="captions" for="formGroupExampleInput"><span class="badge badge-pill  badge-warning">1</span>&nbsp;Nama Inventor : </label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">2</span>&nbsp;Institusi Penghasil/ Pemilik Invensi : </label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">3</span>&nbsp;Unit Kerja Penghasil/ Pemilik Invensi : </label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">4</span>&nbsp;Judul Penelitian : </label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">5</span>&nbsp;Total Biaya Masukan/Realisasi Pagu Penelitian (R) :</label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>
                            
                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">6</span>&nbsp;Asal Biaya Masukan Masukan/Realisasi Pagu Penelitian : </label>
                                    <select class="custom-select custom-select-sm">
                                        <option value="">-- Silahkan pilih</option>
                                        <option value="1">Hibah Ristek</option>
                                        <option value="2">Dikti Kemendikbud</option>
                                        <option value="3">Lainnya</option>
                                    </select>
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2">Upload dokumen pendukung :</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <small id="emailHelp" class="form-text text-muted">Unggah file dlm format PDF, MS Word, PPT</small>
                                    </div>
                            </div>
                            <!-- <hr class="dashed"> -->
                            <!-- separator =============================== -->
                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2"><span class="badge badge-pill  badge-warning">7</span>&nbsp;Luaran Penelitian : </label>
                            </div>
                            <div class="alert alert-secondary" role="alert">
                                Luaran penelitian non paten (diisi jumlah luaran yang dihasilkan dari penelitian)
                            </div>
                            <div class="form-row form-group">
                                <div class="col">
                                    <label class="captions">Publikasi pada jurnal internasional</label>
                                    <input type="number" class="form-control" placeholder="" value="1">
                                </div>
                                <div class="col-lg-6">
                                    <label class="captions">Bobot</label>
                                    <input disabled type="number" class="form-control" placeholder="0" value="40">
                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col">
                                    <label class="captions">Publikasi pada jurnal nasional</label>
                                    <input type="number" class="form-control" placeholder="" value="1">
                                </div>
                                <div class="col-lg-6">
                                    <label class="captions">Bobot</label>
                                    <input disabled type="number" class="form-control" placeholder="0" value="25">
                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col">
                                    <label class="captions">Buku Internasional</label>
                                    <input type="number" class="form-control" placeholder="" value="1">
                                </div>
                                <div class="col-lg-6">
                                    <label class="captions">Bobot</label>
                                    <input disabled type="number" class="form-control" placeholder="0" value="40">
                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col">
                                    <label class="captions">Publikasi pada prosiding internasional</label>
                                    <input type="number" class="form-control" placeholder="" value="1">
                                </div>
                                <div class="col-lg-6">
                                    <label class="captions">Bobot</label>
                                    <input disabled type="number" class="form-control" placeholder="1" value="40">
                                </div>
                            </div>

                            <div class="form-row form-group">
                                <div class="col">
                                    <label class="captions">Publikasi pada prosiding nasional</label>
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
                                <label for="formGroupExampleInput2">Judul Invensi </label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="captions">Jenis Paten </label>
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
                                <label class="captions">Status Peromohonan</label>
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
                                <label class="captions">Nomor pendaftaran (Pemohon) :</label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="captions">Nomor Sertifikat Paten/Paten Sederhana (jika sudah granted) :</label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>
                            <div class="form-group">
                                <label class="captions">Asal Biaya Pendaftaran (Permohonan) Paten, misal Raih KI, Institusi Penghasil/Pemilik Invensi, dll :</label>
                                <input type="text" class="form-control form-control-sm" id="formGroupExampleInput2" placeholder="">
                            </div>

                            <div class="form-group">
                                <label class="captions" for="formGroupExampleInput2">Unggah dokumen pendukung berupa Formulir (Bukti) pendaftaran dan/atau
Sertifikat Paten/Paten Sederhana :</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                        <small id="emailHelp" class="form-text text-muted">Unggah file dlm format PDF, MS Word, PPT</small>
                                    </div>
                            </div>
                            <br/>
                            <p>B. dentitas Penelitian dan Invensi</p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>