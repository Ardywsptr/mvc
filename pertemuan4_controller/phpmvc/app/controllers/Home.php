<?php

// ini class sederhana, nanti nya class ini akan ekstends ke class utama yang ada di core
class Home
{
    //method default -> jika tidak menuliskan apapun di url atau url yang ditulis tidak ada maka method ini yang dipanggil
    public function index()
    {
        echo "Home/index";
    }
}
