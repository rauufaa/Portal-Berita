<?php

class User extends Controller{
    public function index($tab="") {
        if (!isset($_SESSION['user'])) {
            header("Location:".BASEURL);
        }
        // var_dump($tab);
        // die;
        $data['judul'] = 'Berita';
        //$data['berita'] = $this->model('Berita_model')->getBerita();
        $data['tab'] = $tab;
        if ($tab == "settings") {
        }
        $data['berita'] = $this->model('Berita_model')->getBeritaUser($_SESSION['user']['id']);
        if($data['tab']=="")$data['tab']="profile";
        // var_dump($data['tab']);
        $data['allKategori'] = $this->model("Kategori_model")->getAllKategori();
        //die;
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        $this->view('user/index', $data);
        $this->view('templates/footer');
    }

    private function settingsTab()
    {
    }

    public function tambahKategori()
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "ADMIN") {
            header("Location:" . BASEURL);
            exit;
        }

        if (!isset($_POST)) {
            header("Location:" . BASEURL);
            exit;
        }

        $nama_kategori = $_POST['tambah-kategori'];
        if ($this->model("Kategori_model")->addKategori($nama_kategori) > 0) {
            Flasher::setFlash("Berhasil menambahkan kategori", "blue");
            header("Location:" . BASEURL . "/user/settings");
            exit;
        }
    }

    public function hapusKategori($id)
    {
        if (!isset($_SESSION['user']) || $_SESSION['user']['role'] != "ADMIN") {
            header("Location:" . BASEURL);
            exit;
        }
        if ($this->model("Kategori_model")->deleteKategori($id) > 0) {
            Flasher::setFlash("Berhasil menghapus kategori", "blue");
            header("Location:" . BASEURL . "/user/settings");
            exit;
        }
        Flasher::setFlash("Gagal menghapus kategori", "red");
        header("Location:" . BASEURL . "/user/settings");
        exit;
    }

    public function signOut() {
        unset($_SESSION['user']);
        header("Location:" . BASEURL );
        exit;
    }


    public function hapusBerita($id_berita)
    {
        session_start();
        if(!$_SESSION){
            header("Location:".BASEURL);
        }
        if ($this->model('Berita_model')->deleteBerita($id_berita) > 0) {
            header('Location: ' . BASEURL . '/user/dashboard');
            exit;
        }
    }
}

?>
