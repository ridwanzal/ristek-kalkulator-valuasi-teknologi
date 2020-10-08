<section class="section_second_wrapper">
    <div class="container">
        <div class="row justify-content-md-center">
            <div class="col-lg-5 col-md-5 col-xs-5"> 
            <center><h5 class="text-white" style="font-size:20px;">Masuk</h5></center>
            <div class="loader"></div>
            <br/>
            <div class="card" style="padding:20px 20px 20px 20px;">
                    <div class="card-body">
                        <label for="inputEmail" class="sr-only">Email address</label>
                        <input type="email" id="p_username" class="form-control" placeholder="Email address" required value="haris.wahyudi@mercubuana.ac.id" autofocus>
                        <br/>   
                        <label for="inputPassword" class="sr-only">Password</label>
                        <input type="password" id="p_password" class="form-control password-field" placeholder="Password" value="123456" required>
                        <span title="Show Password" toggle=".password-field" class="toggle-password" style="cursor:pointer;top:-31px;position:relative;float:right;margin-right:10px;z-index:100;"><img class="image_replacer" width="22" src="https://www.flaticon.com/svg/static/icons/svg/709/709612.svg"/></span>
                        <br/>
                        <!-- <a href="<?php echo base_url(); ?>manage" class="btn btn-xs btn-outline-primary btn-block"><img height="20" src="http://sinta.ristekbrin.go.id/assets/img/sinta_logo.png">&nbsp;&nbsp;&nbsp;Sign in dengan Sinta</a> -->
                        <button href="<?php echo base_url(); ?>manage" id="submit_login" class="btn btn-xs btn-outline-primary btn-block"><img height="20" src="http://sinta.ristekbrin.go.id/assets/img/sinta_logo.png">&nbsp;&nbsp;&nbsp;Masuk dengan Sinta</button>
                        <!-- <button href="<?php echo base_url(); ?>manage" id="submit_login" class="btn btn-xs btn-success btn-block">Masuk</button> -->
                        <br/>
                        <div class="small text-center">Dengan menekan tombol Masuk, Anda setuju pada <br><a href="<?php echo base_url();?>syaratketentuan"  title="Buka Syarat & Ketentuan.">Syarat &amp; Ketentuan</a>, serta <a href="<?php echo base_url();?>privacypolicy" title="Buka Kebijakan Pribadi.">Kebijakan Privasi</a> yang kami tentukan.</div>
                        <br/>
                    </div>
            </div>
            <br/>
            <center><span class="text_white">Belum punya akun ? <a href="<?php echo base_url();?>auth/register">Daftar</a></span></center>
            </div>
        </div>
    </div>
</section>