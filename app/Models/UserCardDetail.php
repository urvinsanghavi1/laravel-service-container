<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class UserCardDetail extends Model
{
    use HasFactory, HasApiTokens;

    protected $fillable = [
        'card_number',
        'name_on_card',
        'expiry_date',
        'cvv',
        'bank_name',
        'user_id'
    ];

}
