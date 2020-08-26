<br/>
<?php
    $userdetails = $this->session->userdata('userdetails');
?>
<div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="cmp-tb-hd">
                        <h2>User Information</h2>
                    </div>
                    <div class="form-element-list mg-t-10">
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>Sinta ID</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="Nama Inventor" value="<?php echo $userdetails['sinta_id']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>Nama Peneliti</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="Institusi Penghasil/Pemilik Invensi" value="<?php echo $userdetails['name']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>Google ID</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="Unit Kerja Penghasil/Pemilik Invensi" value="<?php echo $userdetails['google_id']?>">
                                    </div>
                                </div>
                            </div>
                     
                            <div class="col-lg-12 col-md-4 col-sm-12 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>Judul Penelitian</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="Judul Penelitian" value="<?php echo $userdetails['afiliasi']['id']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-4 col-sm-12 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>Total Biaya Masukan/Realisasi Pagu Penelitian (R)</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="Total Biaya Masukan/Realisasi Pagu Penelitian (R)" value="<?php echo $userdetails['afiliasi']['kode_pt']?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="nk-int-mk">
                                    <h2>Asal Biaya Masukan Masukan/Realisasi Pagu Penelitian, misal Hibah Ristek, Dikti Kemendikbud, dll</h2>
                                </div>
                                <div class="form-group ic-cmp-int">
                                    <div class="form-ic-cmp">
                                        <i class="notika-icon notika-support"></i>
                                    </div>
                                    <div class="nk-int-st">
                                        <input type="text" class="form-control" placeholder="Total Biaya Masukan/Realisasi Pagu Penelitian (R)" value="<?php echo $userdetails['afiliasi']['name']?>">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>