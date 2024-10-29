<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Replies extends Model
{
    protected $table = 'replies';
    
    protected $guarded = ['id'];

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
