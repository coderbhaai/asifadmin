<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'url','name', 'images', 'shortdesc', 'longdesc', 'additional', 'category', 'tag', 'price', 'sale', 'rating', 'status'];
    public function scopeSearch($query, $val){
        return $query
        ->where('url', 'like', '%'.$val.'%')
        ->Orwhere('name', 'like', '%'.$val.'%');
    }
}
