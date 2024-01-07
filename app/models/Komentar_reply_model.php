<?php

class Komentar_reply_model{
    private $table = "komentar_reply";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getBalasa2n($id_komentar) {
        $this->db->query("SELECT * FROM $this->table WHERE id_komentar=:id_komentar");
        $this->db->bind("id_komentar", $id_komentar);
        return $this->db->resultSet();
    }

    public function getBalasan($id_komentar) {
        $this->db->query("SELECT komentar_reply.id_komentar, komentar_reply.isi_komentar, DATE_FORMAT(komentar_reply.tanggal_komentar, '%d-%b-%Y %H:%i') as tanggal_komentar, pengguna.nama_pengguna FROM $this->table left join pengguna on $this->table.id_pengguna = pengguna.id_pengguna WHERE komentar_reply.id_komentar=:id_komentar");
        $this->db->bind("id_komentar", $id_komentar);
        return $this->db->resultSet();
    }

    public function addReplyKomentar($data) {
        $this->db->query("INSERT INTO $this->table VALUES (:id_komentar, :isi_komentar, NOW(), :id_pengguna)");
        $this->db->bind("id_komentar", $data['id_komentar']);
        $this->db->bind("isi_komentar", $data['isi_komentar']);
        $this->db->bind("id_pengguna", $data['id_pengguna']);
        
        $this->db->execute();
        return $this->db->rowCount();
    }
}