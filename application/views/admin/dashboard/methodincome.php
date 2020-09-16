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
                            <tr>
                            <th scope="row">1</th>
                            <td  class="text-left">Prototipe alat pendeteksi kebocoran gas beracun CO pada mobil menggunakan Array Sensor berbasis SMS Gateway
                                <br />Jenis HKI | No. Pendaftaran | Tahun Pelaksanaan | Status | No. HKI
                                <br /><a href="<?=base_url() ?>manage/add/incomebased_invensi" class="btn btn-warning btn-sm">Ubah</a>
                                <a href="<?=base_url() ?>manage/add/incomebased_invensi" class="btn btn-danger btn-sm">Hapus</a>
                            </td>
                            
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
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
                            <tr>
                            <th scope="row">2</th>
                            <td class="text-left">The Design of The Monitoring Tools Of Clean Air Condition And Dangerous Gas CO, CO2 CH4 In Chemical Laboratory By Using Fuzzy Logic Based On Microcontroller</td>
                            
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
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
                            <tr>
                            <th scope="row">3</th>
                            <td class="text-left">A Flood Early Warning System Design Based on Water Level Using Fuzzy Logic and Short Message Service Gateway</td>
                            
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
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
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
</div>