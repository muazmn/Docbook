<?php
class App
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    public function __construct()
    {
        $url = $this->parseURL();


        if ($url == NULL) {
            $url = [$this->controller];
        }
        // CONTROLLER
        // check if the file exist or not, we're now in index so we use double dot, if exist, we override current controller with new controller
        if (file_exists('../app/controllers/' . $url[0] . '.php')) {
            $this->controller = $url[0];
            unset($url[0]);
        }
        // call controller 
        require_once '../app/controllers/' . $this->controller . '.php';
        $this->controller = new $this->controller;

        // METHOD
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // PARAMS
        if (!empty($url)) {
            $this->params = array_values($url);
        }
        // jalankan controller dan method, serta kirimkan params jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);;
    }


    // setelah kesemua proses diatas selesai dijalankan, maka tapis url tersebut dengan function dibawah
    public function parseURL($home = "home")
    {
        if (isset($_GET['url'])) {
            // remove slash at last 
            $url = rtrim($_GET['url'], '/');
            // clean url from character that can hack our url
            $url = filter_var($url, FILTER_SANITIZE_URL);
            // remove slash and create $url to array
            $url = explode('/', $url);
            return $url;
        }
    }
}
