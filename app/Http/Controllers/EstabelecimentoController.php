<?php

namespace App\Http\Controllers;

use App\Models\Estabelecimento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EstabelecimentoController extends Controller
{

    public function registar(Request $request)
    {

        $rules = array(
            "DS_HOSTBANCO_ETIG" => "required",
            "DS_NOMEBANCO_ETIG" => "required",
            "DS_USERBANCO_ETIG" => "required",
            "DS_NOME_ETIG" => "required",
            "DS_IMAGEM_URL_ETIG" => "required",
            "DS_IMAGEM_COVER_URL_ETIG" => "required",
            "DS_TERMO_ACEITACAO_ETIG" => "required",
            "DS_BIO_ETIG" => "required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {

            try {
                $estabelecimento = new Estabelecimento();
    
                $senhaBanco = $request->DS_SENHABANCO_ETIG;
    
                $estabelecimento->DS_NOME_ETIG = $request->DS_NOME_ETIG;
                $estabelecimento->DS_BIO_ETIG = $request->DS_BIO_ETIG;
                $estabelecimento->DS_IMAGEM_URL_ETIG = $request->DS_IMAGEM_URL_ETIG;
                $estabelecimento->DS_IMAGEM_COVER_URL_ETIG = $request->DS_IMAGEM_COVER_URL_ETIG;
                $estabelecimento->DS_TERMO_ACEITACAO_ETIG = $request->DS_TERMO_ACEITACAO_ETIG;
                $estabelecimento->DS_PORTBANCO_ETIG = $request->DS_PORTBANCO_ETIG;
                $estabelecimento->DS_HOSTBANCO_ETIG = $request->DS_HOSTBANCO_ETIG;
                $estabelecimento->DS_NOMEBANCO_ETIG = $request->DS_NOMEBANCO_ETIG;
                $estabelecimento->DS_USERBANCO_ETIG = $request->DS_USERBANCO_ETIG;
                $estabelecimento->DS_SENHABANCO_ETIG = $senhaBanco ? $senhaBanco : "";
                $estabelecimento->DT_CADASTRO_ETIG = date('Y-m-d H:i:s');
    
                $result = $estabelecimento->save();
    
                if ($result) {
    
                    $result = ["estabelecimento" => $estabelecimento];
    
                    return response()->json(["status_code" => 200, "success" => true, "data" => $result]);
                } else {
                    return response(
                        [
                            "status_code" => 500,
                            "success" => false,
                            "message" => "Não foi possível cadastrar o estabelecimento."
                        ],
                        500
                    );
                }
            } catch (\Throwable $th) {
                response(
                    [
                        "success" => false,
                        "status_code" => 500,
                        "message" => $$th
                    ],
                    500
                );
            }
        }
    }

    public function obter($idEstabelecimento = null)
    {
        try {
            if ($idEstabelecimento) {
                $result = estabelecimento::where('PK_ESTABELECIMENTO_ETIG', $idEstabelecimento)->first();
            } else {
                $result = estabelecimento::all();
            }
    
            if ($result) {
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
            response(
                [
                    "success" => false,
                    "status_code" => 500,
                    "message" => $$th
                ],
                500
            );
        }
    }
}
