<?php


namespace app\controller;

use app\core\Controller;
use app\core\Request;
use app\models\RegisterModels;

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

        $registerObj = new RegisterModels();

        if ($request->isPost()) {
            $registerObj->loadData($request->getBody());           


            if ($registerObj->validate() && $registerObj->register()) {
                return 'success';
            } 

            return $this->render('register',['model'=>$registerObj]);
        }

        return $this->render('register',['model'=>$registerObj]);
    }
}
