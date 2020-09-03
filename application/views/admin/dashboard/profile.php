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
?>

<section class="section_main_wrapper">
    <div class="form-element-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- <h5 class="card-title">Buat kalkulasi perhitungan paten : </h5>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Tambah Kalkulasi baru
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="<?php echo base_url();?>manage/add/costbased">Cost Based</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?php echo base_url();?>manage/add/incomebased">Income Based</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="<?php echo base_url();?>manage/add/marketbased">Market Based</a>
                                        </div>
                                    </div> -->
                                    <div class="row">
                                        <div class="col-lg-2 col-md-2 col-xs-2">
                                            <img id="img_user" src="<?php echo base_url();?>assets/frontview/img/no_photo.svg">
                                        </div>
                                        <div class="col-lg-10 col-md-10 col-xs-10">
                                        <div class="form-row">
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationTooltip01">Sinta ID</label>
                                                    <input disabled type="text" class="form-control" id="validationTooltip01" placeholder="First name" title="<?= $userdetails['sinta_id']; ?>"  value="<?= $userdetails['sinta_id']; ?>" required>
                                                    <div class="valid-tooltip">
                                                        <?= $userdetails['sinta_id']; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationTooltip02">Nama</label>
                                                    <input disabled type="text" class="form-control" id="validationTooltip02" placeholder="Last name" title="<?= $userdetails['name']; ?>" value="<?= $userdetails['name']; ?>" required>
                                                    <div class="valid-tooltip">
                                                        <?= $userdetails['name']; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationTooltip02">Google Scholar ID</label>
                                                    <input disabled type="text" class="form-control" id="validationTooltip02" placeholder="Last name" title="<?= $userdetails['google_id']; ?>" value="<?= $userdetails['google_id']; ?>" required>
                                                    <div class="valid-tooltip">
                                                        <?= $userdetails['google_id']; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 mb-3">
                                                    <label for="validationTooltip02">Afiliasi</label>
                                                    <input disabled type="text" class="form-control" id="validationTooltip02" placeholder="Last name" tile="<?= $userdetails['afiliasi']['name']; ?>" value="<?= $userdetails['afiliasi']['name']; ?>" required>
                                                    <div class="valid-tooltip">
                                                        <?= $userdetails['afiliasi']['name']; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>