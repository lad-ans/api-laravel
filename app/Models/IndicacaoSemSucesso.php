<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicacaoSemSucesso extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "indicacoes_sem_sucesso";
}
