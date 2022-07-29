<?php 
namespace Bytes\system\core;

class Controller {
    public $request;
    public $db;
    public function __construct() {
        $this->request = Application::$app->request;
        $this->db = Application::$app->db;
    }
    public function render($view, $params) {
        return Application::$app->router->render($view, $params);
    }
}