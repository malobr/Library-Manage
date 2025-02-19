# Desafio Backend - API de Biblioteca

Este projeto simula um sistema interno de uma biblioteca, permitindo gerenciar usuários, livros e aluguéis de livros. A API foi desenvolvida com **Laravel 11** e utiliza **MySQL** (gerenciado via PHPMyAdmin) para armazenar as informações.

## Requisitos

- **PHP 8.0+**.
- **Composer** para gerenciamento de dependências.
- **Laravel 11** para a construção da API REST.
- **MySQL** para o banco de dados relacional.

## Funcionalidades

- **CRUD de Usuários**:
  - Criar, editar, listar e deletar usuários.
  - Validação para garantir CPF único.
  
- **CRUD de Livros**:
  - Criar, editar, listar e deletar livros.
  - Validação para garantir nome único para cada livro.

- **Gerenciamento de Aluguéis (Tabela Pivot)**:
  - Relacionamento entre usuários e livros.
  - Cada usuário pode alugar múltiplos livros, mas cada livro só pode ser alugado por um usuário por vez.
  - Adição e remoção da data de devolução do livro.

- **Endpoints Disponíveis**:
  - **Usuários**:
    - **POST /register**: Registro de novo usuário.
    - **POST /login**: Login de usuário.
    - **GET /users**: Listagem de usuários.
    - **GET /users/{id}**: Detalhes de um usuário específico.
    - **PATCH /users/{id}**: Atualização de informações de um usuário.
    - **DELETE /users/{id}**: Exclusão de um usuário.
  - **Livros**:
    - **POST /books**: Criação de novos livros.
    - **GET /books**: Listagem de livros.
    - **GET /books/{id}**: Detalhes de um livro específico.
    - **PATCH /books/{id}**: Atualização de informações de um livro.
    - **DELETE /books/{id}**: Exclusão de um livro.
  - **Aluguéis**:
    - **GET /rentals**: Listagem de todos os aluguéis.
    - **GET /rentals/{searchTerm}**: Buscar aluguel pelo nome do usuário ou livro.
    - **POST /rentals**: Criar um novo aluguel de livro.
    - **PATCH /rentals/{id}/return**: Atualizar a devolução de um livro.
    - **PATCH /rentals/{id}**: Atualizar um aluguel específico.
    - **DELETE /rentals/{id}**: Deletar um aluguel específico.

## Estrutura do Banco de Dados

### 1. Tabela de Usuários
- `id`: Identificador único.
- `name`: Nome do usuário.
- `cpf`: CPF do usuário (único).
- `email`: Email do usuário (único).
- `password`: Senha do usuário.
- `remember_token`: Token para "lembrar-me".
- `timestamps`: Data de criação e atualização.

### 2. Tabela de Livros
- `id`: Identificador único.
- `name`: Nome do livro (único).
- `type`: Tipo ou categoria do livro.
- `author`: Autor do livro.
- `pages`: Quantidade de páginas.
- `price`: Preço do livro.
- `synopsis`: Sinopse do livro.
- `available`: Indica se o livro está disponível para aluguel.
- `timestamps`: Data de criação e atualização.

### 3. Tabela de Aluguéis (Pivot)
- `id`: Identificador único.
- `book_id`: ID do livro.
- `user_id`: ID do usuário.
- `start_date`: Data de início do aluguel (não pode ser nula).
- `end_date`: Data de devolução do livro (pode ser nula).
- `timestamps`: Data de criação e atualização.

## Instruções de Instalação

### Pré-requisitos
Certifique-se de ter as seguintes ferramentas instaladas:
- **PHP 8.0+**
- **Composer**
- **MySQL**
- **Docker** (opcional, para facilitar a execução)

### 1. Clonar o Repositório

```bash
git clone https://github.com/malobr/Biblioteca-laravel.git
cd backend
```

### 2. Instalar Dependências do Backend

Execute os seguintes comandos:

1. Instale as dependências:

   ```bash
   composer install
   ```

2. Copie o arquivo `.env` de exemplo e edite-o:

   ```bash
   cp .env.example .env
   ```

   Configure as variáveis do arquivo `.env` de acordo com o ambiente, como conexão com o banco de dados (DB_HOST, DB_DATABASE, DB_USERNAME, DB_PASSWORD).

3. Gere a chave da aplicação:

   ```bash
   php artisan key:generate
   ```

4. Execute as migrações para criar as tabelas no banco de dados:

   ```bash
   php artisan migrate
   ```

5. Se necessário, popule o banco de dados com dados de exemplo:

   ```bash
   php artisan db:seed
   ```

6. Inicie o servidor local:

   ```bash
   php artisan serve
   ```

Acesse o sistema no navegador pelo endereço padrão: [http://localhost:8000](http://localhost:8000).

--- 

Agora, a seção dos **Aluguéis** foi atualizada para incluir os endpoints completos, e o comando `php artisan db:seed` foi adicionado para preencher o banco de dados com dados iniciais.
