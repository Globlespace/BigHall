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
    Route::get("/admin/Logout",AdminLoginController."Login.Logout");
    Route::get("/admin",DashboardController."Dashboard.dashboardView");
    Route::get("/admin/Dashboard",DashboardController."Dashboard.dashboardView");
    Route::get("/admin/Categories",CategoriesController."Categories.categoriesView");
    Route::get("/admin/Products",ProductController."Products.ProductsView");
    Route::get("/admin/ProductTypes",ProductTypeController."ProductTypes.ProductTypesView");
    Route::get("/admin/ProImages",ProImageController."ProImages.ProImageView");

Route::get("/admin/Slider",SliderController."Slider.SliderView");
Route::get("/admin/SmallSlider",SmallSliderController."SmallSlider.SmallSliderView");
Route::get("/admin/ThreeGrid",ThreeGridController."ThreeGrid.ThreeGridView");
Route::get("/admin/FourGrid",FourGridController."FourGrid.FourGridView");
Route::get("/admin/Orders",OrdersController."Orders.OrdersView");


    /*************************admin Get routes All****************************/
    Route::get("/admin/Categories/Bulk/?from",CategoriesController."Categories.CategoriesGet");
    Route::get("/admin/Products/Bulk/?from",ProductController."Products.ProductsGet");
    Route::get("/admin/ProductTypes/Bulk/?from",ProductTypeController."ProductTypes.ProductTypesGet");
    Route::get("/admin/ProImages/Bulk/?from",ProImageController."ProImages.ProImagesGet");

Route::get("/admin/Slider/Bulk/?from",SliderController."Slider.SliderGet");
Route::get("/admin/SmallSlider/Bulk/?from",SmallSliderController."SmallSlider.SmallSliderGet");
Route::get("/admin/ThreeGrid/Bulk/?from",ThreeGridController."ThreeGrid.ThreeGridGet");
Route::get("/admin/FourGrid/Bulk/?from",FourGridController."FourGrid.FourGridGet");
Route::get("/admin/Orders/Bulk/?from",OrdersController."Orders.OrdersGet");

    /*************************admin Get routes Single****************************/
    Route::get("/admin/Categories/?id",CategoriesController."Categories.CategoryGetById");
    Route::get("/admin/Products/?id",ProductController."Products.ProductGetById");
    Route::get("/admin/ProductTypes/?id",ProductTypeController."ProductTypes.ProductTypesGetById");
    Route::get("/admin/ProImages/?id",ProImageController."ProImages.ProImagesGetById");

Route::get("/admin/Slider/?id",SliderController."Slider.SliderGetById");
Route::get("/admin/SmallSlider/?id",SmallSliderController."SmallSlider.SmallSliderGetById");
Route::get("/admin/ThreeGrid/?id",ThreeGridController."ThreeGrid.ThreeGridGetById");
Route::get("/admin/FourGrid/?id",FourGridController."FourGrid.FourGridGetById");
Route::get("/admin/Orders/?id",OrdersController."Orders.OrdersGetById");

    /*************************admin insertion routes****************************/
    Route::post("/admin/Categories",CategoriesController."Categories.CategoryInsert");
    Route::post("/admin/Products",ProductController."Products.ProductInsert");
    Route::post("/admin/ProductTypes",ProductTypeController."ProductTypes.ProductTypeInsert");
    Route::post("/admin/ProImages",ProImageController."ProImages.ProImagesInsert");

Route::post("/admin/Slider",SliderController."Slider.SliderInsert");
Route::post("/admin/SmallSlider",SmallSliderController."SmallSlider.SmallSliderInsert");
Route::post("/admin/ThreeGrid",ThreeGridController."ThreeGrid.ThreeGridInsert");
Route::post("/admin/FourGrid",FourGridController."FourGrid.FourGridInsert");
Route::post("/admin/Orders",OrdersController."Orders.OrdersInsert");

    /*************************admin Update routes****************************/
    Route::post("/admin/Categories/?id/Update",CategoriesController."Categories.CategoryUpdate");
    Route::post("/admin/Products/?id/Update",ProductController."Products.ProductUpdate");
    Route::post("/admin/ProductTypes/?id/Update",ProductTypeController."ProductTypes.ProductTypeUpdate");
    Route::post("/admin/ProImages/?id/Update",ProImageController."ProImages.ProImagesUpdate");

Route::post("/admin/Slider/?id/Update",SliderController."Slider.SliderUpdate");
Route::post("/admin/SmallSlider/?id/Update",SmallSliderController."SmallSlider.SmallSliderUpdate");
Route::post("/admin/ThreeGrid/?id/Update",ThreeGridController."ThreeGrid.ThreeGridUpdate");
Route::post("/admin/FourGrid/?id/Update",FourGridController."FourGrid.FourGridUpdate");
Route::post("/admin/Orders/?id/Update",OrdersController."Orders.OrdersUpdate");


/*************************admin Delete routes****************************/
    Route::delete("/admin/Categories/?id",CategoriesController."Categories.CategoryDelete");
    Route::delete("/admin/Products/?id",ProductController."Products.ProductDelete");
    Route::delete("/admin/ProductTypes/?id",ProductTypeController."ProductTypes.ProductTypeDelete");
    Route::delete("/admin/ProImages/?id",ProImageController."ProImages.ProImagesDelete");

Route::delete("/admin/Slider/?id",SliderController."Slider.SliderDelete");
Route::delete("/admin/SmallSlider/?id",SmallSliderController."SmallSlider.SmallSliderDelete");
Route::delete("/admin/ThreeGrid/?id",ThreeGridController."ThreeGrid.ThreeGridDelete");
Route::delete("/admin/FourGrid/?id",FourGridController."FourGrid.FourGridDelete");
Route::delete("/admin/Orders/?id",OrdersController."Orders.OrdersDelete");


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

    Route::get("/BuyNow/?ProType_Id",BuyNowController."BuyNow.BuyNowPage");
    Route::get("/BuyCart",BuyNowController."BuyNow.BuyNowPage");
    Route::get("/Cart",CartController."Cart.CartPage");
    Route::get("/AddToCart/?ProType_id",CartController."Cart.AddToCart");
    Route::get("/RemoveFromCart/?ProType_id",CartController."Cart.RemoveFromCart");
    Route::get("/QtyChangeFromCart/?ProType_id/?qty",CartController."Cart.QtyChangeFromCart");



echo "4004";
