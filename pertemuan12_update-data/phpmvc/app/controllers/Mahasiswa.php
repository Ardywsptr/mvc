<?php

class Mahasiswa extends Controller
{
    public function index()
    {
        $data["judul"] = "daftar mahasiswa";
        $data["mhs"] = $this->model("Mahasiswa_model")->getAllMahasiswa();

        $this->view("templates/header", $data);
        $this->view("mahasiswa/index", $data);
        $this->view("templates/footer");
    }

    public function detail($id)
    {
        $data["judul"] = "detail mahasiswa";
        $data["mhs"] = $this->model("Mahasiswa_model")->getMahasiswaById($id);

        $this->view("templates/header", $data);
        $this->view("mahasiswa/detail", $data);
        $this->view("templates/footer");
    }

    public function tambah()
    {
        if ($this->model("Mahasiswa_model")->tambahDataMahasiswa($_POST) > 0) {
            // flasher jika data berhasil ditambahkan
            Flasher::setFlash("berhasil", "ditambahkan", "success");
            // arahkan ke index mahasiswa
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            // flasher jika data tidak berhasil ditambahkan
            Flasher::setFlash("gagal", "ditambahkan", "danger");
            // arahkan ke index mahasiswa
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }

    public function hapus($id)
    {
        if ($this->model("Mahasiswa_model")->hapusDataMahasiswa($id) > 0) {
            // flasher jika data berhasil ditambahkan
            Flasher::setFlash("berhasil", "dihapus", "success");
            // arahkan ke index mahasiswa
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            // flasher jika data tidak berhasil ditambahkan
            Flasher::setFlash("gagal", "dihapus", "danger");
            // arahkan ke index mahasiswa
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }

    public function getUbah()
    {
        echo json_encode($this->model("Mahasiswa_model")->getMahasiswaById($_POST["id"]));
    }

    public function ubah()
    {
        if ($this->model("Mahasiswa_model")->ubahDataMahasiswa($_POST) > 0) {
            // flasher jika data berhasil ditambahkan
            Flasher::setFlash("berhasil", "diubah", "success");
            // arahkan ke index mahasiswa
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        } else {
            // flasher jika data tidak berhasil ditambahkan
            Flasher::setFlash("gagal", "diubah", "danger");
            // arahkan ke index mahasiswa
            header("Location: " . BASEURL . "/mahasiswa");
            exit;
        }
    }
}
