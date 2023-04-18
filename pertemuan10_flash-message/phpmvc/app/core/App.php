<?php
class App
{
    // property untuk controller, method dan parameter defaultnya
    protected $controller = "home"; //set default controller
    protected $method = "index"; // set default method
    protected $params = []; //initialize empty parameters

    public function __construct()
    {
        $url = $this->parseUrl(); //get URL segments from query string

        // check if controller file exists and set it as current controller
        if (file_exists("../app/controllers/" . $url[0] . ".php")) {
            $this->controller = $url[0];
            unset($url[0]);
        }

        require_once("../app/controllers/" . $this->controller . ".php"); // include the controller file
        $this->controller = new $this->controller; // create an instance of the controller class

        // check if method exists in the current controller and set it as current method
        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        // set the remaining URL segments as parameters
        if (!empty($url)) {
            $this->params = array_values($url);
        }

        // call the specified method on the controller with supplied parameters
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    // parsing url
    public function parseUrl()
    {
        // check if URL segment is set and sanitize it
        if (isset($_GET["url"])) {
            $url = rtrim($_GET["url"], "/"); // remove trailing slashes
            $url = filter_var($url, FILTER_SANITIZE_URL); // sanitize URL
            $url = explode("/", $url); // convert URL to array of segments
            return $url; // return the array of segments
        }
    }
}
