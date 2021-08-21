<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class sanpham extends Model
{
    use HasFactory;

    protected $table = 'sanpham';

    public function loaisanpham(){
    	return $this->belongsTo('App\Models\loaisanpham', 'id_loaisanpham', 'id');
    }
}
