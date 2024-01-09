<?php

class Kategori_model{
    private $table = "kategori";
    private $db;

    public function __construct() {
        $this->db = new Database;
    }

    public function addKategori($nama_kategori) {
        $this->db->query("INSERT INTO $this->table VALUES ('',:nama_kategori)");
        $this->db->bind("nama_kategori", $nama_kategori);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteKategori($id) {
        $this->db->query("DELETE FROM $this->table WHERE id_kategori=:id_kategori");
        $this->db->bind("id_kategori", $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateKategori($data) {
        $this->db->query("UPDATE $this->table SET nama_kategori=:nama_kategori WHERE id_kategori=:id_kategori");
        $this->db->bind("nama_kategori", $data['nama_kategori']);
        $this->db->bind("id_kategori", $data['id_kategori']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getAllKategori(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getCategoryByName($data) {
        $this->db->query('SELECT id_kategori, nama_kategori FROM ' . $this->table . ' WHERE nama_kategori=:nama_kategori');
        $this->db->bind(":nama_kategori", $data);
        return $this->db->single();
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