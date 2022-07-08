<?php

namespace Bytes\src\controllers;

use Bytes\system\core\Controller;
use Bytes\system\core\Request;
use Bytes\system\core\Validation;
use Bytes\system\redirection\Po;

class HomeController extends Controller
{
    public function index()
    {
        $params = ['title' => 'Modal add form'];
        // return Application::$app->router->render('test', $params);
        return $this->render('home', $params);
    }

    public function contactForm()
    {
        $params = ['title' => 'Modal add form'];
        // return Application::$app->router->render('test', $params);
        return $this->render('test', $params);
    }

    public function formSubmit(Request $request)
    {
        
        $validate = [
            'name' => 'required,string, minLength:4',
            'email' => 'required,validEmail',
            'mobile_no' => 'required,validMobileNo'
        ];
        if (Validation::validate($validate)) {
            Po::back()->with(['test' => 'key'])->now();
        } 
    }
    public function contactSubmit(Request $request)
    {
        
        $validate = [
            'name' => 'required,string, minLength:4',
            'email' => 'required,validEmail',
            'mobile_no' => 'required,validMobileNo'
        ];
        if (Validation::validate($validate)) {
            Po::back()->with(['test' => 'key'])->now();
        } 
    }

    public function test(int $name)
    {
        echo $name;
    }
}