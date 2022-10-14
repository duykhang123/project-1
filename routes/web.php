<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });




Route::prefix('admin')->middleware('auth')->name('admin.')->group(function () {

    /*============================== USER ================================= */
    $prefixUrl = 'user';
    $controllerName = 'user';
    Route::prefix($prefixUrl)->name($prefixUrl . '.')->group(function () use($controllerName){
        $controller = ucfirst($controllerName). 'Controller@';
        Route::get('index', $controller .'index')->name('index');
        Route::get('form', $controller .'form')->name('form');
        Route::post('delete', $controller .'delete')->name('delete');
        Route::post('changeProfile', $controller .'changeProfile')->name('changeProfile');
        Route::post('changePass', $controller .'changePass')->name('changePass');
        Route::get('changeStatus/{status}', $controller .'changeStatus')->name('changeStatus');
        Route::post('changeOrdering', $controller .'changeOrdering')->name('changeOrdering');
        Route::post('changePublic/{status}', $controller .'changePublic')->name('changePublic');
        Route::post('save', $controller .'save')->name('save');
        Route::get('show', $controller .'show')->name('show');
    });
    /*============================== CATEGORY ================================= */
    $prefixUrl = 'category';
    $controllerName = 'category';
    Route::prefix($prefixUrl)->name($prefixUrl . '.')->group(function () use($controllerName){
        $controller = ucfirst($controllerName). 'Controller@';
        Route::get('index', $controller .'index')->name('index');
        Route::get('form', $controller .'form')->name('form');
        Route::post('delete', $controller .'delete')->name('delete');
        Route::get('changeStatus/{status}', $controller .'changeStatus')->name('changeStatus');
        Route::post('changeOrdering', $controller .'changeOrdering')->name('changeOrdering');
        Route::post('changePublic/{status}', $controller .'changePublic')->name('changePublic');
        Route::post('save', $controller .'save')->name('save');
    });


    /*============================== POST ================================= */
    $prefixUrl = 'post';
    $controllerName = 'post';
    Route::prefix($prefixUrl)->name($prefixUrl . '.')->group(function () use($controllerName){
        $controller = ucfirst($controllerName). 'Controller@';
        Route::get('index', $controller .'index')->name('index');
        Route::get('form', $controller .'form')->name('form');
        Route::post('delete', $controller .'delete')->name('delete');
        Route::get('changeStatus/{status}', $controller .'changeStatus')->name('changeStatus');
        Route::post('changeOrdering', $controller .'changeOrdering')->name('changeOrdering');
        Route::post('changePublic/{status}', $controller .'changePublic')->name('changePublic');
        Route::post('save', $controller .'save')->name('save');
    });

    /*============================== BANNER ================================= */
    $prefixUrl = 'banner';
    $controllerName = 'banner';
    Route::prefix($prefixUrl)->name($prefixUrl . '.')->group(function () use($controllerName){
        $controller = ucfirst($controllerName). 'Controller@';
        Route::get('index', $controller .'index')->name('index');
        Route::get('form', $controller .'form')->name('form');
        Route::post('delete', $controller .'delete')->name('delete');
        Route::get('changeStatus/{status}', $controller .'changeStatus')->name('changeStatus');
        Route::post('changeOrdering', $controller .'changeOrdering')->name('changeOrdering');
        Route::post('changePublic/{status}', $controller .'changePublic')->name('changePublic');
        Route::post('save', $controller .'save')->name('save');
    });

    /*============================== PRODUCT ================================= */
    $prefixUrl = 'product';
    $controllerName = 'product';
    Route::prefix($prefixUrl)->name($prefixUrl . '.')->group(function () use($controllerName){
        $controller = ucfirst($controllerName). 'Controller@';
        Route::get('index', $controller .'index')->name('index');
        Route::get('form', $controller .'form')->name('form');
        Route::post('delete', $controller .'delete')->name('delete');
        Route::get('changeStatus/{status}', $controller .'changeStatus')->name('changeStatus');
        Route::get('changeSpecial/{special}', $controller .'changeSpecial')->name('changeSpecial');
        Route::post('changeOrdering', $controller .'changeOrdering')->name('changeOrdering');
        Route::post('changePublic/{status}', $controller .'changePublic')->name('changePublic');
        Route::post('save', $controller .'save')->name('save');
    });


    /*============================== PRODUCT CATEGORY ================================= */
    $prefixUrl = 'productcategories';
    $controllerName = 'productcategories';
    Route::prefix($prefixUrl)->name($prefixUrl . '.')->group(function () use($controllerName){
        $controller = ucfirst($controllerName). 'Controller@';
        Route::get('index', $controller .'index')->name('index');
        Route::get('form', $controller .'form')->name('form');
        Route::post('delete', $controller .'delete')->name('delete');
        Route::get('changeStatus/{status}', $controller .'changeStatus')->name('changeStatus');
        Route::post('changeOrdering', $controller .'changeOrdering')->name('changeOrdering');
        Route::post('changePublic/{status}', $controller .'changePublic')->name('changePublic');
        Route::post('save', $controller .'save')->name('save');
    });

    /*============================== BRAND ================================= */
    $prefixUrl = 'brand';
    $controllerName = 'brand';
    Route::prefix($prefixUrl)->name($prefixUrl . '.')->group(function () use($controllerName){
        $controller = ucfirst($controllerName). 'Controller@';
        Route::get('index', $controller .'index')->name('index');
        Route::get('form', $controller .'form')->name('form');
        Route::post('delete', $controller .'delete')->name('delete');
        Route::get('changeStatus/{status}', $controller .'changeStatus')->name('changeStatus');
        Route::post('changeOrdering', $controller .'changeOrdering')->name('changeOrdering');
        Route::post('changePublic/{status}', $controller .'changePublic')->name('changePublic');
        Route::post('save', $controller .'save')->name('save');
    });

    /*============================== TAG ================================= */
    $prefixUrl = 'tags';
    $controllerName = 'tags';
    Route::prefix($prefixUrl)->name($prefixUrl . '.')->group(function () use($controllerName){
        $controller = ucfirst($controllerName). 'Controller@';
        Route::get('addTag', $controller .'addTag')->name('addTag');
        Route::get('removeTag', $controller .'removeTag')->name('removeTag');
    });


});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/{slug}','HomeController@product')->name('product');
//Route::get('/{slug-id}', [App\Http\Controllers\HomeController::class, 'productcate'])->name('productcate');
Route::get('/danh-muc-san-pham/{slug}/{id}','HomeController@productcate')->name('productcate');
Route::get('/thuong-hieu-san-pham/{slug}/{id}','HomeController@show_brand')->name('show_brand');
Route::get('/save-cart/show','CartController@show_cart');
Route::get('/add_cart/{id}','CartController@add_cart')->name('add_cart');
Route::get('/delete_cart/{id}','CartController@delete_cart')->name('delete_cart');
Route::get('/save-cart/delete_item_cart/{id}','CartController@delete_item_cart')->name('delete_item_cart');
