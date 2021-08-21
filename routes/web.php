<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\sanpham;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\LoaiSanPhamController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\App;
use App\ChuyenDoi\KhongDau;
use App\Http\Middleware\CheckLogin;

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

Route::get('', function () {
    return view('welcome');
});

Route::get('lienket', [TheLoaiController::class, 'lienket']);

//Front end
Route::group(['prefix' => 'store'], function(){
	Route::get('/', [StoreController::class, 'trangchu']);

	Route::get('giohang', [StoreController::class, 'giohang']);

	//Thêm vào giỏ
	Route::get('addgiohang/{id}', [StoreController::class, 'addgiohang']);
	Route::get('add/{id}/{sl}', [StoreController::class, 'add']);

	Route::get('sp/{id}', [StoreController::class, 'sp']);
	Route::get('sanpham/id={id}&&sp={sp}', [StoreController::class, 'sanpham']);

	Route::get('danhsach/{id}/{sp}', [StoreController::class, 'danhsach']);

	Route::get('ttgiohang', [StoreController::class, 'ttgiohang']);
	Route::get('taskleft', [StoreController::class, 'taskleft']);
	Route::get('tang/{id}', [StoreController::class, 'tang']);
	Route::get('giam/{id}', [StoreController::class, 'giam']);
	Route::get('xoa/{id}', [StoreController::class, 'xoa']);
	Route::get('xoahet', [StoreController::class, 'xoahet']);
});



//Quản lí dữ liệu
Route::group(['prefix' => 'admin'], function(){
	Route::get('trangchu', function(){
		return view('quanli.index');
	});

	//Thể loại
	Route::group(['prefix' => 'theloai'], function(){
		Route::get('danhsach', [TheLoaiController::class, 'danhsach'] );

		Route::get('them', [TheLoaiController::class, 'getthem']);
		Route::post('them', [TheLoaiController::class, 'postthem']);

		Route::get('thaydoi/{id}', [TheLoaiController::class, 'getthaydoi']);
		Route::post('thaydoi', [TheLoaiController::class, 'postthaydoi']);

		Route::get('xoa/{id}', [TheLoaiController::class, 'getxoa']);
	});

	//Loại sản phẩm
	Route::group(['prefix' => 'loaisanpham'], function(){
		Route::get('danhsach', [LoaiSanPhamController::class, 'danhsach'] );

		Route::get('them', [LoaiSanPhamController::class, 'getthem']);
		Route::post('them', [LoaiSanPhamController::class, 'postthem']);

		Route::get('thaydoi/{id}', [LoaiSanPhamController::class, 'getthaydoi']);
		Route::post('thaydoi', [LoaiSanPhamController::class, 'postthaydoi']);

		Route::get('xoa/{id}', [LoaiSanPhamController::class, 'getxoa']);

	});

	//Sản phẩm
	Route::group(['prefix' => 'sanpham'], function(){
		Route::get('danhsach', [SanPhamController::class, 'danhsach'] );

		Route::get('them', [SanPhamController::class, 'getthem']);
		Route::post('them', [SanPhamController::class, 'postthem']);

		Route::get('thaydoi/{id}', [SanPhamController::class, 'getthaydoi']);
		Route::post('thaydoi', [SanPhamController::class, 'postthaydoi']);

		Route::get('getloaisp/{id}', [SanPhamController::class, 'getloaisp']);

		Route::get('xoa/{id}', [SanPhamController::class, 'getxoa']);

		Route::get('soluong', [SanPhamController::class, 'getsoluong']);
	});
});

Route::get('chuyendoi', [TheLoaiController::class, 'chuyendoi']);