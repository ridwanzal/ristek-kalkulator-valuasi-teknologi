<div class="container mt-3 mb-3">
    <div class="row mb-3">
        <div class="col-md-12 center">
            <div class="card text-center">
                <div class="card-header bg-info text-white">
                    Identitas Penelitian dan Invensi
                </div>
                <div class="card-body">
                    <div class="form-group row">                        
                        <label for="marketsize" class="col-sm-4 col-form-label text-right">Nama Inventor</label>
                        <div class="col-sm-8">
                            <input type="text" value="Air Media Persada" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc" readonly>
                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Nama Pemilik Invensi</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="marketsize" class="col-sm-4 col-form-label text-right">Judul Penelitian</label>
                        <div class="col-sm-8">
                            <textarea  class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc" readonly>Prototipe alat pendeteksi kebocoran gas beracun CO pada mobil menggunakan Array Sensor berbasis SMS Gateway</textarea>
                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Judul Penelitian</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" href="#inputrekening" role="tab" data-toggle="tab">1. Input Perkiraan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#cashflow" role="tab" data-toggle="tab">2. Cash Flow</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#profitlost" role="tab" data-toggle="tab">3. Profit Lost</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#npv" role="tab" data-toggle="tab">4. Net Present Value</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">        
        <!-- Tab Input Rekening -->
        <div role="tabpanel" class="tab-pane fade" id="inputrekening">
            <div class="row mt-3">
                <div class="col-md-4 ml-auto">
                    <div class="form-group row">
                        <label for="marketsize" class="col-sm-4 col-form-label text-right">Periode </label>
                        <div class="col-md-8 text-left">
                            <select class="form-control form-control-sm" id="marketshare" aria-describedby="marketshareDesc">
                                <option>Tahun Ke - 1</option>
                                <option>Tahun Ke - 2</option>
                                <option>Tahun Ke - 3</option>
                                <option>Tahun Ke - 4</option>
                                <option>Tahun Ke - 5</option>
                                <option>Tahun Ke - 6</option>
                                <option>Tahun Ke - 7</option>
                                <option>Tahun Ke - 8</option>
                            </select>                        
                            <small id="marketshareDesc" class="form-text text-muted">Tentukan Tahun Proyeksi</small>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            1. Penjualan
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-4 col-form-label text-left">1.1 Market Size</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control  form-control-sm col-sm-3" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi nilai numerik dengan satuan unit</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="marketsize" class="col-sm-4 col-form-label text-left">1.2 Market Share</label>
                                        <div class="col-md-8 text-left">
                                            <select class="form-control form-control-sm" id="marketshare" aria-describedby="marketshareDesc">
                                                <option>Superior/Breakthrough Technology (<=25%)</option>
                                                <option>Improvement Technology <=15%</option>
                                                <option>Alternative Technology <=10%</option>
                                            </select>                        
                                            <small id="marketshareDesc" class="form-text text-muted">Pilih Prosentase untuk menghasilkan market share</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">                    
                                        <label for="qtyProduk" class="col-sm-4 col-form-label text-left">1.3 Jumlah Produk</label>
                                        <div class="col-md-8 text-left">
                                            <input type="text" class="form-control  form-control-sm col-sm-3" id="qtyProduk" aria-describedby="qtyProdukDesc" readonly>
                                            <small id="qtyProdukDesc" class="form-text text-muted">Hasil perkalian market size dan market share</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">                        
                                        <label for="hargajual" class="col-sm-4 col-form-label text-left">1.4 Harga Jual Produk</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control  form-control-sm col-sm-3" id="hargajual" aria-describedby="hargajualDesc">
                                            <small id="hargajualDesc" class="form-text text-muted text-left">Isi perkiraan harga jual produk</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">                    
                                        <label for="nilaipenjualan" class="col-sm-4 col-form-label text-left">1.5 Nilai Penjualan</label>
                                        <div class="col-md-8 text-left">
                                            <input type="text" class="form-control  form-control-sm col-sm-5" id="nilaipenjualan" aria-describedby="nilaipenjualanDesc" readonly>
                                            <small id="nilaipenjualanDesc" class="form-text text-muted">Jumlah Produk * Harga Jual Produk</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            2. Harga Pokok Produksi (HPP)
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">2.1 Biaya Bahan Baku</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya bahan baku</small>
                                        </div>
                                    </div>               
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">2.2 Biaya Komponen</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya komponen</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">2.3 Biaya Proses dan Instalasi</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya proses dan instalasi</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">2.4 Biaya SDM Produksi (Tenaga Kerja Langsung)</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi Biaya SDM Produksi (Tenaga Kerja Langsung)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">2.5 Biaya Uitilities Produksi</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi Biaya Uitilities Produksi</small>
                                        </div>
                                    </div>                        
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">2.6 Biaya Transportasi Instalasi</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi Biaya Transportasi Instalasi</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">2.7 HPP Per Unit</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi HPP Per Unit</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">                    
                                        <label for="qtyProduk" class="col-sm-6 col-form-label text-left">2.8 Jumlah Produk</label>
                                        <div class="col-md-6 text-left">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="qtyProduk" aria-describedby="qtyProdukDesc" readonly>
                                            <small id="qtyProdukDesc" class="form-text text-muted">Hasil perkalian market size dan market share</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">                    
                                        <label for="qtyProduk" class="col-sm-6 col-form-label text-left">2.9 Nilai HPP</label>
                                        <div class="col-md-6 text-left">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="qtyProduk" aria-describedby="qtyProdukDesc" readonly>
                                            <small id="qtyProdukDesc" class="form-text text-muted">Hasil perkalian HPP Per Unit dan Jumlah Produk</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            3. Gross Profit
                        </div>
                        <div class="card-body">
                            <div class="form-group row">                        
                                <label for="marketsize" class="col-sm-4 col-form-label text-left">Gross Profit</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc" readonly>
                                    <small id="marketsiezeDesc" class="form-text text-muted text-left">Nilai Penjualan - Nilai HPP</small>
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            4. Operational Cost (Biaya Operasional)
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">4.1 Biaya SDM Manajemen (Tenaga Kerja Tidak Langsung)</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya bahan baku</small>
                                        </div>
                                    </div>               
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">4.2 Biaya Marketing (Promosi)</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya komponen</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">4.3 Biaya Transportasi</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya proses dan instalasi</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">4.4 Biaya Operasional Office</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi Biaya SDM Produksi (Tenaga Kerja Langsung)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">4.5 Biaya Sewa Asset</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi Biaya Uitilities Produksi</small>
                                        </div>
                                    </div>                        
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">4.6 Biaya Operasional</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc" readonly>
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi Biaya Transportasi Instalasi</small>
                                        </div>
                                    </div>                            
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            5. EBITDA
                        </div>
                        <div class="card-body">
                            <div class="form-group row">                        
                                <label for="marketsize" class="col-sm-4 col-form-label text-left">EBITDA</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc" readonly>
                                    <small id="marketsiezeDesc" class="form-text text-muted text-left">Nilai Penjualan - Nilai HPP</small>
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>
            
                <div class="col-md-6">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            6.  Net Profit / EBIT
                        </div>
                        <div class="card-body">
                            <div class="form-group row">                        
                                <label for="marketsize" class="col-sm-4 col-form-label text-left">6.1 Depresiasi per Tahun</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                    <small id="marketsiezeDesc" class="form-text text-muted text-left">Nilai Penjualan - Nilai HPP</small>
                                </div>
                            </div>
                            <div class="form-group row">                        
                                <label for="marketsize" class="col-sm-4 col-form-label text-left">6.2 Net Profit/EBIT</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc" readonly>
                                    <small id="marketsiezeDesc" class="form-text text-muted text-left">Nilai Penjualan - Nilai HPP</small>
                                </div>
                            </div>                
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            7.  EAT
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">7.1 Biaya Bunga</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya bahan baku</small>
                                        </div>
                                    </div>               
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">7.2 Penghasilan Tidak Kena Pajak (PTKP)</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya komponen</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">7.3 Penghasilan Kena Pajak (PKP)</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya proses dan instalasi</small>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">7.4 Pajak</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi Biaya SDM Produksi (Tenaga Kerja Langsung)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">7.5 EAT</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi Biaya Uitilities Produksi</small>
                                        </div>
                                    </div>                                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            8. Net Cashflow (NCF) / Free Cashflow (FCF)
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">8.1 EAT</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya bahan baku</small>
                                        </div>
                                    </div>               
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">8.2 Depresiasi per Tahun</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya komponen</small>
                                        </div>
                                    </div>                            
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">8.3 Capital Expenditure (Angsuran Pokok Pinjaman)</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi Biaya SDM Produksi (Tenaga Kerja Langsung)</small>
                                        </div>
                                    </div>
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">8.4 Net Cashflow (NCF)</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi Biaya Uitilities Produksi</small>
                                        </div>
                                    </div>                                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            9. Discounted Net Cashflow / Discounted FCF
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">8.1 EAT</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya bahan baku</small>
                                        </div>
                                    </div>     
                                </div>
                                <div class="col-md-4">          
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">8.2 Depresiasi per Tahun</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi biaya komponen</small>
                                        </div>
                                    </div>  
                                </div>
                                <div class="col-md-4">               
                                    <div class="form-group row">                        
                                        <label for="marketsize" class="col-sm-6 col-form-label text-left">8.4 Net Cashflow (NCF)</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control  form-control-sm col-sm-12" id="marketsize" aria-describedby="marketsiezeDesc">
                                            <small id="marketsiezeDesc" class="form-text text-muted text-left">Isi Biaya Uitilities Produksi</small>
                                        </div>
                                    </div>                                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-1 col-md-1 ml-auto">
                    <button class="btn btn-success btn-sm">Submit</button>
                </div>
            </div>
        </div>
        <!-- Tab Input Rekening END-->
        <!-- Tab Cashflow -->
        <div role="tabpanel" class="tab-pane fade" id="cashflow">
            <div class="row mt-3 mb-3">
                <div class="col-md-12 center">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            Proyeksi Cash Flow
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Cashflow</th>
                                <th scope="col">Tahun 1</th>
                                <th scope="col">Tahun 2</th>
                                <th scope="col">Tahun 3</th>
                                <th scope="col">Tahun 4</th>
                                <th scope="col">Tahun 5</th>
                                <th scope="col">Tahun 6</th>
                                <th scope="col">Tahun 7</th>
                                <th scope="col">Tahun 8</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-left">Volume</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-left">Harga</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>   
                                <tr>
                                    <th scope="row" class="text-left">TOTAL CASH RECEIVED</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>           
                                <tr>
                                    <th scope="row" class="text-left">Dst...</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>                  
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab Cashflow END-->
        <!-- Tab Profit Lost -->
        <div role="tabpanel" class="tab-pane fade" id="profitlost">
            <div class="row mt-3 mb-3">
                <div class="col-md-12 center">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            Proyeksi Profit and Lost
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Item</th>
                                <th scope="col">Tahun 1</th>
                                <th scope="col">Tahun 2</th>
                                <th scope="col">Tahun 3</th>
                                <th scope="col">Tahun 4</th>
                                <th scope="col">Tahun 5</th>
                                <th scope="col">Tahun 6</th>
                                <th scope="col">Tahun 7</th>
                                <th scope="col">Tahun 8</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-left">A. Sales</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-left">B. HPP</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>   
                                <tr>
                                    <th scope="row" class="text-left">C. Gros Profit</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>  
                                <tr>
                                    <th scope="row" class="text-left">D. Operation Cost</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>         
                                <tr>
                                    <th scope="row" class="text-left">Dst...</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>                  
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab Profit Lost END-->
        <!-- Tab NPV-->
        <div role="tabpanel" class="tab-pane fade" id="npv">
        <div class="row mt-3 mb-3">
                <div class="col-md-12 center">
                    <div class="card text-center">
                        <div class="card-header bg-info text-white">
                            Net Present Value (NPV)
                        </div>
                        <div class="card-body">
                            <table class="table table-bordered">
                            <thead>
                                <tr>
                                <th scope="col">Tahun</th>
                                <th scope="col">FCF</th>
                                <th scope="col">Disc Rate</th>
                                <th scope="col">Disc FCF</th>
                                <th scope="col">Cum Disc FCF</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-left">Tahun 1</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th scope="row" class="text-left">Tahun 2</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>   
                                <tr>
                                    <th scope="row" class="text-left">Tahun 3</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>  
                                <tr>
                                    <th scope="row" class="text-left">Tahun 4</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>         
                                <tr>
                                    <th scope="row" class="text-left">Tahun 5</th>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>              
                                <tr>
                                    <th scope="row" class="text-right" colspan="4">i</th>
                                    <td>Nilai NPV</td>
                                </tr>    
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Tab NPV END-->
    <!-- Tab panes END-->
    </div>    

</div>
<script type="text/javascript" src="<?php echo base_url('assets/frontview/js/jquery-3.3.1.min.js') ?>"></script>
<script>
    $(document).ready(function(){
        $('.nav-tabs a[href="#profitlost"]').tab('show');
        $('.nav-tabs a[href="#inputrekening"]').trigger('click');
    });
</script>