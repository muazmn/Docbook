<?php

class Controller
{
    public function view($view, $data = [])
    {
        // if (!isset($_SESSION['username']) || isset($_POST['register2']) < 0) {
        //     include_once('../app/views/login/index.php');
        //     if (isset($_POST['register'])) {
        //         require_once '../app/views/registration/index.php';
        //         // header('Location: ' . BASEURL . '/Log/halamanRegister');
        //         // header('Location:' . BASEURL . '/home/index');
        //     }
        //     exit;
        // } else {
        // if (!isset($_SESSION['username'])) {
        //     require_once '../app/views/login/index2.php';
        // header('Location: ' . BASEURL . '/Log/halamanRegister');
        // header('Location: ' . BASEURL . '/home/index');
        // require_once '../app/views/' . $view . '.php';
        // } else {
        require_once '../app/views/' . $view . '.php';
        // }
        // require_once '../app/views/' . $view . '.php';
        // }
    }
    public function model($model)
    {
        require_once '../app/models/' . $model . '.php';
        // we need to instantiate model coz it's class not like view
        return new $model;
    }
}
