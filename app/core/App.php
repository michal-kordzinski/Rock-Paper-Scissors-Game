<?php

/**
 * Class App
 */
class App
{
    /**
     * @var string
     */
    private $controller = 'game';
    /**
     * @var mixed|string
     */
    private $method = 'index';
    /**
     * @var array
     */
    private $params = [];
    /**
     * App constructor.
     */
    public function __construct()
    {
        $url = $this->parseUrl();
        

        /**
         * check whether controller exists, if so, it setting it
         */
        
        if (file_exists('../app/controllers/' . $url[0] .'.php')) { 
            $this->controller = $url[0];
            unset($url[0]);
        }
        /**
         * if no, it requiring default controller 'home'
         */
        require_once('../app/controllers/' . $this->controller . '.php');
        $this->controller = new $this->controller;
        /**
         * checking whether method is exists, if so, it setting it
         */

        if (isset($url[1])) {
            if (method_exists($this->controller, $url[1])) {
                $this->method = $url[1];
                unset($url[1]);
            }
        }
        /**
         * if params exists, they will be assign. Otherwise it will be a blank table
         */
        $this->params = $url ? array_values($url) : [];
        /**
         * calling method of controller with params
         */
        call_user_func_array([$this->controller, $this->method], $this->params);
    }

    /**
     * @return array|string
     */
    private function parseUrl()
    {
        if(isset($_GET['url'])){
            /**
             * parse $_GET via .htaccess
             */
            return $url = explode('/', filter_var(rtrim($_GET['url'], '/'),  FILTER_SANITIZE_URL));
        }
    }
}