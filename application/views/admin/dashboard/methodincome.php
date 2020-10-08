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
                    <div class="tab-content">                        
                        <div class="card-title text-right mt-2">
                            <!-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#invensiModal">Tambah Invensi</button> -->
                            <div class="row">                                        
                                <div class="col-md-8 center">                                    
                                    <?php if ($this->session->flashdata('pesan')): ?>
                                        <div class="alert alert-success alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                            <h4><i class="icon fa fa-check"></i> Informasi!</h4>
                                            <?php echo $this->session->flashdata('pesan'); ?>
                                        </div>
                                    <?php endif; ?>
                                    <div class="pesan"></div>
                                    <div class="loader"></div>
                                </div>
                                <div class="col-md-2 right">
                                    <button id="sinkronisasi" name="sinkronisasi" class="btn btn-warning btn-sm">Sinkronisasi Data SINTA</button>
                                </div>
                                <div class="col-md-2 right">
                                    <a href="<?=base_url() ?>manage/add/incomebased_invensi" class="btn btn-success btn-sm">Tambah Invensi</a>
                                </div>
                            </div>
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
                                <td  class="text-left"><?= $rshki->title; ?>
                                    <br /><?= $rshki->inventor; ?> | <?= $rshki->kategori; ?> | <?= $rshki->nomor_permohonan; ?> | <?= $rshki->tahun_permohonan; ?> | <?= $rshki->pemegang_paten; ?> | <?= $rshki->status; ?> | <?= $rshki->no_publikasi; ?> | <?= $rshki->tgl_publikasi; ?> | <?= $rshki->no_registrasi; ?> | <?= $rshki->tgl_registrasi; ?>
                                    <br /><a href="<?=base_url('manage/edit/incomebased_invensi/'.$rshki->hki_id) ?>" class="btn btn-warning btn-sm">Ubah</a>
                                    <!-- <a href="<?=base_url() ?>manage/add/incomebased_invensi" class="btn btn-danger btn-sm">Hapus</a> -->
                                    <a onclick="deleteConfirm('<?php echo site_url('manage/delete/incomebased_invensi/'.$rshki->hki_id) ?>')"
                                    href="#!" class="btn btn-danger btn-sm"> Hapus</a>
                                </td>
                                
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Kalkulasi
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator1/<?php echo $hki_id; ?>" >Hitung Valuasi</a>
                                            <!--
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator1"">Edit</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?=base_url() ?>manage/add/incomebased_calculator1"">Hapus</a>
                                            -->
                                        </div>
                                    </div>
                                </td>
                                </tr>
                                <?php $nomor++; } ?>
                            </tbody>
                        </table>                        
                    </div> <!-- END CONTENT -->
                </div>
            </div>
        </div>
    </div>   
</div>

<!-- Modal Delete Confirmation-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-light">
        <h3 class="modal-title" id="exampleModalLabel">Apakah Data Dihapus?</h3>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Batal</button>
        <a id="btn-delete" class="btn btn-danger btn-sm" href="#">Delete</a>
      </div>
    </div>
  </div>
</div>
<!-- Trigger Modal Delete Confirmation-->
<script type="text/javascript" src="<?php echo base_url('assets/frontview/js/jquery-3.3.1.min.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $('.nav-tabs a[href="#sinta"]').tab('show');
        $('.nav-tabs a[href="#nonsinta"]').trigger('click');
    });
    function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>