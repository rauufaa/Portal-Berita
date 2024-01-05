<?php
class User_model {
    private $table = "pengguna";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getUser() {
        
    }

    // public function login($data){
    //     $this->db->query("SELECT * FROM $this->table WHERE email=:email AND password=:password");
    //     $this->db->bind("email", $data['email']);
    //     $this->db->bind("password", $data['password']);
    //     return $this->db->single();
    // }

    public function cekLogin($data) {
        $this->db->query("SELECT * FROM $this->table WHERE email=:email");
        $this->db->bind("email", $data["email"]);
        // $this->db->bind("password", $data["password"]);
        return $this->db->single();
    }
    public function login($data) {
        $this->db->query("SELECT * FROM $this->table WHERE email=:email AND password=:password");
        $this->db->bind("email", $data["email"]);
        $this->db->bind("password", md5($data["password"]));
        return $this->db->single();
    }

    public function register($data) {
        $this->db->query("INSERT INTO $this->table ( `nama_pengguna`, `email`, `password`, `role`) VALUES (:nama_pengguna, :email, :password, 'USER')");
        $this->db->bind("nama_pengguna", $data["nama"]);
        $this->db->bind("email", $data["email"]);
        $this->db->bind("password", md5($data["password"]));
        $this->db->execute();
        return $this->db->rowCount();
    }
}
?>