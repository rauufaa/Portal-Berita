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

    public function getCategoryName($id)
    {
        $this->db->query("SELECT nama_kategori FROM $this->table WHERE id_kategori=:id_kategori;");
        $this->db->bind("id_kategori", $id);
        return $this->db->singleValue();
    }

    public function getCategoryNews($id){
        $this->db->query("SELECT kategori.nama_kategori FROM $this->table,  WHERE id_kategori=:id_kategori;");
    }
}



?>