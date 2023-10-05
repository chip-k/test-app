<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function bookComments() {
        return $this->hasMany(BookComment::class);
    }
    
    protected $fillable = [
        'title',
        'body',
        'user_id',
        'book_comment_id'
    ];

}
