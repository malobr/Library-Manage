# Desafio Backend

`Eu nao fiz apenas o desafio, eu melhorei implementando outras coisas....`

O desafio consiste em criar uma API REST que simule um sistema interno de uma biblioteca. O sistema deve incluir CRUDs para gerenciar usuários e livros, além de rotas para gerenciar os livros que estão sendo alugados pelos usuários.

## Requisitos

### Tecnologias e Configuração
- **Framework**: Laravel 11
- **Banco de Dados**: Relacional (MySQL ou PostgreSQL)

### Estrutura de Dados

#### Tabela de Usuários
- `id`: Identificador único (PK)
- `nome`: Nome do usuário
- `cpf`: CPF do usuário (não permite duplicatas)

#### Tabela de Livros
- `id`: Identificador único (PK)
- `nome`: Nome do livro (não permite duplicatas)

#### Tabela de Aluguéis (Pivot)
- `id`: Identificador único (PK)
- `livro_id`: Referência ao livro (FK)
- `usuario_id`: Referência ao usuário (FK)
- `data_inicial`: Data inicial do aluguel (obrigatória)
- `data_final`: Data final do aluguel (opcional)

### Funcionalidades

1. CRUD completo de usuários.
2. CRUD completo de livros.
3. Rota para criar novos aluguéis entre usuários e livros.
   - Validação: Um livro só pode ser alugado por um usuário por vez.
4. Rota para adicionar a data de devolução de um livro alugado.
5. Relacionamentos devidamente configurados entre usuários e livros.

### Regras de Negócio
- Um usuário pode alugar vários livros ao mesmo tempo.
- Um livro só pode ser alugado por um usuário por vez.

### Qualidade do Código
- O código deve ser organizado, conciso e bem documentado.
- Formatação obrigatória usando o **Pint**.
- Seguir boas práticas de programação.

### Publicação
- Disponibilizar o código no GitHub com um **README.md** detalhado.
- O README deve conter um guia de instalação completo para execução local do projeto.

## Diferenciais

1. **Testes**
   - Criação de testes unitários e de feature.

2. **Análise de Código**
   - Utilizar **PHPStan** e **Larastan** para checar a tipagem e qualidade do código.

3. **Documentação de API**
   - Documentar os endpoints da API utilizando **Insomnia** ou **Postman**.

4. **Docker**
   - Criar um `docker-compose` para facilitar a execução do projeto. Pode ser utilizado o **Sail**.
