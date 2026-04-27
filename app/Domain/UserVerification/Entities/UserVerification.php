<?php

namespace App\Domain\UserVerification\Entities;

use Illuminate\Database\Eloquent\Model;

class UserVerification extends Model 
{
    protected $fillable = [
        'user_id',
        'verified_at',
        'token
        token_expires_at',
        'notified',
    ];
}
