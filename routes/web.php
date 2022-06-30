<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UpdateController;
use App\Http\Controllers\CreateShopController;
use App\Http\Controllers\UpdateShopController;
use App\Http\Controllers\ShopDeleteController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use Illuminate\Http\Request;

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

Route::get('/Main', function () {
    if(session('user') == null) return redirect('/');
    return view('Main');
});

Route::get('/search', [SearchController::class, 'index']);

Route::get('/category', function() {
    return view('Category');
});

//api
Route::get('/api/login/{id}', [ApiController::class, 'idCheck']);
Route::get('/api/shop/good/{id}', [ApiController::class, 'shopGood']);
Route::get('/api/review/good/{id}', [ApiController::class, 'reviewGood']);
Route::get('/api/review/report/{id}', [ApiController::class, 'reviewReport']);
Route::get('/api/review/show/{id}', [ApiController::class, 'showReviews']);
Route::get('/api/search/{value}', [ApiController::class, 'search']);
Route::get('/api/search/detail/{id}', [ApiController::class, 'searchDetail']);
Route::get('/api/shop/menu/{id}', [ApiController::class, 'showMenu']);
Route::get('/api/review/{order}', [ApiController::class, 'showReview']);
Route::get('/api/shop/{order}', [ApiController::class, 'AllShop']);


//user CRUD
Route::get('/MyPage', [UserController::class, 'MyPage']);

Route::get('/', [UserController::class, 'login']);
Route::post('/', [UserController::class, 'store']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/user/update', [UpdateController::class, 'index']);
Route::post('/user/update', [UpdateController::class, 'store']);

Route::get('/user/delete', [UpdateController::class, 'delete']);

Route::get('/logout', function () {
    session()->forget('user');
    return redirect('/');
});

//shop CRUD
Route::get('/shop/create', [CreateShopController::class, 'index']);
Route::post('/shop/create', [CreateShopController::class, 'store']);
Route::get('/shop/list/{id}', [UpdateShopController::class, 'idIndex']);
Route::get('/shop/list/{id}/modify', [UpdateShopController::class, 'index']);
Route::post('/shop/list/{id}/modify', [UpdateShopController::class, 'store']);
Route::get('/shop/delete/{id}', [ShopDeleteController::class, 'store']);

Route::get('/shop/review/{id}',[ReviewController::class, 'index']);
Route::post('/shop/review', [ReviewController::class, 'store']);
Route::get('/shop/review/{id}/modify', [ReviewController::class, 'indexModify']);
Route::post('/shop/review/modify', [ReviewController::class, 'modify']);
Route::get('/shop/review/{id}/delete', [ReviewController::class, 'delete']);

Route::get('/Magical', function () {
    return redirect()->away('https://www.youtube.com/watch?v=MWql1CBYlk8');
});

Route::get('/OrangeTime', function () {
    return redirect()->away('https://www.youtube.com/watch?v=MYTQN14JaSw');
});

Route::get('/api', function () {
    return view('Api');
});
