<?php
//mengambil data dari AJAX di /incomebased/data_halaman1
($this->session->userdata('inventor')!=null) ? $inventor = $this->session->userdata('inventor'): $inventor=null;
($this->session->userdata('periode')!=null) ? $periode = $this->session->userdata('periode'): $periode=null;
($this->session->userdata('modal')!=null) ? $modal = $this->session->userdata('modal'): $modal=null;
($this->session->userdata('sukubunga')!=null) ? $sukubunga = $this->session->userdata('sukubunga'): $sukubunga=null;
($this->session->userdata('marketsize')!=null) ? $marketsize = $this->session->userdata('marketsize'): $marketsize=null;
($this->session->userdata('marketshare')!=null) ? $marketshare = $this->session->userdata('marketshare'): $marketshare=null;
($this->session->userdata('pagu_maksimal')!=null) ? $pagu_maksimal = $this->session->userdata('pagu_maksimal'): $pagu_maksimal=null;
($this->session->userdata('discount_factor')!=null) ? $discount_factor = $this->session->userdata('discount_factor'): $discount_factor=null;

//jika data diambil dari data non SINTA
foreach ($sikav_hki as $rshki) {   
    $hki_id = $rshki->hki_id;
    $inventor = $rshki->inventor;
    $title = $rshki->title;
    $this->session->set_userdata('sesi_hki', $hki_id);
    $this->session->set_userdata('sesi_inventor', $inventor);
    $this->session->set_userdata('sesi_judul', $title);
}  

?>
<div class="container mt-3 mb-3">
    <div class="row mb-3">
        <div class="col-md-12 center">
            <div class="card text-center">
                <div class="card-header bg-info text-white text-right">
                    Halaman 1. Identitas Invensi dan Parameter Proyeksi
                </div>
                <div class="card-body">
                <!-- <form method="POST" name="frmhalaman1" id="frmhalaman1" action="<?=base_url() ?>manage/add/incomebased_calculator2"> -->
                    <div class="form-group row">                        
                        <label for="inventor" class="col-sm-4 col-form-label text-right">Nama Inventor &nbsp;<span class="badge badge-pill  badge-warning">1.1</span> &nbsp;<a data-toggle="popover" title="Nama Inventor" data-content="Diisi dengan nama Inventor. Jika nama inventor lebih dari 1 orang, silahkan pisahkan dengan tanda koma di antara nama inventor." class="badge badge-info text-white">Info</a> </label>
                        <div class="col-sm-8">
                            <textarea  class="form-control  form-control-sm col-sm-12" id="inventor" name="inventor" aria-describedby="inventorDesc" readonly><?=$this->session->userdata('sesi_inventor'); ?></textarea>
                            <small id="inventorDesc" class="form-text text-muted text-left">Nama Inventor</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="judul" class="col-sm-4 col-form-label text-right">Judul Invensi &nbsp;<span class="badge badge-pill  badge-warning">1.2</span> &nbsp;<a data-toggle="popover" title="Judul Invensi" data-content="Silahkan diisi dengan nama invensi yang telah dihasilkan." class="badge badge-info text-white">Info</a> </label>
                        <div class="col-sm-8">
                            <textarea  class="form-control  form-control-sm col-sm-12" id="judul" name="judul" aria-describedby="judulDesc" readonly><?=$this->session->userdata('sesi_judul'); ?></textarea>
                            <small id="judulDesc" class="form-text text-muted text-left">Judul Invensi</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="periode" class="col-sm-4 col-form-label text-right">Tentukan Periode Proyeksi &nbsp;<span class="badge badge-pill  badge-warning">1.3</span> &nbsp;<a data-toggle="popover" title="Periode Proyeksi" data-content="Isi dengan lama proyeksi dalam satuan tahun." class="badge badge-info text-white">Info</a> </label>
                        <div class="col-md-8 text-left">
                            <select class="form-control form-control-sm col-sm-8" id="periode" name="periode" aria-describedby="periodeDesc">
                            <?php for($i=1;$i<=20;$i++){ ?>    
                                <option value="<?=$i ?>" <?php if($periode==$i){echo "selected=\"selected\"";} ?>><?php echo $i ." Tahun"; ?></option>
                            <?php } ?>
                            </select>
                            <small id="periodeDesc" class="form-text text-muted">Berapa lama periode proyeksi dalam satuan tahun, isi 1 sampai dengan 20</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="modal" class="col-sm-4 col-form-label text-right">Modal Awal/Pinjaman Modal &nbsp;<span class="badge badge-pill  badge-warning">1.4</span> &nbsp;<a data-toggle="popover" title="Modal Awal/Pinjaman Modal" data-content="Besaran modal awal/pinjaman awal yang berasal dari Bank. Memungkinkan untuk memulai usaha dengan menggunakan modal dari pinjaman Bank, jika memang tidak ada biaya dari modal awal dengan dana sendiri." class="badge badge-info text-white">Info</a> </label>
                        <div class="col-md-8 text-left">
                        <input type="text" value="<?= $modal; ?>" class="form-control form-control-sm col-sm-8" id="modal" name="modal" aria-describedby="periodeDesc" placeholder="#.##0,00" required>                        
                            <small id="modalDesc" class="form-text text-muted">Modal awal/Pinjaman Modal</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="sukubunga" class="col-sm-4 col-form-label text-right">Suku Bunga (Interest) Bank &nbsp;<span class="badge badge-pill  badge-warning">1.5</span> &nbsp;<a data-toggle="popover" title="Suku Bunga" data-content="Besaran suku bunga dari pinjaman yang diperoleh dari modal awal pinjaman Bank. Suku bunga tahunan dalam satuan persen (%)." class="badge badge-info text-white">Info</a> </label>
                        <div class="col-md-5 text-left">
                            <input type="text" value="<?= $sukubunga; ?>" class="form-control  form-control-sm col-sm-8" id="sukubunga" name="sukubunga" aria-describedby="sukubungaDesc" placeholder="##0,00%" required>                        
                            <small id="sukubungaDesc" class="form-text text-muted">Suku Bunga (Interest) Bank dalam satuan persen(%)</small>
                        </div>
                        <div class="col-md-3 text-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Referensi Suku Bunga
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" target="_blank" href="https://www.bca.co.id/individu/sarana/kurs-dan-suku-bunga/suku-bunga-dasar-kredit" >BANK BCA</a>
                                    <a class="dropdown-item" target="_blank" href="https://bri.co.id/loan-interest-rates" >BANK BRI</a>
                                    <a class="dropdown-item" target="_blank" href="https://www.bni.co.id/id-id/beranda/sukubungadasarkredit" >BANK BNI</a>
                                    <a class="dropdown-item" target="_blank" href="https://www.bankmandiri.co.id/suku-bunga-dasar-kredit" >BANK MANDIRI</a>
                                    <a class="dropdown-item" target="_blank" href="https://www.btn.co.id/id/Conventional/Product-Links/Produk-BTN/SBDK/SBDK/Suku-Bunga-Dasar-Kredit" >BANK BTN</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="marketsize" class="col-sm-4 col-form-label text-right">Market Size &nbsp;<span class="badge badge-pill  badge-warning">1.6</span> &nbsp;<a data-toggle="popover" title="Market Size" data-content="Proyeksi banyaknya jumlah unit dengan produk serupa, yang ada di pasaran." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-8">
                            <input type="text" value="<?= $marketsize; ?>" class="form-control  form-control-sm col-sm-8" id="marketsize" name="marketsize" aria-describedby="marketsiezeDesc" placeholder="#.##0,00" required>
                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi nilai numerik dengan satuan unit</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="marketshare" class="col-sm-4 col-form-label text-right">Market Share &nbsp;<span class="badge badge-pill  badge-warning">1.7</span> &nbsp;<a data-toggle="popover" title="Market Share" data-content="Proyeksi jenis market share dari produk yang akan dihasilkan. Jumlah prosentase merupakan jumlah maksimal yang akan dihasilkan, merupakan fungsi pesimis dan optimis." class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-8 text-left">
                            <select class="form-control form-control-sm col-sm-8" id="marketshare" name="marketshare" aria-describedby="marketshareDesc">
                                <option value="persen1" <?php if($marketshare=="persen1"){echo "selected=\"seletected\"";} ?>>Superior/Breakthrough Technology (<=25%)</option>
                                <option value="persen2" <?php if($marketshare=="persen2"){echo "selected=\"seletected\"";} ?>>Improvement Technology <=15%</option>
                                <option value="persen3" <?php if($marketshare=="persen3"){echo "selected=\"seletected\"";} ?>>Alternative Technology <=10%</option>
                            </select>                        
                            <small id="marketshareDesc" class="form-text text-muted">Pilih Prosentase untuk menghasilkan market share</small>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label for="pagu_maksimal" class="col-sm-4 col-form-label text-right">Pagu maksimal jumlah produksi &nbsp;<span class="badge badge-pill  badge-warning">1.8</span> &nbsp;<a data-toggle="popover" title="Jumlah Produksi" data-content="Proyeksi jumlah maksimal produksi dari unit produk yang dihasilkan dari invensi. Jumlah ini merupakan pagu maksimal yang nantinya digunakan pada halaman ke - 2. Nilai ini diperoleh dari hasil perkalian antara 1.6 Market Size dan 1.7 Prosentase Market Share." class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-8 text-left">
                            <input type="text" value="<?= $pagu_maksimal; ?>" class="form-control  form-control-sm col-sm-8" id="pagu_maksimal" name="pagu_maksimal" aria-describedby="paguDesc" readonly required>
                            <small id="paguDesc" class="form-text text-muted">Hasil perkalian market size dan market share</small>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label for="discount_factor" class="col-sm-4 col-form-label text-right">Discount Factor &nbsp;<span class="badge badge-pill  badge-warning">1.9</span> &nbsp;<a data-toggle="popover" title="Tabel Discount Factor" data-content="Digunakan sebagai Discount Factor untuk menentukan Prosentase Discount, untuk mendapatkan nilai Discounted FCF." class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-8 text-left">
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" value="<?= $discount_factor; ?>" class="form-control form-control-sm col-sm-8 pencarian" id="discount_factor" name="discount_factor" aria-describedby="discount_factorDesc" required>
                                    <small id="discount_factorDesc" class="form-text text-muted">Tabel rujukan Discount Factor</small>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">&#187; Tabel Discount Factor</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <div class="col-md-4 text-right">
                            <a href="<?=base_url() ?>manage/add/incomebased" id="kembali" name="kembali" class="btn btn-xs btn-outline-danger btn-block">Kembali</a>
                            <!-- <button href="<?php echo base_url(); ?>manage/add/incomebased" id="kembali" name="kembali" class="btn btn-xs btn-outline-danger btn-block">Kembali</button> -->
                        </div>
                        <div class="col-md-4 text-left">
                            <!-- <input type="submit" class="btn btn-success btn-sm" id="tombol1" name="tombol1" value="Lanjut Halaman 2"> -->
                            <button href="<?php echo base_url(); ?>manage/add/incomebased_calculator2" id="tombol1" name="tombol1" class="btn btn-xs btn-outline-primary btn-block">Lanjut Halaman 2</button>
                        </div>
                        <div class="col-md-4 text-left">
                            <div class="loader"></div>
                        </div>
                    </div>
                <!-- </form>   Form Halaman 1 END -->
                </div>
            </div>
        </div>
    </div> 

    <!-- Modal Discount Factor -->
    <div class="modal fade" data-backdrop="static" id="myModal" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">                        
                    <h5 class="modal-title" id="exampleModalLabel">Tabel Discount Factor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table id="example" class="table table-bordered table-responsive table-hover table-sm">
                        <thead>
                            <tr>
                                <th class="bg-primary text-white">Periode</th>
                                <th><a id="data" onClick="masuk(this,'4%')" href="javascript:void(0)">4%</a></th>
                                <th><a id="data" onClick="masuk(this,'5%')" href="javascript:void(0)">5%</a></th>
                                <th><a id="data" onClick="masuk(this,'6%')" href="javascript:void(0)">6%</a></th>
                                <th><a id="data" onClick="masuk(this,'7%')" href="javascript:void(0)">7%</a></th>
                                <th><a id="data" onClick="masuk(this,'8%')" href="javascript:void(0)">8%</a></th>
                                <th><a id="data" onClick="masuk(this,'9%')" href="javascript:void(0)">9%</a></th>
                                <th><a id="data" onClick="masuk(this,'10%')" href="javascript:void(0)">10%</a></th>
                                <th><a id="data" onClick="masuk(this,'11%')" href="javascript:void(0)">11%</a></th>
                                <th><a id="data" onClick="masuk(this,'12%')" href="javascript:void(0)">12%</a></th>
                                <th><a id="data" onClick="masuk(this,'13%')" href="javascript:void(0)">13%</a></th>
                                <th><a id="data" onClick="masuk(this,'14%')" href="javascript:void(0)">14%</a></th>
                                <th><a id="data" onClick="masuk(this,'15%')" href="javascript:void(0)">15%</a></th>
                                <th><a id="data" onClick="masuk(this,'20%')" href="javascript:void(0)">20%</a></th>
                                <th><a id="data" onClick="masuk(this,'25%')" href="javascript:void(0)">25%</a></th>
                                <th><a id="data" onClick="masuk(this,'30%')" href="javascript:void(0)">30%</a></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                                $nomor = 1;
                                foreach ($sikav_discount_factor as $rsdiscount) { 
                                    $d_4 = $rsdiscount->d_4;
                                    $d_5 = $rsdiscount->d_5;
                                    $d_6 = $rsdiscount->d_6;
                                    $d_7 = $rsdiscount->d_7;
                                    $d_8 = $rsdiscount->d_8;
                                    $d_9 = $rsdiscount->d_9;
                                    $d_10 = $rsdiscount->d_10;
                                    $d_11 = $rsdiscount->d_11;
                                    $d_12 = $rsdiscount->d_12;
                                    $d_13 = $rsdiscount->d_13;
                                    $d_14 = $rsdiscount->d_14;
                                    $d_15 = $rsdiscount->d_15;
                                    $d_20 = $rsdiscount->d_20;
                                    $d_25 = $rsdiscount->d_25;
                                    $d_30 = $rsdiscount->d_30;
                            ?>
                            <tr>
                                <td class="bg-primary text-white"><?php echo $nomor; ?></td>
                                <td><?php echo $d_4; ?></td>
                                <td><?php echo $d_5; ?></td>
                                <td><?php echo $d_6; ?></td>
                                <td><?php echo $d_7; ?></td>
                                <td><?php echo $d_8; ?></td>
                                <td><?php echo $d_9; ?></td>
                                <td><?php echo $d_10; ?></td>
                                <td><?php echo $d_11; ?></td>
                                <td><?php echo $d_12; ?></td>
                                <td><?php echo $d_13; ?></td>
                                <td><?php echo $d_14; ?></td>
                                <td><?php echo $d_15; ?></td>
                                <td><?php echo $d_20; ?></td>
                                <td><?php echo $d_25; ?></td>
                                <td><?php echo $d_30; ?></td>

                            </tr>                        
                            <?php $nomor++; } ?>
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div> 
        </div>
    </div> 
    <!-- Modal Discount Factor END -->
</div>
