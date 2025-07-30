<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DietDay extends Model
{
    protected $fillable = ['diet_id', 'day', 'protein', 'fat', 'carbohydrates', 'content'];

    public function diet() {
        return $this->belongsTo(Diet::class);
    }
}
