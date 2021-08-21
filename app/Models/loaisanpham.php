<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class loaisanpham extends Model
{
    use HasFactory;

    protected $table = 'loaisanpham';

    public function theloai(){
    	return $this->belongsTo('App\Models\theloai', 'id_theloai', 'id');
    }

    public function sanpham(){
    	return $this->hasMany('App\Models\sanpham', 'id_loaisanpham', 'id');
    }
}
