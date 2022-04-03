<?php


    /******************************User Controllers **************/
    define('UserController','User\\');
    define('HomeController',UserController.'Home\\');
    define('CategoryController',UserController.'Category\\');


    /**************************admin Controllers*******************/

    define('AdminController','Admin\\');
    define('DashboardController',AdminController.'Dashboard\\');
    define('CategoriesController',AdminController.'Categories\\');
    define('ProductController',AdminController.'Products\\');
    define('ProductTypeController',AdminController.'ProductTypes\\');



