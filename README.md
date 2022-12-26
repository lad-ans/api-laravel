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
		"DS_BIO_ETIG": "Biografia do Banco de Dados. Pellentesque porttitor, velit lacinia egestas auctor, diam eros tempus arcu, nec vulputate augue magna vel risus. Cras non magna vel ante adipiscing rhoncus. Vivamus a mi. Morbi neque. Aliquam erat volutpat. Integer ultrices lobortis erllamcorper fringilla eros",
		"DS_IMAGEM_URL_ETIG" : "http://indique-e-ganhe-api.herokuapp.com/imagens/profile-placeholder.jpg",
		"DS_IMAGEM_COVER_URL_ETIG" : "http://indique-e-ganhe-api.herokuapp.com/imagens/bg.jpg",
		"DS_TERMO_ACEITACAO_ETIG" : "Termo de Aceitação do Banco de Dados. Pellentesque porttitor, velit lacinia egestas auctor, diam eros tempus arcu, nec vulputate augue magna vel risus. Cras non magna vel ante adipiscing rhoncus. Vivamus a mi. Morbi neque. Aliquam erat volutpat. Integer ultrices lobortis eros. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Proin semper, ante vitae sollicitudin posuere, metus quam iaculis nibh, vitae scelerisque nunc massa eget pede. Sed velit urna, interdum vel, ultricies vel, faucibus at, quam. Donec elit est."
}'
```

### ` Obter Todos `

``` php
curl --request GET \
  --url http://127.0.0.1:8000/api/estabelecimentos/ \
  --header 'Authorization: Bearer 2|OSO4vo7ERWkoL3d2vEC09B7AIM4s7dC9sWKlk3eH'
```
---

### ` Obter Estabelecimento` =>  ` PK_ESTABELECIMENTO_ETIG `

``` php
curl --request GET \
  --url http://127.0.0.1:8000/api/estabelecimentos/1 \
  --header 'Authorization: Bearer 2|OSO4vo7ERWkoL3d2vEC09B7AIM4s7dC9sWKlk3eH'
```
---
---
## USUÁRIO
### ` Login `

``` php
curl --request POST \
  --url https://indique-e-ganhe-api.herokuapp.com/api/login \
  --header 'Authorization: Bearer 1084|67SpsHT9j4byYHG1QPWGRNKlc6YEAmbfY1V8ZfN4' \
  --header 'Content-Type: application/json' \
  --data '{
	"DS_EMAIL_USIG":"ladino@teste.com",
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
  --url http://127.0.0.1:8000/api/usuarios/ \
  --header 'Authorization: Bearer 2|OSO4vo7ERWkoL3d2vEC09B7AIM4s7dC9sWKlk3eH'

```
---

### ` Obter Usuário/Cliente ` =>  ` PK_USUARIO_USIG `

``` php
curl --request GET \
  --url http://127.0.0.1:8000/api/usuarios/1 \
  --header 'Authorization: Bearer 2|OSO4vo7ERWkoL3d2vEC09B7AIM4s7dC9sWKlk3eH'

```

### ` Atualizar pontos Usuário`

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
  --header 'Authorization: Bearer ' \
  --header 'Content-Type: application/json' \
  --data '{ 
	"FK_USUARIO_IJIG": 24,
  "FK_ESTABELECIMENTO_IJIG": 4,
  "TX_JSON_IJIG":  "Indicações json"
}'

```

---
### ` Obter Indicações Sucesso ` => ` FK_USUARIO_ISIG `
``` php
curl --request GET \
  --url https://indique-e-ganhe-api.herokuapp.com/api/indicacoes/sucesso/14 \
  --header 'Authorization: Bearer 1084|67SpsHT9j4byYHG1QPWGRNKlc6YEAmbfY1V8ZfN4' \
  --header 'Content-Type: application/json'
```

---
### ` Obter Indicações Sem-Sucesso ` =>  ` FK_USUARIO_IXIG `

  
```php
curl --request GET \
  --url https://indique-e-ganhe-api.herokuapp.com/api/indicacoes/sem-sucesso/14 \
  --header 'Authorization: Bearer 1084|67SpsHT9j4byYHG1QPWGRNKlc6YEAmbfY1V8ZfN4' \
  --header 'Content-Type: application/json'
```
---

### ` Obter Indicações Aguardando ` =>   ` FK_USUARIO_IAIG `

```php
curl --request GET \
  --url https://indique-e-ganhe-api.herokuapp.com/api/indicacoes/aguardando/24 \
  --header 'Authorization: Bearer 1084|67SpsHT9j4byYHG1QPWGRNKlc6YEAmbfY1V8ZfN4' \
  --header 'Content-Type: application/json'
```

### ` Obter Indicações Json ` =>   ` FK_USUARIO_IJIG `

```php
curl --request GET \
  --url http://127.0.0.1:8000/api/indicacoes/json/ \
  --header 'Authorization: Bearer 2|OSO4vo7ERWkoL3d2vEC09B7AIM4s7dC9sWKlk3eH'
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
  --header 'Authorization: Bearer 1084|67SpsHT9j4byYHG1QPWGRNKlc6YEAmbfY1V8ZfN4' \
  --header 'Content-Type: application/json' \
  --data '{
	"FK_USUARIO_RPIG": 14, 
	"FK_ESTABELECIMENTO_RPIG": 4,
	"DT_PREMIACAO_RPIG": "2022-12-18"
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
	"FK_USUARIO_RPIG": 14,
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