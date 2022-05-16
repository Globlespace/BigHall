<?php
/**
 * Created by PhpStorm.
 * User: syedhuzaif
 * Date: 4/9/2022
 * Time: 5:13 PM
 */
namespace app\Controller\User\Cart;
use app\Controller\controller;
use framework\Request\Request;

class Cart extends controller
{
    function CartPage(){
        $this->setLayout="UserMain.php";
        $this-> view(Cart."Cart");
    }
    function AddToCart(Request $request){
        $cart=new \app\Model\Cart\Cart();
        $USERID=$_SESSION['USERID'];;
        if($this->AlreadyInCart($request->ProType_id,$USERID)){
            $query="SELECT * FROM `cart` WHERE `ProType_id`=$request->ProType_id && `User_Id`=$USERID";
            $cart->query($query);
            $cart->next();
            $Qty=(int)$cart->QtyCart;
            $cart->QtyCart= $Qty+1;

            $cart->update("`ProType_id`=$request->ProType_id && `User_Id`=$USERID");
        }else{
            $cart->ProType_id=$request->ProType_id;
            $cart->User_Id=$_SESSION["USERID"];
            $cart->QtyCart=1;
            $cart->insert();
        }
      header("Location: ".HTTP_HOST."Cart");
    }
    function AlreadyInCart($ProType_id,$User_Id){
        $cart=new \app\Model\Cart\Cart();
        $query="SELECT * FROM `cart` WHERE `ProType_id`=$ProType_id && `User_Id`=$User_Id;";
        $cart->query($query);
        return $cart->next();

    }
    function RemoveFromCart(Request $request){
        $cart=new \app\Model\Cart\Cart();
        $cart->ProType_id=$request->ProType_id;
        $cart->delete();
        header("Location: ".HTTP_HOST."Cart");

    }
    function QtyChangeFromCart(Request $request){
        if($request->qty<=0){
            return;
        }
        $USERID=$_SESSION['USERID'];
        $cart=new \app\Model\Cart\Cart();
        $cart->get("`ProType_id`=$request->ProType_id && `User_Id`=$USERID");
        $cart->next();
        $cart->QtyCart= $request->qty;
        $cart->update("`ProType_id`=$request->ProType_id && `User_Id`=$USERID");

    }
}