# API - Avaliação Gazin - Guilherme Pacheco

<br>
<br>

## Comandos para executar o projeto:

No diretório do Projeto  Executar:

## `docker-compose build`
## `docker-compose up -d`

Ao Finalizar execução dos comandos acima, executar:

## Script do Banco de Dados
Pasta `SQL`, arquivo `all.sql`. Basta rodar os comandos sqls dentro do banco de dados;

# Rotas Disponíveis

Obs.: Todos os métodos possuem autenticação Basic Auth
Acessos:
user: devs
senha: teste123

### Method: `GET` Host: `http://localhost:8081/developers?id=`
Esta rota busca um desenvolvedor especifico conforme o id informado (informar o id no final);

### Method: `GET` Host: `http://localhost:8081/developer`
Esta rota busca todos desenvolvedores cadastrados;

### Method: `GET` Host: `http://localhost:8081/developers_page?page=1&limit=5`
Esta rota busca os desenvolvedores cadastrados realizando a paginação, sendo o parametro `page` obrigatório e o parâmetro `limit` opcional;

### Method: `POST` Host: `http://localhost:8081/developer`
Esta rota cadastro um novo desenvolvedor

Executar no padrão abaixo:
```
  {
    "nome": "Guilherme Pacheco",
    "sexo": "M",
    "idade": "29",
    "hobby": "Cozinhar",
    "datanascimento": "1991-09-30"
  }
```;

### Method: `PUT` Host: `http://localhost:8081/developers`
Esta rota atualiza as informações do desenvolvedor conforme o id informado e os dados no corpo da requisição

Executar no padrão abaixo:
```
  {
    "id": "1",
    "nome": "Guilherme Pacheco",
    "sexo": "M",
    "idade": "29",
    "hobby": "Cozinhar",
    "datanascimento": "1991-09-30"
  }
```;

### Method: `DELETE` Host: `http://localhost:8081/developers?id=`
Esta rota exclui um desenvolvedor conforme o id informado;