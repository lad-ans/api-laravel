<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndicacaoAguardando extends Model
{
    use HasFactory;
    
    public $timestamps = false;
    protected $table = "indicacoes_aguardando";
}
