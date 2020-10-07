<section class="section_second_wrapper">
    <div class="container">
        <!-- <center><img width="200" style="margin-bottom:40px;text-align:center;" src="<?php echo base_url();?>assets/frontview/img/logo2.svg"></center> -->
        <form method="post">
            <center><h5 class="text-white" style="font-size:20px;">Daftar</h5></center>
            <br/>
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-xs-12"> 
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" >Nama Lembaga <i style="color: red">*</i> </label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lembaga" required>
                                    </div>  
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" >Jenis Lembaga  <i style="color: red">*</i> </label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <options value="">Silahkan pilih jenis lembaga</options>
                                            <option value="1">Industri</options>
                                            <option value="1">Lembaga Litbang</option>
                                            <option value="1">Perguruan Tinggi</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" >Nama Lengkap  <i style="color: red">*</i> </label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nama Lengkap" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1" >Username  <i style="color: red">*</i> </label>
                                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Username (hanya boleh huruf atau angka)" required>
                                        <small id="emailHelp" class="form-text text-muted">(hanya boleh huruf atau angka)</small>
                               0     </div>
                        </div>                        <div class="col-lg-6 col-md-6 col-xs-12">
                            <div class="form-group">
                                <label for="exampleInputEmail1" >Alamat Email  <i style="color: red">*</i> </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Alamat Email" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" >Password  <i style="color: red">*</i> </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" required>
                                <small id="emailHelp" class="form-text text-muted">min. 8 karakter</small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1" >Ulangi Password  <i style="color: red">*</i> </label>
                                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Password" required>
                                <small id="emailHelp" class="form-text text-muted">min. 8 karakter</small>
                            </div>
                            <div class="form-group">
                                <input class="btn btn-block btn-md btn-success" type="submit" value="Daftar">
                            </div>  
                            <div class="form-group">
                            <p class="small text-center ">Dengan menekan tombol Daftar, Anda setuju pada <br><a href="<?php echo base_url();?>syaratketentuan"  title="Buka Syarat & Ketentuan.">Syarat &amp; Ketentuan</a>, serta <a href="<?php echo base_url();?>privacypolicy" title="Buka Kebijakan Pribadi.">Kebijakan Privasi</a> yang kami tentukan.</p>
                            </div>
                            <center><span class="">Sudah punya akun ? <a href="<?php echo base_url();?>auth/login">Login</a></span></center>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div> 
</section>