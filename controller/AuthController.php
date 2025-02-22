<?php


namespace app\controller;

use app\core\Application;
use app\core\Controller;
use app\core\Request;
use app\models\User;

class AuthController extends Controller
{



    public function login(Request $request)
    {

        $this->setLayout('auth');

        return $this->render('login');
    }

    public function register(Request $request)
    {

        $this->setLayout('auth');

        $registerObj = new User();

        if ($request->isPost()) {
            $registerObj->loadData($request->getBody());           


            if ($registerObj->validate() && $registerObj->save()) {
                Application::$app->session->setFlash("success","Thank you for registering");
                Application::$app->responce->redirect('/');
            } 

            return $this->render('register',['model'=>$registerObj]);
        }

        return $this->render('register',['model'=>$registerObj]);
    }
}
