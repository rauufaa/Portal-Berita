<?php


class Politik extends Controller
{
    public function index($judul="")
    {
        if(!empty($judul)){
            $this->renderBerita($judul, $_POST);
            exit;
        } 
        $data['judul'] = 'Politik';
        // $data['render'] = $judul;
        // $id_berita = explode("-", $judul);
        // $id_berita = (int)end($id_berita);
        // var_dump($id_berita);



        // $data['komentar'] = $this->model('Komentar_model')->getKomentar($id_berita);
        
        $data['judul'] = 'Berita';
        $data['berita'] = $this->model('Berita_model')->getBeritaByCategory(1);
        $data['judul'] = 'Politik';
        // $data['nama'] = $this->model('User_model')->getUser();
        
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        $this->view('politik/index', $data);
        
        
        $this->view('templates/footer');
        // $data['nama'] = $this->model('User_model')->getUser();
        // $this->view('templates/header', $data);
        // $this->view('components/header', $data);
        // //$this->view('components/header', $data);
        // $this->view("politik/index", $data);
        // $this->view('templates/footer');
    }

    private function renderBerita($judul, $dataPostKomentar=null){
        if($dataPostKomentar!=null){
            if(isset($_SESSION['user'])){
                $dataKomen['id_pengguna'] = $_SESSION['user']['id'];
                $dataKomen['isi_komentar'] = $dataPostKomentar['isi_komentar'];
                $dataKomen[''] = $dataPostKomentar['isi_komentar'];

            }

            if($dataPostKomentar['balas-id-komentar']!=""){
                if(isset($_SESSION['user'])){
                    $dataKomen['id_pengguna'] = $_SESSION['user']['id'];
                    
                    
                }else{
                    $dataKomen['id_pengguna'] = null;
                }
                $dataKomen['id_komentar'] = $dataPostKomentar['balas-id-komentar'];
                $dataKomen['isi_komentar'] = $dataPostKomentar['isi_komentar'];
                // $dataKomen['id_berita'] = $dataPostKomentar['id_berita'];
                $this->model("Komentar_reply_model")->addReplyKomentar($dataKomen);
                
            }else{
                if(isset($_SESSION['user'])){
                    $dataKomen['id_pengguna'] = $_SESSION['user']['id'];
                    
                    
                }else{
                    $dataKomen['id_pengguna'] = null;
                }
                // $dataKomen['id_komentar'] = $dataPostKomentar['balas-id-komentar'];
                $dataKomen['isi_komentar'] = $dataPostKomentar['isi_komentar'];
                $dataKomen['id_berita'] = $dataPostKomentar['id_berita'];
                $this->model("Komentar_model")->addKomentar($dataKomen);
                
            }
            //cek reply komen atau tidak
            
        }
        $data['render'] = $judul;
        $id_berita = explode("-", $judul);
        $id_berita = (int)end($id_berita);
        $data['id_berita'] = $id_berita;
        $data['judul'] = 'Politik Berita';
        // var_dump($id_berita);
        $data['berita'] = $this->model('Berita_model')->getBeritaByCategory(1);
        $data['komentar'] = $this->model('Komentar_model')->getKomentar($id_berita);
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        //$this->view('components/header', $data);
        $this->view("politik/index2", $data);
        $this->view('templates/footer');
    }

    public function komentar() {
        
        echo json_encode($this->model("Komentar_reply_model")->getBalasan($_POST['id']));
    }
}
