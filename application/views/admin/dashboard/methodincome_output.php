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
                    <!-- untuk tombol previous next -->
                    <div class="form-group row">                    
                        <div class="col-md-3 text-right">
                        <a href="<?=base_url() ?>manage/add/incomebased_calculator3" id="tombol32" name="tombol32" class="btn btn-warning btn-sm">Kembali Input Parameter Kalkulasi</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item">
            <a class="nav-link" href="#cashflow" role="tab" data-toggle="tab">1. Cash Flow</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#profitlost" role="tab" data-toggle="tab">2. Profit Lost</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#npv" role="tab" data-toggle="tab">3. Net Present Value</a>
        </li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">        
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
        $('.nav-tabs a[href="#cashflow"]').trigger('click');
    });
</script>