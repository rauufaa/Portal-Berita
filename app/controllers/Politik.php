<?php


class Politik extends Controller
{
    public function index($judul="")
    {
        session_start();
        $data['judul'] = 'Politik';
        $data['render'] = $judul;
        //$data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        //$this->view('components/header', $data);
        $this->view("politik/index", $data);
        $this->view('templates/footer');
    }
}
