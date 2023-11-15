<?php 

class Berita extends Controller{
    public function index(){
        $data['judul'] = 'Berita';
        $data['berita'] = $this->model('Berita_model')->getBerita();
        $this->view('templates/header', $data);
        $this->view('berita/index', $data);
        $this->view('templates/footer');
    }

    public function detail(){
        $data['judul'] = 'Home';
        $data['berita'] = $this->model('Berita_model')->getBeritaById();
        $this->view('templates/header', $data);
        $this->view('berita/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah(){
        $dataHeader['judul'] = 'tambah';
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('templates/header', $dataHeader);
        $this->view('berita/tambah', $data);
        $this->view('templates/footer');
    }

    public function tambahBerita(){
        session_start();
        // var_dump($_POST);
        // die();
        if(isset($_SESSION['id'])){
            if($this->model('Berita_model')->createBerita($_SESSION['id'], $_POST) > 0){
                header('Location: '. BASEURL . '/berita');
                exit;
            }
        }else{
            var_dump($_SESSION['id']);
        }
    }

    public function hapusBerita($id_berita) {
        if($this->model('Berita_model')->deleteBerita($id_berita) > 0){
            header('Location: '. BASEURL . '/berita');
            exit;
        }
    }
} 
?>