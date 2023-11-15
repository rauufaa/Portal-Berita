<?php
class Login extends Controller{
    public function index(){
        $data['judul'] = 'Login';
        //$data['nama'] = $this->model('User_model')->getUser();
        $this->view('templates/header', $data);
        $this->view('components/header', $data);
        $this->view('login/index', $data);
        $this->view('templates/footer');
    }
    public function startLogin(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $user = $this->model('User_model')->login($_POST);
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