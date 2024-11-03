<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';
    
    protected $guarded = ['id'];

    protected $casts = ['comment_id' => 'array'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment(){
            
            return $this->hasMany(Comment::class);
    }
}
