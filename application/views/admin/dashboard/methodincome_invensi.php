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
                                    <label>No. Permohonan <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="nomor_permohonan" name="nomor_permohonan" class="form-control form-control-sm" placeholder="Masukkan Nomor Permohonan" value="<?php echo $this->input->post('nomor_permohonan'); ?>"> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>No. Publikasi</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="no_publikasi" name="no_publikasi" class="form-control form-control-sm" placeholder="Masukkan Nomor Publikasi" value="<?php echo $this->input->post('no_publikasi'); ?>"> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Tgl. Publikasi</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">                                    
                                    <input type="text" id="tgl_publikasi" name="tgl_publikasi" class="form-control datepicker form-control-sm" placeholder="0000-00-00" value="<?php echo $this->input->post('tgl_publikasi'); ?>">                                     
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Title <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <textarea id="title" name="title" rows="2" class="form-control form-control-sm" placeholder="Masukkan Judul Invensi"><?php echo $this->input->post('title'); ?></textarea> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Kategori <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <select id="kategori" name="kategori" class="form-control form-control-sm">
                                        <option value="Paten" <?php if($this->input->post('jenis')=='Paten'){echo "selected=\"selected\"";} ?>>Paten</option>
                                        <option value="Paten Sederhana" <?php if($this->input->post('jenis')=='Paten Sederhana'){echo "selected=\"selected\"";} ?>>Paten Sederhana</option>                                        
                                        <option value="Merk Dagang" <?php if($this->input->post('jenis')=='Merk Dagang'){echo "selected=\"selected\"";} ?>>Merk Dagang</option>
                                        <option value="Rahasia Dagang" <?php if($this->input->post('jenis')=='Rahasia Dagang'){echo "selected=\"selected\"";} ?>>Rahasia Dagang</option>
                                        <option value="Desain Produk Industri" <?php if($this->input->post('jenis')=='Desain Produk Industri'){echo "selected=\"selected\"";} ?>>Desain Produk Industri</option>
                                        <option value="Indikasi Geografis" <?php if($this->input->post('jenis')=='Indikasi Geografis'){echo "selected=\"selected\"";} ?>>Indikasi Geografis</option>
                                        <option value="Perlindungan Varietas Tanaman" <?php if($this->input->post('jenis')=='Perlindungan Varietas Tanaman'){echo "selected=\"selected\"";} ?>>Perlindungan Varietas Tanaman</option>
                                        <option value="Perlindungan Topografi Sirkuit Terpadu" <?php if($this->input->post('jenis')=='Perlindungan Topografi Sirkuit Terpadu'){echo "selected=\"selected\"";} ?>>Perlindungan Topografi Sirkuit Terpadu</option>
                                    </select>
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Tahun Permohonan</label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="tahun_permohonan" name="tahun_permohonan" class="form-control form-control-sm" placeholder="0000" value="<?php echo $this->input->post('tahun_permohonan'); ?>"> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Pemegang Paten <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <textarea id="pemegang_paten" name="pemegang_paten" rows="1" class="form-control form-control-sm" placeholder="Masukkan Pemegang Paten"><?php echo $this->input->post('pemegang_paten'); ?></textarea> 
                                </div>    
                                <div class="col-md-3 text-right">
                                    <label>Inventor <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <textarea id="inventor" name="inventor" rows="1" class="form-control form-control-sm" placeholder="Masukkan Inventor"><?php echo $this->input->post('inventor'); ?></textarea> 
                                </div>                                              
                                <div class="col-md-3 text-right">
                                    <label>No. Registrasi</label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="no_registrasi" name="no_registrasi" class="form-control form-control-sm" placeholder="Nomor Registrasi" value="<?php echo $this->input->post('no_registrasi'); ?>">
                                </div>         
                                <div class="col-md-3 text-right">
                                    <label>Tgl. Registrasi</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">                                    
                                    <input type="text" id="tgl_registrasi" name="tgl_registrasi" class="form-control datepicker form-control-sm" placeholder="0000-00-00" value="<?php echo $this->input->post('tgl_registrasi'); ?>">                                     
                                </div>                       
                                <div class="col-md-3 text-right">
                                    <label>Status <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9 text-left" style="padding-bottom: 5px;">
                                    <div class="form-check-inline text-left">
                                        <input type="radio" name="status" value="terdaftar" <?php if($this->input->post('status')=="terdaftar"){ echo "checked";}?> class="form-check-input form-control-sm" />
                                        <label>Terdaftar</label>
                                    </div>
                                    <div class="form-check-inline text-left">
                                        <input type="radio" name="status" value="granted" <?php if($this->input->post('status')=="granted"){ echo "checked";}?> class="form-check-input form-control-sm" />
                                        <label>Granted</label>
                                    </div>
                                </div>                                
                                <div class="col-md-3 text-right">
                                    <label>&nbsp;</label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">                                    
                                    <div class="text-left"><small><i style="color: red">* required</i></small></div>
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
    