<body>
  <section class="nav_container" style="padding-left:10px; padding-right:10px;">
          <nav class="navbar navbar-expand-lg navbar-light bg-light navbar_custom">
            <a href="<?php echo base_url();?>"><span id="logo_mobile">KATSINOV</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto navmain">
                <li class="nav-item active" style="margin-right:30px;">
                  <a class="nav-link" data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url();?>"><img height="24" src="<?php echo base_url();?>assets/frontview/img/logo.svg">&nbsp;&nbsp;KALSINOV </a>    
                </li>
                <li class="nav-item active">
                  <a class="nav-link" data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url();?>" title="Home">Home <span class="sr-only">(current)</span></a>    
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url();?>prosedur" title="Prosedur">Prosedur<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url();?>faq" title="FAQ">FAQ <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url();?>kegiatan" title="Kegiatan">Kegiatan <span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tooltip" data-placement="bottom" href="<?php echo base_url();?>tentang" title="Kegiatan">Tentang<span class="sr-only"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-toggle="tooltip" data-placement="bottom"href="<?php echo base_url();?>kontak" title="Kontak">Kontak <span class="sr-only"></span></a>
                </li>
                </ul>
                <form method="GET" action="<?php echo base_url(); ?>/blog/blog_content_list_search">
                  <div style:display:flex; class="searchings">
                    <a class="nav-link btn-xs btn-success" style="border-radius:4px;" href="<?php base_url();?>login" title="Kontak">Login <span class="sr-only"></span></a>
                  </div>
              </form>
            </div>
          </nav>
  </section>