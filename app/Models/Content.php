<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'weight',
        'freq',
    ];

    public function post()
    {
        return $this->belongsto(Post::class);
    }
}
