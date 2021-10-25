<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;
    protected $fillable = ['video', 'heading', 'description', 'status'];
    public function scopeSearch($query, $val){
        return $query
        ->where('heading', 'like', '%'.$val.'%')
        ->Orwhere('video', 'like', '%'.$val.'%');
    }
}
