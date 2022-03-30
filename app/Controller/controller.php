<?php
namespace app\Controller;

use app\Model\Model;
use framework\Controller\BaseController;
use framework\Request\Request;

class controller extends BaseController
{
    public $setLayout="main.php";
    private $openTagsPattern="/<@[A-Z a-z 0-1]+>/i",
        $closeTagsPattern="/<@[A-Z a-z 0-1]+/>/i";

    protected function view($path,array $values=[]){
        extract($values);
        $file=VIEW_DIR."$path.php";
        if($this->setLayout === false) {
            ob_start();
            require $file;
            $file=ob_get_clean();
            echo $file;
            return 1;
        }
        if (!file_exists(LAYOUT_DIR . $this->setLayout)) {
           echo "file ".$this->setLayout." does not exist";
           return false;
        }
        $this->setLayout= LAYOUT_DIR . $this->setLayout;
       $page= $this->includefile($file,$this->setLayout,$values);
       echo $page;
       return !empty($page);
    }
    protected function includefile($file,$to,$values,$isincluded=false){

        extract($values);
        if(!$isincluded){

            ob_start();
            require $file;
            $file=ob_get_clean();
            ob_start();
            require $to;
            $componetfile=ob_get_clean();
        }

        $opentags=array_unique($this->findTags($file));
        foreach ($opentags as $tags){

            $component=$this->findFullComponent($tags,$file);
              $tags= str_replace("<@","",$tags);
              $tags= str_replace(">","",$tags);
              $componetfile=str_replace("{{".$tags."}}",$component,$componetfile);
        }
        return $componetfile;
    }
    private function findTags($view){
        preg_match_all($this->openTagsPattern,"$view",$Tags);
        return $Tags[0];
    }
    private function findFullComponent($tag,$view){
        //$Pattern="/$tag(\\r\\n)*((.*)(\\r\\n))*$tag/i";
        $Pattern="/$tag(.*)$tag/i";
        $text = preg_replace("/\r|\n|\\r\\n/", "", $view);
        preg_match_all($Pattern,"$text",$component);
        return str_replace($tag ,"",$component[0][0]);
    }
    protected function replacePlaceholders($file,array $data){
        ob_start();
            include $file;
        $file=ob_get_clean();
        foreach($data as $key=>$value){
            $file=str_replace("{{".$key."}}",$value,$file);
        }
        return $file;
    }
    protected function fillData(Request &$From,Model &$To){
        foreach ($From->values as $Key=>$Value){
            $To->{$Key}=$Value;
        }
    }

}