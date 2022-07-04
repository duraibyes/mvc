<?php

namespace Bytes\src\controllers;

use Bytes\system\core\Controller;
use Bytes\system\core\Request;
use Bytes\system\core\Validation;

class HomeController extends Controller
{

    public function contactForm()
    {
        $params = ['title' => 'Modal add form'];
        // return Application::$app->router->render('test', $params);
        return $this->render('test', $params);
    }

    public function formSubmit(Request $request)
    {
        // print_r( $_POST );
        $validate = [
            'name' => 'required,string, min:4',
            'email' => 'required,validEmail',
            'mobile_no' => 'required,validMobileNo'
        ];
        if (Validation::validate($validate)) {
        } else {
            $error = Validation::getErrorMsg();
            ss($error);
        }
    }

    public function test(int $name)
    {
        echo $name;
    }
}