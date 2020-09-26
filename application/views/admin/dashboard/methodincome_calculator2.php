<?php
//mengambil data dari AJAX di /incomebased/data_halaman2
($this->session->userdata('target')!=null) ? $target = $this->session->userdata('target'): $target=null;
($this->session->userdata('marketshare_persen')!=null) ? $marketshare_persen = $this->session->userdata('marketshare_persen'): $marketshare_persen=null;
($this->session->userdata('qty_tahun1')!=null) ? $qty_tahun1 = $this->session->userdata('qty_tahun1'): $qty_tahun1=null;
($this->session->userdata('marketshare_tahun2')!=null) ? $marketshare_tahun2 = $this->session->userdata('marketshare_tahun2'): $marketshare_tahun2=null;
($this->session->userdata('harga_tahun1')!=null) ? $harga_tahun1 = $this->session->userdata('harga_tahun1'): $harga_tahun1=null;
($this->session->userdata('harga_tahun2')!=null) ? $harga_tahun2 = $this->session->userdata('harga_tahun2'): $harga_tahun2=null;

//if($this->session->userdata('target')){
//    $target = $this->session->userdata('target');
//    $marketshare_persen = $this->session->userdata('marketshare_persen');
//    $qty_tahun1 = $this->session->userdata('qty_tahun1');
//    $marketshare_tahun2 = $this->session->userdata('marketshare_tahun2');
//    $harga_tahun1 = $this->session->userdata('harga_tahun1');
//    $harga_tahun2 = $this->session->userdata('harga_tahun2');
//}else{
//    $target = null;
//    $marketshare_persen = null;
//    $qty_tahun1 = null;
//    $marketshare_tahun2 = null;
//    $harga_tahun1 = null;
//    $harga_tahun2 = null;
//}
?>
<div class="container mt-3 mb-3">
    <div class="row mb-3">
        <div class="col-md-12 center">
            <div class="card text-center">
                <div class="card-header bg-info text-white text-right">
                    Halaman 2. Proyeksi Penjualan
                </div>
                <div class="card-body">
                <form>
                    <div class="form-group row">                        
                        <label for="target" class="col-sm-6 col-form-label text-right">Target Produksi &nbsp;<span class="badge badge-pill  badge-warning">2.1</span> &nbsp;<a data-toggle="popover" title="Target Produksi" data-content="Isi jumlah unit produksi, untuk tahun pertama." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $target; ?>" class="form-control  form-control-sm col-sm-5" id="target" name="target" aria-describedby="targetDesc" placeholder="#.##0,00" required>
                            <small id="targetDesc" class="form-text text-muted text-left">Target produksi dalam satuan unit</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="marketshare_persen" class="col-sm-6 col-form-label text-right">Proyeksi Market Share di Tahun Pertama (Prosentase) &nbsp;<span class="badge badge-pill  badge-warning">2.2</span> &nbsp;<a data-toggle="popover" title="Prosentase Market Share" data-content="Proyeksi Market Share di Tahun Pertama (Prosentase). Isi dengan nilai besarnya prosentase dari Target produksi yang telah dicanangkan sebelumnya!" class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $marketshare_persen; ?>" class="form-control  form-control-sm col-sm-2" id="marketshare_persen" name="marketshare_persen" aria-describedby="marketshare_persenDesc" placeholder="##0,00%" required>
                            <small id="marketshare_persenDesc" class="form-text text-muted text-left">Isi dengan nilai besarnya prosentase dari Target produksi yang telah dicanangkan sebelumnya!</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="qty_tahun1" class="col-sm-6 col-form-label text-right">Jumlah Produk di Tahun Pertama &nbsp;<span class="badge badge-pill  badge-warning">2.3</span> &nbsp;<a data-toggle="popover" title="Jumlah Produk" data-content="Jumlah produk di tahun pertama, perkalian item 2.1 dan 2.2" class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-6 text-left">
                        <input type="text" value="<?= $qty_tahun1; ?>" class="form-control  form-control-sm col-sm-5" id="qty_tahun1" name="qty_tahun1" aria-describedby="qty_tahun1Desc" required disabled>
                            <small id="qty_tahun1Desc" class="form-text text-muted">Jumlah produk di tahun pertama, perkalian item 2.1 dan 2.2</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="marketshare_tahun2" class="col-sm-6 col-form-label text-right">Proyeksi Market Share mulai Tahun Ke -2 (Prosentase) &nbsp;<span class="badge badge-pill  badge-warning">2.4</span> &nbsp;<a data-toggle="popover" title="Proyeksi Market Share" data-content="Proyeksi Market Share mulai Tahun Ke -2 (Prosentase), Proyeksi market share tahun ke - 2 dan seterusnya." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $marketshare_tahun2; ?>" class="form-control  form-control-sm col-sm-2" id="marketshare_tahun2" name="marketshare_tahun2" aria-describedby="targetDesc" placeholder="##0,00%" required>
                            <small id="judulDesc" class="form-text text-muted text-left">Proyeksi market share tahun ke - 2 dan seterusnya</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="harga_tahun1" class="col-sm-6 col-form-label text-right">Harga Jual Produk (Tahun Pertama) &nbsp;<span class="badge badge-pill  badge-warning">2.5</span> &nbsp;<a data-toggle="popover" title="Harga Jual Produk" data-content="Harga Jual Produk (Tahun Pertama), Harga jual produk pada tahun pertama." class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-6 text-left">
                        <input type="text" value="<?= $harga_tahun1; ?>" class="form-control  form-control-sm col-sm-5" id="harga_tahun1" name="harga_tahun1" aria-describedby="harga_tahun1Desc" placeholder="#.##0,00" required>                        
                            <small id="harga_tahun1Desc" class="form-text text-muted">Harga jual produk pada tahun pertama</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="harga_tahun2" class="col-sm-6 col-form-label text-right">Harga Jual Produk mulai Tahun ke - 2 (Prosentase) &nbsp;<span class="badge badge-pill  badge-warning">2.6</span> &nbsp;<a data-toggle="popover" title="Proyeksi Harga Jual" data-content="Harga Jual Produk mulai Tahun ke - 2 (Prosentase), Harga jual produk pada tahun ke - 2 dan seterusnya." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $harga_tahun2; ?>" class="form-control  form-control-sm col-sm-2" id="harga_tahun2" name="harga_tahun2" placeholder="##0,00%" aria-describedby="harga_tahun2Desc">
                            <small id="harga_tahun2Desc" class="form-text text-muted text-left">Harga jual produk pada tahun ke - 2 dan seterusnya</small>
                        </div>
                    </div>
                    <!-- untuk tombol previous next -->
                    <div class="form-group row">                    
                        <div class="col-md-6 text-right">
                        <a href="<?=base_url() ?>manage/add/incomebased_calculator1/<?php echo $this->session->userdata('sesi_hki'); ?>" id="tombol21" name="tombol21" class="btn btn-warning btn-sm">Kembali Ke Halaman 1</a>
                        </div>
                        <div class="col-md-6 text-left">
                        <a href="<?=base_url() ?>manage/add/incomebased_calculator3" id="tombol23" name="tombol23" class="btn btn-success btn-sm">Lanjut Ke Halaman 3</a>
                        </div>
                    </div>
                </form> <!-- Form Halaman 1 END -->
                </div>
            </div>
        </div>
    </div>    
</div>