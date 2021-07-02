<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transation extends Model
{
    protected $fillable = [
        'tipo'
    ];

    protected $table = 'transacao';

    public $timestamps = false;

    public static $deposit = 1;

    public static $transfer = 2;

    public static $cellPhoneRecharge = 3;

    public function personalTransationHistory()
    {
        return $this->hasMany('App\Models\PersonalTransationHistory','id');
    }

    public function personalAccount()
    {
        return $this->belongsToMany('App\Models\PersonalAccount','historico_transacao_pessoal', 'id_transacao', 'id_conta_pessoal');
    }
}
