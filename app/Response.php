<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    protected $fillable = [
        'post_id',
        'email',
        'body'
    ];

    public function post() {
        return $this->belongsTo(Post::class);
    }
}
