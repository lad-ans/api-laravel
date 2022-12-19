<?php

namespace Database\Seeders;

use App\Utils\Helpers;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsuariosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $termo_aceitacao = "Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Maecenas porttitor congue massa. Fusce posuere, magna sed pulvinar ultricies, purus lectus malesuada libero, sit amet commodo magna eros quis urna. Nunc viverra imperdiet enim. Fusce est. Vivamus a tellus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin pharetra nonummy pede. Mauris et orci.";

        DB::table('tb_usuarios')->insert(
            [
                "id_estabelecimento" => Helpers::generateGuid(),
                "nome_estabelecimento" => "CLINICA XYZ",
                "image_url_estabelecimento" => "https://xyz",
                "cor_principal_estabelecimento" => "#FFFFFF",
                "texto_termo_aceite" => $termo_aceitacao,
                "texto_sobrenos" => "Sobre Nós",
                "texto_sucesso" => "Texto Sucesso",
                "texto_pontos" => "Texto Pontos",
                "texto_aguardando" => "Texto Aguardando",
                "texto_aba_aguardando" => "Texto Aba Aguardando",
                "texto_aba_pontos" => "Texto Aba pontos",
                "texto_aba_sucesso" => "Texto Aba Sucesso",
                "id_usuario" => Helpers::generateGuid(),
                "nome_usuario" => "Ladino",
                "email_usuario" => "ladino@teste.com",
                "senha_usuario" => Hash::make('123'),
                "infos_usuario" => "Trazer outros dados que achar importante",
                "total_pontos_usuario" => 100,
                "premios_usuario" => json_encode(
                    [
                        [
                            "data" => "21/11/2022",
                            "produto_brinde" => "Uma manutenção grátis"
                        ]
                    ]
                )
            ]
        );
    }
}
