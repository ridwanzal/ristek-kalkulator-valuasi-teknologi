<section class="main_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-xs-4"> 
                <h1 class="h3 mb-3 font-weight-bold">Sign in</h1>
                <label for="inputEmail" class="sr-only">Email address</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                <br/>   
                <label for="inputPassword" class="sr-only">Password</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
                <br/>
                <div class="checkbox mb-3">
                    <label>
                    <input type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="btn btn-xs btn-success btn-block" type="submit">Sign in</button>
            </div>
            <div class="col-lg-2 col-md-2 col-xs-2">

            </div>
            <div class="col-lg-6 col-md-6 col-xs-6"> 
                <img id="image_banners" height="500px" style="position:relative;top:-70px;" src="<?php echo base_url();?>/assets/frontview/img/research.svg">
            </div>
        </div>
    </div>
</section>