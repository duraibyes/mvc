<?php
namespace Bytes\system\core;

class Router {
    public Request $request;
    public Response $response;
    protected array $routes = [];

    public function __construct(\Bytes\system\core\Request $request, Response $response) {
        $this->request = $request;
        $this->response = $response;
    }
    public function get($path, $callback){
        $this->routes['get'][$path] = $callback;
    }

    public function post($path, $callback){
        $this->routes['post'][$path] = $callback;
    }

    public function resolve() {
        
        $path = $this->request->getPath();
        $method = $this->request->getMethod();
        $_SESSION['old'] = $_REQUEST;
        $callback = $this->routes[$method][$path] ?? false;
        
        if( $callback === false) {
            $this->response->setStatusCode(404);
            return $this->response->responseView(404);
        }
        if( is_string( $callback )) {
            return $this->render($callback);
        }
        if( is_array( $callback )) {
            $callback[0] = new $callback[0]();
        }
        echo \call_user_func($callback, $this->request);
    }

    public function render($view, $params = []) {
        \ob_start();
        extract($params);
        include_once __DIR__."/../../src/views/$view.php";
        return \ob_get_clean();
    }
}