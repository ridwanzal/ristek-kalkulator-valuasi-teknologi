 <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- Login Register area Start-->
    <div class="login-content">
        <!-- Login -->
        <div class="nk-block toggled" id="l-login">
            <br/>
            <br/>
            <form method="POST" action="<?php echo base_url('register/register'); ?>">
                <div class="nk-form">
                    <div class="input-group">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" placeholder="Username" name="p_username" required>
                        </div>
                    </div>
                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" placeholder="Nama" name="p_nama" required>
                        </div>
                    </div>
                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-mail"></i></span>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" placeholder="Email" name="p_email" required>
                        </div>
                    </div>
                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-phone"></i></span>
                        <div class="nk-int-st">
                            <input type="text" class="form-control" placeholder="No. Telepon" name="p_telepon" required>
                        </div>
                    </div>
                    <div class="input-group mg-t-15">
                        <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                        <div class="nk-int-st">
                            <input type="password" class="form-control" placeholder="Password" name="p_password" autocomplete="on" required>
                        </div>
                    </div>
                    <br/>
                    <input style="background:#000; color:#fff;width:100%; border:1px solid #000;padding:10px;border-radius:4px;" type="submit" class="" value="Register">
                </div>
            </form>
            <div style="margin-top:25px;">
                <p style="color:#fff;">Sudah punya akun terdaftar ? </p>&nbsp;&nbsp;<a href="<?php echo base_url()?>login">Login</a>
            </div>
        </div>
    </div>