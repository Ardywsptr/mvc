<?php

// ini class sederhana, nanti nya class ini akan ekstends ke class utama yang ada di core
class Home extends Controller
{
    //method default -> jika tidak menuliskan apapun di url atau url yang ditulis tidak ada maka method ini yang dipanggil
    public function index()
    {
        $data["judul"] = "Home";
        $data["nama"] = $this->model("User_model")->getUser();

        $this->view("templates/header", $data);
        $this->view("home/index", $data);
        $this->view("templates/footer");
    }
}
