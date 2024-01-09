<?php

class Berita extends Controller
{
    public function index()
    {
        $data['allKategori'] = $this->model("Kategori_model")->getAllKategori();
        $data['judul'] = 'Berita';
        $data['berita'] = $this->model('Berita_model')->getBerita();
        $this->view('templates/header', $data);
        $this->view('berita/index', $data);
        $this->view('templates/footer');
    }

    public function detail()
    {
        $data['allKategori'] = $this->model("Kategori_model")->getAllKategori();
        $data['judul'] = 'Home';
        $data['berita'] = $this->model('Berita_model')->getBeritaById();
        $this->view('templates/header', $data);
        $this->view('berita/detail', $data);
        $this->view('templates/footer');
    }

    public function tambah()
    {
        $data['allKategori'] = $this->model("Kategori_model")->getAllKategori();
        $dataHeader['judul'] = 'tambah';
        $data['kategori'] = $this->model('Kategori_model')->getAllKategori();
        $this->view('templates/header', $dataHeader);
        $this->view('components/header', $data);

        $this->view('berita/tambah', $data);
        $this->view('templates/footer');
    }

    public function edit($judul_berita)
    {
        
        
        if (!$_SESSION) {
            header("Location:" . BASEURL);
            exit;
        }
        $idBerita = explode("-", $judul_berita);
        $idBerita = (int)end($idBerita);

        $kategori = strtolower($this->model("Berita_model")->getCategoryName($idBerita));
        $data['allKategori'] = $this->model("Kategori_model")->getAllKategori();
        $data['judul_berita'] = $judul_berita;
        $data['kategori'] = $kategori;


        $this->view('templates/header');
        $this->view('components/header', $data);

        $this->view('berita/edit', $data);
        $this->view('templates/footer');
    }

    public function editBerita($judul_berita)
    {
        $idBerita = explode("-", $judul_berita);
        $idBerita = (int)end($idBerita);

        $newsData = $_POST;
        $files = $_FILES;


        $keyKategori = strtolower($this->model("Berita_model")->getCategoryName($idBerita));
        $fileOpen = fopen(__DIR__ . "/../views/berita-kategori/$keyKategori/$judul_berita.php", "a") or die("tidak bisa buka filew");
        $txt = "<br><br><h2>Edited :" . date("Y/m/d H:i") . "</h2>\n";
        fwrite($fileOpen, $txt);

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

                        $newName = uniqid($keyKategori);
                        $newName .= ".";
                        $ekstensi = explode(".", $file_value["name"]);
                        $ekstensi = strtolower(end($ekstensi));
                        $newName .= $ekstensi;


                        move_uploaded_file($file_value["tmp_name"], __DIR__ . "/../../public/assets/$keyKategori/" . $newName);

                        $txt = "<img src=\"" . BASEURL . "/assets/$keyKategori/$newName\" />\n";
                        fwrite($fileOpen, $txt);
                        unset($files[$file]);
                    } else {
                        // var_dump($id[0], $value_data);
                        // unset($newsData[$data]);
                        break;
                    }
                }
            }

            var_dump($id[0], $value_data);

            switch ($id[0]) {
                case "h":
                    $txt = "<h2>$value_data</h2>\n";
                    break;
                case "p":
                    $txt = "<p>$value_data</p>\n";
                    break;
            }

            fwrite($fileOpen, $txt);
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
                $newName .= ".".$ekstensi;


                move_uploaded_file($file_value["tmp_name"], __DIR__ . "/../../public/assets/$keyKategori/" . $newName);
                $txt = "<img src=\"" . BASEURL . "/assets/$keyKategori/$newName\" />";
                fwrite($fileOpen, $txt);
                unset($files[$file]);
            }
        }
        // var_dump($newsData);
        // var_dump($files);
        // die;
        fclose($fileOpen);
        if ($this->model("Berita_model")->setCountEdited($idBerita) > 0) {
            header("Location:" . BASEURL . "/$keyKategori/$judul_berita");
            exit;
        }
        header("Location:" . BASEURL . "/user/dashboard");
        exit;
    }



    public function tambahBerita()
    {
        // session_start();
        // $this->newFile($_POST, $_FILES, $_SESSION['id']);

        
        if ($to = $this->newFile($_POST, $_FILES, 23000000)) {

            header('Location: ' . BASEURL . "/$to");
            exit;
        }

        // if (isset($_SESSION['id'])) {


        // } else {
        //     //var_dump($_SESSION['id']);
        // }
    }

    public function hapusBerita($id_berita)
    {
        if ($this->model('Berita_model')->deleteBerita($id_berita) > 0) {
            header('Location: ' . BASEURL . '/berita');
            exit;
        }
    }

    public function updateBerita($news)
    {
        $data['allKategori'] = $this->model("Kategori_model")->getAllKategori();
        $data['judul'] = 'Home';
        $data['berita'] = $this->model('Berita_model')->getBeritaById();
        $data['news'] = $news;
        $this->view('templates/header', $data);
        $this->view('berita/update', $data);
        $this->view('templates/footer');
    }


    private function newFile($newsData, $files, $user_id)

    {

        // var_dump($newsData["kategori_berita"]);
        // die;
        // var_dump(empty($files['tumbnail']['name']));
        // die;
        $judul = str_replace(" ", "-", $newsData["judul_berita"]);
        $uniqId = $this->model('Berita_model')->getLastId() + 1;


        // $keyKategori = strtolower($newsData["kategori_berita"]);
        $keyKategori = strtolower($this->model('Kategori_model')->getCategoryName($newsData["kategori_berita"]));

        $newsJudul = "$judul-$uniqId";
        $tumbnail = $keyKategori . "Tumbnail.jpg";

        if (!empty($files['tumbnail']['name'])) {
            $tumbnail = $newsJudul;
            $ekstensi = explode(".", $files['tumbnail']["name"]);
            $ekstensi = strtolower(end($ekstensi));
            $tumbnail .= ".".$ekstensi;
            move_uploaded_file($files['tumbnail']["tmp_name"], __DIR__ . "/../../public/assets/$keyKategori/" . $tumbnail);
        }
        unset($files['tumbnail']);

        $dataBerita["judul_berita"] = $newsData["judul_berita"];
        $dataBerita["nama_tumbnail"] = $tumbnail;
        $dataBerita["kategori_berita"] = $newsData["kategori_berita"];

        if ($this->model("Berita_model")->createBerita($user_id, $dataBerita) < 0) {
            return false;
        }

        // $this->model("Berita_model")->createBerita($user_id, $dataBerita);

        if (!file_exists(__DIR__ . "/../views/berita-kategori/$keyKategori")) {
            mkdir(__DIR__ . "/../views/berita-kategori/$keyKategori", 0777, true);
            mkdir(__DIR__ . "/../../public/assets/$keyKategori", 0777, true);
        }
        $fileOpen = fopen(__DIR__ . "/../views/berita-kategori/$keyKategori/$newsJudul.php", "w");

        $txt = "<h1 class=\"text-2xl text-center\">{$newsData['judul_berita']}</h1>\n";
        fwrite($fileOpen, $txt);

        $detailBerita = $this->model("Berita_model")->getDetailBerita($uniqId);
        $txt = "<p class=\"text-sm text-center\">{$detailBerita['tanggal_terbit']}, Penulis : {$detailBerita['nama_pengguna']}</p>\n";
        fwrite($fileOpen, $txt);

        if($newsData["sumber_berita"]==""){
            $newsData["sumber_berita"]="Berita Kami";
        }
        $txt = "<p class=\"text-sm text-center\">{$newsData['lokasi_berita']}, {$newsData["sumber_berita"]}</p>\n";
        fwrite($fileOpen, $txt);

        $txt = "<img src=\"" . BASEURL . "/assets/$keyKategori/$tumbnail\" class=\"w-full object-contain h-80\"/>\n";
        fwrite($fileOpen, $txt);

        // $txt = "<h1 class=\"text-2xl\">{$newsData['judul_berita']}</h1>\n";
        // fwrite($fileOpen, $txt);

        // $detailBerita = $this->model("Berita_model")->getDetailBerita($uniqId);
        // $txt = "<p class=\"text-sm text-center\">{$detailBerita['tanggal_terbit']}, Penulis : {$detailBerita['nama_pengguna']}</p>\n";
        // fwrite($fileOpen, $txt);


        // $txt = "<p class=\"text-lg\">{$newsData['lokasi_berita']}, {$newsData["sumber_berita"]}</p>\n";
        // fwrite($fileOpen, $txt);

        unset($newsData["judul_berita"]);
        unset($newsData["kategori_berita"]);
        unset($newsData["lokasi_berita"]);
        unset($newsData["sumber_berita"]);

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

                        $newName = uniqid($keyKategori);
                        $newName .= ".";
                        $ekstensi = explode(".", $file_value["name"]);
                        $ekstensi = strtolower(end($ekstensi));
                        $newName .= $ekstensi;


                        move_uploaded_file($file_value["tmp_name"], __DIR__ . "/../../public/assets/$keyKategori/" . $newName);

                        $txt = "<img src=\"" . BASEURL . "/assets/$keyKategori/$newName\" class=\"w-full object-contain h-80\"/>\n";
                        fwrite($fileOpen, $txt);
                        unset($files[$file]);
                    } else {
                        // var_dump($id[0], $value_data);
                        // unset($newsData[$data]);
                        break;
                    }
                }
            }

            var_dump($id[0], $value_data);

            switch ($id[0]) {
                case "h":
                    $txt = "<h2>$value_data</h2>\n";
                    break;
                case "p":
                    $txt = "<p>$value_data</p>\n";
                    break;
            }

            fwrite($fileOpen, $txt);
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


                move_uploaded_file($file_value["tmp_name"], __DIR__ . "/../../public/assets/$keyKategori/" . $newName);
                $txt = "<img src=\"" . BASEURL . "/assets/$keyKategori/$newName\" class=\"w-full object-contain h-80\" />\n";
                fwrite($fileOpen, $txt);
                unset($files[$file]);
            }
        }
        // var_dump($newsData);
        // var_dump($files);
        // die;
        fclose($fileOpen);
        
        return "$keyKategori/$newsJudul";
    }

    public function print($kategori, $judulBerita){
        // var_dump($judulBerita);
        $this->view('templates/header');
        $this->view("berita-kategori/$kategori/$judulBerita");
        $this->view('templates/footer');
        echo "<script>window.print()</script>";
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
