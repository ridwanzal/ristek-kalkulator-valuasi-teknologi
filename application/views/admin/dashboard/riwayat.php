<?php
    // user details json
    /* {
        "sinta_id":"1",
        "name":"ANIS MASHDUROHATUN",
        "google_id":"J0lVGsoAAAAJ",
        "afiliasi":{
                "id":"3",
                "kode_pt":"061002",
                "name":"Universitas Islam Sultan Agung"
            }
        }
     */
    $userdetails = $this->session->userdata('userdetails');
    //fungsi untuk menampilkan angka dalam rupiah
    function rupiah($angka){
        $hasil_rupiah = number_format($angka,2,',','.');
        return $hasil_rupiah;
    }
?>

<section class="section_main_wrapper">
    <div class="form-element-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><ion-icon name="cash"></ion-icon>&nbsp;&nbsp;Cost based</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><ion-icon name="briefcase"></ion-icon>&nbsp;&nbsp;Income based</a>
                            </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br/>
                        <!--cost based here-->
                        <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Penelitian</th>
                                        <th scope="col">Inventor</th>
                                        <th scope="col">Ki (Rp.)</th>
                                        <th scope="col">Pi (Rp.)</th>
                                        <th scope="col">ATBP (Rp.)</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Tindakan</th>
                                        <T
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(sizeof($costbased) < 1){
                                            ?>
                                                <tr>
                                                    <td colspan="7"><center>Belum ada data</center></td>
                                                </tr>
                                            <?php
                                        }else{
                                            $i = 1;
                                            foreach($costbased as $item){
                                                ?>
                                                    <tr>
                                                        <td><?= $i;?></td>
                                                        <td class="font-weight-medium"><?= $item->judul_penelitian; ?></td>
                                                        <td><?= $item->nama_inventor;?></td>
                                                        <td><?= rupiah($item->ki);?></td>
                                                        <td><?= rupiah($item->pi);?></td>
                                                        <td><?= rupiah($item->atbp);?></td>
                                                        <td>
                                                        <?php
                                                            $datetime = $item->tanggal; 
                                                            $date = explode(" ", $datetime);
                                                            $dateform = explode("-", $date[0]);
                                                            $str = date($dateform[0].$dateform[1].$dateform[2]);
                                                            echo date('d F Y', strtotime($str));
                                                        ?>
                                                        </td>
                                                        <td>
                                                        <!-- <a href="<?php echo base_url();?>manage/riwayat/detail/cost-<?php echo $item->id;?>"><span class="badge badge-primary">Detail</span></a>&nbsp; -->
                                                        <a href="<?php echo base_url();?>manage/riwayat/laporan/cost-<?php echo $item->id;?>"><span class="badge badge-success" style="padding:3px 7px 7px 7px;"><ion-icon style="position:relative;top:3px;"name="easel-outline"></ion-icon>&nbsp;&nbsp;Report</span></a>&nbsp;
                                                        <a onclick="deleteConfirm('<?php echo site_url('manage/delete/costbased_kalkulasi/'.$item->id) ?>')" href="#!"><span class="badge badge-danger" style="padding:3px 7px 7px 7px;"><ion-icon style="position:relative;top:3px;"name="trash-outline"></ion-icon>&nbsp;Hapus</span></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                  $i = $i + 1;
                                            }
                                        }
                                    ?>
                                </tbody>
                            </table>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!--income based here-->
                        <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Invensi</th>
                                        <th scope="col">Nama Inventor</th>
                                        <th scope="col">Nilai NPV</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                        if(sizeof($incomebased) < 1){
                                            ?>
                                                <tr>
                                                    <td colspan="7"><center>Belum ada data</center></td>
                                                </tr>
                                            <?php
                                        }else{
                                            $i = 1;
                                            foreach($incomebased as $item){
                                                ?>
                                                    <tr>
                                                        <td><?= $i;?></td>
                                                        <td><?= $item->hki_judul; ?></td>
                                                        <td><?= $item->hki_inventor;?></td>
                                                        <td><?= rupiah($item->nilai_npv);?></td>
                                                        <?php
                                                            $datetime = $item->tanggal; 
                                                            $date = explode(" ", $datetime);
                                                            $dateform = explode("-", $date[0]);
                                                            $str = date($dateform[0].$dateform[1].$dateform[2]);
                                                            echo date('d F Y', strtotime($str));
                                                        ?>
                                                        <td><?= date('d F Y', strtotime($str));?></td>
                                                        <td>
                                                            <a href="<?php echo base_url();?>manage/riwayat/laporan/income-<?php echo $item->id;?>"><span class="badge badge-success" style="padding:3px 7px 7px 7px;"><ion-icon style="position:relative;top:3px;"name="easel-outline"></ion-icon>&nbsp;Report</span></a>&nbsp;
                                                            <a onclick="deleteConfirm('<?php echo site_url('manage/delete/incomebased_kalkulasi/'.$item->id) ?>')" href="#!"><span class="badge badge-danger" style="padding:3px 7px 7px 7px;"><ion-icon style="position:relative;top:3px;"name="trash-outline"></ion-icon>&nbsp;Hapus</span></a>
                                                        </td>
                                                    </tr>
                                                <?php
                                                  $i = $i + 1;
                                            }
                                        }
                                    ?>
                                </tbody>
                        </table>
                    </div>
                    <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> -->
                        <!--market based here-->
                    <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
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
    function deleteConfirm(url){
        $('#btn-delete').attr('href', url);
        $('#deleteModal').modal();
    }
</script>