# Aplicação Canuto Barber

## Visão Geral
Canuto Barber é uma aplicação web para gerenciar uma barbearia. Suporta dois principais perfis de usuário: Barbeiros e Clientes. A aplicação permite que barbeiros gerenciem clientes, agendamentos e avaliações, enquanto os clientes podem se registrar, fazer login, agendar serviços e visualizar seus agendamentos.

## Funcionalidades

### Funcionalidades do Barbeiro
- Login e logout.
- Dashboard mostrando os agendamentos do barbeiro logado.
- Gerenciar todos os agendamentos (visualizar, editar, excluir).
- Gerenciar informações dos clientes (adicionar, editar, excluir).
- Gerenciar avaliações dos clientes.
- Visualizar status dos agendamentos e formas de pagamento.

### Funcionalidades do Cliente
- Cadastro e login de clientes.
- Agendar novos serviços com barbeiros.
- Visualizar seus próprios agendamentos.
- Cancelar ou modificar agendamentos (se implementado).
- Visualizar serviços disponíveis e formas de pagamento.

## Como Executar a Aplicação
1. Configure um servidor web local com PHP e MySQL (ex: XAMPP).
2. Importe o esquema e tabelas do banco de dados conforme os scripts SQL fornecidos.
3. Coloque os arquivos da aplicação no diretório raiz do servidor web.
4. Configure a conexão com o banco de dados no arquivo `conexao.php`.
5. Acesse a aplicação pelo navegador:
   - Login do barbeiro: `http://localhost/canutobarber/login.php`
   - Cadastro do cliente: `http://localhost/canutobarber/cliente_cadastro.php`
   - Login do cliente: `http://localhost/canutobarber/cliente_login.php`

## Perfis de Usuário e Navegação

### Barbeiro
- Login em `login.php`.
- Acesse o dashboard em `dashboard.php` para ver seus agendamentos.
- Gerencie todos os agendamentos em `agendamentos.php`.
- Gerencie clientes em `index.php`.
- Gerencie avaliações em `avaliacoes.php`.
- Logout pelo botão "Sair".

### Cliente
- Cadastro em `cliente_cadastro.php`.
- Login em `cliente_login.php`.
- Agendar serviços em `cliente_agendamento.php`.
- Visualizar agendamentos em `cliente_agendamentos.php`.
- Logout pelo link de logout (se implementado).

## Descrição das Páginas Principais

- **login.php**: Página de login do barbeiro.
- **dashboard.php**: Dashboard do barbeiro mostrando seus agendamentos.
- **agendamentos.php**: Gerenciamento de agendamentos pelo barbeiro.
- **index.php**: Gerenciamento de clientes pelo barbeiro.
- **editar.php**: Editar detalhes do cliente.
- **avaliacoes.php**: Gerenciamento de avaliações pelo barbeiro.
- **cliente_cadastro.php**: Cadastro de clientes.
- **cliente_login.php**: Login de clientes.
- **cliente_agendamento.php**: Agendamento de serviços pelo cliente.
- **cliente_agendamentos.php**: Lista de agendamentos do cliente.
- **logout.php**: Logout da sessão do barbeiro.

## Testes
- Testar login e gerenciamento de sessão para barbeiros e clientes.
- Testar criação, edição e exclusão de agendamentos.
- Testar gerenciamento de clientes e avaliações.
- Testar fluxo de cadastro e login de clientes.
- Testar visualização de agendamentos pelos barbeiros e clientes.

## Observações
- Senhas são armazenadas em texto simples (apenas para demonstração). Para produção, utilize senhas criptografadas.
- A aplicação utiliza Bootstrap 5 para estilização.
- Certifique-se que o banco de dados está configurado e em execução corretamente.

## Para Apresentação em Vídeo
- Demonstre os fluxos de login para barbeiro e cliente.
- Mostre o dashboard do barbeiro e gerenciamento de agendamentos.
- Mostre o cadastro, login e agendamento pelo cliente.
- Destaque o gerenciamento de sessão e logout.
- Apresente as funcionalidades de gerenciamento de clientes e avaliações.

---

Obrigado por usar o Canuto Barber!
