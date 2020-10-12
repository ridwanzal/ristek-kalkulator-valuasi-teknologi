<?php
    // user details json
    /* {
        "sinta_id":"1",
        "name":"ANIS MASHDUROHATUN",
        "google_id":"J0lVGsoAAAAJ",
        "afiliasi":{
                "id":"3",
                "kode_pt":"061002",
                "name":"Universitas Islam Sultan Agung"
            }
        }
     */
    $userdetails = $this->session->userdata('userdetails');
?>

<section class="section_main_wrapper">
    <div class="form-element-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-xs-12">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Cost based</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Income based</a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                            </li> -->
                    </ul>
                    <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <!--cost based here-->
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <!--income based here-->
                    </div>
                    <!-- <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab"> -->
                        <!--market based here-->
                    <!-- </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>