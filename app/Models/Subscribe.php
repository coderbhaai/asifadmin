<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscribe extends Model
{
    use HasFactory;
    protected $fillable = ['email','status'];
    public function scopeSearch($query, $val){
        return $query
        ->where('email', 'like', '%'.$val.'%')
        ->Orwhere('status', 'like', '%'.$val.'%');
    }
}
