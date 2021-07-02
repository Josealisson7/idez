<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'nome', 'sobrenome', 'cpf', 'telefone', 'email', 'senha'
    ];

    protected $table = 'usuario';

    public $timestamps = false;

    public function businessAccount()
    {
        return $this->hasOne('App\Models\BusinessAccount','id');
    }

    public function personalAccount()
    {
        return $this->hasOne('App\Models\PersonalAccount','id');
    }
}
