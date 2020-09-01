<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-md-4 center">
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    User Profile
                </div>
                <div class="card-body">
                    <img class="rounded-circle" width="50%" height="50%" src="<?= base_url() ?>/assets/images/user_avatar.png">
                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-12 text-center">
                            Air Media Persada <hr />
                        </div>
                        <div class="col-lg-12 col-md-12 text-center">
                            Kementrian Ristek Brin <hr />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 center">
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    Riwayat Kalkulasi Inovasi Teknologi                    
                </div>
                <div class="card-body">
                    <div class="row mb-2">
                        <div class="col-lg-3 col-md-3 ml-auto">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#invensiModal">Tambah Invensi</button>
                        </div>
                    </div>
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Judul Penelitian/Invensi</th>
                            <th scope="col">Nama Inventor</th>
                            <th scope="col" >Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td  class="text-left">Prototipe alat pendeteksi kebocoran gas beracun CO pada mobil menggunakan Array Sensor berbasis SMS Gateway</td>
                            <td>Air Media Persada</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator">Hitung Valuasi</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator"">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator"">Hapus</a>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td class="text-left">The Design of The Monitoring Tools Of Clean Air Condition And Dangerous Gas CO, CO2 CH4 In Chemical Laboratory By Using Fuzzy Logic Based On Microcontroller</td>
                            <td>Air Media Persada</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator">Hitung Valuasi</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator"">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator"">Hapus</a>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td class="text-left">A Flood Early Warning System Design Based on Water Level Using Fuzzy Logic and Short Message Service Gateway</td>
                            <td>Air Media Persada</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator">Hitung Valuasi</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator"">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator"">Hapus</a>                                                                                
                                    </div>
                                </div>
                            </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="invensiModal" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Tambah Data Invensi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>      
                <div class="modal-body">                                 
                    <div class="form-group">
                        <form>
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
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>                                        
        </div>                                      
    </div>
    <!-- Modal End -->
</div>