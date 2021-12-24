<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'body', 'img'];
    public function scopeSearch($query, $val){
        return $query
        ->where('title', 'like', '%'.$val.'%')
        ->Orwhere('body', 'like', '%'.$val.'%');
    }
}