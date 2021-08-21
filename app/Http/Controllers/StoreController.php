<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    public function trangchu(){
    	$noibat = sanpham::take(4)->get();
    	$banchay = sanpham::skip(4)->take(4)->get();
    	return view('store.trangchu', ['noibat' => $noibat, 'banchay' => $banchay]);
    }

    public function giohang(){
    	return view('store.giohang');
    }


    public function sp($id){
        $sanpham = sanpham::find($id);
        $sp = $sanpham->tenkdau;
        return redirect('store/sanpham/id='.$id.'&&sp='.$sp);
    }

    public function sanpham($id, $sp){
        $sanpham = sanpham::find($id);
        $danhsach = sanpham::all();
        return view('store.sanpham', ['sanpham' => $sanpham, 'danhsach' => $danhsach]);
    }


    public function addgiohang(Request $request, $id){
    	$sanpham = sanpham::find($id);
    	$giohang = [];
    	$tt = [];

    	//Kiểm tra có session
    	if($request->session()->has('giohang')){
    		$giohang = session('giohang');
    	}

    	//Kiểm tra sản phẩm trong giỏ hàng
    	if(array_key_exists($id, $giohang)){
    		$giohang[$id]['soluong'] += 1;
    		$giohang[$id]['tong'] += $sanpham->dongia;
    	}
    	else{
    		$giohang[$id]['hinhanh'] = $sanpham->hinhanh;
    		$giohang[$id]['ten'] = $sanpham->ten;
    		$giohang[$id]['soluong'] = 1;
    		$giohang[$id]['dongia'] = $sanpham->dongia;
    		$giohang[$id]['tong'] = $sanpham->dongia;
    	}

    	//Lưu thay đổi vào session
    	$request->session()->put('giohang', $giohang);
    	foreach (session('giohang') as $key => $value) {
    		array_push($tt, $value);
    	}
    	return $tt;
    }

    public function ttgiohang(Request $request){
    	if($request->session()->has('giohang')){
    		$sanpham = [];
    		foreach (session('giohang') as $key) {
    			array_push($sanpham, $key['tong']);
    		}
    		
    		return $sanpham;
    	}
    	return 0;
    }

    public function taskleft(Request $request){
    	if($request->session()->has('giohang')){
    		$sanpham = [];
    		foreach (session('giohang') as $key => $value) {
    			array_push($sanpham, $value);
    		}
    		return $sanpham;
    	}
    }

    public function tang(Request $request, $id){
    	$sanpham = sanpham::find($id);
    	$giohang = session('giohang');
    	$thanhtien = 0;
    	foreach ($giohang as $key => $value) {
    		if($key == $id){
    			$tong = $value['tong'] + $sanpham->dongia;
    			$giohang[$key]['tong'] += $sanpham->dongia;
    			$giohang[$key]['soluong'] += 1;
    		}
    		$thanhtien += $value['tong'];
    	}  	
    	$thanhtien += $sanpham->dongia;
    	$request->session()->put('giohang', $giohang);
    	return response()->json([$tong, $thanhtien]);
    }

    public function giam(Request $request, $id){
    	$sanpham = sanpham::find($id);
    	$giohang = session('giohang');
    	$thanhtien = 0;
    	foreach ($giohang as $key => $value) {
    		if($key == $id){
    			$tong = $value['tong'] - $sanpham->dongia;
    			$giohang[$key]['tong'] -= $sanpham->dongia;
    			$giohang[$key]['soluong'] -= 1;
    		}
    		$thanhtien += $value['tong'];
    	}  	
    	$thanhtien -= $sanpham->dongia;
    	$request->session()->put('giohang', $giohang);
    	return response()->json([$tong, $thanhtien]);
    }

    public function xoa(Request $request, $id){
    	//Xóa sản phẩm khỏi session
    	$giohang = session('giohang');
    	Arr::forget($giohang, $id);
    	$request->session()->put('giohang', $giohang);

    	//Tính lại tổng tiền
    	$thanhtien = 0;
    	foreach(session('giohang') as $key => $value){
    		$thanhtien += $value['tong'];
    	}

    	return $thanhtien;
    }

    public function xoahet(Request $request){
    	if($request->session()->has('giohang')){
    		$request->session()->flush();
    		return 1;
    	}
    	return 0;
    }

    public function danhsach(Request $request, $id, $sp){
        $sanpham = sanpham::paginate(6);
        return view('store.danhsach', ['id' => $id, 'sp' => $sp, 'sanpham' => $sanpham]);
    }

    public function add(Request $request, $id, $sl){
        $sanpham = sanpham::find($id);
        $giohang = [];
        $solg = $sl;
        if($request->session()->has('giohang')){
            $giohang = session('giohang');
        }
        if(array_key_exists($id, $giohang)){
            $giohang[$id]['soluong'] += $solg;
            $giohang[$id]['tong'] += $sanpham->dongia*$sl;
        }
        else{
            $giohang[$id]['hinhanh'] = $sanpham->hinhanh;
            $giohang[$id]['ten'] = $sanpham->ten;
            $giohang[$id]['soluong'] = $solg;
            $giohang[$id]['dongia'] = $sanpham->dongia;
            $giohang[$id]['tong'] = $sanpham->dongia*$sl;
        }
        $request->session()->put('giohang', $giohang);
        return $giohang;
    }
}
