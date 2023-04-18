<?php
class About
{
    // harus memiliki method default
    public function index($nama = "Ardy", $pekerjaan = "programmer")
    {
        echo "Hallo, perkenalkan nama saya $nama, saya seorang $pekerjaan";
    }
    public function page()
    {
        echo "About/page";
    }
}
