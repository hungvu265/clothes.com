<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class theloai extends Model
{
    use HasFactory;

    protected $table = 'theloai';

    public function loaisanpham(){
    	return $this->hasMany('App\Models\loaisanpham', 'id_theloai', 'id');
    } 
}
