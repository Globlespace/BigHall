<?php


    /******************************User Controllers **************/
    define('UserController','User\\');
    define('HomeController',UserController.'Home\\');
    define('CartController',UserController.'Cart\\');
    define('CategoryController',UserController.'Category\\');
    define('ProductsController',UserController.'Products\\');
    define('LoginController',UserController.'Login\\');
    define('BuyNowController',UserController.'BuyNow\\');


    /**************************admin Controllers*******************/

    define('AdminController','Admin\\');
    define('AdminLoginController',AdminController.'Login\\');
    define('DashboardController',AdminController.'Dashboard\\');
    define('CategoriesController',AdminController.'Categories\\');
    define('ProductController',AdminController.'Products\\');
    define('ProductTypeController',AdminController.'ProductTypes\\');
    define('ProImageController',AdminController.'ProImages\\');

    define('ThreeGridController',AdminController.'ThreeGrid\\');
    define('FourGridController',AdminController.'FourGrid\\');
    define('SliderController',AdminController.'Slider\\');
    define('SmallSliderController',AdminController.'SmallSlider\\');
    define('OrdersController',AdminController.'Orders\\');



