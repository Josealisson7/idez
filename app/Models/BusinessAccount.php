<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BusinessAccount extends Model
{
  protected $fillable = [
    'agencia', 'numero', 'digito', 'cnpj', 'nome_fantasia', 'valor_depositado', 'razao_social', 'id_usuario'
  ];

  protected $table = 'conta_empresarial';

  public $timestamps = false;


  public function user()
  {
      return $this->belongsTo(User::class, 'id_usuario');
  }

}
