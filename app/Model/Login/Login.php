<?php

namespace app\Model\Login;

use app\Model\Model;

class Login extends Model {
    function isAlreadyExist($email){
        $query="SELECT * FROM `login` WHERE Email='$email' or NAME ='$email' or Phone ='$email';";
        $this->query($query);
         if($this->next()){
             $this->message="Email is Already Exist";
             $this->Code=112;
             $this->success=false;
             return true;
         }
         return false;
    }
    function Register($Name,$Email,$Password,$Phone,$City,$Address,$ConformationCode){
        $query="INSERT INTO `login` (`Id`, `Name`, `Password`, `Email`,`Phone`,`City`,`Address`, `Active`, `Code`) VALUES (NULL, '$Name', '$Password', '$Email','$Phone','$City','$Address','0', '$ConformationCode');";
        return mysqli_query(Model::Connection(),$query);
    }
    function isActvatedUser($email){
        $query="SELECT * FROM `login` WHERE Email='$email' && Active='1';";
        $this->query($query);
        if($this->next()){
            $this->Message="Email is Activated";
            $this->Code=200;
            $this->Success=true;
            return true;
        }
        $this->Data["Email"]=$email;
        $this->Message="Email is Not Activated Yet!";
        $this->Code=403;
        $this->Success=false;
        return false;
    }
    function activateUser($email, $code){
        $query="UPDATE `login` SET `Active` = '1' WHERE `login`.`Email` = '$email' && Code='$code';";
        $mysqli=Model::Connection();
        $results= mysqli_query($mysqli,$query);
        if(mysqli_affected_rows($mysqli)<1){
            $this->Message="Invalid Code";
            $this->Code=112;
            $this->Success=false;
            return false;
        }
        $this->Message="User Activated!";
        $this->Code=200;
        $this->Success=true;
        return true;
    }
    function resendcode($email){
        $query="SELECT * FROM `login` WHERE Email='$email';";
        $result=mysqli_query(Model::Connection(),$query);
        $this->Success=true;
        $this->Code=200;
        $this->Message="Code Send Successfully";
        $row= mysqli_fetch_assoc($result);
        return $row["Code"];

    }
    function login($email,$password){
        $query="SELECT * FROM `login` WHERE Email='$email' or Name='$email';";
        $this->query($query);
        if($this->next()) {
            if (check($password,$this->Password)) {
                $this->Message="Login Successfully!";
                $this->Code=200;
                $this->Success=200;
                return true;
            }
        }
        $this->Message="Invalid Email or Password";
        $this->Code=401;
        $this->Success=false;
        return false;
    }
}