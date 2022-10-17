<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_comment';

    protected $fillable = [
        'id_user',
        'id_movie',
        'text_comment'
    ];

    public function movie()
    {
        return $this->hasOne(Movie::class, 'id_movie', 'id_movie');
    }
}
