<?php

class User extends Controller{
    public function index($tab="") {
        session_start();
        if(!$_SESSION){
            header("Location:".BASEURL);
        }
        // var_dump($tab);
        // die;
        $data['judul'] = 'Berita';
        //$data['berita'] = $this->model('Berita_model')->getBerita();
        $data['tab'] = $tab;
        $data['berita'] = $this->model('Berita_model')->getBeritaUser($_SESSION['user']['id']);
        if($data['tab']=="")$data['tab']="profile";
        var_dump($data['tab']);
        //die;
        $this->view('templates/header', $data);
        $this->view('components/header');
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    public function hapusBerita($id_berita)
    {
        session_start();
        if(!$_SESSION){
            header("Location:".BASEURL);
        }
        if ($this->model('Berita_model')->deleteBerita($id_berita) > 0) {
            header('Location: ' . BASEURL . '/user');
            exit;
        }
    }
}

?>
