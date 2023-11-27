<?php
class Berita_model
{
    private $table = "berita";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getBerita()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getBeritaById($id = 1)
    {
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_berita=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function createBerita($id, $data)
    {

        $this->db->query("INSERT INTO $this->table VALUES ('', :judul_berita, :nama_tumbnail, NOW(), :id_kategori, :id_pengguna)");
        $this->db->bind('judul_berita', $data['judul_berita']);
        $this->db->bind('nama_tumbnail', $data['nama_tumbnail']);
        $this->db->bind('id_kategori', (int)$data['kategori_berita']);
        $this->db->bind('id_pengguna', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteBerita($id)
    {
        $this->db->query("DELETE FROM $this->table WHERE id_berita=:id_berita;");
        $this->db->bind('id_berita', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getLastId()
    {
        $this->db->query("SELECT MAX(id_berita) as max FROM $this->table;");
        
        return $this->db->singleValue();
    }

    public function getCategoryName($id)
    {
        $this->db->query("SELECT nama_kategori FROM $this->table;");
        
        return $this->db->singleValue();
    }

    public function getBeritaUser($id) {
        $this->db->query("SELECT * FROM $this->table WHERE id_pengguna=:id_pengguna;");
        $this->db->bind("id_pengguna", $id);
        return $this->db->resultSet();
    }
}
