<?php


class About extends Controller{
    public function index($nama='Player'){
        $this->view('about/index', $nama);
    }
    public function page(){
        echo 'About/Page';
    }
}


?>