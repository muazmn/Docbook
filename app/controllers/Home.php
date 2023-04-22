<?php

class Home extends Controller
{
    public function index()
    {
        $data['title'] = "Home";

        $this->view('templates/header', $data);
        $this->view('templates/navbar', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
