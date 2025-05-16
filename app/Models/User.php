<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Weight;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Jetstream\HasProfilePhoto;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'height',
        'weight',
        'birthday',
        'age',
        'gender', 'diseases', 'wbc', 'rbc', 'hgb', 'hct', 'mcv', 'mch', 'mchc', 'plt', 'rdw_sd', 'rdw_cv', 'pdw', 'mpv', 'p_lcr', 'pct', 'neu',
    'lym', 'mono', 'eos', 'baso', 'tsh', 'ast', 'alt', 'bilirubin',
    'alp', 'ggtp', 'total_cholesterol', 'hdl_cholesterol',
    'non_hdl_cholesterol', 'ldl_cholesterol', 'triglycerides',
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
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
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

    public function weights() {
        return $this->hasMany(Weight::class);
    }

    public function blood_pressures() {
        return $this->hasMany(BloodPressure::class);
    }
}
