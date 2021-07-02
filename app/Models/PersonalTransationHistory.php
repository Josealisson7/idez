<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalTransationHistory extends Model
{
    protected $fillable = [
        'id_conta_pessoal', 'id_transacao', 'valor_transacao'
    ];

    protected $table = 'historico_transacao_pessoal';

    public $timestamps = false;

    public function transation()
    {
        return $this->belongsTo(Transation::class, 'id_transacao');
    }

    public function personalAccount()
    {
        return $this->belongsTo(Transation::class, 'id_conta_pessoal');
    }
}
