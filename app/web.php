<?php
    require_once 'config.tpl';
    require_once '../framework/Helper/helpers.php';
    use framework\Routing\Route;
    session_start();

    /************************* Admin route start's from here ********************/
    Route::get("/admin/Login",AdminLoginController."Login.LoginPage");
    Route::post("/admin/Login",AdminLoginController."Login.Login");

    /**************************** Get Admin Pages ****************************/
    Route::middleware("/admin",AdminLoginController."Login.isLoggedin");

    Route::get("/admin",DashboardController."Dashboard.dashboardView");
    Route::get("/admin/Dashboard",DashboardController."Dashboard.dashboardView");
    Route::get("/admin/Categories",CategoriesController."Categories.categoriesView");
    Route::get("/admin/Products",ProductController."Products.ProductsView");
    Route::get("/admin/ProductTypes",ProductTypeController."ProductTypes.ProductTypesView");
    Route::get("/admin/ProImages",ProImageController."ProImages.ProImageView");

    /*************************admin Get routes All****************************/
    Route::get("/admin/Categories/Bulk/?from",CategoriesController."Categories.CategoriesGet");
    Route::get("/admin/Products/Bulk/?from",ProductController."Products.ProductsGet");
    Route::get("/admin/ProductTypes/Bulk/?from",ProductTypeController."ProductTypes.ProductTypesGet");
    Route::get("/admin/ProImages/Bulk/?from",ProImageController."ProImages.ProImagesGet");

    /*************************admin Get routes Single****************************/
    Route::get("/admin/Categories/?id",CategoriesController."Categories.CategoryGetById");
    Route::get("/admin/Products/?id",ProductController."Products.ProductGetById");
    Route::get("/admin/ProductTypes/?id",ProductTypeController."ProductTypes.ProductTypesGetById");
    Route::get("/admin/ProImages/?id",ProImageController."ProImages.ProImagesGetById");

    /*************************admin insertion routes****************************/
    Route::post("/admin/Categories",CategoriesController."Categories.CategoryInsert");
    Route::post("/admin/Products",ProductController."Products.ProductInsert");
    Route::post("/admin/ProductTypes",ProductTypeController."ProductTypes.ProductTypeInsert");
    Route::post("/admin/ProImages",ProImageController."ProImages.ProImagesInsert");

    /*************************admin Update routes****************************/
    Route::post("/admin/Categories/?id/Update",CategoriesController."Categories.CategoryUpdate");
    Route::post("/admin/Products/?id/Update",ProductController."Products.ProductUpdate");
    Route::post("/admin/ProductTypes/?id/Update",ProductTypeController."ProductTypes.ProductTypeUpdate");
    Route::post("/admin/ProImages/?id/Update",ProImageController."ProImages.ProImagesUpdate");

/*************************admin Delete routes****************************/
    Route::delete("/admin/Categories/?id",CategoriesController."Categories.CategoryDelete");
    Route::delete("/admin/Products/?id",ProductController."Products.ProductDelete");
    Route::delete("/admin/ProductTypes/?id",ProductTypeController."ProductTypes.ProductTypeDelete");

    Route::delete("/admin/ProImages/?id",ProImageController."ProImages.ProImagesDelete");


/************************* User route start's from here ********************/

    Route::get("/",HomeController."Home.index");
    Route::get("/Categories",CategoryController."Category.Categories");
    Route::get("/Category/?Uri",CategoryController."Category.index");
    Route::get("/Product/?Uri",ProductsController."products.product");
    Route::get("/cart",CartController."cart.cartindex");
    Route::get("/ThreeGrid/?from",HomeController."Home.ThreeGrid");
    Route::get("/FourGrid/?from",HomeController."Home.FourGrid");

    Route::get("/Login",LoginController."Login.LoginPage");
    Route::get("/Confirm/?Email",LoginController."Login.ConfirmPage");

    Route::post("/Confirm",LoginController."Login.Confirm");
    Route::post("/Resend",LoginController."Login.Resend");
    Route::post("/Login",LoginController."Login.Login");
    Route::post("/Register",LoginController."Login.Register");

    Route::get("/Logout",LoginController."Login.Logout");

    Route::middleware("/",LoginController."Login.Checklogin");

    Route::get("/BuyNow",BuyNowController."BuyNow.BuyNowPage");
    Route::get("/Cart",CartController."Cart.CartPage");
    Route::get("/AddToCart/?ProType_id",CartController."Cart.AddToCart");
    Route::get("/RemoveFromCart/?ProType_id",CartController."Cart.RemoveFromCart");
    Route::get("/QtyChangeFromCart/?ProType_id",CartController."Cart.QtyChangeFromCart");



echo "4004";
