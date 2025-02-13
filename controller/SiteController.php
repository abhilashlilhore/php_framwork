<?php 

namespace app\controller;

use app\core\Controller;
use app\core\Request;

Class SiteController extends Controller
{


    public function homeView(){
        // echo 'this is home view';

        $data['name']='saviorMarketing.com';
        return  $this->render('home',$data);
    }

    public function contactView(){ 

        return  $this->render('contact');
    }

    public function addContact(Request $request){

        
        return var_dump($request->getBody());
    }


}