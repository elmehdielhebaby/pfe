<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Client extends Authenticatable
{
    use HasFactory,HasFactory,Notifiable;

    protected $fillable = [
        // 'user_id',
        'name',
        'email',
        'password',
        'etablissement_id',
        'phone',
        'adresse',
        'cin',
        'age',
        'genre',
    ];
}
