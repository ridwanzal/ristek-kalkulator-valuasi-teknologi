<?php
//mengambil data dari AJAX di /incomebased/data_halaman1
if($this->session->userdata('inventor')){
    $inventor = $this->session->userdata('inventor');
    $periode = $this->session->userdata('periode');
    $modal = $this->session->userdata('modal');
    $sukubunga = $this->session->userdata('sukubunga');
    $marketsize = $this->session->userdata('marketsize');
    $marketshare = $this->session->userdata('marketshare');
    $qty = $this->session->userdata('qty');
}else{
    $inventor = null;
    $periode = null;
    $modal = null;
    $sukubunga = null;
    $marketsize = null;
    $marketshare = null;
    $qty = null;
}
?>
<div class="container mt-3 mb-3">
    <div class="row mb-3">
        <div class="col-md-12 center">
            <div class="card text-center">
                <div class="card-header bg-info text-white text-right">
                    Halaman 1. Identitas Invensi dan Parameter Proyeksi <?php echo " TEST ".$marketshare; ?>
                </div>
                <div class="card-body">
                <form> 
                    <div class="form-group row">                        
                        <label for="inventor" class="col-sm-4 col-form-label text-right">Nama Inventor</label>
                        <div class="col-sm-8">
                            <input type="text" value="Air Media Persada" class="form-control  form-control-sm col-sm-12" id="inventor" name="inventor" aria-describedby="inventorDesc" readonly>
                            <small id="inventorDesc" class="form-text text-muted text-left">Nama Pemilik Invensi</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="judul" class="col-sm-4 col-form-label text-right">Judul Penelitian/Invensi</label>
                        <div class="col-sm-8">
                            <textarea  class="form-control  form-control-sm col-sm-12" id="judul" name="judul" aria-describedby="judulDesc" readonly>Prototipe alat pendeteksi kebocoran gas beracun CO pada mobil menggunakan Array Sensor berbasis SMS Gateway</textarea>
                            <small id="judulDesc" class="form-text text-muted text-left">Judul Penelitian/Invensi</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="periode" class="col-sm-4 col-form-label text-right">Tentukan Periode Proyeksi</label>
                        <div class="col-md-8 text-left">
                            <select class="form-control form-control-sm" id="periode" name="periode" aria-describedby="periodeDesc">
                            <?php for($i=1;$i<=20;$i++){ ?>    
                                <option value="<?=$i ?>"><?php echo $i ." Tahun"; ?></option>
                            <?php } ?>
                            </select>
                            <small id="periodeDesc" class="form-text text-muted">Berapa lama periode proyeksi dalam satuan tahun, isi 1 sampai dengan 20</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="modal" class="col-sm-4 col-form-label text-right">Modal Awal/Pinjaman Modal</label>
                        <div class="col-md-8 text-left">
                        <input type="text" value="<?= $modal; ?>" class="form-control  form-control-sm col-sm-12" id="modal" name="modal" aria-describedby="periodeDesc" required>                        
                            <small id="modalDesc" class="form-text text-muted">Modal awal/Pinjaman Modal</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="sukubunga" class="col-sm-4 col-form-label text-right">Suku Bunga (Interest) Bank</label>
                        <div class="col-md-8 text-left">
                        <input type="text" value="<?= $sukubunga; ?>" class="form-control  form-control-sm col-sm-12" id="sukubunga" name="sukubunga" aria-describedby="sukubungaDesc" required>                        
                            <small id="sukubungaDesc" class="form-text text-muted">Suku Bunga (Interest) Bank dalam satuan persen(%)</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="marketsize" class="col-sm-4 col-form-label text-right">Market Size</label>
                        <div class="col-sm-8">
                            <input type="text" value="<?= $marketsize; ?>" class="form-control  form-control-sm col-sm-3" id="marketsize" name="marketsize" aria-describedby="marketsiezeDesc">
                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi nilai numerik dengan satuan unit</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="marketshare" class="col-sm-4 col-form-label text-right">Market Share</label>
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
                        <label for="qty" class="col-sm-4 col-form-label text-right">Pagu maksimal jumlah produksi</label>
                        <div class="col-md-8 text-left">
                            <input type="text" value="<?= $qty; ?>" class="form-control  form-control-sm col-sm-3" id="qty" name="qty" aria-describedby="qtyDesc" readonly require>
                            <small id="qtyDesc" class="form-text text-muted">Hasil perkalian market size dan market share</small>
                        </div>
                    </div>
                    <div class="form-group row">                    
                        <label for="tombol1" class="col-sm-4 col-form-label text-right">&nbsp;</label>
                        <div class="col-md-8 text-left">
                        <a href="<?=base_url() ?>manage/add/incomebased_calculator2" id="tombol1" class="btn btn-success btn-sm">Lanjut Halaman 2</a>
                        </div>
                    </div>
                </form>  <!-- Form Halaman 1 END -->
                </div>
            </div>
        </div>
    </div>    
</div>