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
                    Update Data Invensi                    
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
                    <form action="<?= base_url('incomebased/edit') ?>" method="post" enctype="multipart/form-data">
                            <div class="row">
                            <?php
                            //inisialisasi variabel untuk proses update
                            if(isset($sikav_hki)){
                                foreach ($sikav_hki as $rshki) {   
                                    $hki_id = $rshki->hki_id;
                                    $sinta_id = $rshki->sinta_id;
                                    $email = $rshki->email;
                                    $inventor = $rshki->inventor;
                                    $judul = $rshki->judul;
                                    $jenis = $rshki->jenis;
                                    $tahun = $rshki->tahun;
                                    $no_daftar = $rshki->no_daftar;
                                    $status = $rshki->status;
                                    $no_hki = $rshki->no_hki;
                                    $url_hki = $rshki->url_hki;
                                    $berkas = $rshki->berkas;
                                }
                            }
                            ?>
                                <div class="col-md-3 text-right">
                                    <label>Inventor <i style="color: red">*</i></label>
                                    <?php if(isset($hki_id)){ ?>
                                        <input type="hidden" name="hki_id" value="<?php echo $hki_id; ?>" />
                                    <?php } ?>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="inventor" name="inventor" class="form-control form-control-sm" placeholder="Pisahkan tanda titik koma, jika inventor lebih dari satu." value="<?php if(isset($inventor)){echo $inventor;}else{echo $this->input->post('inventor');} ?>"> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Judul <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <textarea id="judul" name="judul" rows="4" class="form-control form-control-sm" placeholder="Masukkan Judul Penelitian/Judul Invensi"><?php if(isset($judul)){echo $judul;}else{echo $this->input->post('judul');} ?></textarea> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Jenis HKI <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <select id="jenis" name="jenis" class="form-control form-control-sm">
                                        <option value="Paten" <?php if($jenis=='Paten'){echo "selected=\"selected\"";} ?>>Paten</option>
                                        <option value="Paten Sederhana" <?php if($jenis=='Paten Sederhana'){echo "selected=\"selected\"";} ?>>Paten Sederhana</option>                                        
                                        <option value="Merk Dagang" <?php if($jenis=='Merk Dagang'){echo "selected=\"selected\"";} ?>>Merk Dagang</option>
                                        <option value="Rahasia Dagang" <?php if($jenis=='Rahasia Dagang'){echo "selected=\"selected\"";} ?>>Rahasia Dagang</option>
                                        <option value="Desain Produk Industri" <?php if($jenis=='Desain Produk Industri'){echo "selected=\"selected\"";} ?>>Desain Produk Industri</option>
                                        <option value="Indikasi Geografis" <?php if($jenis=='Indikasi Geografis'){echo "selected=\"selected\"";} ?>>Indikasi Geografis</option>
                                        <option value="Perlindungan Varietas Tanaman" <?php if($jenis=='Perlindungan Varietas Tanaman'){echo "selected=\"selected\"";} ?>>Perlindungan Varietas Tanaman</option>
                                        <option value="Perlindungan Topografi Sirkuit Terpadu" <?php if($jenis=='Perlindungan Topografi Sirkuit Terpadu'){echo "selected=\"selected\"";} ?>>Perlindungan Topografi Sirkuit Terpadu</option>
                                    </select>
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Tahun Pelaksanaan <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <select class="form-control form-control-sm" id="tahun" name="tahun">
                                        <?php for($i=(date('Y')-15);$i<=date('Y');$i++){ ?>
                                        <option value="<?php echo $i; ?>" <?php if($tahun==$i){echo "selected=\"selected\"";} ?>><?= $i ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>No. Pendaftaran <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="no_daftar" name="no_daftar" class="form-control form-control-sm" placeholder="Nomor Pendaftaran Paten" value="<?php if(isset($no_daftar)){echo $no_daftar;}else{echo $this->input->post('no_daftar');} ?>">
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Status <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <div class="form-check-inline text-left">
                                        <input type="radio" name="status" value="terdaftar" <?php if($status=="terdaftar"){ echo "checked";}?> class="form-check-input form-control-sm" />
                                        <label>Terdaftar</label>
                                    </div>
                                    <div class="form-check-inline text-left">
                                        <input type="radio" name="status" value="granted" <?php if($status=="granted"){ echo "checked";}?> class="form-check-input form-control-sm" />
                                        <label>Granted</label>
                                    </div>
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Nomor HKI <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="no_hki" name="no_hki" class="form-control form-control-sm" placeholder="Nomor HKI" value="<?php if(isset($no_hki)){echo $no_hki;}else{echo $this->input->post('no_hki');} ?>">
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>URL HKI <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="url_hki" name="url_hki" class="form-control form-control-sm" placeholder="URL HKI" value="<?php if(isset($url_hki)){echo $url_hki;}else{echo $this->input->post('url_hki');} ?>">
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
    