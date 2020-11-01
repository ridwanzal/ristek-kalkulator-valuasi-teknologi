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
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cost based</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Income based</a>
                            </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <br/>
                        <!--cost based here-->
                        <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Penelitian</th>
                                        <th scope="col">Inventor</th>
                                        <th scope="col">Ki</th>
                                        <th scope="col">Pi</th>
                                        <th scope="col">ATBP</th>
                                        <th scope="col">Action</th>
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
                                                        <td><?= $item->judul_penelitian; ?></td>
                                                        <td><?= $item->nama_inventor;?></td>
                                                        <td><?= $item->ki;?></td>
                                                        <td><?= $item->pi;?></td>
                                                        <td><?= $item->atbp;?></td>
                                                        <td><a href="<?php echo base_url();?>manage/riwayat/detail/cost-<?php echo $item->id;?>"><span class="badge badge-primary">Detail</span></a>&nbsp;<a href="#"><span class="badge badge-danger">Hapus</span></a></td>
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
                        <table class="table table-sm table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Judul Invensi</th>
                                        <th scope="col">Nama Inventor</th>
                                        <th scope="col">Nilai NPV</th>
                                        <th scope="col">Action</th>
                                        <T
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
                                                        <td><a href="#"><span class="badge badge-primary">Detail</span></a>&nbsp;<a href="#"><span class="badge badge-danger">Hapus</span></a></td>
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