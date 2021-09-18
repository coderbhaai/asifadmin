<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;
    protected $fillable = ['url','title', 'cover_img', 'smallImg', 'content', 'category', 'tag'];
    public function scopeSearch($query, $val){
        return $query
        ->where('url', 'like', '%'.$val.'%')
        ->Orwhere('title', 'like', '%'.$val.'%');
    }
}
