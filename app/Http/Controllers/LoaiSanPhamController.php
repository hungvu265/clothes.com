<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loaisanpham;
use App\Models\theloai;
use App\Models\sanpham;


class LoaiSanPhamController extends Controller
{
    function danhsach(){
        $theloai = theloai::all();
        $loaisp = loaisanpham::all();
    	return view('loaisanpham.danhsach', ['loaisp' => $loaisp, 'theloai' => $theloai]);
    }

    function getthem(){
        $theloai = theloai::all();
        return view('loaisanpham/them', ['theloai' => $theloai]);
    }

    function postthem(Request $request){
        $ten = $this->khongdau($request->input('loaisp'));
        $check = loaisanpham::where('id_theloai', $request->input('theloai'))->get();
        foreach ($check as $key) {
            if($this->khongdau($key->ten) == $ten){
                return 'false';
            }
        }

        $loaisp = new loaisanpham();
        $loaisp->id_theloai = $request->input('theloai');
        $loaisp->ten = $request->input('loaisp');
        $loaisp->save();
        
        if($loaisp){
            return $loaisp;
        }
        
    }

    function getthaydoi($id){
        $loaisp = loaisanpham::find($id);
        return $loaisp;
    }

    function postthaydoi(Request $request){
    	$loaisp = loaisanpham::find($request->input('id'));
        $loaisp->id_theloai = $request->theloai;
        $loaisp->ten = $request->input('loaisp');
        $theloai = $loaisp->theloai->ten; 
        $loaisp->save();
        $data = ['id' => $loaisp->id,'ten' => $loaisp->ten, 'theloai' => $theloai];
        return $data;
    }	

    function getxoa($id){
        $sanpham = sanpham::all();
        $loaisp = loaisanpham::find($id);
        foreach ($sanpham as $sp) {
            if($sp->id_loaisanpham == $id){
                return 'false';
            }
        }
        $loaisp->delete();
        return 1;
    }
}
