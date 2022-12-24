<?php

use App\Http\Controllers\EstabelecimentoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/// ******* USUÁRIO *******
//login
Route::post('login', [UsuarioController::class, 'login']);
//cadastro
Route::post('registar', [UsuarioController::class, 'registar']);

/// ******* ESTABELECIMENTO *******
//cadastrar estabelecimento
Route::post('registar-estabelecimento', [EstabelecimentoController::class, 'registar']);

/// ******* UPLOAD *******
//carregar ficheiro(imagem do estabelecimento) e retorna url
Route::post('upload', [HomeController::class, 'upload']);

/// Rotas com proteção de autenticação
Route::group(['middleware' => 'auth:sanctum'], function () {
    
    /// ******* USUÁRIO *******
    //obter usuário (se passar o idUsuario depois da barra, obtem o usuário relacionado ao ID, 
    //se não passar nada, obtém todos usuários) - ex: urlBase/usuarios/2 => retorna 1 usuário. urlBase/usuarios => todos
    //@param {int idUsuario?}
    Route::get('usuarios/{idUsuario?}', [UsuarioController::class, 'obter']);

    // ******* ESTABELECIMENTO *******
    //obter estabelecimento (se passar o idEstabelecimento depois da barra, obtem o estabelecimento relacionado ao ID, 
    //se não passar nada, obtém todos estabelecimentos) - ex: urlBase/estabelecimentos/4 => retorna 1 estabelecimento. urlBase/estabelecimentos => todos
    //@param {int idEstabelecimento?}
    Route::get('estabelecimentos/{idEstabelecimento?}', [UsuarioController::class, 'obter']);

    /// ******* INDICAÇÕES *******
    //obter indicacoes-sucesso relacionadas ao usuário
    //@param {json}
    Route::get('indicacoes/sucesso', [HomeController::class, 'obterIndicacoesSucesso']);
    
    //obter indicacoes-sem-sucesso relacionadas ao usuário 
    //@param {json}
    Route::get('indicacoes/sem-sucesso', [HomeController::class, 'obterIndicacoesSemSucesso']);
    
    //obter indicacoes-aguardando relacionadas ao usuário
    //@param {json}
    Route::get('indicacoes/aguardando', [HomeController::class, 'obterIndicacoesAguardando']);
    
    //obter indicacoesjson relacionadas ao usuário
    //@param {json}
    Route::get('indicacoes/json', [HomeController::class, 'obterIndicacoesJson']);
    
    //faz o post de indicações json
    Route::post('indicacoes/json', [HomeController::class, 'postIndicacoesJson']);
    
    /// ******* RESGATES *******
    //obter premios relacionadas ao usuário e estabelecimento
    Route::get('resgates/premio', [HomeController::class, 'obterPremios']);
    
    //faz post de resgate (pontos)
    Route::post('resgates', [HomeController::class, 'postResgate']);
    
    //atualiza status de resgate (pontos) para 'r' ou 'nr' (r: resgatado; nr: não-resgatado)
    //@param {int id?}
    Route::put('resgates/{id?}', [HomeController::class, 'putResgate']);
    
    //faz post de resgate de prémios (pontos)
    Route::post('resgates/premio', [HomeController::class, 'postResgatePremio']);

    /// ******* PRODUTOS *******
    //obter produtos relacionadas ao estabelecimento
    //@param {int idEst?}
    Route::get('produtos/{idEst?}', [HomeController::class, 'obterProdutos']);
});
