<?php
class Home extends Controller{
    public function index(){
        session_start();
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
        $data['judul'] = 'Home';
        $data['nama'] = $this->model('User_model')->getUser();
        
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        
        $this->view('home/index', $data);
        $this->view('templates/footer');
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


    private function cekLogin(){
        
    }
}
?>