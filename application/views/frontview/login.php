<section class="section_second_wrapper">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4"> 
                <img width="400" style="margin-bottom:40px;" src="<?php echo base_url();?>assets/frontview/img/logo2.svg">
                <div class="loader"></div>
                <h1 class="h3 mb-3 font-weight-bold">Sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="p_username" class="form-control" placeholder="Email address" required value="anism@unissula.ac.id" autofocus>
                <br/>   
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="p_password" class="form-control" placeholder="Password" value="123456" required>
                <br/>
                <!-- <a href="<?php echo base_url(); ?>manage" class="btn btn-xs btn-outline-primary btn-block"><img height="20" src="http://sinta.ristekbrin.go.id/assets/img/sinta_logo.png">&nbsp;&nbsp;&nbsp;Sign in dengan Sinta</a> -->
                 <button href="<?php echo base_url(); ?>manage" id="submit_login" class="btn btn-xs btn-outline-primary btn-block"><img height="20" src="http://sinta.ristekbrin.go.id/assets/img/sinta_logo.png">&nbsp;&nbsp;&nbsp;Sign in dengan Sinta</button>
                <br/>
                <span>Belum punya akun ? <a href="">Daftar</a></span>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2">

            </div>
            <div class="col-lg-6 col-md-6 col-xs-6"> 
                <img id="image_banners" height="500px" style="position:relative;top:-70px;" src="<?php echo base_url();?>/assets/frontview/img/research.svg">
            </div>
        </div>
    </div>
</section>