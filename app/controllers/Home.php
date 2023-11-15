<?php
class Home extends Controller{
    public function index(){
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
    public function login(){
        $data['judul'] = 'Login';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        $this->view('home/login', $data);
        $this->view('templates/footer');
    }


    private function cekLogin(){
        
    }
}
?>