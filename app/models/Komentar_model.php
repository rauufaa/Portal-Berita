<?php

class Komentar_model{
    private $table = "komentar";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getKomentar($id_berita) {
        $this->db->query("SELECT komentar.id_komentar, komentar.isi_komentar, komentar.tanggal_komentar, komentar.id_pengguna, pengguna.nama_pengguna, count(komentar_reply.id_komentar) AS jumlah_reply FROM komentar left join komentar_reply on komentar.id_komentar = komentar_reply.id_komentar left join pengguna on komentar.id_pengguna=pengguna.id_pengguna WHERE komentar.id_berita=:id_berita GROUP by komentar.id_komentar;");
        $this->db->bind("id_berita", $id_berita);
        return $this->db->resultSet();
    }

    public function addKomentar($data) {
       
        $this->db->query("INSERT INTO $this->table VALUES ('', :isi_komentar, NOW(), :id_pengguna, :id_berita)");
        $this->db->bind("isi_komentar", $data['isi_komentar']);
        $this->db->bind("id_pengguna", $data['id_pengguna']);
        $this->db->bind("id_berita", $data['id_berita']);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function getBalasan() {
        $this->db->query("");
    }
}