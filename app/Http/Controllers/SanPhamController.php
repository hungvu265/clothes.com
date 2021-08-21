<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\sanpham;
use App\Models\loaisanpham;
use App\Models\theloai;


class SanPhamController extends Controller
{
    function danhsach(){
        $sanpham = sanpham::all();
    	return view('sanpham.danhsach', ['sanpham' => $sanpham]);
    }

    function getthem(){
        $theloai = theloai::all();
        $first = theloai::first();
        $loaisp = loaisanpham::where('id_theloai', $first->id)->get();
    	return view('sanpham.them', ['loaisanpham' => $loaisp, 'theloai' => $theloai, 'first' => $first]);
    }

    function postthem(Request $request){
        $request->validate([
            'hinhanh' => 'required|max:255',
            'ten' => 'required',
            'soluong' => 'required|gte:1',
            'dongia' => 'required|gte:10000'
        ],[
            'hinhanh.required' => 'Thông tin không được để trống',
            'hinhanh.max' => 'Tên file không được quá 255 kí tự',
            'ten.required' => 'Thông tin không được để trống',
            'soluong.required' => 'Thông tin không được để trống',
            'dongia.required' => 'Thông tin không được để trống',
            'soluong.gte' => 'Số lượng tối thiểu là: 1',
            'dongia.gte' => 'Giá tối thiểu là: 10.000'
        ]);

        $ten = $request->input('ten');
        $check = sanpham::where('id_loaisanpham', $request->input('loaisp'))->get();
        foreach ($check as $key => $value) {
            if($value->tenkdau == $this->khongdau($ten)){
                return back()->withInput()->with(['false' => 'Sản phẩm đã tồn tại']);
            }
        }

        $file = $request->file('hinhanh');
        $name = $file->getClientOriginalName($file);
        $extend = $file->getClientOriginalExtension($file);
        $file->move('images/800x800', $name);
        $sanpham = new sanpham();
        $sanpham->hinhanh = $name;
        $sanpham->ten = $request->input('ten');
        $sanpham->tenkdau = $this->khongdau($sanpham->ten);
        $sanpham->soluong = $request->input('soluong');
        $sanpham->dongia = $request->input('dongia');
        $sanpham->id_loaisanpham = $request->input('loaisp');
        $sanpham->save();
        if($sanpham){
            return back()->with('success', 'Thêm sản phẩm thành công');
        }
    }

    function getthaydoi($id){
    	$sanpham = sanpham::find($id);
        $idtheloai = $sanpham->loaisanpham->theloai;
        $theloai = theloai::all();
        $loaisp = loaisanpham::where('id_theloai', $idtheloai->id)->get();
        return view('sanpham.thaydoi', ['sanpham' => $sanpham, 'loaisp' => $loaisp, 'theloai' => $theloai]);
    }

    function getloaisp($id){
        $loaisp = loaisanpham::where('id_theloai', $id)->get();
        return $loaisp;
    }

    function postthaydoi(Request $request){
    	$request->validate([
            'ten' => 'required',
            'soluong' => 'required|gte:1',
            'dongia' => 'required|gte:10000'
        ],[
            'ten.required' => 'Thông tin không được để trống',
            'soluong.required' => 'Thông tin không được để trống',
            'dongia.required' => 'Thông tin không được để trống',
            'soluong.gte' => 'Số lượng tối thiểu là: 1',
            'dongia.gte' => 'Giá tối thiểu là: 10.000'
        ]);

        $ten = $request->input('ten');
        $check = sanpham::where('id_loaisanpham', $request->input('loaisp'))->get();
        foreach ($check as $key => $value) {
            if($value->tenkdau == $this->khongdau($ten)){
                return back()->with(['false' => 'Tên sản phẩm đã tồn tại']);
            }
        }

        $sanpham = sanpham::find($request->input('id'));
        if($request->hasfile('hinhanh')){
            $file = $request->file('hinhanh');
            $name = $file->getClientOriginalName($file);
            $file->move('images/800x800', $name);
            $sanpham->hinhanh = $name;
        }
        $sanpham->ten = $ten;
        $sanpham->tenkdau = $this->khongdau($ten);
        $sanpham->soluong = $request->input('soluong');
        $sanpham->dongia = $request->input('dongia');
        $sanpham->id_loaisanpham = $request->input('loaisp');
        $sanpham->save();
        if($sanpham){
            return back()->with(['success' => 'Thay đổi thành công']);
        }
    }	

    function getxoa($id){
        $sanpham = sanpham::find($id);
        $sanpham->delete();
        if($sanpham){
            return 1;
        }
    }

    function getsoluong(){
        $theloai = theloai::all();
        $sotheloai = $theloai->count();
        $k=1;
        foreach ($theloai as $key) {
            $temp = 0;
            $loaisp = $key->loaisanpham;
            foreach ($loaisp as $value) {
                $temp += $value->sanpham->count();
            }
            $soluong[$k++] = $temp;
        }
        return ['soluong' => $soluong, 'theloai' => $theloai];
    }
}
