# DOCUMENTAÇAO DA API
---
---

#### Projecto: Indique e Ganhe
#### Proprietário: Vinícius
---

## ESTABELECIMENTO
---
---

### ` Registar `

``` php
curl --request POST \
  --url https://indique-e-ganhe-api.herokuapp.com/api/registar-estabelecimento \
  --header 'Content-Type: application/json' \
  --data '{
    "DS_NOME_ETIG": "Clíníca Ladino",
    "DS_HOSTBANCO_ETIG": "us-cdbr-east-06.cleardb.net",
    "DS_NOMEBANCO_ETIG": "heroku_b77be8c552d0a22",
    "DS_USERBANCO_ETIG": "b4641ccb595a27",
    "DS_SENHABANCO_ETIG": "cc15931f",
		"DS_CORTITULO_ETIG": "242326",
		"DS_CORICONE_ETIG": "262325",
		"DS_TITULO_PONTOS_ETIG": "",
		"DS_TXTPONTOS_ETIG": "",
		"DS_TITULO_SUCESSO_ETIG": "AMIGOS",
		"DS_TXTSUCESSO_ETIG": "indicados que viraram pacientes.",
		"DS_TITULO_AGUARDANDO_ETIG": "AMIGOS indicados",
		"DS_TXTAGUARDANDO_ETIG": "contato, ou não quiseram realizar o tratamento.",
		"DS_TXTSUCESSO_INDICACAO_ETIG": "Obrigado pelas suas indicações e aceitar autorizar a compartilhar os contatos da sua agenda. \nAs suas bonificações serão realizadas diretamente pela clínica conforme as regras passadas à você. \nMUITO OBRIGADO",
		"DS_BIO_ETIG": "Biografia do Banco de Dados. Pellentesque porttitor, velit lacinia egestas auctor, diam eros tempus arcu, nec vulputate augue magna vel risus. Cras non magna vel ante adipiscing rhoncus. Vivamus a mi. Morbi neque. Aliquam erat volutpat. Integer ultrices lobortis eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin semper, ante vitae sollicitudin posuere, metus quam iaculis nibh, vitae scelerisque nunc massa eget pede. Sed velit urna, interdum vel, ultricies vel, faucibus at, quam. Donec elit est, consectetuer eget, consequat quis, tempus quis, wisi. In in nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Donec ullamcorper fringilla eros",
		"DS_LOGOIMG_URL_ETIG" : "http://indique-e-ganhe-api.herokuapp.com/imagens/profile-placeholder.jpg",
		"DS_FOTO_URL_ETIG" : "http://indique-e-ganhe-api.herokuapp.com/imagens/bg.jpg",
		"DS_TERMO_ACEITACAO_ETIG" : "Termo de Aceitação do Banco de Dados. Pellentesque porttitor, velit lacinia egestas auctor, diam eros tempus arcu, nec vulputate augue magna vel risus. Cras non magna vel ante adipiscing rhoncus. Vivamus a mi. Morbi neque. Aliquam erat volutpat. Integer ultrices lobortis eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin semper, ante vitae sollicitudin posuere, metus quam iaculis nibh, vitae scelerisque nunc massa eget pede. Sed velit urna, interdum vel, ultricies vel, faucibus at, quam. Donec elit est, consectetuer eget, consequat quis, tempus quis, wisi. In in nunc. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos hymenaeos. Donec ullamcorper fringilla eros. Fusce in sapien eu purus dapibus commodo. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Cras faucibus condimentum odio. Sed ac ligula. Aliquam at eros. Etiam at ligula et tellus ullamcorper ultrices. In fermentum, lorem non cursus porttitor, diam urna accumsan lacus, sed interdum wisi nibh nec nisl. Ut tincidunt volutpat urna. Mauris eleifend nulla eget mauris. Sed cursus quam id felis. Curabitur posuere quam vel nibh. Cras dapibus dapibus nisl. Vestibulum quis dolor a felis congue vehicula. Maecenas pede purus, tristique ac, tempus eget, egestas quis, mauris. Curabitur non eros. Nullam hendrerit bibendum justo. Fusce iaculis, est quis lacinia pretium, pede metus molestie lacus, at gravida wisi ante at libero."
}'
```

### ` Obter Todos `

``` php
curl --request GET \
  --url https://indique-e-ganhe-api.herokuapp.com/api/estabelecimentos \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json'
```
---

### ` Obter Estabelecimento` =>  ` PK_ESTABELECIMENTO_ETIG `

``` php
curl --request GET \
  --url https://indique-e-ganhe-api.herokuapp.com/api/estabelecimentos/4 \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json'
```
---
---
## USUÁRIO
### ` Login `

``` php
curl --request POST \
  --url https://indique-e-ganhe-api.herokuapp.com/api/login \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json' \
  --data '{
	"DS_LOGIN_USIG":"ladino",
	"DS_SENHA_USIG":"123"
}'

```
---
### ` Registar `

``` php
curl --request POST \
  --url https://indique-e-ganhe-api.herokuapp.com/api/registar \
  --header 'Content-Type: application/json' \
  --data '{
    "FK_ESTABELECIMENTO_USIG": 4,
    "DS_NOME_USIG": "Ladino Anselmo",
    "DS_EMAIL_USIG": "ladino@teste.com",
    "DS_TELEFONE_USIG": "840552930",
    "DS_CELULAR_USIG": "840552930",
    "DS_LOGIN_USIG": "ladino",
    "DS_SENHA_USIG": "123"
}'
```

### ` Obter Todos `

``` php
curl --request GET \
  --url https://indique-e-ganhe-api.herokuapp.com/api/usuarios \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json'
```
---

### ` Obter Usuário/Cliente ` =>  ` PK_USUARIO_USIG `

``` php
curl --request GET \
  --url http://127.0.0.1:8000/api/usuarios/1 \
  --header 'Authorization: Bearer 2|OSO4vo7ERWkoL3d2vEC09B7AIM4s7dC9sWKlk3eH'

```

### ` Atualizar pontos Usuário/Cliente`

``` php
curl --request PUT \
  --url https://indique-e-ganhe-api.herokuapp.com/api/usuarios/pontos \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json' \
  --data '{
	"PK_USUARIO_USIG": 4,
	"FK_ESTABELECIMENTO_USIG": 4,
	"NR_PONTOS_USIG": 4000
}'
```
---
---
## INDICAÇOES
---

### ` Post Indicações Json `

``` php
curl --request POST \
  --url https://indique-e-ganhe-api.herokuapp.com/api/indicacoes/json \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json' \
  --data '{ 
	"FK_USUARIO_IJIG": 4,
  "FK_ESTABELECIMENTO_IJIG": 4,
  "TX_JSON_IJIG":  "Indicações json"
}'
```

---
### ` Obter Indicações Sucesso `
``` php
curl --request GET \
  --url https://indique-e-ganhe-api.herokuapp.com/api/indicacoes/sucesso \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json' \
  --data '{
	"FK_USUARIO_ISIG": 4,
	"FK_ESTABELECIMENTO_ISIG": 4
}'
```

---
### ` Obter Indicações Sem-Sucesso `

  
```php
curl --request GET \
  --url https://indique-e-ganhe-api.herokuapp.com/api/indicacoes/aguardando \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json' \
  --data '{
	"FK_USUARIO_IXIG": 4,
	"FK_ESTABELECIMENTO_IXIG": 4
}'
```
---

### ` Obter Indicações Aguardando `

```php
curl --request GET \
  --url https://indique-e-ganhe-api.herokuapp.com/api/indicacoes/aguardando \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json' \
  --data '{
	"FK_USUARIO_IAIG": 4,
	"FK_ESTABELECIMENTO_IAIG": 4
}'
```

### ` Obter Indicações Json `

```php
curl --request GET \
  --url https://indique-e-ganhe-api.herokuapp.com/api/indicacoes/json \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json' \
  --data '{
	"FK_USUARIO_IJIG": 4,
	"FK_ESTABELECIMENTO_IJIG": 4
}'
```
---
## RESGATES
---

### ` Post Resgate `

``` php
curl --request POST \
  --url https://indique-e-ganhe-api.herokuapp.com/api/resgates/pontos \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json' \
  --data '{
	"FK_USUARIO_RGIG": 4, 
	"FK_ESTABELECIMENTO_RGIG": 4,
	"NR_PONTOS_RGIG": 400000
}	'
```
---
### ` Post Resgate Prémio `

``` php
curl --request POST \
  --url https://indique-e-ganhe-api.herokuapp.com/api/resgates/premio \
  --header 'Authorization: Bearer 3984|BT8XnWeP3u8I8fdTdhUwvjbzDqeaUjs5toNDRg8I' \
  --header 'Content-Type: application/json' \
  --data '{
	"FK_USUARIO_RPIG": 4, 
	"FK_ESTABELECIMENTO_RPIG": 4,
	"DS_PREMIO_RPIG": "Uma manutenção básica",
	"DT_PREMIACAO_RPIG": "2022-12-18",
	"FK_PRODUTO_RPIG": 4
}'
```
---
### ` Obter Resgate Prémio `

``` php
curl --request GET \
  --url https://indique-e-ganhe-api.herokuapp.com/api/resgates/premio \
  --header 'Authorization: Bearer 1084|67SpsHT9j4byYHG1QPWGRNKlc6YEAmbfY1V8ZfN4' \
  --header 'Content-Type: application/json' \
  --data '{
	"FK_USUARIO_RPIG": 44,
	"FK_ESTABELECIMENTO_RPIG": 4
}'
```
---
### ` Upload `

```php
curl --request POST \
  --url https://indique-e-ganhe-api.herokuapp.com/api/upload \
  --header 'Authorization: Bearer 1084|67SpsHT9j4byYHG1QPWGRNKlc6YEAmbfY1V8ZfN4' \
  --header 'Content-Type: multipart/form-data' \
  --form 'imagem=@C:\Users\ladans.io\Pictures\profile-placeholder.jpg'
```