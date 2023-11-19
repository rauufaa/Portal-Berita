<?php

class Berita extends Controller
{
    public function index()
    {
        $data['judul'] = 'Berita';
        $data['berita'] = $this->model('Berita_model')->getBerita();
        $this->view('templates/header', $data);
        $this->view('berita/index', $data);
        $this->view('templates/footer');
    }

    public function detail()
    {
        $data['judul'] = 'Home';
        $data['berita'] = $this->model('Berita_model')->getBeritaById();
        $this->view('templates/header', $data);
        $this->view('berita/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $dataHeader['judul'] = 'tambah';
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('templates/header', $dataHeader);
        $this->view('berita/tambah', $data);
        $this->view('templates/footer');
    }

    public function tambahBerita()
    {
        session_start();
        $this->newFile($_POST, $_FILES);

        die();

        if (isset($_SESSION['id'])) {
            if ($this->model('Berita_model')->createBerita($_SESSION['id'], $_POST) > 0) {
                header('Location: ' . BASEURL . '/berita');
                exit;
            }
        } else {
            var_dump($_SESSION['id']);
        }
    }

    public function hapusBerita($id_berita)
    {
        if ($this->model('Berita_model')->deleteBerita($id_berita) > 0) {
            header('Location: ' . BASEURL . '/berita');
            exit;
        }
    }


    private function newFile($newsData, $files)
    {
        $newsJudul = str_replace(" ", "-", $newsData["judul_berita"]) . uniqid();
        $fileOpen = fopen(__DIR__ . "/../views/{$newsData['kategori_berita']}/" . $newsJudul . ".php", "w");
        $keyKategori = $newsData["kategori_berita"];
        unset($newsData["judul_berita"]);
        unset($newsData["kategori_berita"]);

        //$this->writeToFile();
        foreach ($newsData as $data => $value_data) {
            $id = explode("-", $data);

            //asli
            if (!empty($files)) {
                foreach ($files as $file => $file_value) {
                    //var_dump($file);
                    $idP = explode("-", $file);

                    if ((int)$id[1] > (int)$idP[1]) {
                        echo ("<br>Ini file bro\n");
                        var_dump($file_value["tmp_name"]);
                        unset($files[$file]);
                    } else {
                        // var_dump($id[0], $value_data);
                        // unset($newsData[$data]);
                        break;
                    }
                }
            }

            var_dump($id[0], $value_data);
            unset($newsData[$data]);
        }

        if (!empty($files)) {
            foreach ($files as $file => $file_value) {
                //var_dump($file);
                $idP = explode("-", $file);
                echo ("<br>Ini file bro\n");
                var_dump($file_value["tmp_name"]);

                $newName = uniqid($keyKategori);
                $newName .= ".";
                $ekstensi = explode(".", $file_value["name"]);
                $ekstensi = strtolower(end($ekstensi));
                $newName .= $ekstensi;


                move_uploaded_file($file_value["tmp_name"], __DIR__."/../../public/assets/politik/".$newName);
                echo __DIR__;
                unset($files[$file]);
            }
        }
    }

    private function writeToFile($element = "", $isi = "", $fileOpen)
    {
        switch ($element) {
            case "h2":

                break;
            case "a":

                break;
            case "img":
                //move_uploaded_file();
                break;
        }
    }

    private function writeFileImage()
    {
    }
}
