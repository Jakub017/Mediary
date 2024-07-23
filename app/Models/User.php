<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Diet;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'age',
        'birthday',
        'gender',
        'height',
        'weight',
        'wbc',
        'rbc',
        'hgb',
        'hct',
        'mcv',
        'mch',
        'mchc',
        'plt',
        'rdw_sd',
        'rdw_cv',
        'pdw',
        'mpv',
        'p_lcr',
        'pct',
        'neu',
        'lym',
        'mono',
        'eos',
        'baso',
        'blood_recommendations',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function diets() {
        return $this->hasMany(Diet::class);
    }

}
