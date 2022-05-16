<?php
namespace app\Controller\Admin\Login;

use app\Controller\controller;
use app\Model\Login\AdminLogin;
use framework\Request\Request;

class Login extends controller
{
    public function LoginPage(){
        $this->setLayout=false;
        $this->view(AdminLogin."Login");
    }
    public function Login(Request $request){
        $login=new AdminLogin();
        if($login->Login($request->USER,$request->PASS)){
            if($login->isActvatedUser($request->USER)){
                $login->Message="Login Successfully";
                $this->Authorize($login->Name);
            }
        }
        $login->Json();
    }
    private function Authorize($Name){

        $_SESSION["ADMIN"]=$Name;
    }
    public function isLoggedin(Request $request){
        if(!isset($_SESSION["ADMIN"])){
            header("Location: ".HTTP_HOST."admin/Login?Error=Please Login First");
            exit();
        }
    }
    public function Logout(){
        session_destroy();
        header("Location: ".HTTP_HOST."admin/Login");
    }
}