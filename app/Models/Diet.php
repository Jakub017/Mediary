<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'kcal',
        'dishes_count',
        'like',
        'not_like',
        'content',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
