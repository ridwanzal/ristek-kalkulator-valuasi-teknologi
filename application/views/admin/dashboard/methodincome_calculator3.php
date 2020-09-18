<?php
//mengambil data dari AJAX di /incomebased/data_halaman3
if($this->session->userdata('biaya_investasi')){
    $biaya_investasi = $this->session->userdata('biaya_investasi');
    $biaya_riset = $this->session->userdata('biaya_riset');
    $biaya_lisensi = $this->session->userdata('biaya_lisensi');
    $persen_lisensi = $this->session->userdata('persen_lisensi');
    $biaya_cogs = $this->session->userdata('biaya_cogs');
    $biaya_tetap = $this->session->userdata('biaya_tetap');
    $biaya_marketing = $this->session->userdata('biaya_marketing');
    $biaya_perawatan = $this->session->userdata('biaya_perawatan');
    $biaya_warehouse = $this->session->userdata('biaya_warehouse');
    $biaya_depresiasi = $this->session->userdata('biaya_depresiasi');
}else{
    $biaya_investasi = null;
    $biaya_riset = null;
    $biaya_lisensi = null;
    $persen_lisensi = null;
    $biaya_cogs = null;
    $biaya_tetap = null;
    $biaya_marketing = null;
    $biaya_perawatan = null;
    $biaya_warehouse = null;
    $biaya_depresiasi = null;
}
?>
<div class="container mt-3 mb-3">
    <div class="row mb-3">
        <div class="col-md-12 center">
            <div class="card text-center">
                <div class="card-header bg-info text-white text-right">
                    Halaman 3. Proyeksi Biaya Operasional (Operating Expense)
                </div>
                <div class="card-body">
                <form>
                    <div class="form-group row">                        
                        <label for="biaya_investasi" class="col-sm-6 col-form-label text-right">3.1 Biaya Investasi Mesin, Kendaraan, dan Peralatan</label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_investasi; ?>" class="form-control  form-control-sm col-sm-12" id="biaya_investasi" name="biaya_investasi" aria-describedby="biaya_investasiDesc" required>
                            <small id="biaya_investasiDesc" class="form-text text-muted text-left">Komponen untuk memasukkan biaya investasi</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="biaya_riset" class="col-sm-6 col-form-label text-right">3.2 Biaya Riset dan Pengembangan</label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_riset; ?>" class="form-control  form-control-sm col-sm-12" id="biaya_riset" name="biaya_riset" aria-describedby="biaya_risetDesc" required>
                            <small id="biaya_risetDesc" class="form-text text-muted text-left">Komponen untuk Biaya Riset dan Pengembangan</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_lisensi" class="col-sm-6 col-form-label text-right">3.3 Biaya License + ISO9001 (Tahun Pertama)</label>
                        <div class="col-md-6 text-left">
                        <input type="text" value="<?= $biaya_lisensi; ?>" class="form-control  form-control-sm col-sm-12" id="biaya_lisensi" name="biaya_lisensi" aria-describedby="biaya_lisensiDesc" required>
                            <small id="biaya_lisensiDesc" class="form-text text-muted">Komponen untuk memasukkan biaya lisensi</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="persen_lisensi" class="col-sm-6 col-form-label text-right">3.4 Biaya License + ISO9002 mulai tahun ke-2 (Prosentase)</label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $persen_lisensi; ?>" class="form-control  form-control-sm col-sm-12" id="persen_lisensi" name="persen_lisensi" aria-describedby="persen_lisensiDesc" required>
                            <small id="persen_lisensiDesc" class="form-text text-muted text-left">Prosentase biaya lisensi untuk tahun ke - 2 dan seterusnya</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_cogs" class="col-sm-6 col-form-label text-right">3.5 Biaya Cost of Goods Sold (Biaya Investasi Produk)</label>
                        <div class="col-md-6 text-left">
                        <input type="text" value="<?= $biaya_cogs; ?>" class="form-control  form-control-sm col-sm-12" id="biaya_cogs" name="biaya_cogs" aria-describedby="biaya_cogsDesc" required>                        
                            <small id="biaya_cogsDesc" class="form-text text-muted">Biaya Investasi Produk</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_tetap" class="col-sm-6 col-form-label text-right">3.6 Biaya Operasional Tetap (Fixed Cost)</label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_tetap; ?>" class="form-control  form-control-sm col-sm-3" id="biaya_tetap" name="biaya_tetap" aria-describedby="biaya_tetapDesc">
                            <small id="biaya_tetapDesc" class="form-text text-muted text-left">Biaya tetap</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_marketing" class="col-sm-6 col-form-label text-right">3.7 Biaya Marketing</label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_marketing; ?>" class="form-control  form-control-sm col-sm-3" id="biaya_marketing" name="biaya_marketing" aria-describedby="biaya_marketingDesc">
                            <small id="biaya_marketingDesc" class="form-text text-muted text-left">Komponen Biaya Marketing</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_perawatan" class="col-sm-6 col-form-label text-right">3.8 Biaya Maintenance (Perawatan)</label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_perawatan; ?>" class="form-control  form-control-sm col-sm-3" id="biaya_perawatan" name="biaya_perawatan" aria-describedby="biaya_perawatanDesc">
                            <small id="biaya_perawatanDesc" class="form-text text-muted text-left">Komponen Biaya Perawatan</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_warehouse" class="col-sm-6 col-form-label text-right">3.9 Biaya Warehouse</label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_warehouse; ?>" class="form-control  form-control-sm col-sm-3" id="biaya_warehouse" name="biaya_warehouse" aria-describedby="biaya_warehouseDesc">
                            <small id="biaya_warehouseDesc" class="form-text text-muted text-left">Komponen Biaya Warehouse</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_depresiasi" class="col-sm-6 col-form-label text-right">3.10 Biaya Depresiasi</label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_depresiasi; ?>" class="form-control  form-control-sm col-sm-6" id="biaya_depresiasi" name="biaya_depresiasi" aria-describedby="biaya_depresiasiDesc" required>
                            <small id="biaya_depresiasiDesc" class="form-text text-muted text-left">Biaya Depresiasi untuk setiap tahunnya</small>
                        </div>
                    </div>
                    <!-- untuk tombol previous next -->
                    <div class="form-group row">                    
                        <div class="col-md-6 text-right">
                        <a href="<?=base_url() ?>manage/add/incomebased_calculator2" id="tombol32" name="tombol32" class="btn btn-warning btn-sm">Kembali Halaman 2</a>
                        </div>
                        <div class="col-md-6 text-left">
                        <a href="<?=base_url() ?>manage/add/incomebased_output" id="tombol33" name="tombol33" class="btn btn-success btn-sm">Hitung Valuasi</a>
                        </div>
                    </div>
                </form> <!-- Form Halaman 1 END -->
                </div>
            </div>
        </div>
    </div>    
</div>