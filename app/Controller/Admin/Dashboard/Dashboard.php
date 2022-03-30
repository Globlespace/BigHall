<?php


namespace app\Controller\Admin\Dashboard;

use app\Controller\controller;

class dashboard extends controller
{
    function dashboardView(){

       $this->view(Dashboard."Dashboard");
    }
}