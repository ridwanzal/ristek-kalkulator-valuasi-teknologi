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
                                    $id = $rshki->id;
                                    $kategori = $rshki->kategori;
                                    $nomor_permohonan = $rshki->nomor_permohonan;
                                    $title = $rshki->title;
                                    $tahun_permohonan = $rshki->tahun_permohonan;
                                    $pemegang_paten = $rshki->pemegang_paten;
                                    $inventor = $rshki->inventor;
                                    $status = $rshki->status;
                                    $no_publikasi = $rshki->no_publikasi;
                                    $tgl_publikasi = $rshki->tgl_publikasi;
                                    $no_registrasi = $rshki->no_registrasi;
                                    $tgl_registrasi = $rshki->tgl_registrasi;
                                }
                            }
                            ?>
                                <?php if(isset($hki_id)){ ?>
                                    <input type="hidden" name="hki_id" value="<?php echo $hki_id; ?>" />
                                <?php } ?>
                                <div class="col-md-3 text-right">
                                    <label>No. Permohonan <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="nomor_permohonan" name="nomor_permohonan" class="form-control form-control-sm" placeholder="Masukkan Nomor Permohonan" value="<?php if(isset($nomor_permohonan)){echo $nomor_permohonan;}else{echo $this->input->post('nomor_permohonan');} ?>"> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>No. Publikasi</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="no_publikasi" name="no_publikasi" class="form-control form-control-sm" placeholder="Masukkan Nomor Publikasi" value="<?php if(isset($no_publikasi)){echo $no_publikasi;}else{echo $this->input->post('no_publikasi');} ?>"> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Tgl. Publikasi</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">                                    
                                    <input type="text" id="tgl_publikasi" name="tgl_publikasi" class="form-control datepicker form-control-sm" placeholder="0000-00-00" value="<?php if(isset($tgl_publikasi)){echo $tgl_publikasi;}else{echo $this->input->post('tgl_publikasi');} ?>">                                     
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Title <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <textarea id="title" name="title" rows="2" class="form-control form-control-sm" placeholder="Masukkan Judul Invensi"><?php if(isset($title)){echo $title;}else{echo $this->input->post('title');} ?></textarea> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Kategori <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <select id="kategori" name="kategori" class="form-control form-control-sm">
                                        <option value="Paten" <?php if($kategori=='Paten'){echo "selected=\"selected\"";} ?>>Paten</option>
                                        <option value="Paten Sederhana" <?php if($kategori=='Paten Sederhana'){echo "selected=\"selected\"";} ?>>Paten Sederhana</option>                                        
                                        <option value="Merk Dagang" <?php if($kategori=='Merk Dagang'){echo "selected=\"selected\"";} ?>>Merk Dagang</option>
                                        <option value="Rahasia Dagang" <?php if($kategori=='Rahasia Dagang'){echo "selected=\"selected\"";} ?>>Rahasia Dagang</option>
                                        <option value="Desain Produk Industri" <?php if($kategori=='Desain Produk Industri'){echo "selected=\"selected\"";} ?>>Desain Produk Industri</option>
                                        <option value="Indikasi Geografis" <?php if($kategori=='Indikasi Geografis'){echo "selected=\"selected\"";} ?>>Indikasi Geografis</option>
                                        <option value="Perlindungan Varietas Tanaman" <?php if($kategori=='Perlindungan Varietas Tanaman'){echo "selected=\"selected\"";} ?>>Perlindungan Varietas Tanaman</option>
                                        <option value="Perlindungan Topografi Sirkuit Terpadu" <?php if($kategori=='Perlindungan Topografi Sirkuit Terpadu'){echo "selected=\"selected\"";} ?>>Perlindungan Topografi Sirkuit Terpadu</option>
                                    </select>
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Tahun Permohonan</label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="tahun_permohonan" name="tahun_permohonan" class="form-control form-control-sm" placeholder="0000" value="<?php if(isset($tahun_permohonan)){echo $tahun_permohonan;}else{echo $this->input->post('tahun_permohonan');} ?>"> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Lembaga Pemegang Paten <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <textarea id="pemegang_paten" name="pemegang_paten" rows="2" class="form-control form-control-sm" placeholder="Masukkan Pemegang Paten"><?php if(isset($pemegang_paten)){echo $pemegang_paten;}else{echo $this->input->post('pemegang_paten');} ?></textarea> 
                                </div>
                                <div class="col-md-3 text-right">
                                    <label>Inventor <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <textarea id="inventor" name="inventor" rows="2" class="form-control form-control-sm" placeholder="Masukkan Inventor"><?php if(isset($inventor)){echo $inventor;}else{echo $this->input->post('inventor');} ?></textarea> 
                                </div>  
                                <div class="col-md-3 text-right">
                                    <label>No. Registrasi</label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">
                                    <input type="text" id="no_registrasi" name="no_registrasi" class="form-control form-control-sm" placeholder="Nomor Registrasi" value="<?php if(isset($no_registrasi)){echo $no_registrasi;}else{echo $this->input->post('no_registrasi');} ?>">
                                </div>    
                                <div class="col-md-3 text-right">
                                    <label>Tgl. Registrasi</i></label>
                                </div>
                                <div class="col-md-9" style="padding-bottom: 5px;">                                    
                                    <input type="text" id="tgl_registrasi" name="tgl_registrasi" class="form-control datepicker form-control-sm" placeholder="0000-00-00" value="<?php if(isset($tgl_registrasi)){echo $tgl_registrasi;}else{echo $this->input->post('tgl_registrasi');} ?>">                                     
                                </div>                          
                                <div class="col-md-3 text-right">
                                    <label>Status <i style="color: red">*</i></label>
                                </div>
                                <div class="col-md-9 text-left" style="padding-bottom: 5px;">
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
    