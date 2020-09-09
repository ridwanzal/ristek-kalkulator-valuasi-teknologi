<body>
  <section class="nav_container" style="padding-left:10px; padding-right:10px;">
          <nav class="navbar navbar-expand-lg navbar-light bg-light navbar_custom">
            <a href="<?php echo base_url();?>"><span id="logo_mobile">KATSINOV</span></a>
            <button class="navbar-toggler btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto navmain">
                    <li class="nav-item active" style="margin-right:30px;">
                      <a class="nav-link" data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url();?>manage"><img height="24" src="<?php echo base_url();?>assets/frontview/img/logo.svg"></a>    
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url();?>" title="How to">How to<span class="sr-only">(current)</span></a>    
                    </li>
                </ul>
                <form method="GET" action="<?php echo base_url(); ?>/blog/blog_content_list_search">
                  <div style="display:flex"; class="searchings">
                    <?php
                      $userdetails = $this->session->userdata('userdetails'); 
                      // echo $userdetails[0]->name;                  
                    ?>
                    <div style="color : #fff;margin-right:1.1rem;position:relative;top:7px;font-size:14px;">Selamat Datang, </div>
                    <!-- <a class="nav-link btn-xs btn-success" style="border-radius:4px;" href="<?php echo base_url();?>login" title="Kontak"><span><img height="20" src="<?php echo base_url();?>assets/user.svg"></span>&nbsp;&nbsp;<?php echo $userdetails['name']?><span class="sr-only"></span></a> -->
                    <div class="btn-group">
                        <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><img height="20" src="<?php echo base_url();?>assets/user.svg"></span>&nbsp;&nbsp;<?php echo $userdetails['name']?>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url();?>profile">Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" style="cursor:pointer;" onclick="logout()">Logout</a>
                        </div>
                    </div>
                  </div>
              </form>
            </div>
          </nav>
  </section>