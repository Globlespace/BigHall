<?php

namespace app\Controller\User\Login;

use app\Controller\controller;
use framework\Request\Request;

class Login extends controller
{
    function LoginPage(){
        $this->setLayout=false;
        $this->view(Login."login");
    }
    function Register(Request $request){
       $lg=new \app\Model\Login\Login();
       $Name=$request->name;
       $Email=$request->email;
        if($lg->isAlreadyExist($Email) ){
           $lg->Success=false;
           $lg->Code=409;
           $lg->Message="Email Already Exist";
            $lg->Json();
           return;
       }
        if($lg->isAlreadyExist($Name) ){
            $lg->Success=false;
            $lg->Code=409;
            $lg->Message="UserName Already Exist";
            $lg->Json();
            return ;
        }

       $Password=encrypt($request->password);
       $lg->Register($Name,$Email,$Password,ConformationCode());
        $lg->Success=true;
        $lg->Code=200;
        $lg->Message="Confirm Your Email";
        $lg->Json();
    }

    function Login(Request $request){
        $login=new \app\Model\Login\Login();
        if($login->login($request->email,$request->password)){
            if($login->isActvatedUser($request->email)){
                $login->Message="Login Successfully";
                $this->Authorize($login->Name);
            }
        }
        $login->Json();

    }
    private function Authorize($Name){

        $_SESSION["USER"]=$Name;
    }
    public function isLoggedin(Request $request){
        if(!isset($_SESSION["USER"])){
            header("Location: ".HTTP_HOST."/Login?Error=Please Login First");
            exit();
        }
    }
}