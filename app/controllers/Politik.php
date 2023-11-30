<?php


class Politik extends Controller
{
    public function index($judul="")
    {
        session_start();
        $data['judul'] = 'Politik';
        $data['render'] = $judul;
        $id_berita = explode("-", $judul);
        $id_berita = (int)end($id_berita);
        var_dump($id_berita);

        $data['komentar'] = $this->model('Komentar_model')->getKomentar($id_berita);
        $data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        //$this->view('components/header', $data);
        $this->view("politik/index", $data);
        $this->view('templates/footer');
    }

    public function komentar() {
        
        echo json_encode($this->model("Komentar_reply_model")->getBalasan($_POST['id']));
    }
}
