<div class="main-menu-area mg-tb-40">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <ul class="nav nav-tabs notika-menu-wrap menu-it-icon-pro">
                        <li><a href="<?php echo base_url();?>"><i class="notika-icon notika-house"></i> Home</a>
                        </li>
                        <li class="active"><a href="<?php echo base_url()?>admin/produk"><i class="notika-icon notika-mail"></i> Kategori & Produk</a>
                        </li>
                        <li><a href="<?php echo base_url();?>admin/daftar_pelanggan"><i class="notika-icon notika-support"></i> Pelanggan</a>
                        </li>
                        <li><a href="<?php echo base_url();?>admin/produk/upselling"><i class="notika-icon notika-edit"></i> Up Selling</a>
                        </li>
                        <li><a href="#"><i class="notika-icon notika-edit"></i> Down Selling</a>
                        </li>
                        <li><a href="#"><i class="notika-icon notika-edit"></i> Kritik dan Saran</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="header-top-menu">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_product">Tambah Produk</button>&nbsp;
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_category">Tambah Kategori</button>
                <div class="modal fade" id="add_product" role="dialog">
                    <div class="modal-dialog modals-default">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2>Tambah Produk</h2>
                                <br/>
                                <br/>
                                <div class="nk-form">
                                    <div class="input-group">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="Nama Produk" name="p_nama_produk" id="p_nama_produk" required>
                                        </div>
                                    </div>
                                    <div class="input-group mg-t-15">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="Harga" name="p_harga" id="p_harga" required>
                                        </div>
                                    </div>
                                    <div class="input-group mg-t-15">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                                        <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="Stok" name="p_stok" id="p_stok" required>
                                        </div>
                                    </div>
                                    <div class="input-group mg-t-15">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-phone"></i></span>
                                        <!-- <div class="nk-int-st">
                                            <input type="text" class="form-control" placeholder="Spesifikasi" name="p_spesifikasi"  id="p_spesifikasi"  required>
                                        </div> -->
                                        <div class="form-group">
                                            <div class="form-single nk-int-st widget-form">
                                                <textarea name="message" class="form-control" placeholder="Detail Spesifikasi" name="p_spesifikasi"  id="p_spesifikasi"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mg-t-15">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                        <div class="nk-int-st">
                                            <select class="selectpicker" id="id_kategori">
                                                <option value=''> -- Pilih Kategori</option>
                                                <?php 
                                                    foreach($kategori as $list){ ?>
                                                        <option value='<?php echo $list->id_kategori; ?>'><?php echo $list->nama_kategori; ?></option>
                                                    <?php }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div class="modal-footer">
                                <button type="button" id="submit_add_product" class="btn btn-default">Save changes</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="add_category" role="dialog">
                    <div class="modal-dialog modals-default">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <div class="modal-body">
                                <h2>Tambah Kategori</h2>
                                <br/>
                                <br/>
                                <div class="nk-form">
                                    <div class="input-group">
                                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                                        <div class="nk-int-st">
                                            <input id="p_nama_kategori" type="text" class="form-control" placeholder="Nama Kategori" name="p_nama_kategori" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br/>
                            <br/>
                            <div class="modal-footer">
                                <button id="submit_add_category" type="button" class="btn btn-default">Save changes</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal" class="close_modal">Close</button>
                            </div>
                               
                            <div class="data-table-list">
                                <div class="table-responsive">
                                    <table id="table2" class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>No. </th>
                                                <th>Nama Kategori</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $i = 0;
                                                foreach($kategori as $list){
                                                    $i++;
                                                    ?>
                                                        <tr>
                                                            <td><?php echo $i; ?></td>
                                                            <td><?php echo $list->nama_kategori; ?></td>
                                                        </tr>
                                                <?php }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<br/>
<div class="data-table-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="data-table-list">
                        <div class="table-responsive">
                            <table id="data-table-basic" class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Nama Produk</th>
                                        <th>Harga</th>
                                        <th>Stok</th>
                                        <th>Spesifikasi</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php 
                                        $i = 0;
                                        foreach($produk as $list){
                                            $i++;
                                            ?>
                                                <tr>
                                                    <td><?php echo $i; ?></td>
                                                    <td><?php echo $list->nama_produk; ?></td>
                                                    <td><?php echo $list->harga; ?></td>
                                                    <td><?php echo $list->stok; ?></td>
                                                    <td><?php echo $list->spesifikasi; ?></td>
                                                    <td>Update</td>
                                                </tr>
                                        <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>