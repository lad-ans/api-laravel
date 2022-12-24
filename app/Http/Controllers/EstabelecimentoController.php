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
            "DS_LOGOIMG_URL_ETIG" => "required",
            "DS_FOTO_URL_ETIG" => "required",
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
                $estabelecimento->DS_LOGOIMG_URL_ETIG = $request->DS_LOGOIMG_URL_ETIG;
                $estabelecimento->DS_FOTO_URL_ETIG = $request->DS_FOTO_URL_ETIG;
                $estabelecimento->DS_TERMO_ACEITACAO_ETIG = $request->DS_TERMO_ACEITACAO_ETIG;
                $estabelecimento->DS_PORTBANCO_ETIG = $request->DS_PORTBANCO_ETIG;
                $estabelecimento->DS_HOSTBANCO_ETIG = $request->DS_HOSTBANCO_ETIG;
                $estabelecimento->DS_NOMEBANCO_ETIG = $request->DS_NOMEBANCO_ETIG;
                $estabelecimento->DS_USERBANCO_ETIG = $request->DS_USERBANCO_ETIG;
                $estabelecimento->DS_SENHABANCO_ETIG = $senhaBanco ? $senhaBanco : "";
                $estabelecimento->DS_CORTITULO_ETIG =  $request->DS_CORTITULO_ETIG;
                $estabelecimento->DS_CORICONE_ETIG =  $request->DS_CORICONE_ETIG;
                $estabelecimento->DS_TITULO_PONTOS_ETIG =  $request->DS_TITULO_PONTOS_ETIG;
                $estabelecimento->DS_TXTPONTOS_ETIG =  $request->DS_TXTPONTOS_ETIG;
                $estabelecimento->DS_TITULO_SUCESSO_ETIG =  $request->DS_TITULO_SUCESSO_ETIG;
                $estabelecimento->DS_TXTSUCESSO_ETIG =  $request->DS_TXTSUCESSO_ETIG;
                $estabelecimento->DS_TITULO_AGUARDANDO_ETIG =  $request->DS_TITULO_AGUARDANDO_ETIG;
                $estabelecimento->DS_TXTAGUARDANDO_ETIG =  $request->DS_TXTAGUARDANDO_ETIG;
                $estabelecimento->DS_TXTSUCESSO_INDICACAO_ETIG =  $request->DS_TXTSUCESSO_INDICACAO_ETIG;
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
