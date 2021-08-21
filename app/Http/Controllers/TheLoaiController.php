<?php

namespace App\Http\Controllers;
use App\Models\theloai;
use App\Models\loaisanpham;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class TheLoaiController extends Controller
{
    function danhsach(){
        $theloai = theloai::all();
    	return view('theloai.danhsach', ['theloai' => $theloai]);
    }

    function getthem(){
    	return view('theloai.them');
    }

    function postthem(Request $request){
        $theloai = new theloai;
        $theloai->ten = $request->input('theloai');
        $theloai->save();
        if($theloai){
            $success = 'Thêm thành công';
        }
        return $success;
    }

    function getthaydoi($id){
    	$data = theloai::find($id);
        return $data;
    }

    function postthaydoi(Request $request){
        //Kiểm tra thể loại
        $check = Validator::make($request->all(), [
            'theloai2' => 'required|min:1|max:20'
        ],[
            'theloai2.required' => "Không được để trống",
            'theloai2.min' => "Số lượng kí tự từ 1-20",
            'theloai2.max' => "Số lượng kí tự từ 1-20"
        ]);
        if($check->fails()){
            return response()->json(['vali' => 'false', 'noti' => $check->messages()]);
        }
        
        //Kiểm tra tính duy nhất
        $theloai = theloai::where('id', '!=', $request->input('id'))->get();
        foreach ($theloai as $key) {
            if(strcasecmp($key->ten, $request->input('theloai2')) == 0){
                return response()->json(['vali' => 'false', 'noti' => ['theloai2' => 'Tên thể loại không được trùng nhau']]);
            }
        }

        //Thay đổi
        $change = theloai::find($request->input('id'));
        $change->ten = $request->input('theloai2');
        $change->save();
        return $change;
    }	

    function getxoa(Request $request, $id){
        $loaisp = loaisanpham::all();
        $theloai = theloai::find($id);
        foreach ($loaisp as $key) {
            if($key->id_theloai == $theloai->id){
                return 'false';
            }
        }
        $theloai->delete();
        return 1;
    }

}

