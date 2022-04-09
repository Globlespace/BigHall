<?php


namespace app\Model\Images;


use app\Model\Model;

class Images extends Model
{
    public $Id,$image;
    public function get($pro_id)
    {
        $query="SELECT * FROM `Images` where Pro_id='$pro_id' ORDER by Pro_id ASC ;";
        $result=mysqli_query(Model::Connection(),$query);
        $this->result=$result;
        $this->i=0;
    }
    public function next(){
        if(mysqli_num_rows($this->result) > $this->i){
            $row=mysqli_fetch_assoc($this->result);
            $this->Id=$row["Id"];
            $this->image=$row["Image"];
            $this->i++;
            return true;
        }
        return false;
    }
}