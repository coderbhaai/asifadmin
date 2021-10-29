<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;
    protected $fillable = ['userId', 'address','', 'pic'];
    public function scopeSearch($query, $val){
        return $query
        ->where('address', 'like', '%'.$val.'%')
        ->Orwhere('userId', 'like', '%'.$val.'%');
    }
}
