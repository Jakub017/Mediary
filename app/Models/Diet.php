<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Diet extends Model
{
    use HasFactory, SoftDeletes;

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
