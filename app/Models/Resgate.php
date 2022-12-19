<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resgate extends Model
{
    use HasFactory;
    protected $table = "resgates";
    public $timestamps = false;

    protected $fillable = [
        "FK_USUARIO_RGIG",
        "FK_ESTABELECIMENTO_RGIG",
        "NR_PONTOS_RGIG",
        "DS_STATUS_RGIG"
    ];
}
