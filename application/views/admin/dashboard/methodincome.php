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
                    Riwayat Kalkulasi Inovasi Teknologi                    
                </div>
                <div class="card-body">
                    <div class="card-title text-right">
                        <!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#invensiModal">Tambah Invensi</button> -->
                        <a href="<?=base_url() ?>manage/add/incomebased_invensi" class="btn btn-success btn-sm">Tambah Invensi</a>
                    </div>
                    <table class="table table-bordered table-hover table-sm">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Data Invensi</th>
                            <th scope="col">Valuasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $nomor = 1;
                                foreach ($sikav_hki as $rshki) {   
                                $hki_id = $rshki->hki_id;  
                            ?>
                            <tr>
                            <th scope="row"><?= $nomor; ?></th>
                            <td  class="text-left"><?= $rshki->judul; ?>
                                <br /><?= $rshki->jenis; ?> | <?= $rshki->no_daftar; ?> | <?= $rshki->tahun; ?> | <?= $rshki->status; ?> | <?= $rshki->no_hki; ?>
                                <br /><a href="<?=base_url() ?>manage/add/incomebased_invensi" class="btn btn-warning btn-sm">Ubah</a>
                                <a href="<?=base_url() ?>manage/add/incomebased_invensi" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                            
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Kalkulasi
                                    </button>
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator1">Hitung Valuasi</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator1"">Edit</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator1"">Hapus</a>
                                    </div>
                                </div>
                            </td>
                            </tr>
                            <?php $nomor++; } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>