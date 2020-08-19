    <div class="login-content">
        <div class="nk-block toggled" id="l-login">
            <br/>
            <br/>
                <form method="POST" action="<?php echo base_url('login/login'); ?>">
                    <div class="nk-form">
                        <div class="input-group">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-support"></i></span>
                            <div class="form-group float-lb">
                                <div class="nk-int-st">
                                    <input type="text" class="form-control" placeholder="Username" name="p_username" required>
                                    <label class="nk-label">Username</label>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <span class="input-group-addon nk-ic-st-pro"><i class="notika-icon notika-edit"></i></span>
                            <div class="form-group float-lb">
                                <div class="nk-int-st">
                                    <input type="password" class="form-control" placeholder="Password" name="p_password" autocomplete="on" required>
                                    <label class="nk-label">Password</label>
                                </div>
                            </div>
                        </div>
                        <input style="background:#000; color:#fff;width:100%; border:1px solid #000;padding:10px;border-radius:4px;" type="submit" class="" value="Login">
                    </div>
                </form>
            <div style="margin-top:25px;">
                <p style="color:#fff;">Belum punya akun terdaftar ? </p>&nbsp;&nbsp;<a href="<?php echo base_url()?>register">Register</a>
            </div>
        </div>
    </div>