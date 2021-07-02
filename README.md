# Desafio Backend

## Problema
A idez é uma fintech que busca oferecer tecnologia de ponta para outras empresas do ecosistema financeiro. Um dos passos necessários para completarmos essa missão é implementar a criação de contas para utilização do nosso aplicativo em diferentes plataformas. 
É importante lembrar que o seu sistema será integrado aos nossos painéis internos e ao aplicativo.

Todo o processo começa com a criação de um Usuário. Um usuário pode ter mais de um tipo de conta vinculada a ele. 
De um **Usuário (User)**, queremos saber seu `Nome Completo`, `CPF`, `Número de Telefone`, `e-mail` e `Senha`. 
CPFs e e-mails devem ser únicos no sistema. Sendo assim, seu sistema deve permitir apenas um cadastro com o mesmo CPF ou endereço de e-mail.

Os tipos de conta que existem na idez são **Empresarial (Company)** e **Pessoal (Person)**. Todas as contas sempre estarão vinculadas a um usuário e possuem alguns dados em comum: `Id da Conta`, `Agência`, `Número` e `Dígito`. 
De uma conta empresarial queremos saber a `Razão Social`, o `Nome Fantasia`, o `CNPJ`, além do `id de Usuário` que será dono dessa conta. 
De uma conta pessoal, queremos saber apenas seu `Nome` e `CPF`, além do `id de Usuário` que será dono dessa conta. 

Os documentos (cpf e cnpj) devem ser únicos dentro do sistema, mesmo entre contas de tipos diferentes.
Devido a algumas limitações do sistema, **cada Usuário pode ter apenas uma conta de cada tipo**.

Seu sistema deve ser capaz de listar todos os usuários, além de conseguir trazer informações detalhadas de um usuário específico. 
Durante a listagem, deve ser possível filtar os resultados por `Nome` ou `Documento`.
Para fins didáticos, sua busca deve considerar apenas resultados que comecem com a string especificada na busca. Como exemplo,
`GET /users?q=joao` deve retornar apenas Usuários cujos Nomes comecem com a string **joao**. 
Não há a necessidade de lidar com acentos.

Outra funcionalidade do sistema deve ser a possiblidade de contas poderem realizar **Transações (Transactions)**. Cada transação deverá ter um valor, positivo ou negativo, além de um dos cinco `Tipos` de operação que fazemos: 
- Pagamento de Conta
- Depósito
- Transferência
- Recarga de Celular
- Compra (Crédito)

O sistema precisará listar todas as informações de uma conta, incluindo as suas transações e usuários relacionados em um único endpoint: `/accounts/{id}`.

Sua tarefa é desenvolver uma API capaz de cumprir com todos os requisitos especificados. 


## Instruções
utilize o comando `docker-compose up --build` a partir do diretório raiz do projeto. 
A sua API estará mapeada para a porta `8000`do seu host local.

**IMPORTANTE:** após a execução do `docker-compose up -d`, na pasta do projeto, execute o comando `docker-compose run web composer install` e em seguida `docker-compose run web php artisan key:generate`.
Quando o volume atual é mapeado para dentro do container, ele sobrescreve a pasta com as dependências instaladas pelo composer, por isso o comando é necessário. 

## Endpoints

Route : `localhost:8000/api/user`

Method: POST

Payload: 

	"name": "emanuel",
	"lastName": "meira",
	"cpf": "12345678923",
	"phone": "32910502",
	"email": "teste@hotmail.com",
	"password": "senha"

Response: 

    "message": "successfully registered User",
    "data": 
        "nome": "emanuel",
        "sobrenome": "meira",
        "cpf": "12345678923",
        "email": "teste@hotmail.com",
        "telefone": "32910504",
        "senha": "senha",
        "id": 7


Route : `localhost:8000/api/businessAccount/user/{id}`

Method: POST

Payload: 

	"agency": 4588,
	"number": 6549874,
	"digit": 12,
	"corporateName": "cascinha do ze",
	"nameFantasy": "sorvete",
	"depositedAmount": 12.00,
	"cnpj": "1234568108"


Response: 

    "message": "successfully registered Personal Account",
    "data": {
        "agencia": 4588,
        "numero": 6549874,
        "digito": 12,
        "cnpj": "1234568108",
        "nome_fantasia": "sorvete",
        "razao_social": "cascinha do ze",
        "valor_depositado": 12,
        "id_usuario": 1,
        "id": 1
    }



Route : `localhost:8000/api/personalAccount/user/{id}`

Method: POST

Payload: 

	"agency": 4588,
	"number": 6549874,
	"digit": 12,
	"depositedAmount": 12.00,
	"cpf": "2345789873"


Response: 

    "message": "successfully registered Personal Account",
    "data": {
        "message": "successfully registered Personal Account",
        "data": {
            "agencia": 4588,
            "numero": 6549874,
            "digito": 12,
            "cpf": "2345789873",
            "valor_depositado": 12,
            "id_usuario": 1,
            "id": 1
        }

Route : `localhost:8000/api/personalAccount/{id}`

Method: GET


Route : `localhost:8000/api/businessAccount/{id}`

Method: GET


Route : `localhost:8000/api/transation/deposit/businessAccount/1`

Method: POST

Payload: 


	"depositdAmount": 100.00



Response: 

  
    "message": "successfully Deposited in Account",
    "data": {
        "id_transacao": 1,
        "valor_transacao": 100,
        "id_conta_empresarial": 1,
        "id": 4
    }


