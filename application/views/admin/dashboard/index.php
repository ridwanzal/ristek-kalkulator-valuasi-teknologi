<?php   
    $token = $this->session->userdata('token');
    $userdetails = $this->session->userdata('userdetails');
    var_dump($token);
    var_dump($userdetails);
    die;

?>