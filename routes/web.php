<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainCon;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', [MainCon::class, 'index']);
Route::get('/admin', [MainCon::class, 'admin'] );
Route::get('/add-sub-category', [MainCon::class, 'sub'] );
Route::get('/product', [MainCon::class, 'pro'] );
Route::get('/change-password', [MainCon::class, 'change'] );
// Route::get('/LogOut', [MainCon::class, 'logout']);
Route::get('/logout', [MainCon::class, 'out']);
Route::post('changed-password', [MainCon::class, 'changed']);
Route::post('/dataCheck', [MainCon::class, 'datacheck']);

// Route::get('/add-category', [MainCon::class, 'cat'] );
// Route::post('/addcat', [CategoryController::class, 'add_category']);
// Route::get('/addcat', [CategoryController::class, 'category']);


// cat
Route::get("/addcat", [CategoryController::class, "category"])->name("name_Category");
Route::get("/addcats/{id?}", [CategoryController::class, "edit_category"])->name("name_addCategorys");
Route::post("/addcat", [CategoryController::class, "add_category"])->name("name_addCategory");
Route::post("/addcat/{id?}", [CategoryController::class, "update_category"])->name("name_Category");
Route::get("/addcat/{id?}", [CategoryController::class, "del_category"])->name("name_delCategory");


// sub cat 

Route::get("/subCategory", [SubController::class, "list_sub_category"])->name("name_SubCategory");
Route::post("/add-subCategory", [SubController::class, "add_sub_category"])->name("name_list_sub_category");
