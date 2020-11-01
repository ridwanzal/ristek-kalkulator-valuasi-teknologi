<?php
//mengambil data dari AJAX di /incomebased/data_halaman2
($this->session->userdata('target')!=null) ? $target = $this->session->userdata('target'): $target=null;
($this->session->userdata('marketshare_persen')!=null) ? $marketshare_persen = $this->session->userdata('marketshare_persen'): $marketshare_persen=null;
($this->session->userdata('qty_tahun1')!=null) ? $qty_tahun1 = $this->session->userdata('qty_tahun1'): $qty_tahun1=null;
($this->session->userdata('marketshare_tahun2')!=null) ? $marketshare_tahun2 = $this->session->userdata('marketshare_tahun2'): $marketshare_tahun2=null;
($this->session->userdata('biaya_cogs')!=null) ? $biaya_cogs = $this->session->userdata('biaya_cogs'): $biaya_cogs=null;
($this->session->userdata('harga_tahun1')!=null) ? $harga_tahun1 = $this->session->userdata('harga_tahun1'): $harga_tahun1=null;
($this->session->userdata('harga_tahun2')!=null) ? $harga_tahun2 = $this->session->userdata('harga_tahun2'): $harga_tahun2=null;

?>
<div class="container mt-3 mb-3">
    <div class="row mb-3">
        <div class="col-md-12 center">
            <div class="card text-center">
                <div class="card-header bg-info text-white text-right">
                    Halaman 2. Proyeksi Penjualan
                </div>
                <div class="card-body">
                <!-- <form method="POST" name="frmhalaman2" id="frmhalaman2" action="<?=base_url() ?>manage/add/incomebased_calculator3"> -->
                    <div class="form-group row">                        
                        <label for="target" class="col-sm-6 col-form-label text-right">Target Produksi &nbsp;<span class="badge badge-pill  badge-warning">2.1</span> &nbsp;<a data-toggle="popover" title="Target Produksi" data-content="Isi jumlah unit produksi, untuk tahun pertama." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $target; ?>" class="form-control  form-control-sm col-sm-8" id="target" name="target" aria-describedby="targetDesc" placeholder="#.##0,00" required>
                            <small id="targetDesc" class="form-text text-muted text-left">Target produksi dalam satuan unit</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="marketshare_persen" class="col-sm-6 col-form-label text-right">Proyeksi Market Share di Tahun Pertama (%) &nbsp;<span class="badge badge-pill  badge-warning">2.2</span> &nbsp;<a data-toggle="popover" title="Prosentase Market Share" data-content="Proyeksi Market Share di Tahun Pertama (%). Isi dengan nilai besarnya prosentase dari Target produksi yang telah dicanangkan sebelumnya!" class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $marketshare_persen; ?>" class="form-control  form-control-sm col-sm-8" id="marketshare_persen" name="marketshare_persen" aria-describedby="marketshare_persenDesc" placeholder="##0,00%" required>
                            <small id="marketshare_persenDesc" class="form-text text-muted text-left">Isi dengan nilai besarnya prosentase dari Target produksi yang telah dicanangkan sebelumnya!</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="qty_tahun1" class="col-sm-6 col-form-label text-right">Jumlah Produk di Tahun Pertama &nbsp;<span class="badge badge-pill  badge-warning">2.3</span> &nbsp;<a data-toggle="popover" title="Jumlah Produk" data-content="Jumlah produk di tahun pertama, perkalian item 2.1 dan 2.2" class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-6 text-left">
                        <input type="text" value="<?= $qty_tahun1; ?>" class="form-control  form-control-sm col-sm-8" id="qty_tahun1" name="qty_tahun1" aria-describedby="qty_tahun1Desc" required disabled>
                            <small id="qty_tahun1Desc" class="form-text text-muted">Jumlah produk di tahun pertama, perkalian item 2.1 dan 2.2</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="marketshare_tahun2" class="col-sm-6 col-form-label text-right">Proyeksi Market Share mulai Tahun Ke -2 (%) &nbsp;<span class="badge badge-pill  badge-warning">2.4</span> &nbsp;<a data-toggle="popover" title="Proyeksi Market Share" data-content="Proyeksi Market Share mulai Tahun Ke -2 (%), Proyeksi market share tahun ke - 2 dan seterusnya." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $marketshare_tahun2; ?>" class="form-control  form-control-sm col-sm-8" id="marketshare_tahun2" name="marketshare_tahun2" aria-describedby="targetDesc" placeholder="##0,00%" required>
                            <small id="judulDesc" class="form-text text-muted text-left">Proyeksi market share tahun ke - 2 dan seterusnya</small>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="biaya_cogs" class="col-sm-6 col-form-label text-right">Biaya Cost of Goods Sold (Biaya Investasi Produk) &nbsp;<span class="badge badge-pill  badge-warning">2.5</span> &nbsp;<a data-toggle="popover" title="Biaya COGs" data-content="Biaya Cost of Goods Sold (Biaya Investasi Produk)." class="badge badge-info text-white">Info</a></label>      
                        <div class="col-sm-6">
                            <div class="row">                  
                                <div class="col-8">
                                    <input type="text" value="<?= $biaya_cogs; ?>" class="form-control form-control-sm col-sm-8" id="biaya_cogs" name="biaya_cogs" aria-describedby="biaya_cogsDesc" placeholder="#.##0,00" required>                        
                                    <small id="biaya_cogsDesc" class="form-text text-muted text-left">Biaya Investasi Produk</small>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCOGS">&#187; Input Item</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="harga_tahun1" class="col-sm-6 col-form-label text-right">Harga Jual Produk (Tahun Pertama) &nbsp;<span class="badge badge-pill  badge-warning">2.6</span> &nbsp;<a data-toggle="popover" title="Harga Jual Produk" data-content="Harga Jual Produk (Tahun Pertama), Harga jual produk pada tahun pertama." class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-6 text-left">
                            <div class="row">
                                <div class="col-8">
                                    <input type="text" value="<?= $harga_tahun1; ?>" class="form-control  form-control-sm col-sm-8" id="harga_tahun1" name="harga_tahun1" aria-describedby="harga_tahun1Desc" placeholder="#.##0,00" required>                        
                                    <small id="harga_tahun1Desc" class="form-text text-muted">Harga jual produk pada tahun pertama</small>
                                </div>
                                <div class="col-4 text-right">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalHarga">&#187; Proyeksi Harga</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="harga_tahun2" class="col-sm-6 col-form-label text-right">Harga Jual Produk mulai Tahun ke - 2 (%) &nbsp;<span class="badge badge-pill  badge-warning">2.7</span> &nbsp;<a data-toggle="popover" title="Proyeksi Harga Jual" data-content="Harga Jual Produk mulai Tahun ke - 2 (%), Harga jual produk pada tahun ke - 2 dan seterusnya." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-4">
                            <input type="text" value="<?= $harga_tahun2; ?>" class="form-control  form-control-sm col-sm-8" id="harga_tahun2" name="harga_tahun2" placeholder="##0,00%" aria-describedby="harga_tahun2Desc" required>
                            <small id="harga_tahun2Desc" class="form-text text-muted text-left">Harga jual produk pada tahun ke - 2 dan seterusnya</small>
                        </div>
                        <div class="col-md-2 text-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Referensi Inflasi
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" target="_blank" href="https://www.bi.go.id/id/moneter/inflasi/data/Default.aspx" >BANK INDONESIA</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- untuk tombol previous next -->
                    <div class="form-group row">                    
                        <div class="col-md-4 text-right">
                            <a href="<?=base_url() ?>manage/add/incomebased_calculator1/<?php echo $this->session->userdata('sesi_hki'); ?>" id="tombol21" name="tombol21" class="btn btn-xs btn-outline-danger btn-block">Kembali Ke Halaman 1</a> 
                            <!-- <button href="<?php echo base_url(); ?>manage/add/incomebased_calculator1/<?php echo $this->session->userdata('sesi_hki'); ?>" id="tombol21" name="tombol21" class="btn btn-xs btn-outline-danger btn-block">Kembali Ke Halaman 1</button> -->
                        </div>
                        <div class="col-md-4 text-left">
                            <!-- <input type="submit" class="btn btn-success btn-sm" id="tombol23" name="tombol23" value="Lanjut Ke Halaman 3"> -->
                            <button href="<?php echo base_url(); ?>manage/add/incomebased_calculator3" id="tombol23" name="tombol23" class="btn btn-xs btn-outline-primary btn-block">Lanjut Ke Halaman 3</button>
                        </div>
                        <div class="col-md-4 text-left">
                            <div class="loader"></div>
                        </div>
                    </div>
                <!-- </form> -- Form Halaman 1 END -->
                </div>
            </div>
        </div>
    </div>   

    <!-- Modal CoGS -->
    <div class="modal fade p-0" data-backdrop="static" id="modalCOGS" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">                        
                    <h5 class="modal-title" id="exampleModalLabel">Komponen Biaya COGS</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body modal-dialog-scrollable">
                        <div class="form-group">
                                <div class="form-group">
                                    <label for="inv_komponen" class="col-sm-12 col-form-label text-right">Item Product &nbsp;&nbsp;<a data-toggle="popover" title="Item Product" data-content="Mencakup biaya komponen product/barang yang digunakan dalam proses produksi." class="badge badge-info text-white">Info</a></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control col-sm-12" id="cogs_komponen" name="cogs_komponen" placeholder="Item Product" aria-describedby="cogs_komponenDesc">
                                        <small id="cogs_komponenDesc" class="form-text text-muted text-left">Item Product</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="cogs_qty" class="col-sm-12 col-form-label text-right">Qty &nbsp;&nbsp;<a data-toggle="popover" title="Jumlah/Qty" data-content="Banyaknya Item" class="badge badge-info text-white">Info</a></label>
                                        <input type="text" class="form-control col-sm-12" id="cogs_qty" name="cogs_qty" placeholder="Qty" aria-describedby="cogs_qtyDesc">
                                        <small id="cogs_qtyDesc" class="form-text text-muted text-left">Kuantitas</small>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="cogs_unit" class="col-sm-12 col-form-label text-right">Satuan &nbsp;&nbsp;<a data-toggle="popover" title="Satuan" data-content="Satuan/Unit Item" class="badge badge-info text-white">Info</a></label>
                                        <input type="text" class="form-control col-sm-12" id="cogs_unit" name="cogs_unit" placeholder="Unit" aria>
                                        <small id="cogs_unitDesc" class="form-text text-muted text-left">Satuan/Unit</small>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="cogs_unit_rp" class="col-sm-12 col-form-label text-right">Harga &nbsp;&nbsp;<a data-toggle="popover" title="Harga Satuan" data-content="Harga Satuan Item (Rp.)" class="badge badge-info text-white">Info</a></label>
                                        <input type="text" class="form-control" id="cogs_unit_rp" name="cogs_unit_rp" placeholder="Price /Unit (Rp.)">
                                        <small id="" class="form-text text-muted text-left">Harga Satuan/Unit (Rp.)</small>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="cogs_total_rp" class="col-sm-12 col-form-label text-right">Total Harga &nbsp;&nbsp;<a data-toggle="popover" title="Total Harga" data-content="Total Harga Item (Rp.)" class="badge badge-info text-white">Info</a></label>
                                        <input type="text" class="form-control" id="cogs_total_rp" name="cogs_total_rp" placeholder="Total Cost (Rp.)" readonly>
                                        <small id="" class="form-text text-muted text-left">Total Harga (Rp.)</small>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="cogs_remark" class="col-sm-12 col-form-label text-right">Remark &nbsp;&nbsp;<a data-toggle="popover" title="Remark" data-content="Keterangan/Catatan penting dari item Product." class="badge badge-info text-white">Info</a></label>
                                        <input type="text" class="form-control" id="cogs_remark" name="cogs_remark" placeholder="Catatan">
                                        <small id="" class="form-text text-muted text-left">Keterangan/Catatan</small>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="cogs_ok" class="col-sm-12 col-form-label text-right">&nbsp;&nbsp;</label>
                                        <button id="cogs_ok" name="cogs_ok" class="btn btn-xs btn-outline-primary btn-block">&#43;</button>
                                    </div>
                                </div>
                    </div>
                    <!-- </form> -->
                    <!-- table -->
                    <table id="tabel_cogs" class="table table-bordered thead-dark table-responsive-sm table-striped">
                        <thead>
                        <tr class="bg-primary">
                            <th>#</th>
                            <th>Produk</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Price per Unit (Rp.)</th>
                            <th>Total Cost (Rp.)</th>
                            <th>Remark</th>
                            <th>Hapus Item</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <td colspan="6" class="text-right">Total (Rp.)</td>
                            <td id="total_cogs"></td>
                            </tr>
                        </tfoot>
                        <tbody id="data_cogs">
                        
                        </tbody>
                    </table>
                    <!-- table END -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div> 
        </div>
    </div> 
    <!-- Modal CoGS END -->

    <!-- Modal Harga Jual -->
    <div class="modal fade p-0" data-backdrop="static" id="modalHarga" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">                        
                    <h5 class="modal-title" id="exampleModalLabel">Sales Revenue: Penentuan Harga Jual</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- table -->
                    <table id="tabel_harga" class="table table-bordered thead-dark table-responsive-sm table-striped">
                        <thead>
                        <tr class="bg-primary text-white">
                            <th>#</th>
                            <th colspan="3">Cost</th>
                            <th>Market Value Per Unit</th>
                        </tr>
                        </thead>
                        <tbody id="data_harga">
                            <tr>
                                <td>1.</td>
                                <td colspan="3">Cost of Goods Manufactured (COGs)</td>
                                <td><input type="text" class="form-control" id="harga_cogs" name="harga_cogs" placeholder="Nilai COGS/HPP" readonly></td>
                            </tr>
                            <tr>
                                <td>2.</td>
                                <td>Risk Factor</td>
                                <td><input type="text" class="form-control" id="harga_rf_persen" name="harga_rf_persen" placeholder="% Risk Factor"></td>
                                <td>% dari COGM</td>
                                <td><input type="text" class="form-control" id="harga_rf_value" name="harga_rf_value" placeholder="Nilai Risk Factor" readonly></td>
                            </tr>
                            <tr>
                                <td>3.</td>
                                <td>Market Fee</td>
                                <td><input type="text" class="form-control" id="harga_mf_persen" name="harga_mf_persen" placeholder="% Market Fee"></td>
                                <td>% dari COGM</td>
                                <td><input type="text" class="form-control" id="harga_mf_value" name="harga_mf_value" placeholder="Nilai Market Fee" readonly></td>
                            </tr>
                            <tr>
                                <td>4.</td>
                                <td>Marketing</td>
                                <td><input type="text" class="form-control" id="harga_marketing_persen" name="harga_marketing_persen" placeholder="% Marketing"></td>
                                <td>% dari COGM</td>
                                <td><input type="text" class="form-control" id="harga_marketing_value" name="harga_marketing_value" placeholder="Nilai Marketing" readonly></td>
                            </tr>
                            <tr>
                                <td>5.</td>
                                <td>Profit Margin</td>
                                <td><input type="text" class="form-control" id="harga_profit_persen" name="harga_profit_persen" placeholder="% Profit Margin"></td>
                                <td>% dari COGM</td>
                                <td><input type="text" class="form-control" id="harga_profit_value" name="harga_profit_value" placeholder="Nilai Profit Margin" readonly></td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right">Market Value</td>
                                <td><input type="text" class="form-control" id="harga_hargajual" name="harga_hargajual" placeholder="Nilai Harga Jual" readonly></td>
                            </tr>
                        </tbody>
                    </table>
                    <!-- table END -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" id="btn_harga_jual" name="btn_harga_jual">Save</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div> 
        </div>
    </div> 
    <!-- Modal Harga Jual END -->

</div>