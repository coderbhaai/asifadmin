<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{
    use HasFactory;
    protected $fillable = ['blogId', 'c_order', 'commentId', 'user', 'email', 'comment', 'status'];
    public function scopeSearch($query, $val){
        return $query
        ->where('user', 'like', '%'.$val.'%')
        ->Orwhere('email', 'like', '%'.$val.'%')
        ->Orwhere('status', 'like', '%'.$val.'%');
    }
}
