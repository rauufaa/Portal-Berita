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
        $this->db->query("SELECT berita.id_berita, berita.judul_berita, berita.nama_tumbnail, berita.tanggal_terbit, kategori.nama_kategori, berita.id_pengguna FROM kategori, $this->table WHERE berita.id_kategori=kategori.id_kategori");
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

        $this->db->query("INSERT INTO $this->table VALUES ('', :judul_berita, :nama_tumbnail, NOW(), 0,:id_kategori, :id_pengguna)");
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
        
        $this->db->query("SELECT AUTO_INCREMENT - 1 as max FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA =:dbname AND TABLE_NAME='$this->table';");
        
        $this->db->bind("dbname", DB_NAME);
        return $this->db->singleValue();
    }

    public function getCategoryName($id)
    {
        $this->db->query("SELECT kategori.nama_kategori FROM $this->table, kategori WHERE $this->table.id_kategori = kategori.id_kategori AND $this->table.id_berita=:id_berita;");
        $this->db->bind("id_berita", $id);
        return $this->db->singleValue();
    }

    public function getBeritaUser($id) {
        $this->db->query("SELECT * FROM $this->table WHERE id_pengguna=:id_pengguna;");
        $this->db->bind("id_pengguna", $id);
        return $this->db->resultSet();
    }

    public function setCountEdited($id_berita) {
        $this->db->query("UPDATE $this->table SET edit=edit+1");
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getBeritaByCategory($category=1) {
        $this->db->query("SELECT berita.id_berita, berita.judul_berita, berita.nama_tumbnail, berita.tanggal_terbit, kategori.nama_kategori, berita.id_pengguna FROM kategori, $this->table WHERE berita.id_kategori=kategori.id_kategori AND berita.id_kategori=:id_kategori");
        $this->db->bind("id_kategori", $category);
        return $this->db->resultSet();
    }

    // private function getCountEdited($id_berita) {
    //     $this->db->query("SELECT edit FROM $this->table WHERE id_berita=:id_berita");
    //     $this->db->bind("id_berita", $id_berita);
    //     return $this->db->singleValue();
    // }
}
