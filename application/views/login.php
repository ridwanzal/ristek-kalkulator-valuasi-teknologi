    <div class="login-content">
        <div class="nk-block toggled" id="l-login">
            <center>
                <img width="200px;" src="http://sinta.ristekbrin.go.id/assets/img/sinta_logo.png">
            </center>
            <br/>
            <br/>
                <form method="POST" action="<?php echo base_url('login/login'); ?>">
                    <div class="nk-form">
                        <div class="input-group">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                            <div class="form-group float-lb">
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" placeholder="Please provide E-mail Address" name="p_username" required>
                                    <label class="nk-label">Please provide E-mail Address</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                            <div class="form-group float-lb">
                                <div class="nk-int-st">
                                    <input type="password" class="form-control" placeholder="Please provide Password" name="p_password" autocomplete="on" required>
                                    <label class="nk-label">Please provide Password</label>
                                </div>
                            </div>
                        </div>
                        <input style="background:#10586E; color:#fff;width:100%; border:1px solid #10586E;padding:10px;border-radius:4px;" type="submit" class="" value="Login">
                    </div>
                    <div style="margin-top:25px; color:#10586E">
                        <!-- <p style="color:#fff;">Belum punya akun terdaftar ? </p>&nbsp;&nbsp;<a href="<?php echo base_url()?>register">Register</a> -->
                        <label class="">Bantuan ?</label>
                    </div>
                </form>
            <div style="margin-top:90px;"> 
                <div class="row">
                    <div class="col-md-2">
                        <img style="width:50px;" src="http://sinta.ristekbrin.go.id/assets/img/ristekbrin_logo-circle.png">
                    </div>
                    <div class="col-md-10" style="text-align:left;font-size:10px;color:#888;">
                        Copyright &copy; 2020
                        <br/>Kementerian Riset dan Teknologi / Badan Riset dan Inovasi Nasional
                        <br/><i>(Ministry of Research and Technology / National Agency for Research and Innovation)</i>
                        <br/>All Rights Reserved.
                    </div>
                </div>
            </div>  
        </div>
    </div>