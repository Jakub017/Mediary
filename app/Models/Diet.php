<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use HasFactory;

    protected $fillable = [
        'diet_name',
        'diet_kcal',
        'meals_count',
        'diet_like',
        'diet_type', 
        'diet_other_notes',
        'diet_not_like',
        'content',
        'user_id',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
