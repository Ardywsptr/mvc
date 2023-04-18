<?php
class About extends Controller
{
    // harus memiliki method default
    public function index($nama = "Ardy", $pekerjaan = "programmer", $umur = 24)
    {

        $data["nama"] = $nama;
        $data["pekerjaan"] = $pekerjaan;
        $data["umur"] = $umur;
        $data["judul"] = "About Me";

        $this->view("templates/header", $data);
        $this->view("about/index", $data);
        $this->view("templates/footer");
    }
    public function pages()
    {
        $data["judul"] = "Pages";

        $this->view("templates/header", $data);
        $this->view("about/pages");
        $this->view("templates/footer");
    }
}
