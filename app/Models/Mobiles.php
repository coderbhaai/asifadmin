<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobiles extends Model
{
    use HasFactory;
    protected $fillable = ['userId', 'mobile'];
    public function scopeSearch($query, $val){
        return $query
        ->where('userId', 'like', '%'.$val.'%')
        ->Orwhere('mobile', 'like', '%'.$val.'%');
    }
}
