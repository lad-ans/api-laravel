<?php

use App\Models\Estabelecimento;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class CustomConnection {
    static function criarNovaConexaoComBanco(Estabelecimento $est) {
        DB::disconnect('mysql');
        
        Config::set("database.connections.mysql", [
            "driver" => "mysql",
            "port" => $est->DS_PORTBANCO_ETIG,
            "host" => $est->DS_HOSTBANCO_ETIG,
            "database" => $est->DS_NOMEBANCO_ETIG,
            "username" => $est->DS_USERBANCO_ETIG,
            "password" => $est->DS_SENHABANCO_ETIG,
        ]);
    }
}