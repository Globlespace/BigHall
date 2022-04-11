<?php


    /******************************User Controllers **************/
    define('UserController','User\\');
    define('HomeController',UserController.'Home\\');
    define('CartController',UserController.'Cart\\');
    define('CategoryController',UserController.'Category\\');
    define('ProductsController',UserController.'Products\\');


    /**************************admin Controllers*******************/

    define('AdminController','Admin\\');
    define('DashboardController',AdminController.'Dashboard\\');
    define('CategoriesController',AdminController.'Categories\\');
    define('ProductController',AdminController.'Products\\');
    define('ProductTypeController',AdminController.'ProductTypes\\');



