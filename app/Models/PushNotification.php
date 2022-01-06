<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushNotification extends Model
{
    use HasFactory;
    protected $fillable = ['body'];
    public function scopeSearch($query, $val){
        return $query
        ->where('body', 'like', '%'.$val.'%');
    }
}