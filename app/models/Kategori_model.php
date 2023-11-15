<?php

class Kategori_model{
    private $table = "kategori";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function getAllKategori(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
}



?>