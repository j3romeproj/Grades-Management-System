<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class Account extends Model implements Authenticatable
{
    use HasFactory, \Illuminate\Auth\Authenticatable, HasApiTokens, Notifiable;

    protected $table = 'account';
    protected $primaryKey = 'account_id';

    protected $fillable = [
        'accountName',
        'password',
        'accountType'
    ];
}
