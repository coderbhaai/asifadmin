<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coursereview extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'courseid', 'userid', 'review', 'rating', 'status'];
    public function scopeSearch($query, $val){
        return $query
        ->where('coursereviews.courseid', 'like', '%'.$val.'%');
    }
}