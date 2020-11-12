<body>
  <section class="nav_container" style="padding-left:10px; padding-right:10px;">
          <nav class="navbar navbar-expand-lg navbar-light bg-light navbar_custom">
            <a href="<?php echo base_url();?>"><span id="logo_mobile">SIKAV</span></a>
            <button class="navbar-toggler btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto navmain">
                    <li class="nav-item active" style="margin-right:30px;">
                      <a class="nav-link" data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url();?>manage"><img height="18" src="<?php echo base_url();?>assets/frontview/img/logo.svg"></a>    
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url();?>manage" title="Dashboard"><ion-icon name="home-outline" class="ion-icon-position"></ion-icon>&nbsp;&nbsp;Dashboard<span class="sr-only">(current)</span></a>    
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" data-toggle="modal" data-target="#tambahkalkulasi" href="<?php echo base_url();?>manage/riwayat" title="Tambah Kalkulasi"><ion-icon class="ion-icon-position" name="add-outline"></ion-icon>&nbsp;&nbsp;Tambah Kalkulasi<span class="sr-only">(current)</span></a>    
                    </li>
                    <li class="nav-item active">
                      <a class="nav-link" data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url();?>manage/riwayat" title="Riwayat"><ion-icon class="ion-icon-position" name="file-tray-full-outline"></ion-icon>&nbsp;&nbsp;Riwayat<span class="sr-only">(current)</span></a>    
                    </li>
                </ul>
                <form method="GET" action="<?php echo base_url(); ?>/blog/blog_content_list_search">
                  <div style="display:flex"; class="searchings">
                    <?php
                      $userdetails = $this->session->userdata('userdetails'); 
                      // echo $userdetails[0]->name;                  
                    ?>
                    <div style="color : #fff;margin-right:1.1rem;position:relative;top:5px;font-size:14px;">Selamat Datang, </div>
                    <!-- <a class="nav-link btn-xs btn-success" style="border-radius:4px;" href="<?php echo base_url();?>login" title="Kontak"><span><img height="20" src="<?php echo base_url();?>assets/user.svg"></span>&nbsp;&nbsp;<?php echo $userdetails['name']?><span class="sr-only"></span></a> -->
                    <div class="btn-group">
                        <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span><img height="20" src="<?php echo base_url();?>assets/user.svg"></span>&nbsp;&nbsp;<?php echo $userdetails['name']?>
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="<?php echo base_url();?>profile"><ion-icon name="person-circle-outline"></ion-icon>&nbsp;&nbsp;Profile</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" style="cursor:pointer;" onclick="logout()"><ion-icon name="exit-outline"></ion-icon>&nbsp;&nbsp;Logout</a>
                        </div>
                    </div>
                  </div>
              </form>

                <!-- Modal -->
              <div class="modal fade" id="tambahkalkulasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLongTitle"><ion-icon style="position:relative;top:2px;" name="calculator-outline"></ion-icon>&nbsp;Tambah Kalkulasi Baru</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <a class="btn btn-primary btn-block" href="<?php echo base_url();?>manage/add/costbased">Kalkulasi dengan metode Cost Based</a>
                      <hr/>
                      <a class="btn btn-success btn-block" href="<?php echo base_url();?>manage/add/incomebased">Kalkulasi dengan metode Income Based</a>
                      <!-- <a disabled class="btn btn-warning btn-block" href="#">Kalkulasi dengan metode Income Based</a> -->
                      <!-- <button type="button" class="btn btn-primary btn-block">Kalkukasi dengan Metode Cost</button>
                      <button type="button" class="btn btn-success btn-block">Kalkukasi dengan Metode Income</button> -->
                    </div>
                  </div>
                </div>
              </div>


            </div>
          </nav>
  </section>