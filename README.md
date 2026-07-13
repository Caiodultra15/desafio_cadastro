# Sistema de Controle de Chamados Internos

Projeto desenvolvido como desafio técnico utilizando PHP 8, PostgreSQL, HTML, CSS, JavaScript e jQuery.

## Tecnologias

- PHP 8
- PostgreSQL
- HTML5
- CSS3
- JavaScript
- jQuery

## Funcionalidades

- Cadastro de usuários
- Login
- Cadastro de solicitações
- Listagem de solicitações
- Alteração de status para "Concluído"
- Exclusão de solicitações
- Validação de CEP utilizando a API ViaCEP

## Estrutura do projeto

```
assets/
config/
controllers/
helpers/
models/
public/
views/
```

## Requisitos

- PHP 8 ou superior
- PostgreSQL
- Servidor Apache (XAMPP, WAMP ou Laragon)

## Configuração

### 1. Clone o projeto

```bash
git clone <url-do-repositório>
```

### 2. Crie o banco de dados

Crie um banco PostgreSQL.

### 3. Importe o arquivo

Importe o arquivo:

```
banco.sql
```

### 4. Configure a conexão

Edite o arquivo:

```
config/database.php
```

Informando:

- Host
- Porta
- Banco
- Usuário
- Senha

### 5. Execute o projeto

Acesse:

```
http://localhost/controle-chamados/views/login.php
```

## Autor

Caio Dultra