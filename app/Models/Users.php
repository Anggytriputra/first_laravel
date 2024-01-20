<?php

namespace App\Models;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;

class Users  extends Model
{
    use HasFactory, AuthenticatableTrait;

    protected $fillable =[
        "name", "username", "email", "password", "remember_token"
    ];
}
