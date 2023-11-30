<?php

class Komentar_reply_model{
    private $table = "komentar_reply";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getBalasan($id_komentar) {
        $this->db->query("SELECT * FROM $this->table WHERE id_komentar=:id_komentar");
        $this->db->bind("id_komentar", $id_komentar);
        return $this->db->resultSet();
    }
}