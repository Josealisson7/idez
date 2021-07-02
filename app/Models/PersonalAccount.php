<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalAccount extends Model
{
  protected $fillable = [
    'agencia', 'numero', 'digito', 'cpf', 'valor_depositado', 'id_usuario'
  ];

  protected $table = 'conta_pessoal';

  public $timestamps = false;

  public function user()
  {
      return $this->belongsTo(User::class, 'id_usuario');
  }

  public function personalTransationHistory()
  {
      return $this->hasMany('App\Models\PersonalTransationHistory','id');
  }

  public function transation()
  {
      return $this->belongsToMany(Transation::class,'historico_transacao_pessoal', 'id_transacao', 'id_conta_pessoal');
  }
  
}
