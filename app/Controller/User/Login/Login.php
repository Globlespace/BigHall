<?php

namespace app\Controller\User\Login;

use app\Controller\controller;
use framework\Request\Request;

class Login extends controller
{
    function LoginPage(){
        if($this->isLoggedin()){
            header("Location: ".HTTP_HOST);
            exit();
        }
        $this->setLayout=false;
        $this->view(Login."login");
    }
    function Register(Request $request){

       $lg=new \app\Model\Login\Login();
       $Name=$request->name;
       $Email=$request->email;
       $Phone=$request->phone;
       $Password=$request->password;
       $City=$request->city;
       $Address=$request->address;
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
        if($lg->isAlreadyExist($Phone) ){
            $lg->Success=false;
            $lg->Code=409;
            $lg->Message="Phone No Already Exist";
            $lg->Json();
            return ;
        }
        if(strlen($Phone) != 10){
            $lg->Success=false;
            $lg->Message="Invalid Phone No It Must be 10 Digits";
            $lg->Code=401;
            $lg->Json();
            return ;
        }
       $Password=encrypt($Password);
       $lg->Register($Name,$Email,$Password,$Phone,$City,$Address,ConformationCode());
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
                $this->Authorize($login->Name,$login->Id);
            }
        }
        $login->Json();

    }
    private function Authorize($Name,$Id){

        $_SESSION["USER"]=$Name;
        $_SESSION["USERID"]=$Id;
    }
    function Checklogin(Request $request){
        if(!$this->isLoggedin()){
            header("Location: ".HTTP_HOST."Login?RediredtUri=$request->requesturl&&Error=Please Login First");
            exit();
        }

    }
    public function isLoggedin(){
       // print_r($request);exit();
        return (isset($_SESSION["USER"]));
    }
    public function ConfirmPage(Request $request){
        $this->setLayout=false;
        $this->view(Confirm."Confirm",$request->values);
    }
    public function Confirm(Request $request){
        $login=new \app\Model\Login\Login();
        if ($login->isActvatedUser($request->Email)){
            $login->Message="User is Already Activated";
            $login->Code="409";
        }else{
            $login->activateUser($request->Email,$request->Code);
        }

        $login->Json();
    }
    public function Resend(Request $request){
        $login=new \app\Model\Login\Login();
        if ($login->isActvatedUser($request->Email)){
            $login->Message="User is Already Activated";
            $login->Code="409";
        }else{
            $Code=$login->resendcode($request->Email);
            ConformationCodeEmail($request->Email,$Code);


        }

        $login->Json();
    }
    public function Logout(){
        session_destroy();
        header("Location: ".HTTP_HOST);
    }

}