<?php
//mengambil data dari AJAX di /incomebased/data_halaman3
($this->session->userdata('biaya_investasi')!=null) ? $biaya_investasi = $this->session->userdata('biaya_investasi'): $biaya_investasi=null;
($this->session->userdata('biaya_riset')!=null) ? $biaya_riset = $this->session->userdata('biaya_riset'): $biaya_riset=null;
($this->session->userdata('biaya_lisensi')!=null) ? $biaya_lisensi = $this->session->userdata('biaya_lisensi'): $biaya_lisensi=null;
($this->session->userdata('persen_lisensi')!=null) ? $persen_lisensi = $this->session->userdata('persen_lisensi'): $persen_lisensi=null;
($this->session->userdata('biaya_cogs')!=null) ? $biaya_cogs = $this->session->userdata('biaya_cogs'): $biaya_cogs=null;
($this->session->userdata('biaya_tetap')!=null) ? $biaya_tetap = $this->session->userdata('biaya_tetap'): $biaya_tetap=null;
($this->session->userdata('biaya_marketing')!=null) ? $biaya_marketing = $this->session->userdata('biaya_marketing'): $biaya_marketing=null;
($this->session->userdata('biaya_perawatan')!=null) ? $biaya_perawatan = $this->session->userdata('biaya_perawatan'): $biaya_perawatan=null;
($this->session->userdata('biaya_warehouse')!=null) ? $biaya_warehouse = $this->session->userdata('biaya_warehouse'): $biaya_warehouse=null;
($this->session->userdata('biaya_depresiasi')!=null) ? $biaya_depresiasi = $this->session->userdata('biaya_depresiasi'): $biaya_depresiasi=null;

//if($this->session->userdata('biaya_investasi')){
//    $biaya_investasi = $this->session->userdata('biaya_investasi');
//    $biaya_riset = $this->session->userdata('biaya_riset');
//    $biaya_lisensi = $this->session->userdata('biaya_lisensi');
//    $persen_lisensi = $this->session->userdata('persen_lisensi');
//    $biaya_cogs = $this->session->userdata('biaya_cogs');
//    $biaya_tetap = $this->session->userdata('biaya_tetap');
//    $biaya_marketing = $this->session->userdata('biaya_marketing');
//    $biaya_perawatan = $this->session->userdata('biaya_perawatan');
//    $biaya_warehouse = $this->session->userdata('biaya_warehouse');
//    $biaya_depresiasi = $this->session->userdata('biaya_depresiasi');
//}else{
//    $biaya_investasi = null;
//    $biaya_riset = null;
//    $biaya_lisensi = null;
//    $persen_lisensi = null;
//    $biaya_cogs = null;
//    $biaya_tetap = null;
//    $biaya_marketing = null;
//    $biaya_perawatan = null;
//    $biaya_warehouse = null;
//    $biaya_depresiasi = null;
//}
?>
<div class="container mt-3 mb-3">
    <div class="row mb-3">
        <div class="col-md-12 center">
            <div class="card text-center">
                <div class="card-header bg-info text-white text-right">
                    Halaman 3. Proyeksi Biaya Operasional (Operating Expense)
                </div>
                <div class="card-body">
                <form method="POST" name="frmhalaman3" id="frmhalaman3" action="<?=base_url() ?>manage/add/incomebased_output">
                    <div class="form-group row">                        
                        <label for="biaya_investasi" class="col-sm-6 col-form-label text-right">Biaya Investasi Mesin, Kendaraan, dan Peralatan &nbsp;<span class="badge badge-pill  badge-warning">3.1</span> &nbsp;<a data-toggle="popover" title="Biaya Investasi" data-content="Komponen untuk memasukkan biaya investasi. Biaya Investasi Mesin, Kendaraan, dan Peralatan." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_investasi; ?>" class="form-control  form-control-sm col-sm-5" id="biaya_investasi" name="biaya_investasi" aria-describedby="biaya_investasiDesc" placeholder="#.##0,00" required>
                            <small id="biaya_investasiDesc" class="form-text text-muted text-left">Komponen untuk memasukkan biaya investasi</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="biaya_riset" class="col-sm-6 col-form-label text-right">Biaya Riset dan Pengembangan &nbsp;<span class="badge badge-pill  badge-warning">3.2</span> &nbsp;<a data-toggle="popover" title="Biaya Riset" data-content="Biaya Riset dan Pengembangan. Komponen untuk Biaya Riset dan Pengembangan." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_riset; ?>" class="form-control  form-control-sm col-sm-5" id="biaya_riset" name="biaya_riset" aria-describedby="biaya_risetDesc" placeholder="#.##0,00" required>
                            <small id="biaya_risetDesc" class="form-text text-muted text-left">Komponen untuk Biaya Riset dan Pengembangan</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_lisensi" class="col-sm-6 col-form-label text-right">Biaya License + ISO9001 (Tahun Pertama) &nbsp;<span class="badge badge-pill  badge-warning">3.3</span> &nbsp;<a data-toggle="popover" title="Biaya License" data-content="Biaya License + ISO9001 (Tahun Pertama), Komponen untuk memasukkan biaya lisensi." class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-6 text-left">
                        <input type="text" value="<?= $biaya_lisensi; ?>" class="form-control  form-control-sm col-sm-5" id="biaya_lisensi" name="biaya_lisensi" aria-describedby="biaya_lisensiDesc" placeholder="#.##0,00" required>
                            <small id="biaya_lisensiDesc" class="form-text text-muted">Komponen untuk memasukkan biaya lisensi</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="persen_lisensi" class="col-sm-6 col-form-label text-right">Biaya License + ISO9002 mulai tahun ke-2 (Prosentase) &nbsp;<span class="badge badge-pill  badge-warning">3.4</span> &nbsp;<a data-toggle="popover" title="Prosentase Biaya License" data-content="Biaya License + ISO9002 mulai tahun ke-2 (Prosentase), Prosentase biaya lisensi untuk tahun ke - 2 dan seterusnya." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $persen_lisensi; ?>" class="form-control  form-control-sm col-sm-3" id="persen_lisensi" name="persen_lisensi" aria-describedby="persen_lisensiDesc" placeholder="##0,00%" required>
                            <small id="persen_lisensiDesc" class="form-text text-muted text-left">Prosentase biaya lisensi untuk tahun ke - 2 dan seterusnya</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_cogs" class="col-sm-6 col-form-label text-right">Biaya Cost of Goods Sold (Biaya Investasi Produk) &nbsp;<span class="badge badge-pill  badge-warning">3.5</span> &nbsp;<a data-toggle="popover" title="Biaya COGs" data-content="Biaya Cost of Goods Sold (Biaya Investasi Produk)." class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-6 text-left">
                        <input type="text" value="<?= $biaya_cogs; ?>" class="form-control  form-control-sm col-sm-5" id="biaya_cogs" name="biaya_cogs" aria-describedby="biaya_cogsDesc" placeholder="#.##0,00" required>                        
                            <small id="biaya_cogsDesc" class="form-text text-muted">Biaya Investasi Produk</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_tetap" class="col-sm-6 col-form-label text-right">Biaya Operasional Tetap (Fixed Cost) &nbsp;<span class="badge badge-pill  badge-warning">3.6</span> &nbsp;<a data-toggle="popover" title="Biaya Tetap" data-content="Biaya Operasional Tetap (Fixed Cost) untuk pengeluaran setiap bulan." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_tetap; ?>" class="form-control  form-control-sm col-sm-5" id="biaya_tetap" name="biaya_tetap" placeholder="#.##0,00" aria-describedby="biaya_tetapDesc" required>
                            <small id="biaya_tetapDesc" class="form-text text-muted text-left">Biaya tetap</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_marketing" class="col-sm-6 col-form-label text-right">Biaya Marketing (Prosentase) &nbsp;<span class="badge badge-pill  badge-warning">3.7</span> &nbsp;<a data-toggle="popover" title="Biaya Marketing" data-content="Biaya Marketing (Prosentase)" class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_marketing; ?>" class="form-control  form-control-sm col-sm-3" id="biaya_marketing" name="biaya_marketing" aria-describedby="biaya_marketingDesc" placeholder="##0,00%" required>
                            <small id="biaya_marketingDesc" class="form-text text-muted text-left">Prosentase Komponen Biaya Marketing</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_perawatan" class="col-sm-6 col-form-label text-right">Biaya Maintenance (Perawatan) &nbsp;<span class="badge badge-pill  badge-warning">3.8</span> &nbsp;<a data-toggle="popover" title="Biaya Perawatan" data-content="Biaya Maintenance (Perawatan)" class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_perawatan; ?>" class="form-control  form-control-sm col-sm-5" id="biaya_perawatan" name="biaya_perawatan" placeholder="#.##0,00" aria-describedby="biaya_perawatanDesc" required>
                            <small id="biaya_perawatanDesc" class="form-text text-muted text-left">Komponen Biaya Perawatan</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_warehouse" class="col-sm-6 col-form-label text-right">Biaya Warehouse &nbsp;<span class="badge badge-pill  badge-warning">3.9</span> &nbsp;<a data-toggle="popover" title="Biaya Warehouse" data-content="Biaya Warehouse" class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_warehouse; ?>" class="form-control  form-control-sm col-sm-5" id="biaya_warehouse" name="biaya_warehouse" placeholder="#.##0,00" aria-describedby="biaya_warehouseDesc" required>
                            <small id="biaya_warehouseDesc" class="form-text text-muted text-left">Komponen Biaya Warehouse</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_depresiasi" class="col-sm-6 col-form-label text-right">Biaya Depresiasi &nbsp;<span class="badge badge-pill  badge-warning">3.10</span> &nbsp;<a data-toggle="popover" title="Biaya Depresiasi" data-content="Biaya Depresiasi" class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_depresiasi; ?>" class="form-control  form-control-sm col-sm-5" id="biaya_depresiasi" name="biaya_depresiasi" placeholder="#.##0,00" aria-describedby="biaya_depresiasiDesc" required>
                            <small id="biaya_depresiasiDesc" class="form-text text-muted text-left">Biaya Depresiasi untuk setiap tahunnya</small>
                        </div>
                    </div>
                    <!-- untuk tombol previous next -->
                    <div class="form-group row">                    
                        <div class="col-md-6 text-right">
                            <a href="<?=base_url() ?>manage/add/incomebased_calculator2" id="tombol32" name="tombol32" class="btn btn-warning btn-sm">Kembali Halaman 2</a>
                        </div>
                        <div class="col-md-6 text-left">                            
                            <input type="submit" class="btn btn-success btn-sm" id="tombol33" name="tombol33" value="Hitung Valuasi">
                        </div>
                    </div>
                </form> <!-- Form Halaman 1 END -->
                </div>
            </div>
        </div>
    </div>    
</div>