<?php 
namespace Bytes\system\core;

class Controller {
    public $request;
    
    public function __construct() {
        $this->request = Application::$app->request;
    }
    public function render($view, $params) {
        return Application::$app->router->render($view, $params);
    }
}