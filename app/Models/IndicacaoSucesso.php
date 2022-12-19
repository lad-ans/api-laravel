<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicacaoSucesso extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "indicacoes_sucesso";
}
