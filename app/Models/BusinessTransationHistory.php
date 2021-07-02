<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessTransationHistory extends Model
{
    protected $fillable = [
        'id_conta_empresarial', 'id_transacao', 'valor_transacao'
    ];

    protected $table = 'historico_transacao_empresarial';

    public $timestamps = false;

    public function transation()
    {
        return $this->belongsTo(Transation::class, 'id_conta_empresarial');
    }
}
