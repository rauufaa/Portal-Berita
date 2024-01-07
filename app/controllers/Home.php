<?php
class Home extends Controller{
    public function index($kategori="", $judul=""){
        // var_dump($kategori[]);
        // die;
        if(isset($_POST['submit_login'])){
            $user = $this->model('User_model')->login($_POST);
            if($user){
                $_SESSION['user']['id'] = $user['id_pengguna'];
                $_SESSION['user']['nama'] = $user['nama_pengguna'];
                $_SESSION['user']['email'] = $user['email'];
                // $data['user']['id'] = $_SESSION['user_id'];
                // $data['user']['email'] = $_SESSION['user_id'];
                // $data['user']['nama'] = $_SESSION['user_id'];
            }
        }

        if($kategori == "signin"){
            $this->signin();
            exit;
        }

        if($kategori == "register"){
            $this->register();
            exit;
        }

        if(!empty($kategori) && $kategori != "cari"){
            $kategori = $this->model("Kategori_model")->getCategoryByName($kategori);
            $this->kategoriBerita($kategori, $judul);
            exit;
        }
        
        switch($kategori){
            case "politik":

        }

        
        if(isset($_GET['pencarian_berita'])){
            $data['berita']['search'] = $this->model('Berita_model')->getSearchBeritaKategoriAll($_GET['pencarian_berita']);
        }
        // $data['judul'] = $kategori["nama_kategori"];
        // $data['render'] = $judul;
        // $id_berita = explode("-", $judul);
        // $id_berita = (int)end($id_berita);
        $data['berita']['beritaPopuler'] = $this->model("Berita_model")->getBerita(6);
        // $data['berita']['side'] = $this->model("Berita_model")->getBeritaByCategory($kategori['id_kategori'], 4);
        // $data['kategori'] = strtolower($kategori['nama_kategori']);
        // $data['allKategori'] = $this->model("Kategori_model")->getAllKategori();



        // $data['komentar'] = $this->model('Komentar_model')->getKomentar($id_berita);
        
        // $data['judul'] = 'Berita';
        $data['allKategori'] = $this->model("Kategori_model")->getAllKategori();

        $data['berita']['carousel'] = $this->model('Berita_model')->getBerita();
        //var_dump($data['berita']['carousel']);
        $data['berita']['lain'] = $this->model('Berita_model')->getBerita(25);
        // $data['kategori'] = strtolower($kategori['nama_kategori']);
        
        
        // $kategori = strtolower($kategori);
        // if(method_exists($this, $kategori)){
        //     // $kategori = strtolower($kategori);
        //     $this->$kategori($judul);
        //     exit;
        // }
        //$data['berita'] = $this->model('Berita_model')->getBeritaByCategory(1);
        $data['judul'] = 'Home';
        
        
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function register() {
        $data['judul'] = 'Home';
        $this->view('templates/header', $data);
        // $this->view('components/header', $data);
        
        $this->view('home/register', $data);
        $this->view('templates/footer');
    }

    public function signin() {
        $data['judul'] = 'Sign In';
        $this->view('templates/header', $data);
        // $this->view('components/header', $data);
        
        $this->view('home/signin', $data);
        $this->view('templates/footer');
    }

    public function cekRegister()
    {
        if(isset($_SESSION['user'])){
            header("Location:" . BASEURL);
            exit;
        } 

        // if(isset($_SESSION['user']['role'])){
        //     switch($_SESSION['user']['role']){
        //         case "ADMIN":
        //             header("Location:" . BASEURL);
        //             break;
        //         case "USER":
        //             header("Location:" . BASEURL);
        //             break;
        //     }
        //     exit;
        // }

        if ($_POST["password"] != $_POST["confirm-password"]) {
            Flasher::setFlash("Konfirmasi password salah", "red");
            header("Location:" . BASEURL . "/register");
            exit;
        }
        if ($_POST["captcha"] != $_SESSION["captcha_code"]) {
            
            Flasher::setFlash("Captcha anda masukan salah", "red");
            header("Location:" . BASEURL . "/register");
            exit;
        }

        if ($this->model("User_model")->cekLogin($_POST)) {
            var_dump("ini salah");
            Flasher::setFlash("Email sudah pernah terdaftar", "red");
            header("Location:" . BASEURL . "/register");
            exit;
        }

        if ($this->model("User_model")->register($_POST) < 0) {
            Flasher::setFlash("Gagal Register", "red");
            header("Location:" . BASEURL . "/register");
            exit;
        }

        $dataLog = $this->model("User_model")->cekLogin($_POST);

        $_SESSION['user']['role'] = 'USER';
        $_SESSION['user']['id'] = $dataLog['id_pengguna'];

        $_SESSION['user']['nama'] = $_POST['nama'];
        $_SESSION['user']['email'] = $_POST['email'];

        header("Location:" . BASEURL);
        exit;
    }

    public function cekLogin()
    {
        if(isset($_SESSION['user'])){
            header("Location:" . BASEURL);
            exit;
        } 
        
        // if(isset($_SESSION['user']['role'])){
        //     switch($_SESSION['user']['role']){
        //         case "ADMIN":
        //             header("Location:" . BASEURL . "/manajemen");
        //             break;
        //         case "USER":
        //             header("Location:" . BASEURL . "/user");
        //             break;
        //     }
        //     exit;
        // }
        if ($_POST["captcha"] != $_SESSION["captcha_code"]) {
            Flasher::setFlash("Captcha anda masukan salah", "red");
            header("Location:" . BASEURL . "/signin");
            exit;
        }
        $dataLog = $this->model("User_model")->login($_POST);
        if (!$dataLog) {
            Flasher::setFlash("Email atau sandi anda salah", "red");
            header("Location:" . BASEURL . "/signin");
            exit;
        }

        $_SESSION['user']['id'] = $dataLog['id_pengguna'];
        $_SESSION['user']['role'] = $dataLog['role'];

        $_SESSION['user']['nama'] = $dataLog['nama_pengguna'];
        $_SESSION['user']['email'] = $_POST['email'];

        header("Location:" . BASEURL);

        // switch($_SESSION['user']['role']){
        //     case "ADMIN":
        //         header("Location:" . BASEURL . "/manajemen");
        //         break;
        //     case "USER":
        //         header("Location:" . BASEURL . "/user");
        //         break;
        // }

        exit;
    }

    public function politi() {
        // session_start();
        $data['judul'] = 'Berita';
        $data['berita'] = $this->model('Berita_model')->getBeritaByCategory(1);
        $data['judul'] = 'Politik';
        $data['nama'] = $this->model('User_model')->getUser();
        
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }

    public function getPolitikNews(){

    }










    private function login($user){
        $email = $user['email'];
        $password = $user['password'];
        
        
        $check = $this->model('User_model')->login($user);
        if(!is_null($user)){
            if($password == $user['password']){
                session_start();
                $_SESSION['user'] = $user['nama_Pengguna'];
                $_SESSION['id'] = $user['id_pengguna'];
                header('Location: ' . BASEURL . '/berita');
                exit;
            }
        }
    }


    // ranah politik
    public function kategoriBerita($kategori ,$judul="")
    {
        if($judul=="cari"){
            // echo"jalan kaga";
            // var_dump($_GET);
            // die;

            if(isset($_GET)){
                $this->pencarianBeritaKategori($kategori, $_GET['pencarian_berita']);
                exit;
            }
        }

        if(!empty($judul) && $judul != "cari"){
           
            $this->renderBerita($judul, $kategori ,$_POST);
            
            exit;
        } 
        $data['judul'] = $kategori["nama_kategori"];
        // $data['render'] = $judul;
        // $id_berita = explode("-", $judul);
        // $id_berita = (int)end($id_berita);
        $data['berita']['beritaPopuler'] = $this->model("Berita_model")->getBeritaByCategory($kategori['id_kategori'], 6);
        $data['berita']['side'] = $this->model("Berita_model")->getBeritaByCategory($kategori['id_kategori'], 4);
        // $data['kategori'] = strtolower($kategori['nama_kategori']);
        // $data['allKategori'] = $this->model("Kategori_model")->getAllKategori();



        // $data['komentar'] = $this->model('Komentar_model')->getKomentar($id_berita);
        
        // $data['judul'] = 'Berita';
        $data['allKategori'] = $this->model("Kategori_model")->getAllKategori();

        $data['berita']['carousel'] = $this->model('Berita_model')->getBeritaByCategory($kategori["id_kategori"], 5);
        $data['berita']['lain'] = $this->model('Berita_model')->getBeritaByCategory($kategori["id_kategori"]);
        $data['kategori'] = strtolower($kategori['nama_kategori']);
        // var_dump($data['kategori']);
        // $data['judul'] = 'Politik';
        // $data['nama'] = $this->model('User_model')->getUser();
        
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        $this->view('berita-kategori/index', $data);
        
        
        $this->view('templates/footer');
        // $data['nama'] = $this->model('User_model')->getUser();
        // $this->view('templates/header', $data);
        // $this->view('components/header', $data);
        // //$this->view('components/header', $data);
        // $this->view("politik/index", $data);
        // $this->view('templates/footer');
    }

    private function pencarianBeritaKategori($kategori, $pencarian) {

        // $kategori = $this->model("Kategori_model")->getCategoryByName($kategori);
        
        $data['berita']['search'] = $this->model("Berita_model")->getSearchBeritaKategori($kategori['nama_kategori'], $pencarian);
        $data['berita']['beritaPopuler'] = $this->model("Berita_model")->getBeritaByCategory($kategori['id_kategori'], 6);
        $data['berita']['side'] = $this->model("Berita_model")->getBeritaByCategory($kategori['id_kategori'], 4);
        $data['kategori'] = strtolower($kategori['nama_kategori']);
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        $this->view('berita-kategori/index2', $data);
        $this->view('templates/footer');
    }

    public function kirimKomentar() {
        
        if(!isset($_POST['submit-komentar'])){
            header("Location:".BASEURL);
            exit;
        }
        if($_POST['balas-id-komentar']!=""){
            if(isset($_SESSION['user'])){
                $dataKomen['id_pengguna'] = $_SESSION['user']['id'];
                
                
            }else{
                $dataKomen['id_pengguna'] = null;
            }
            $dataKomen['id_komentar'] = $_POST['balas-id-komentar'];
            $dataKomen['isi_komentar'] = $_POST['isi_komentar'];
            // $dataKomen['id_berita'] = $dataPostKomentar['id_berita'];
            $this->model("Komentar_reply_model")->addReplyKomentar($dataKomen);
            
        }else{
            
            if(isset($_SESSION['user'])){
                $dataKomen['id_pengguna'] = $_SESSION['user']['id'];
                
                
            }else{
                $dataKomen['id_pengguna'] = null;
            }
            // $dataKomen['id_komentar'] = $dataPostKomentar['balas-id-komentar'];
            $dataKomen['isi_komentar'] = $_POST['isi_komentar'];
            $dataKomen['id_berita'] = $_POST['id-berita'];
            $this->model("Komentar_model")->addKomentar($dataKomen);
            
        }

        $berita = $this->model("Berita_model")->getBeritaById($_POST['id-berita']);
        $judul = str_replace(" ", "-", $berita["judul_berita"]) . "-" . $_POST['id-berita']; 
        $kategori = $this->model("Kategori_model")->getCategoryName($berita['id_kategori']);
        header("Location:".BASEURL."/$kategori/$judul");
        exit;
    }

    private function renderBerita($judul, $kategori ,$dataPostKomentar=null){
        // $data['berita']['search'] = $this->model("Berita_model")->getSearchBeritaKategori($kategori['nama_kategori'], $pencarian);
        $data['berita']['beritaPopuler'] = $this->model("Berita_model")->getBeritaByCategory($kategori['id_kategori'], 6);
        $data['berita']['side'] = $this->model("Berita_model")->getBeritaByCategory($kategori['id_kategori'], 4);
        $data['kategori'] = strtolower($kategori['nama_kategori']);
        $data['allKategori'] = $this->model("Kategori_model")->getAllKategori();
        // if($dataPostKomentar!=null){
        //     // if(isset($_SESSION['user'])){
        //     //     $dataKomen['id_pengguna'] = $_SESSION['user']['id'];
        //     //     $dataKomen['isi_komentar'] = $dataPostKomentar['isi_komentar'];
        //     //     $dataKomen[''] = $dataPostKomentar['isi_komentar'];

        //     // }

        //     if($dataPostKomentar['balas-id-komentar']!=""){
        //         if(isset($_SESSION['user'])){
        //             $dataKomen['id_pengguna'] = $_SESSION['user']['id'];
                    
                    
        //         }else{
        //             $dataKomen['id_pengguna'] = null;
        //         }
        //         $dataKomen['id_komentar'] = $dataPostKomentar['balas-id-komentar'];
        //         $dataKomen['isi_komentar'] = $dataPostKomentar['isi_komentar'];
        //         // $dataKomen['id_berita'] = $dataPostKomentar['id_berita'];
        //         $this->model("Komentar_reply_model")->addReplyKomentar($dataKomen);
                
        //     }else{
                
        //         if(isset($_SESSION['user'])){
        //             $dataKomen['id_pengguna'] = $_SESSION['user']['id'];
                    
                    
        //         }else{
        //             $dataKomen['id_pengguna'] = null;
        //         }
        //         // $dataKomen['id_komentar'] = $dataPostKomentar['balas-id-komentar'];
        //         $dataKomen['isi_komentar'] = $dataPostKomentar['isi_komentar'];
        //         $dataKomen['id_berita'] = $dataPostKomentar['id-berita'];
        //         $this->model("Komentar_model")->addKomentar($dataKomen);
                
        //     }
        //     //cek reply komen atau tidak
        //     $_POST = array();
        // }
        $data['render'] = $judul;
        $data['kategori'] = strtolower($kategori['nama_kategori']);
        $id_berita = explode("-", $judul);
        $id_berita = (int)end($id_berita);
        $data['id_berita'] = $id_berita;
        $data['judul'] = 'Politik Berita';
        // var_dump($id_berita);
        $data['author'] = $this->model("Berita_model")->getDetailBerita($id_berita)['nama_pengguna'];
        
        // $data['berita'] = $this->model('Berita_model')->getBeritaByCategory($kategori['id_kategori'], 6);
        $data['komentar'] = $this->model('Komentar_model')->getKomentar($id_berita);
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        //$this->view('components/header', $data);
        $this->view("berita-kategori/index2", $data);
        $this->view('templates/footer');

    }

    

    public function komentar() {
        
        echo json_encode($this->model("Komentar_reply_model")->getBalasan($_POST['id']));
    }
}
?>