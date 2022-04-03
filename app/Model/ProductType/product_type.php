<?php


namespace app\Model;


class product_type extends Model
{
    private $i=0,$result;
    public $Id,$name,$price,$offer,$Qty;
    public function get($pro_id,$orderby=0)
    {
        $query="SELECT * FROM `product_types` where Pro_Id='$pro_id' ORDER by Price ASC ;";
        if($orderby !=0 ){
            $query="SELECT * FROM `product_types` where Pro_Id='$pro_id' && Id='$orderby'";
        }

        $result=mysqli_query(Model::Connection(),$query);
        $this->result=$result;
        $this->i=0;
    }
    public function next(){
        if(mysqli_num_rows($this->result) > $this->i){
            $row=mysqli_fetch_assoc($this->result);
            $this->Id=$row["Id"];
            $this->name=$row["Name"];
            $this->price=$row["Price"];
            $this->offer=$row["Offer"];
            $this->Qty=$row["Qty"];
            $this->i++;
            return true;
        }
        return false;
    }
}