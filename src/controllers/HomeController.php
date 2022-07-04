<?php
namespace Bytes\src\controllers;
use Bytes\system\core\Controller;
use Bytes\system\core\Request;

class HomeController extends Controller {

    public function contactForm() {
        $params = [ 'title' => 'Modal add form'];
        // return Application::$app->router->render('test', $params);
        return $this->render('test', $params);
    }

    public function formSubmit(Request $request) {
        
        // print_r( $_POST );
        $body = $request->post('email');
        $all = $this->request->post();
        print_r( $body );
        print_r( $all );
        die;
    }
}