<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
// use Illuminate\Contracts\Auth\MustVerifyEmail;

class UsuarioSistema extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "usuarios_sistema";
    public $timestamps = false;

    // Avoid: Integrity constraint violation: 1048 Column 'tokenable_id' cannot be null Exception
    protected $primaryKey = 'PK_USUARIO_SISTEMA_USIG';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "PK_USUARIO_SISTEMA_USIG",
        "FK_ESTABELECIMENTO_USIG",
        "DS_NOME_USIG",
        "DS_EMAIL_USIG",
        "DS_TELEFONE_USIG",
        "DS_CELULAR_USIG",
        "DS_LOGIN_USIG",
        "DS_SENHA_USIG",
        "NR_PONTOS_USIG",
        "DT_CADASTRO_USIG",
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'DS_SENHA_USIG',
        'remember_token',
    ];
}
