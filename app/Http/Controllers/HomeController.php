<?php

namespace App\Http\Controllers;

use App\Models\IndicacaoAguardando;
use App\Models\IndicacaoJson;
use App\Models\IndicacaoSemSucesso;
use App\Models\IndicacaoSucesso;
use App\Models\Produto;
use App\Models\Resgate;
use App\Models\ResgatePremio;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{

    public function obterIndicacoesSucesso(Request $request)
    {
        $rules = array(
            "FK_USUARIO_ISIG" => "required",
            "FK_ESTABELECIMENTO_ISIG" => "required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {
            try {
                $result = IndicacaoSucesso::where("FK_USUARIO_ISIG", $request->FK_USUARIO_ISIG)->where("FK_ESTABELECIMENTO_ISIG", $request->FK_ESTABELECIMENTO_ISIG)->get();
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
                            "data" => $result
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

    public function obterIndicacoesSemSucesso(Request $request)
    {
        $rules = array(
            "FK_USUARIO_IXIG" => "required",
            "FK_ESTABELECIMENTO_IXIG" => "required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {
            try {
                $result = IndicacaoSemSucesso::where("FK_USUARIO_IXIG", $request->FK_USUARIO_IXIG)->where("FK_ESTABELECIMENTO_IXIG", $request->FK_ESTABELECIMENTO_IXIG)->get();

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
                            "data" => $result
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

    public function obterIndicacoesAguardando(Request $request)
    {
        $rules = array(
            "FK_USUARIO_IAIG" => "required",
            "FK_ESTABELECIMENTO_IAIG" => "required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {   
            try {
                $result = IndicacaoAguardando::where("FK_USUARIO_IAIG", $request->FK_USUARIO_IAIG)->where("FK_ESTABELECIMENTO_IAIG", $request->FK_ESTABELECIMENTO_IAIG)->get();

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
                            "data" => $result
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

    public function obterIndicacoesJson(Request $request)
    {
        $rules = array(
            "FK_USUARIO_IJIG" => "required",
            "FK_ESTABELECIMENTO_IJIG" => "required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {
            try {
                $result = IndicacaoJson::where("FK_USUARIO_IJIG", $request->FK_USUARIO_IJIG)->where("FK_ESTABELECIMENTO_IJIG", $request->FK_ESTABELECIMENTO_IJIG)->get();

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
                            "data" => $result
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

    public function postIndicacoesJson(Request $request)
    {

        $rules = array("FK_USUARIO_IJIG" => "required", "TX_JSON_IJIG" => "required");
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {

            try {
                $indicacaoJson = new IndicacaoJson();

                $indicacaoJson->FK_USUARIO_IJIG = $request->FK_USUARIO_IJIG;
                $indicacaoJson->FK_ESTABELECIMENTO_IJIG = $request->FK_ESTABELECIMENTO_IJIG;
                $indicacaoJson->TX_JSON_IJIG = $request->TX_JSON_IJIG;;
                $indicacaoJson->DT_INDICACAO_IJIG = date('Y-m-d H:i:s');

                $result = $indicacaoJson->save();

                if ($result) {
                    return response(
                        [
                            "status_code" => 200,
                            "success" => true,
                            "message" => "Indicações feitas com sucesso."
                        ],
                        200
                    );
                } else {
                    return response(
                        [
                            "status_code" => 500,
                            "success" => false,
                            "message" => "Não foi possível salvar as indicações no banco."
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

    public function obterProdutos($idEst = null)
    {
        try {
            $result = $idEst ? Produto::where("FK_ESTABELECIMENTO_PRIG", $idEst)->first() : Produto::all();

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
                        "data" => $result
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

    public function postResgatePontos(Request $request)
    {

        $rules = array(
            "FK_USUARIO_RGIG" => "required",
            "FK_ESTABELECIMENTO_RGIG" => "required",
            "NR_PONTOS_RGIG" => "required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {

            try {
                $usuarioPontosAtualizado = Usuario::where("PK_USUARIO_USIG", $request->FK_USUARIO_RGIG)->where("FK_ESTABELECIMENTO_USIG", $request->FK_ESTABELECIMENTO_RGIG)->update(["NR_PONTOS_USIG" => 0]);

                if ($usuarioPontosAtualizado) {
                    $resgate = new Resgate();
    
                    $resgate->FK_USUARIO_RGIG = $request->FK_USUARIO_RGIG;
                    $resgate->FK_ESTABELECIMENTO_RGIG = $request->FK_ESTABELECIMENTO_RGIG;
                    $resgate->NR_PONTOS_RGIG = $request->NR_PONTOS_RGIG;
                    $resgate->DS_STATUS_RGIG = "R";
    
                    $result = $resgate->save();
    
                    if ($result) {
                        return response(
                            [
                                "status_code" => 200,
                                "success" => true,
                                "message" => "Resgate feito com sucesso."
                            ],
                            200
                        );
                    } else {
                        return response(
                            [
                                "status_code" => 500,
                                "success" => false,
                                "message" => "Ocorreu um erro ao efetuar o resgate de seus pontos."
                            ],
                            500
                        );
                    }
                } else {
                    return response(
                        [
                            "status_code" => 500,
                            "success" => false,
                            "message" => "Ocorreu um erro ao atualizar os dados deste usuário."
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

    public function postResgatePremio(Request $request)
    {

        $rules = array(
            "FK_USUARIO_RPIG" => "required",
            "FK_ESTABELECIMENTO_RPIG" => "required",
            "DT_PREMIACAO_RPIG" => "required",
            "FK_PRODUTO_RPIG" => "required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {

            try {
                $hasProduto = Produto::where("PK_PRODUTO_PRIG", $request->FK_PRODUTO_RPIG)->first();
                if ($hasProduto) {
                    $resgatePremio = new ResgatePremio();
        
                    $resgatePremio->FK_USUARIO_RPIG = $request->FK_USUARIO_RPIG;
                    $resgatePremio->FK_ESTABELECIMENTO_RPIG = $request->FK_ESTABELECIMENTO_RPIG;
                    $resgatePremio->DS_PREMIO_RPIG = $request->DS_PREMIO_RPIG;
                    $resgatePremio->FK_PRODUTO_RPIG = $request->FK_PRODUTO_RPIG;
                    $resgatePremio->DT_PREMIACAO_RPIG = $request->DT_PREMIACAO_RPIG;
        
                    $result = $resgatePremio->save();
        
                    if ($result) {
                        return response(
                            [
                                "status_code" => 200,
                                "success" => true,
                                "message" => "Resgate do prémio feito com sucesso."
                            ],
                            200
                        );
                    } else {
                        return response(
                            [
                                "status_code" => 500,
                                "success" => false,
                                "message" => "Não foi possível efetuar o resgate do prémio."
                            ],
                            500
                        );
                    }
                } else {
                    return response(
                        [
                            "status_code" => 500,
                            "success" => false,
                            "message" => "Não foi encontrado nenhum produto associado ao ID."
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

    public function obterPremios(Request $request)
    {
        $rules = array(
            "FK_USUARIO_RPIG" => "required",
            "FK_ESTABELECIMENTO_RPIG" => "required",
        );

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 500);
        } else {

            try {
                $premios = ResgatePremio::where("FK_USUARIO_RPIG", $request->FK_USUARIO_RPIG)->where("FK_ESTABELECIMENTO_RPIG", $request->FK_ESTABELECIMENTO_RPIG)->get();
    
                if ($premios && !empty($premios)) {
    
                    foreach ($premios as $key => $premio) {
                        $produto = Produto::where("PK_PRODUTO_PRIG", $premio->FK_PRODUTO_RPIG)->first();
                        if ($produto) {
                            $premio->DS_PREMIO_RPIG = $produto->DS_NOME_PRIG;
                            $premios[$key] = $premio;
                        }
                    }
    
                    return response(
                        [
                            "success" => true,
                            "status_code" => 200,
                            "data" => [
                                "premios" => $premios,
                            ]
                        ],
                        200
                    );
                } else {
                    return response(
                        [
                            "success" => false,
                            "status_code" => 404,
                            "data" => $premios
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

    public function upload(Request $request): string
    {
        try {
            $name = $request->file('imagem')->getClientOriginalName();
            $request->file('imagem')->storeAs('imagens', $name);
            $path = $request->file('imagem')->move(public_path('imagens'), $name);
    
            $url = URL::asset('imagens/' . $name);
    
            if ($path) {
                return response()->json(["status_code" => 200, "success" => true, "data" => $url]);
            } else {
                return response(
                    [
                        "status_code" => 500,
                        "success" => false,
                        "message" => "Não foi possível carregar o ficheiro pretendido."
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
