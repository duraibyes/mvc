<?php

namespace Bytes\src\controllers;

use Bytes\src\models\User;
use Bytes\system\core\Controller;
use Bytes\system\core\Request;
use Bytes\system\core\Validation;
use Bytes\system\database\Eloquent\Orm\BuildOrm;
use Bytes\system\redirection\Po;

class HomeController extends Controller
{
    public function index()
    {
        $params = ['title' => 'Modal add form'];
        // $info = $this->all();
        // $info = BuildOrm::table('users')->find();
        $info = User::find();
        // ss( $info );
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
            'mobile_no' => 'required,numeric',
            'image' => 'required, fileType:jpg|jpeg|png, maxSize:10000',
        ];
        $form_validation = Validation::validate($validate);
       
        if ($form_validation) {
            $ins['name'] = $request->input('name');
            $ins['email'] = $request->input('email');
            $ins['mobile_no'] = $request->input('mobile_no');
            $ins['url'] = $request->input('url');
            $ins['image'] = $request->returnPath()->save('users')->file('image');
            ss( $ins );
            //database connection start for insert update options
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
            ss( 'validated');
            // Po::back()->with(['test' => 'key'])->now();
        } 
    }

    public function test(int $name)
    {
        echo $name;
    }
}