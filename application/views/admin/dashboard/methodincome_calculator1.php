<?php
//mengambil data dari AJAX di /incomebased/data_halaman1
($this->session->userdata('inventor')!=null) ? $inventor = $this->session->userdata('inventor'): $inventor=null;
($this->session->userdata('periode')!=null) ? $periode = $this->session->userdata('periode'): $periode=null;
($this->session->userdata('modal')!=null) ? $modal = $this->session->userdata('modal'): $modal=null;
($this->session->userdata('sukubunga')!=null) ? $sukubunga = $this->session->userdata('sukubunga'): $sukubunga=null;
($this->session->userdata('marketsize')!=null) ? $marketsize = $this->session->userdata('marketsize'): $marketsize=null;
($this->session->userdata('marketshare')!=null) ? $marketshare = $this->session->userdata('marketshare'): $marketshare=null;
($this->session->userdata('qty')!=null) ? $qty = $this->session->userdata('qty'): $qty=null;
//if($this->session->userdata('inventor')){
//    $inventor = $this->session->userdata('inventor');
//    $periode = $this->session->userdata('periode');
//    $modal = $this->session->userdata('modal');
//    $sukubunga = $this->session->userdata('sukubunga');
//    $marketsize = $this->session->userdata('marketsize');
//    $marketshare = $this->session->userdata('marketshare');
//    $qty = $this->session->userdata('qty');
//}else{
//    $inventor = null;
//    $periode = null;
//    $modal = null;
//    $sukubunga = null;
//    $marketsize = null;
//    $marketshare = null;
//    $qty = null;
//}
    
foreach ($sikav_hki as $rshki) {   
    $hki_id = $rshki->hki_id;
    $inventor = $rshki->inventor;
    $judul = $rshki->judul;
    $this->session->set_userdata('sesi_hki', $hki_id);
    $this->session->set_userdata('sesi_inventor', $inventor);
    $this->session->set_userdata('sesi_judul', $judul);
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
                <form method="POST" name="frmhalaman1" id="frmhalaman1" action="<?=base_url() ?>manage/add/incomebased_calculator2"> 
                    <div class="form-group row">                        
                        <label for="inventor" class="col-sm-4 col-form-label text-right">Nama Inventor &nbsp;<span class="badge badge-pill  badge-warning">1.1</span> &nbsp;<a data-toggle="popover" title="Nama Inventor" data-content="Diisi dengan nama Inventor. Jika nama inventor lebih dari 1 orang, silahkan pisahkan dengan tanda koma di antara nama inventor." class="badge badge-info text-white">Info</a> </label>
                        <div class="col-sm-8">
                            <input type="text" value="<?=$this->session->userdata('sesi_inventor'); ?>" class="form-control  form-control-sm col-sm-12" id="inventor" name="inventor" aria-describedby="inventorDesc" readonly>
                            <small id="inventorDesc" class="form-text text-muted text-left">Nama Pemilik Invensi</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="judul" class="col-sm-4 col-form-label text-right">Judul Penelitian/Invensi &nbsp;<span class="badge badge-pill  badge-warning">1.2</span> &nbsp;<a data-toggle="popover" title="Judul Penelitian/Invensi" data-content="Silahkan diisi dengan nama invensi yang telah dihasilkan." class="badge badge-info text-white">Info</a> </label>
                        <div class="col-sm-8">
                            <textarea  class="form-control  form-control-sm col-sm-12" id="judul" name="judul" aria-describedby="judulDesc" readonly><?=$this->session->userdata('sesi_judul'); ?></textarea>
                            <small id="judulDesc" class="form-text text-muted text-left">Judul Penelitian/Invensi</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="periode" class="col-sm-4 col-form-label text-right">Tentukan Periode Proyeksi &nbsp;<span class="badge badge-pill  badge-warning">1.3</span> &nbsp;<a data-toggle="popover" title="Periode Proyeksi" data-content="Isi dengan lama proyeksi dalam satuan tahun." class="badge badge-info text-white">Info</a> </label>
                        <div class="col-md-8 text-left">
                            <select class="form-control form-control-sm" id="periode" name="periode" aria-describedby="periodeDesc">
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
                        <input type="text" value="<?= $modal; ?>" class="form-control  form-control-sm col-sm-12" id="modal" name="modal" aria-describedby="periodeDesc" placeholder="#.##0,00" required>                        
                            <small id="modalDesc" class="form-text text-muted">Modal awal/Pinjaman Modal</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="sukubunga" class="col-sm-4 col-form-label text-right">Suku Bunga (Interest) Bank &nbsp;<span class="badge badge-pill  badge-warning">1.5</span> &nbsp;<a data-toggle="popover" title="Suku Bunga" data-content="Besaran suku bunga dari pinjaman yang diperoleh dari modal awal pinjaman Bank. Suku bunga tahunan dalam satuan persen (%)." class="badge badge-info text-white">Info</a> </label>
                        <div class="col-md-8 text-left">
                        <input type="text" value="<?= $sukubunga; ?>" class="form-control  form-control-sm col-sm-2" id="sukubunga" name="sukubunga" aria-describedby="sukubungaDesc" placeholder="##0,00%" required>                        
                            <small id="sukubungaDesc" class="form-text text-muted">Suku Bunga (Interest) Bank dalam satuan persen(%)</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="marketsize" class="col-sm-4 col-form-label text-right">Market Size &nbsp;<span class="badge badge-pill  badge-warning">1.6</span> &nbsp;<a data-toggle="popover" title="Market Size" data-content="Proyeksi banyaknya jumlah unit dengan produk serupa, yang ada di pasaran." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-8">
                            <input type="text" value="<?= $marketsize; ?>" class="form-control  form-control-sm col-sm-3" id="marketsize" name="marketsize" aria-describedby="marketsiezeDesc" placeholder="#.##0,00" required>
                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi nilai numerik dengan satuan unit</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="marketshare" class="col-sm-4 col-form-label text-right">Market Share &nbsp;<span class="badge badge-pill  badge-warning">1.7</span> &nbsp;<a data-toggle="popover" title="Market Share" data-content="Proyeksi jenis market share dari produk yang akan dihasilkan. Jumlah prosentase merupakan jumlah maksimal yang akan dihasilkan, merupakan fungsi pesimis dan optimis." class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-8 text-left">
                            <select class="form-control form-control-sm" id="marketshare" name="marketshare" aria-describedby="marketshareDesc">
                                <option value="persen1" <?php if($marketshare=="persen1"){echo "selected=\"seletected\"";} ?>>Superior/Breakthrough Technology (<=25%)</option>
                                <option value="persen2" <?php if($marketshare=="persen2"){echo "selected=\"seletected\"";} ?>>Improvement Technology <=15%</option>
                                <option value="persen3" <?php if($marketshare=="persen3"){echo "selected=\"seletected\"";} ?>>Alternative Technology <=10%</option>
                            </select>                        
                            <small id="marketshareDesc" class="form-text text-muted">Pilih Prosentase untuk menghasilkan market share</small>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label for="qty" class="col-sm-4 col-form-label text-right">Pagu maksimal jumlah produksi &nbsp;<span class="badge badge-pill  badge-warning">1.8</span> &nbsp;<a data-toggle="popover" title="Jumlah Produksi" data-content="Proyeksi jumlah maksimal produksi dari unit produk yang dihasilkan dari invensi. Jumlah ini merupakan pagu maksimal yang nantinya digunakan pada halaman ke - 2. Nilai ini diperoleh dari hasil perkalian antara 1.6 Market Size dan 1.7 Prosentase Market Share." class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-8 text-left">
                            <input type="text" value="<?= $qty; ?>" class="form-control  form-control-sm col-sm-3" id="qty" name="qty" aria-describedby="qtyDesc" readonly required>
                            <small id="qtyDesc" class="form-text text-muted">Hasil perkalian market size dan market share</small>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <div class="col-md-4 text-right">
                            <a href="<?=base_url() ?>manage/add/incomebased" id="kembali" name="kembali" class="btn btn-warning btn-sm">Kembali</a>
                        </div>
                        <div class="col-md-8 text-left">
                            <input type="submit" class="btn btn-success btn-sm" id="tombol1" name="tombol1" value="Lanjut Halaman 2">
                        </div>
                    </div>
                </form>  <!-- Form Halaman 1 END -->
                </div>
            </div>
        </div>
    </div>    
</div>
