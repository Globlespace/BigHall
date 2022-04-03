<?php
    require_once 'config.tpl';
    require_once '../framework/Helper/helpers.php';
    use framework\Routing\Route;

    Route::get("/",HomeController."Home.index");
    Route::get("/ThreeGrid/?from",HomeController."Home.ThreeGrid");
    Route::get("/FourGrid/?from",HomeController."Home.FourGrid");





    /************************* Admin route start's from here ********************/

    /**************************** Get Admin Pages ****************************/
    Route::get("/admin",DashboardController."Dashboard.dashboardView");
    Route::get("/admin/Categories",CategoriesController."Categories.categoriesView");
    Route::get("/admin/Products",ProductController."Products.ProductsView");
    Route::get("/admin/ProductTypes",ProductTypeController."ProductTypes.ProductTypesView");

    /*************************admin Get routes All****************************/
    Route::get("/admin/Categories/Bulk/?from",CategoriesController."Categories.CategoriesGet");
    Route::get("/admin/Products/Bulk/?from",ProductController."Products.ProductsGet");
    Route::get("/admin/ProductTypes/Bulk/?from",ProductTypeController."ProductTypes.ProductTypesGet");

    /*************************admin Get routes Single****************************/
    Route::get("/admin/Categories/?id",CategoriesController."Categories.CategoryGetById");
    Route::get("/admin/Products/?id",ProductController."Products.ProductGetById");
    Route::get("/admin/ProductTypes/?id",ProductTypeController."ProductTypes.ProductTypeGetById");

    /*************************admin insertion routes****************************/
    Route::post("/admin/Categories",CategoriesController."Categories.CategoryInsert");
    Route::post("/admin/Products",ProductController."Products.ProductInsert");
    Route::post("/admin/ProductTypes",ProductTypeController."ProductTypes.ProductTypeInsert");

    /*************************admin Update routes****************************/
    Route::post("/admin/Categories/?id/Update",CategoriesController."Categories.CategoryUpdate");
    Route::post("/admin/Products/?id/Update",ProductController."Products.ProductUpdate");
    Route::post("/admin/ProductTypes/?id/Update",ProductTypeController."ProductTypes.ProductTypeUpdate");

    /*************************admin Delete routes****************************/
    Route::delete("/admin/Categories/?id",CategoriesController."Categories.CategoryDelete");
    Route::delete("/admin/Products/?id",ProductController."Products.ProductDelete");
    Route::delete("/admin/ProductTypes/?id",ProductTypeController."ProductTypes.ProductTypeDelete");