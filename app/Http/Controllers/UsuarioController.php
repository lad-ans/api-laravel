<?php

namespace App\Http\Controllers;

use App\Models\Estabelecimento;
use App\Models\Resgate;
use App\Models\Usuario;
use CustomConnection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    public function login(Request $request)
    {
        $rules = array("DS_LOGIN_USIG" => "required", "DS_SENHA_USIG" => "required");
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {
            try {
                $usuario = Usuario::where('DS_LOGIN_USIG', $request->DS_LOGIN_USIG)->first();
                $est = $usuario ? Estabelecimento::where('PK_ESTABELECIMENTO_ETIG', $usuario->FK_ESTABELECIMENTO_USIG)->first() : null;
    
                if (!$usuario || !Hash::check($request->DS_SENHA_USIG, $usuario->DS_SENHA_USIG)) {
    
                    return response(
                        [
                            "success" => false,
                            "status_code"  => 404,
                            "message" => "Usuário não encontrado."
                        ]
                    );
                }
    
                $pontosResult = Resgate::where("FK_USUARIO_RGIG", $usuario->PK_USUARIO_USIG)->where("DS_STATUS_RGIG", "nr")->first();
    
                $meta = null;
                if ($pontosResult) {
                    $usuario->NR_PONTOS_USIG = $pontosResult->NR_PONTOS_RGIG;
                    $meta = ["PK_RESGATE_RGIG" => $pontosResult->PK_RESGATE_RGIG];
                }
    
                CustomConnection::criarNovaConexaoComBanco($est);
    
                $token = $usuario->createToken('my-app-token')->plainTextToken;
    
                $result = ["usuario" => $usuario, "estabelecimento" => $est, "token" => $token, "meta" => $meta];
    
                return response()->json(["status_code" => 200, "success" => true, "data" => $result]);
            } catch (\Throwable $th) {
                return response(
                    [
                        "success" => false,
                        "status_code" => 500,
                        "message" => $th
                    ],
                    500
                );
            }
        }
    }


    public function registar(Request $request)
    {
        $rules = array(
            "FK_ESTABELECIMENTO_USIG" => "required",
            "DS_NOME_USIG" => "required",
            "DS_EMAIL_USIG" => "required",
            "DS_TELEFONE_USIG" => "required",
            "DS_CELULAR_USIG" => "required",
            "DS_LOGIN_USIG" => "required",
            "DS_SENHA_USIG" => "required",
        );
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {

            try {
                $usuarioResult = Usuario::where('DS_LOGIN_USIG', $request->DS_LOGIN_USIG)->first();

                if ($usuarioResult) {
                    return response(
                        [
                            "success" => false,
                            "status_code" => 500,
                            "message" => "Este usuário existe em nossos registros. Por favor, escolha outro!"
                        ],
                        500
                    );
                }

                $usuario = new Usuario();
    
                $usuario->FK_ESTABELECIMENTO_USIG = $request->FK_ESTABELECIMENTO_USIG;
                $usuario->DS_NOME_USIG = $request->DS_NOME_USIG;
                $usuario->DS_EMAIL_USIG = $request->DS_EMAIL_USIG;
                $usuario->DS_TELEFONE_USIG = $request->DS_TELEFONE_USIG;
                $usuario->DS_CELULAR_USIG = $request->DS_CELULAR_USIG;
                $usuario->DS_LOGIN_USIG = $request->DS_LOGIN_USIG;
                $usuario->DS_SENHA_USIG = Hash::make($request->DS_SENHA_USIG);
                $usuario->DT_CADASTRO_USIG = date('Y-m-d H:i:s');
    
                $result = $usuario->save();
    
                if ($result) {
    
                    $token = $usuario->createToken('my-app-token')->plainTextToken;
    
                    $result = ["usuario" => $usuario, "token" => $token];
    
                    return response()->json(["status_code" => 200, "success" => true, "data" => $result]);
                } else {
                    return response(
                        [
                            "status_code" => 500,
                            "success" => false,
                            "message" => "Não foi possível cadastrar o usuário."
                        ],
                        500
                    );
                }
            } catch (\Throwable $th) {
                return response(
                    [
                        "success" => false,
                        "status_code" => 500,
                        "message" => $th->getMessage()
                    ],
                    500
                );
            }
        }
    }

    public function obter($idUsuario = null)
    {
        try {
            if ($idUsuario) {
                $result = Usuario::where('PK_USUARIO_USIG', $idUsuario)->first();
            } else {
                $result = Usuario::all();
            }
    
            if ($result) {
                $pontosResult = Resgate::where("FK_USUARIO_RGIG", $idUsuario)->first();
                $result->NR_PONTOS_USIG = $pontosResult->NR_PONTOS_RGIG;
                return response(
                    [
                        "success" => true,
                        "status_code" => 200,
                        "data" => $result
                    ],
                    200
                );
            } else {
                return response(
                    [
                        "success" => false,
                        "status_code" => 500,
                        "message" => "Nada encontrado"
                    ],
                    500
                );
            }
        } catch (\Throwable $th) {
            return response(
                [
                    "success" => false,
                    "status_code" => 500,
                    "message" => $th
                ],
                500
            );
        }
    }
}
