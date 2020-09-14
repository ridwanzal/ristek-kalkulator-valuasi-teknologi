<section class="section_second_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-xs-5"> 
            <center><img width="200" style="margin-bottom:40px;" src="<?php echo base_url();?>assets/frontview/img/logo2.svg"></center>
            <div class="card">
                    <div class="card-body">
                        <div class="loader"></div>
                        <h1 class="h3 mb-3 font-weight-bold">Masuk</h1>
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="p_username" class="form-control" placeholder="Email address" required value="anism@unissula.ac.id" autofocus>
                        <br/>   
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="p_password" class="form-control" placeholder="Password" value="123456" required>
                        <br/>
                        <!-- <a href="<?php echo base_url(); ?>manage" class="btn btn-xs btn-outline-primary btn-block"><img height="20" src="http://sinta.ristekbrin.go.id/assets/img/sinta_logo.png">&nbsp;&nbsp;&nbsp;Sign in dengan Sinta</a> -->
                        <button href="<?php echo base_url(); ?>manage" id="submit_login" class="btn btn-xs btn-outline-primary btn-block"><img height="20" src="http://sinta.ristekbrin.go.id/assets/img/sinta_logo.png">&nbsp;&nbsp;&nbsp;Masuk dengan Sinta</button>
                        <button href="<?php echo base_url(); ?>manage" id="submit_login" class="btn btn-xs btn-success btn-block">Masuk</button>
                        <br/>
                        <div class="form-group">
                            <p class="small text-center">Dengan menekan tombol Masuk, Anda setuju pada <br><a href="./term.php"  title="Buka Syarat & Ketentuan." class="view" data-toggle="modal" data-target="#modal-term" kode="term" data-refresh='true'>Syarat &amp; Ketentuan</a>, serta <a href="./policy.php"  title="Buka Kebijakan Pribadi." class="view" data-toggle="modal" data-target="#modal-policy" kode="policy" data-refresh='true'>Kebijakan Privasi</a> yang kami tentukan.</p>
                        </div>
                        <br/>
                    </div>
            </div>
            <br/>
            <center><span>Belum punya akun ? <a href="<?php echo base_url();?>register">Daftar</a></span></center>
            </div>
            <div class="col-lg-1 col-md-! col-xs-1">

            </div>
            <div class="col-lg-6 col-md-6 col-xs-6"> 
                <img id="image_banners" height="550px" style="position:relative;top:-70px;" src="<?php echo base_url();?>/assets/frontview/img/research.svg">
            </div>
        </div>
    </div>
</section>