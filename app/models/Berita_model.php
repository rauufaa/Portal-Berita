<?php
class Berita_model{
    private $table = "berita";
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getBerita(){
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }

    public function getBeritaById($id=1){
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id_berita=:id');
        $this->db->bind('id', $id);
        return $this->db->single();
    }

    public function createBerita($id, $data){
        
        $this->db->query("INSERT INTO $this->table VALUES ('', :judul_berita, :isi_berita, NOW(), :id_kategori, :id_pengguna)");
        $this->db->bind('judul_berita', $data['judul_berita']);
        $this->db->bind('isi_berita', $data['isi_berita']);
        $this->db->bind('id_kategori', (int)$data['kategori_berita']);
        $this->db->bind('id_pengguna', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteBerita($id) {
        $this->db->query("DELETE FROM $this->table WHERE id_berita=:id_berita;");
        $this->db->bind('id_berita', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }

}
?>