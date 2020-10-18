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

?>
<div class="container mt-3 mb-3">
    <div class="row mb-3">
        <div class="col-md-12 center">
            <div class="card text-center">
                <div class="card-header bg-info text-white text-right">
                    Halaman 3. Proyeksi Biaya Operasional (Operating Expense)
                </div>
                <div class="card-body">
                <!-- <form method="POST" name="frmhalaman3" id="frmhalaman3" action="<?=base_url() ?>manage/add/incomebased_output"> -->
                    <div class="form-group row">
                        <label for="biaya_cogs" class="col-sm-6 col-form-label text-right">Biaya Cost of Goods Sold (Biaya Investasi Produk) &nbsp;<span class="badge badge-pill  badge-warning">3.1</span> &nbsp;<a data-toggle="popover" title="Biaya COGs" data-content="Biaya Cost of Goods Sold (Biaya Investasi Produk)." class="badge badge-info text-white">Info</a></label>      
                        <div class="col-sm-6">
                            <div class="row">                  
                                <div class="col-11">
                                    <input type="text" value="<?= $biaya_cogs; ?>" class="form-control form-control-sm col-sm-8" id="biaya_cogs" name="biaya_cogs" aria-describedby="biaya_cogsDesc" placeholder="#.##0,00" required>                        
                                    <small id="biaya_cogsDesc" class="form-text text-muted text-left">Biaya Investasi Produk</small>
                                </div>
                                <div class="col-1 text-left">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalCOGS">&#187;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_tetap" class="col-sm-6 col-form-label text-right">Biaya Operasional Tetap (Fixed Cost) per bulan&nbsp;<span class="badge badge-pill  badge-warning">3.2</span> &nbsp;<a data-toggle="popover" title="Biaya Tetap" data-content="Biaya Operasional Tetap (Fixed Cost) untuk pengeluaran setiap bulan." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-11">
                                    <input type="text" value="<?= $biaya_tetap; ?>" class="form-control  form-control-sm col-sm-8" id="biaya_tetap" name="biaya_tetap" placeholder="#.##0,00" aria-describedby="biaya_tetapDesc" required>
                                    <small id="biaya_tetapDesc" class="form-text text-muted text-left">Biaya tetap per Bulan</small>
                                </div>
                                <div class="col-1 text-left">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalFCOST">&#187;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_investasi" class="col-sm-6 col-form-label text-right">Biaya Investasi &nbsp;<span class="badge badge-pill  badge-warning">3.3</span> &nbsp;<a data-toggle="popover" title="Biaya Investasi" data-content="Komponen untuk memasukkan biaya investasi. Biaya Investasi Mesin, Kendaraan, dan Peralatan." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col-11">
                                    <input type="text" value="<?= $biaya_investasi; ?>" class="form-control form-control-sm col-sm-8" id="biaya_investasi" name="biaya_investasi" aria-describedby="biaya_investasiDesc" placeholder="#.##0,00" required>
                                    <small id="biaya_investasiDesc" class="form-text text-muted text-left">Komponen untuk memasukkan biaya investasi</small>
                                    <!-- <span class="badge badge-pill  badge-warning">&#187;</span> -->
                                </div>
                                <div class="col-1 text-left">
                                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modalInvestasi">&#187;</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_depresiasi" class="col-sm-6 col-form-label text-right">Biaya Depresiasi &nbsp;<span class="badge badge-pill  badge-warning">3.4</span> &nbsp;<a data-toggle="popover" title="Biaya Depresiasi" data-content="Biaya yang diperoleh dari biaya investasi dikurangi dengan nilai umur ekonomis dari setiap item investasi." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_depresiasi; ?>" class="form-control  form-control-sm col-sm-8" id="biaya_depresiasi" name="biaya_depresiasi" placeholder="#.##0,00" aria-describedby="biaya_depresiasiDesc" required readonly>
                            <small id="biaya_depresiasiDesc" class="form-text text-muted text-left">Biaya Depresiasi untuk setiap tahunnya</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="biaya_riset" class="col-sm-6 col-form-label text-right">Biaya Riset dan Pengembangan &nbsp;<span class="badge badge-pill  badge-warning">3.5</span> &nbsp;<a data-toggle="popover" title="Biaya Riset" data-content="Biaya Riset dan Pengembangan. Komponen untuk Biaya Riset dan Pengembangan." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_riset; ?>" class="form-control  form-control-sm col-sm-8" id="biaya_riset" name="biaya_riset" aria-describedby="biaya_risetDesc" placeholder="#.##0,00" required>
                            <small id="biaya_risetDesc" class="form-text text-muted text-left">Komponen untuk Biaya Riset dan Pengembangan</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_lisensi" class="col-sm-6 col-form-label text-right">Biaya Perizinan dan Legalitas (Tahun Pertama) &nbsp;<span class="badge badge-pill  badge-warning">3.6</span> &nbsp;<a data-toggle="popover" title="Biaya License" data-content="Biaya License + ISO9001 (Tahun Pertama), Komponen untuk memasukkan biaya lisensi." class="badge badge-info text-white">Info</a></label>
                        <div class="col-md-6 text-left">
                        <input type="text" value="<?= $biaya_lisensi; ?>" class="form-control  form-control-sm col-sm-8" id="biaya_lisensi" name="biaya_lisensi" aria-describedby="biaya_lisensiDesc" placeholder="#.##0,00" required>
                            <small id="biaya_lisensiDesc" class="form-text text-muted">Komponen untuk memasukkan biaya lisensi</small>
                        </div>
                    </div>                    
                    <div class="form-group row">                        
                        <label for="persen_lisensi" class="col-sm-6 col-form-label text-right">Biaya Perizinan dan Legalitas mulai tahun ke-2 (%) &nbsp;<span class="badge badge-pill  badge-warning">3.7</span> &nbsp;<a data-toggle="popover" title="Prosentase Biaya License" data-content="Biaya License + ISO9002 mulai tahun ke-2 (Prosentase), Prosentase biaya lisensi untuk tahun ke - 2 dan seterusnya." class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $persen_lisensi; ?>" class="form-control  form-control-sm col-sm-8" id="persen_lisensi" name="persen_lisensi" aria-describedby="persen_lisensiDesc" placeholder="##0,00%" required>
                            <small id="persen_lisensiDesc" class="form-text text-muted text-left">Prosentase biaya lisensi untuk tahun ke - 2 dan seterusnya</small>
                        </div>
                    </div>        
                    <div class="form-group row">                        
                        <label for="biaya_marketing" class="col-sm-6 col-form-label text-right">Biaya Marketing (%) &nbsp;<span class="badge badge-pill  badge-warning">3.8</span> &nbsp;<a data-toggle="popover" title="Biaya Marketing" data-content="Biaya Marketing (Prosentase)" class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_marketing; ?>" class="form-control  form-control-sm col-sm-8" id="biaya_marketing" name="biaya_marketing" aria-describedby="biaya_marketingDesc" placeholder="##0,00%" required>
                            <small id="biaya_marketingDesc" class="form-text text-muted text-left">Prosentase Komponen Biaya Marketing</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_perawatan" class="col-sm-6 col-form-label text-right">Biaya Maintenance (Perawatan) &nbsp;<span class="badge badge-pill  badge-warning">3.9</span> &nbsp;<a data-toggle="popover" title="Biaya Perawatan" data-content="Biaya Maintenance (Perawatan)" class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_perawatan; ?>" class="form-control  form-control-sm col-sm-8" id="biaya_perawatan" name="biaya_perawatan" placeholder="#.##0,00" aria-describedby="biaya_perawatanDesc" required>
                            <small id="biaya_perawatanDesc" class="form-text text-muted text-left">Komponen Biaya Perawatan</small>
                        </div>
                    </div>
                    <div class="form-group row">                        
                        <label for="biaya_warehouse" class="col-sm-6 col-form-label text-right">Biaya Warehouse &nbsp;<span class="badge badge-pill  badge-warning">3.10</span> &nbsp;<a data-toggle="popover" title="Biaya Warehouse" data-content="Biaya Warehouse" class="badge badge-info text-white">Info</a></label>
                        <div class="col-sm-6">
                            <input type="text" value="<?= $biaya_warehouse; ?>" class="form-control  form-control-sm col-sm-8" id="biaya_warehouse" name="biaya_warehouse" placeholder="#.##0,00" aria-describedby="biaya_warehouseDesc" required>
                            <small id="biaya_warehouseDesc" class="form-text text-muted text-left">Komponen Biaya Warehouse</small>
                        </div>
                    </div>                    
                    <!-- untuk tombol previous next -->
                    <div class="form-group row">                    
                        <div class="col-md-4 text-right">
                            <a href="<?=base_url() ?>manage/add/incomebased_calculator2" id="tombol32" name="tombol32" class="btn btn-xs btn-outline-danger btn-block">Kembali Halaman 2</a> 
                            <!-- <button href="<?php echo base_url(); ?>manage/add/incomebased_calculator2" id="tombol32" name="tombol32" class="btn btn-xs btn-outline-danger btn-block">Kembali Halaman 2</button> -->
                        </div>
                        <div class="col-md-4 text-left">                            
                            <!-- <input type="submit" class="btn btn-success btn-sm" id="tombol33" name="tombol33" value="Hitung Valuasi"> -->
                            <button href="<?php echo base_url(); ?>manage/add/incomebased_output" id="tombol33" name="tombol33" class="btn btn-xs btn-outline-primary btn-block">Hitung Valuasi</button>
                        </div>
                        <div class="col-md-4 text-left">
                            <div class="loader"></div>
                        </div>
                    </div>
                <!-- </form>  Form Halaman 1 END -->
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

    <!-- Modal Fixed Cost -->
    <div class="modal fade p-0" data-backdrop="static" id="modalFCOST" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">                        
                    <h5 class="modal-title" id="exampleModalLabel">Biaya Tetap (Fixed Cost) Per-Bulan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                                <!-- <div class="form-group">
                                    <label for="inv_komponen" class="col-sm-12 col-form-label text-right">Item Komponen Investasi &nbsp;&nbsp;<a data-toggle="popover" title="Item Investasi" data-content="Mencakup biaya investasi mesin, kendaraan, peralatan, dan investasi lainnya. " class="badge badge-info text-white">Info</a></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control col-sm-12" id="inv_komponen" name="inv_komponen" placeholder="Item Komponen" aria-describedby="inv_komponenDesc">
                                        <small id="inv_komponenDesc" class="form-text text-muted text-left">Item Komponen</small>
                                    </div>
                                </div> -->
                                <div class="form-group row">
                                    <!-- <div class="col-sm-2">
                                        <label for="inv_qty" class="col-sm-12 col-form-label text-right">Qty &nbsp;&nbsp;<a data-toggle="popover" title="Jumlah/Qty" data-content="Banyaknya Item" class="badge badge-info text-white">Info</a></label>
                                        <input type="text" class="form-control col-sm-12" id="inv_qty" name="inv_qty" placeholder="Qty" aria-describedby="inv_qtyDesc">
                                        <small id="inv_qtyDesc" class="form-text text-muted text-left">Kuantitas</small>
                                    </div> -->
                                    <div class="col-sm-4">
                                        <label for="fcost_item" class="col-sm-12 col-form-label text-right">Cost (Biaya) &nbsp;&nbsp;<a data-toggle="popover" title="Cost" data-content="Item Biaya Tetap seperti: Gaji pegawai, asuransi pengawai, pendidikan dan seminar, listrik, telepon, internet, sewa, dll." class="badge badge-success text-white">Info</a></label>
                                        <input type="text" class="form-control col-sm-12" id="fcost_item" name="fcost_item" placeholder="Item Cost (Biaya)" aria>
                                        <small id="fcost_itemDesc" class="form-text text-muted text-left">Item Cost (Biaya)</small>
                                    </div>
                                    <!-- <div class="col-sm-2">
                                        <label for="inv_unit_rp" class="col-sm-12 col-form-label text-right">Harga &nbsp;&nbsp;<a data-toggle="popover" title="Harga Satuan" data-content="Harga Satuan Item (Rp.)" class="badge badge-info text-white">Info</a></label>
                                        <input type="text" class="form-control" id="inv_unit_rp" name="inv_unit_rp" placeholder="Price /Unit (Rp.)">
                                        <small id="" class="form-text text-muted text-left">Harga Satuan/Unit (Rp.)</small>
                                    </div> -->
                                    <div class="col-sm-3">
                                        <label for="fcost_rp" class="col-sm-12 col-form-label text-right">Average Costs &nbsp;&nbsp;<a data-toggle="popover" title="Average Costs" data-content="Biaya rata-rata pengeluaran per-bulan untuk item biaya." class="badge badge-success text-white">Info</a></label>
                                        <input type="text" class="form-control" id="fcost_rp" name="fcost_rp" placeholder="Average Costs / Month (Rp.)">
                                        <small id="" class="form-text text-muted text-left">Average Costs / Month (Rp.)</small>
                                    </div>
                                    <div class="col-sm-4">
                                        <label for="fcost_keterangan" class="col-sm-12 col-form-label text-right">Remark/Keterangan &nbsp;&nbsp;<a data-toggle="popover" title="Remark/Keterangan" data-content="Keterangan dari setiap item biaya." class="badge badge-success text-white">Info</a></label>
                                        <input type="text" class="form-control" id="fcost_keterangan" name="fcost_keterangan" placeholder="Remark/Keterangan">
                                        <small id="" class="form-text text-muted text-left">Remark/Keterangan</small>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="fcost_ok" class="col-sm-12 col-form-label text-right">&nbsp;&nbsp;</label>
                                        <button id="fcost_ok" name="fcost_ok" class="btn btn-xs btn-outline-success btn-block">&#43;</button>
                                    </div>
                                </div>
                    </div>
                    <!-- </form> -->
                    <!-- table -->
                    <table id="tabel_fcost" class="table table-bordered thead-dark table-responsive-sm table-striped">
                        <thead>
                        <tr class="bg-success text-white">
                            <th>#</th>
                            <th>Item Cost (Biaya)</th>
                            <th>Average Costs / Month (Rp.)</th>
                            <th>Remark/Keterangan</th>
                            <th>Hapus Item</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <td colspan="3" class="text-right">Total (Rp.)</td>
                            <td id="total_fcost"></td>
                            </tr>
                        </tfoot>
                        <tbody id="data_fcost">
                        
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
    <!-- Modal Fixed Cost END -->

    <!-- Modal Biaya Invenstasi -->
    <div class="modal fade p-0" data-backdrop="static" id="modalInvestasi" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-xl" role="document">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">                        
                    <h5 class="modal-title" id="exampleModalLabel">Komponen Biaya Investasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                                <div class="form-group">
                                    <label for="inv_komponen" class="col-sm-12 col-form-label text-right">Item Komponen Investasi &nbsp;&nbsp;<a data-toggle="popover" title="Item Investasi" data-content="Mencakup biaya investasi mesin, kendaraan, peralatan, dan investasi lainnya. " class="badge badge-warning text-white">Info</a></label>
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control col-sm-12" id="inv_komponen" name="inv_komponen" placeholder="Item Komponen" aria-describedby="inv_komponenDesc">
                                        <small id="inv_komponenDesc" class="form-text text-muted text-left">Item Komponen</small>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-2">
                                        <label for="inv_qty" class="col-sm-12 col-form-label text-right">Qty &nbsp;&nbsp;<a data-toggle="popover" title="Jumlah/Qty" data-content="Banyaknya Item" class="badge badge-warning text-white">Info</a></label>
                                        <input type="text" class="form-control col-sm-12" id="inv_qty" name="inv_qty" placeholder="Qty" aria-describedby="inv_qtyDesc">
                                        <small id="inv_qtyDesc" class="form-text text-muted text-left">Kuantitas</small>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="inv_unit" class="col-sm-12 col-form-label text-right">Satuan &nbsp;&nbsp;<a data-toggle="popover" title="Satuan" data-content="Satuan/Unit Item" class="badge badge-warning text-white">Info</a></label>
                                        <input type="text" class="form-control col-sm-12" id="inv_unit" name="inv_unit" placeholder="Unit" aria>
                                        <small id="inv_unitDesc" class="form-text text-muted text-left">Satuan/Unit</small>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="inv_unit_rp" class="col-sm-12 col-form-label text-right">Harga &nbsp;&nbsp;<a data-toggle="popover" title="Harga Satuan" data-content="Harga Satuan Item (Rp.)" class="badge badge-warning text-white">Info</a></label>
                                        <input type="text" class="form-control" id="inv_unit_rp" name="inv_unit_rp" placeholder="Price /Unit (Rp.)">
                                        <small id="" class="form-text text-muted text-left">Harga Satuan/Unit (Rp.)</small>
                                    </div>
                                    <div class="col-sm-3">
                                        <label for="inv_total_rp" class="col-sm-12 col-form-label text-right">Total Harga &nbsp;&nbsp;<a data-toggle="popover" title="Total Harga" data-content="Total Harga Item (Rp.)" class="badge badge-warning text-white">Info</a></label>
                                        <input type="text" class="form-control" id="inv_total_rp" name="inv_total_rp" placeholder="Total Cost (Rp.)" readonly>
                                        <small id="" class="form-text text-muted text-left">Total Harga (Rp.)</small>
                                    </div>
                                    <div class="col-sm-2">
                                        <label for="inv_depresiasi" class="col-sm-12 col-form-label text-right">Depresiasi &nbsp;&nbsp;<a data-toggle="popover" title="Harga Satuan" data-content="Harga Satuan Item (Rp.)" class="badge badge-warning text-white">Info</a></label>
                                        <input type="text" class="form-control" id="inv_depresiasi" name="inv_depresiasi" placeholder="Umur Ekonomis">
                                        <small id="" class="form-text text-muted text-left">Umur Ekonomis (Tahun)</small>
                                    </div>
                                    <div class="col-sm-1">
                                        <label for="inv_ok" class="col-sm-12 col-form-label text-right">&nbsp;&nbsp;</label>
                                        <button id="inv_ok" name="inv_ok" class="btn btn-xs btn-outline-warning btn-block">&#43;</button>
                                    </div>
                                </div>
                    </div>
                    <!-- </form> -->
                    <!-- table -->
                    <table id="example" class="table table-bordered thead-dark table-responsive-sm table-striped">
                        <thead>
                        <tr class="bg-warning">
                            <th>#</th>
                            <th>Komponen</th>
                            <th>Qty</th>
                            <th>Unit</th>
                            <th>Price per Unit (Rp.)</th>
                            <th>Total Cost (Rp.)</th>
                            <th>Umur Ekonomis</th>
                            <th>Hapus Item</th>
                        </tr>
                        </thead>
                        <tfoot>
                            <tr>
                            <td colspan="6" class="text-right">Total (Rp.)</td>
                            <td id="total"></td>
                            </tr>
                        </tfoot>
                        <tbody id="dataku">
                        
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
    <!-- Modal Biaya Invenstasi END --> 
</div>