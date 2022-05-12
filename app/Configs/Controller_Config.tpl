<?php


    /******************************User Controllers **************/
    define('UserController','User\\');
    define('HomeController',UserController.'Home\\');
    define('CategoryController',UserController.'Category\\');
    define('ProductsController',UserController.'Products\\');
    define('LoginController',UserController.'Login\\');


    /**************************admin Controllers*******************/

    define('AdminController','Admin\\');
    define('AdminLoginController',AdminController.'Login\\');
    define('DashboardController',AdminController.'Dashboard\\');
    define('CategoriesController',AdminController.'Categories\\');
    define('ProductController',AdminController.'Products\\');
    define('ProductTypeController',AdminController.'ProductTypes\\');
    define('ProImageController',AdminController.'ProImages\\');



