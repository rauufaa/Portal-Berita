<?php


class Politik extends Controller
{
    public function index($judul="index")
    {
        $data['judul'] = 'Politik';
        //$data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        $this->view("politik/$judul", $data);
        $this->view('templates/footer');
    }
}
