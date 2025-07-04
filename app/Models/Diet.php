<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type',
        'calories',
        'meals',
        'like', 
        'dislike',
        'notes',
        'documents',
        'user_id',
        'content',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
