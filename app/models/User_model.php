<?php
class User_model {
    private $table = "pengguna";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getUser() {
        
    }

    public function login($data){
        $this->db->query("SELECT * FROM $this->table WHERE email='" . $data['email'] . "'");
        return $this->db->single();
    }
}
?>