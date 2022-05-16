<?php


namespace app\Model\Login;


use app\Model\Model;

class AdminLogin extends Model
{
    function isAlreadyExist($email){
        $query="SELECT * FROM `adminlogin` WHERE Email='$email' or NAME ='$email';";
        $result=mysqli_query(Model::Connection(),$query);
        if(mysqli_num_rows($result)>0){
            $this->Message="Email is Already Exist";
            $this->Code=112;
            $this->Success=false;
            return true;
        }
        return false;
    }
    function Register($name,$email,$password,$ConformationCode){
        $query="INSERT INTO `adminlogin` (`Id`, `Name`, `Password`, `Email`, `Active`, `Code`) VALUES (NULL, '$name', '$password', '$email', '0', '$ConformationCode');";
        return mysqli_query(Model::Connection(),$query);
    }
    function isActvatedUser($email){
        $query="SELECT * FROM `adminlogin` WHERE Email='$email' && Active='1';";
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
        $query="UPDATE `adminlogin` SET `Active` = '1' WHERE `login`.`Email` = '$email' && Code='$code';";
        $mysqli=Model::Connection();
        $results= mysqli_query($mysqli,$query);
        if(mysqli_affected_rows($mysqli)<1){
            $this->message="Invalid Code";
            $this->Code=112;
            $this->success=false;
            return false;
        }
        $this->Code=200;
        $this->success=true;
        return true;
    }
    function resendcode($email){
        $query="SELECT * FROM `adminlogin` WHERE Email='$email';";
        $result=mysqli_query(Model::Connection(),$query);
        $row= mysqli_fetch_assoc($result);
        return $row["Code"];
    }
    public function Login($email,$password){
        $query="SELECT * FROM `adminlogin` WHERE Email='$email' or Name='$email';";
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