<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['url', 'name', 'image', 'shortdesc', 'longdesc', 'price', 'sale', 'status', 'rating'];
    public function scopeSearch($query, $val){
        return $query
        ->where('name', 'like', '%'.$val.'%')
        ->Orwhere('url', 'like', '%'.$val.'%');
    }
}