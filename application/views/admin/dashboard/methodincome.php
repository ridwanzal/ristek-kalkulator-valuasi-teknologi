<section class="section_main_wrapper">
    <div class="form-element-area">
        <div class="container">
        <div class="card mt-3 mb-3">
        <div class="card-header">
            Data Hak Kekayaan Intelektual
        </div>
            <div class="card-body">
                <h5 class="card-title">Metode Income Based</h5>
                <p class="card-text">Income based approach didasarkan pada asumsi bahwa nilai suatu aset tidak
    berwujud dilihat dari keberhasilan masa depan aset tersebut dalam bentuk arus kas</p>
                <div class="form-group">
                    <div class="row">
                        <div class="col-md-3">
                            <label>Judul <i style="color: red">*</i></label>
                        </div>
                        <div class="col-md-9" style="padding-bottom: 5px;">
                            <input type="text" name="" class="form-control form-control-sm" placeholder="Masukkan Judul Penelitian/Judul Invensi">
                        </div>
                        <div class="col-md-3">
                            <label>Jenis HKI <i style="color: red">*</i></label>
                        </div>
                        <div class="col-md-9" style="padding-bottom: 5px;">
                            <select class="form-control form-control-sm">
                                <option>Paten</option>
                                <option>Paten Sederhana</option>
                                <option>Hak Cipta</option>
                                <option>Merk Dagang</option>
                                <option>Rahasia Dagang</option>
                                <option>Desain Produk Industri</option>
                                <option>Indikasi Geografis</option>
                                <option>Perlindungan Varietas Tanaman</option>
                                <option>Perlindungan Topografi Sirkuit Terpadu</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Tahun Pelaksanaan <i style="color: red">*</i></label>
                        </div>
                        <div class="col-md-9" style="padding-bottom: 5px;">
                            <select class="form-control form-control-sm">
                                <?php for($i=2000;$i<=2020;$i++){ ?>
                                <option><?= $i ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>No. Pendaftaran <i style="color: red">*</i></label>
                        </div>
                        <div class="col-md-9" style="padding-bottom: 5px;">
                            <input type="text" name="" class="form-control form-control-sm" placeholder="Nomor Pendaftaran Paten">
                        </div>
                        <div class="col-md-3">
                            <label>Status <i style="color: red">*</i></label>
                        </div>
                        <div class="col-md-9" style="padding-bottom: 5px;">
                            <div class="form-check-inline">
                                <input type="radio" name="radio1" checked class="form-check-input form-control-sm" />
                                <label>Terdaftar</label>
                            </div>
                            <div class="form-check-inline">
                                <input type="radio" name="radio1" class="form-check-input form-control-sm" />
                                <label>Granted</label>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label>Nomor HKI <i style="color: red">*</i></label>
                        </div>
                        <div class="col-md-9" style="padding-bottom: 5px;">
                            <input type="text" name="" class="form-control form-control-sm" placeholder="Nomor HKI">
                        </div>
                        <div class="col-md-3">
                            <label>URL HKI <i style="color: red">*</i></label>
                        </div>
                        <div class="col-md-9" style="padding-bottom: 5px;">
                            <input type="text" name="" class="form-control form-control-sm" placeholder="URL HKI">
                        </div>
                        <div class="col-md-3">
                            <label>Upload Dokumen Pendukung <i style="color: red">*</i></label>
                        </div>
                        <div class="col-md-9" style="padding-bottom: 5px;">
                            <input type="file" name="" class="form-control-file form-control-sm">
                            <small><i style="color: red">Upload File dengan ukuran maksimal 1 MB</i></small>
                        </div>
                        <div class="col-md-3">
                            <label>&nbsp;</label>
                        </div>
                        <div class="col-md-9" style="padding-bottom: 5px;">
                            <button type="reset" class="btn btn-secondary">Batal</button>
                            <button type="submit" class="btn btn-success">Simpan</button>
                            <button type="submit" class="btn btn-info">Hitung</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>            
    </div>
</section>