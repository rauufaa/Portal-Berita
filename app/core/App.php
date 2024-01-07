<?php

class App {
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];

    public function __construct(){
        $url = $this->parseURL();
        
        if(!is_null($url)){
            if(file_exists('../app/controllers/'. $url[0] . '.php') ){
                $this->controller = $url[0];
                unset($url[0]);
            }
        }
        

        require_once '../app/controllers/' . $this->controller . '.php';
        $control = $this->controller;
        $this->controller = new $this->controller;

        //method
        // var_dump($control == 'Home');
        // if($control == 'Home'){
        //     var_dump("apakah");
        //     if(isset($url[0])){
        //         if(method_exists($this->controller, $url[0])){

        //             $this->method = $url[0];
        //             unset($url[0]);
        //         }
        //     }
        // }else{
        //     if(isset($url[1])){
        //         if(method_exists($this->controller, $url[1])){

        //             $this->method = $url[1];
        //             unset($url[1]);
        //         }
        //     }
        // }
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {

                $this->method = $url[1];
                unset($url[1]);
            }
        }
        
        // var_dump($url);

        //params
        if(!empty($url)){
            // var_dump(array_values($url));
            $this->params = array_values($url);
            
        }

        //jalankan controller & method serta kirim param jika ada
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    public function parseURL(){
        if(isset($_GET['url'])){
            //var_dump($_GET['url']);
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            
            return $url;
        }
    }
}

?>