<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Master extends Model
{
    use HasFactory;
    protected $fillable = ['type','name', 'tab1', 'tab2'];
    public function scopeSearch($query, $val){
        return $query
        ->where('masters.type', 'like', '%'.$val.'%')
        ->Orwhere('masters.name', 'like', '%'.$val.'%');
    }
}
