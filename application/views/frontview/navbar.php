<body>
    <section class="nav_container nav_container_styles">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light bg-light navbar_custom">
              <a href="<?php echo base_url();?>"><span id="logo_mobile"><img class="nav-logo nav-logo-mobile" height="24" src="<?php echo base_url();?>assets/frontview/img/logo.svg"></span></a>
              <button class="navbar-toggler btn-sm" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
            
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto navmain">
                  <li class="nav-item active" style="margin-right:30px;">
                    <a class="nav-link" href="<?php echo base_url();?>"><img class="nav-logo nav-logo-desktop" height="28" src="<?php echo base_url();?>assets/frontview/img/logo.svg"></a>    
                  </li>
                  <li class="nav-item active">
                    <a class="nav-link" href="<?php echo base_url();?>" title="Home">Home <span class="sr-only">(current)</span></a>    
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>prosedur" title="Prosedur">Prosedur<span class="sr-only"></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>panduan" title="Panduan">Panduan <span class="sr-only"></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>faq" title="FAQ">FAQ <span class="sr-only"></span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="<?php echo base_url();?>kontak" title="Kontak">Hubungi Kami <span class="sr-only"></span></a>
                  </li>
                  </ul>
                  <form method="GET" action="<?php echo base_url(); ?>/blog/blog_content_list_search">
                    <div style:display:flex; class="searchings">
                      <a class="nav-link btn-xs btn-success btn-sm animate__animated animate__fadeIn" style="border-radius:4px;" href="<?php echo base_url();?>auth/login" title="Kontak"><img src="<?php echo base_url()?>assets/frontview/img/login.svg" height="20" style="position:relative;top:-2px;">&nbsp;&nbsp;Inventor Login <span class="sr-only"></span></a>
                    </div>
                </form>
              </div>
            </nav>
        </div>
    </section>