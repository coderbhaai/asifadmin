<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blogmeta extends Model
{
    use HasFactory;
    protected $fillable = ['url','type', 'name'];
    public function scopeSearch($query, $val){
        return $query
        ->where('blogmetas.url', 'like', '%'.$val.'%')
        ->Orwhere('blogmetas.type', 'like', '%'.$val.'%')
        ->Orwhere('blogmetas.name', 'like', '%'.$val.'%');
    }
}
