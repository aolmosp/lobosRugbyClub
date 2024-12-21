<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Postmark\PostmarkClient;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
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
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function player(): HasOne
    {
        return $this->hasOne(Player::class);
    }

    public function sendPasswordResetNotification($token)
    {

        $url = url("/reset-password/{$token}");
        $client = new PostmarkClient('95504fb8-695b-416b-b52c-0ff485845b41');
        $client->sendEmailWithTemplate(
            "contacto@lobosrugby.club",
            $this->email,
            'password-reset',
            ['target' => $url],
            true,
            null,
            null,
            null,
            null,
            null,
            null,
            null
        );

    
    }
}
