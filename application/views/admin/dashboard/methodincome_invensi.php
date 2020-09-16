<?php
$userdetails = $this->session->userdata('userdetails');
?>
<div class="container mt-3 mb-3">
    <div class="row">
        <div class="col-md-4 center">
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    User Profile
                </div>
                <div class="card-body">
                    <img id="img_user" src="<?php echo base_url();?>assets/frontview/img/no_photo.svg">
                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-12 text-center">
                            <?= "SINTA ID : ".$userdetails['sinta_id']; ?> <hr />
                        </div>
                        <div class="col-lg-12 col-md-12 text-center">
                            <?= $userdetails['name']; ?> <hr />
                        </div>
                        <div class="col-lg-12 col-md-12 text-center">
                            <?= $userdetails['afiliasi']['name'];
                            ?> <hr />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8 center">
            <div class="card text-center">
                <div class="card-header bg-primary text-white">
                    Tambah Data Invensi                    
                </div>
                <div class="card-body">                    
                    <div class="card-title text-right">
                        <?php if (validation_errors()): ?>
                            <div class="alert alert-danger alert-dismissible fade show">
                                <button type="button" class="close" data-dismiss="alert">&times;</button>
                                <strong>Validasi Formulir Isian!</strong><?php echo validation_errors() ?>
                            </div>
                        <?php endif; ?>
                        <!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#invensiModal">Tambah Invensi</button> -->
                        <a href="<?=base_url() ?>manage/add/incomebased" class="btn btn-warning btn-sm">Kembali</a>
                        <hr />
                    </div>   
                                         
                    <!-- form invensi -->
                    <div class="form-group">
                    <form action="<?= base_url('incomebased/add') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                                <div class="col-md-3 text-right">
                                    <label>Judul <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="judul" name="judul" class="form-control form-control-sm" placeholder="Masukkan Judul Penelitian/Judul Invensi" value="<?php echo $this->input->post('judul'); ?>"> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Jenis HKI <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <select id="jenis" name="jenis" class="form-control form-control-sm">
                                        <option value="Paten" <?php if($this->input->post('judul')=='Paten'){echo "selected";} ?>>Paten</option>
                                        <option value="Paten Sederhana" <?php if($this->input->post('judul')=='Paten Sederhana'){echo "selected";} ?>>Paten Sederhana</option>                                        
                                        <option value="Merk Dagang" <?php if($this->input->post('judul')=='Merk Dagang'){echo "selected";} ?>>Merk Dagang</option>
                                        <option value="Rahasia Dagang" <?php if($this->input->post('judul')=='Rahasia Dagang'){echo "selected";} ?>>Rahasia Dagang</option>
                                        <option value="Desain Produk Industri" <?php if($this->input->post('judul')=='Desain Produk Industri'){echo "selected";} ?>>Desain Produk Industri</option>
                                        <option value="Indikasi Geografis" <?php if($this->input->post('judul')=='Indikasi Geografis'){echo "selected";} ?>>Indikasi Geografis</option>
                                        <option value="Perlindungan Varietas Tanaman" <?php if($this->input->post('judul')=='Perlindungan Varietas Tanaman'){echo "selected";} ?>>Perlindungan Varietas Tanaman</option>
                                        <option value="Perlindungan Topografi Sirkuit Terpadu" <?php if($this->input->post('judul')=='Perlindungan Topografi Sirkuit Terpadu'){echo "selected";} ?>>Perlindungan Topografi Sirkuit Terpadu</option>
                                    </select>
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Tahun Pelaksanaan <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <select class="form-control form-control-sm" id="tahun" name="tahun">
                                        <?php for($i=(date('Y')-15);$i<=date('Y');$i++){ ?>
                                        <option value="<?php echo $i; ?>"><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>No. Pendaftaran <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="nodaftar" name="nodaftar" class="form-control form-control-sm" placeholder="Nomor Pendaftaran Paten" value="<?php echo $this->input->post('nodaftar'); ?>">
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Status <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <div class="form-check-inline text-left">
                                        <input type="radio" name="status" value="terdaftar" checked class="form-check-input form-control-sm" />
                                        <label>Terdaftar</label>
                                    </div>
                                    <div class="form-check-inline text-left">
                                        <input type="radio" name="status" value="granted" class="form-check-input form-control-sm" />
                                        <label>Granted</label>
                                    </div>
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Nomor HKI <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="nohki" name="nohki" class="form-control form-control-sm" placeholder="Nomor HKI" value="<?php echo $this->input->post('nohki'); ?>">
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>URL HKI <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="url_hki" name="url_hki" class="form-control form-control-sm" placeholder="URL HKI" value="<?php echo $this->input->post('url_hki'); ?>">
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Upload Dokumen Pendukung <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="file" id="dokumen_hki" name="dokumen_hki" class="form-control-file form-control-sm">
                                    <div class="text-left"><small><i style="color: red">Upload File dengan ukuran maksimal 1 MB</i></small></div>
                                </div>
                                <div class="col-md-12">
                                    <hr />
                                </div>
                                <div class="col-md-12 text-right" style="padding-bottom: 5px;">
                                    <button type="submit" id="simpan_hki" name="simpan_hki" class="btn btn-success btn-sm">Simpan</button>                                                
                                </div>
                            </div>
                        </form>
                    </div>
                    <!-- form invensi End-->
                </div>
            </div>
        </div>
    </div>
</div>
    