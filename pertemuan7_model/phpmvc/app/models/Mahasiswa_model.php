<?php

class Mahasiswa_model
{
    // data dari array
    // private $mhs =
    // [
    //     [
    //         "nama" => "Dedeh Pertiwi",
    //         "nim" => "181011450168",
    //         "email" => "dedehpertiwi@gmail.com",
    //         "jurusan" => "Akuntansi"
    //     ],
    //     [
    //         "nama" => "Zahra Devita",
    //         "nim" => "181011450342",
    //         "email" => "zahradevita@gmail.com",
    //         "jurusan" => "Desain Komunikasi Visual"
    //     ],
    //     [
    //         "nama" => "Cici Awalia",
    //         "nim" => "181011450123",
    //         "email" => "ciciawalia@gmail.com",
    //         "jurusan" => "Teknik Arsitektur"

    //     ],
    // ];

    // data dari database -> connect ke database menggunakan PDO (PHP Data Object) -> dengan menggunakan PDO lebih fleksibel ketika ingin mengganti database bukan lagi pakai mysql -> lebih mudah juga penggunakaan nya dari pada mysqli

    private $dbh; // database handler
    private $stmt; // statement

    // menggunakan construct supaya model dipanggil yang pertama kali dilakukan yaitu koneksi ke database
    public function __construct()
    {
        // database source name -> koneksi ke PDO nya
        $dsn = "mysql:host=localhost;dbname=phpmvc";

        try {
            $this->dbh = new PDO($dsn, "root", "");
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function getAllMahasiswa()
    {
        // ketika pakai array
        // return $this->mhs;

        // ketika pakai database
        $this->stmt = $this->dbh->prepare("SELECT * FROM mahasiswa");
        $this->stmt->execute();

        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
