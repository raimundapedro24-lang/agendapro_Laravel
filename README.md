# AgendaPro

Sistema web para gerenciar uma agenda pessoal de contatos, com autenticação, aprovação de usuários pelo administrador e exportação da agenda em PDF.

## Identificação

| Informação | Dados |
| --- | --- |
| Aluno | **Ravir Silva de Menezes** |
| Número | **38** |
| Professor | **Francisco Leandro** |
| Projeto | **AgendaPro** |

## Sobre o projeto

O AgendaPro permite que cada usuário mantenha sua própria lista de contatos. O sistema possui uma área administrativa para controlar a ativação das contas e um painel com indicadores da agenda. Administradores também visualizam estatísticas de usuários cadastrados, ativos e pendentes.

O projeto foi desenvolvido com Laravel e utiliza a estrutura MVC, com modelos para os dados, controladores para os fluxos da aplicação e views Blade para a interface.

## Funcionalidades implementadas

- **Autenticação:** cadastro, login e encerramento de sessão.
- **Aprovação de contas:** novos usuários aguardam ativação pelo administrador para acessar o painel e a agenda.
- **Gestão de contatos:** cadastro, listagem, edição e exclusão.
- **Dados do contato:** nome, telefone, e-mail opcional, categoria, observações e foto opcional.
- **Busca:** pesquisa de contatos por nome ou e-mail.
- **Agenda individual:** cada usuário gerencia seus próprios contatos.
- **Dashboard:** total de contatos e contagens das categorias Pessoal e Trabalho.
- **Administração:** listagem de outros usuários e ativação ou desativação das contas.
- **Exportação em PDF:** download da agenda do usuário com nome, telefone, e-mail e categoria dos contatos.
- **Perfil:** atualização de nome e e-mail, alteração de senha e exclusão da própria conta.
- **Recuperação de senha:** fluxo de solicitação de link e redefinição, dependente da configuração de e-mail.
- **Interface responsiva:** layouts adaptados para diferentes tamanhos de tela.

> A exportação em PDF inclui todos os contatos da agenda do usuário. O filtro da busca não é aplicado ao arquivo exportado.

## Tecnologias utilizadas

| Tecnologia | Utilização |
| --- | --- |
| PHP | Linguagem utilizada no backend |
| Laravel 13 | Framework da aplicação |
| Eloquent ORM | Consultas, relacionamentos e persistência dos dados |
| MySQL | Banco de dados relacional |
| Blade e Laravel Breeze | Templates, formulários e base de autenticação |
| Tailwind CSS 3 | Estilização e responsividade |
| Alpine.js 3 | Interações de componentes da interface |
| Vite 4 | Servidor de desenvolvimento e compilação de CSS e JavaScript |
| DomPDF | Geração dos arquivos PDF |
| Composer e npm | Gerenciamento das dependências |
| PHPUnit | Testes automatizados presentes no projeto |

## Requisitos para executar

- **PHP 8.4**, ou versão PHP 8.x superior compatível com as dependências travadas.
- Composer.
- Node.js e npm compatíveis com as dependências do frontend.
- MySQL em execução.
- Extensões PHP exigidas pelo Composer, incluindo o driver PDO para MySQL.

Embora o `composer.json` declare PHP `^8.3`, o conjunto atual de dependências do `composer.lock` exige **PHP >= 8.4**. Confira a versão utilizada pelo terminal com `php -v`; uma instalação do XAMPP com PHP 8.0 não atende a esse requisito.

## Como executar localmente

Execute os comandos na pasta raiz do projeto. As instruções abaixo são destinadas a uma nova instalação em ambiente de desenvolvimento.

### 1. Clonar o repositório

```bash
git clone https://github.com/raimundapedro24-lang/agendapro_Laravel.git
cd agendapro_Laravel
```

### 2. Instalar as dependências

```bash
composer install
composer check-platform-reqs
npm ci
```

### 3. Configurar o ambiente

Se o arquivo `.env` ainda não existir, copie o modelo. No Windows, usando PowerShell:

```powershell
Copy-Item .env.example .env
```

No Linux ou macOS, o comando equivalente é `cp .env.example .env`.

Crie um banco MySQL chamado `agendapro` e ajuste o `.env` com os dados da sua instalação:

```dotenv
APP_NAME=AgendaPro
APP_ENV=local
APP_DEBUG=true
APP_URL=http://127.0.0.1:8000

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=agendapro
DB_USERNAME=seu_usuario
DB_PASSWORD="sua_senha"
```

Substitua `seu_usuario` e `sua_senha` pelas credenciais locais do MySQL. O arquivo `.env` contém configurações particulares e está incluído no `.gitignore`.

### 4. Gerar a chave e preparar o banco e as fotos

Na nova instalação, execute:

```bash
php artisan key:generate
php artisan migrate
php artisan storage:link
```

As migrations criam as tabelas da aplicação. O link de armazenamento permite que as fotos dos contatos sejam exibidas na interface.

### 5. Iniciar a aplicação

Em um terminal, inicie o Vite:

```bash
npm run dev
```

Em outro terminal, na mesma pasta do projeto, inicie o servidor Laravel:

```bash
php artisan serve
```

Acesse **http://127.0.0.1:8000** no navegador.

Para gerar os arquivos compilados do frontend, utilize `npm run build`.

## Primeiro acesso e administrador inicial

As contas cadastradas começam com o perfil `user` e o estado `active=false`. Por isso, o primeiro usuário precisa ser habilitado para administrar as demais contas.

1. Abra a aplicação e cadastre uma conta com seu e-mail e uma senha de sua escolha.
2. No terminal, na raiz do projeto, abra o Tinker:

   ```bash
   php artisan tinker
   ```

3. Execute as instruções abaixo, substituindo o endereço pelo e-mail usado no cadastro:

   ```php
   $usuario = \App\Models\User::where('email', 'seu-email@exemplo.com')->firstOrFail();
   $usuario->role = 'admin';
   $usuario->active = true;
   $usuario->save();
   ```

4. Saia do Tinker com `exit` e faça login na aplicação.
5. Acesse **Gestão de Usuários** para ativar as próximas contas cadastradas.

Essa preparação é necessária somente para o administrador inicial de uma nova base local. O projeto também possui um `AdminSeeder`, mas a instalação descrita acima utiliza uma senha definida pelo próprio usuário.

## Configuração de e-mail

Para utilizar a recuperação de senha, configure as variáveis `MAIL_*` no `.env` com os dados de um serviço SMTP ou de uma ferramenta local de captura de e-mails. A disponibilidade desse recurso depende dessa configuração.

## Estrutura principal

```text
app/
  Http/Controllers/   Controladores de autenticação, contatos, perfil e administração
  Http/Middleware/    Verificações de acesso e ativação de contas
  Http/Requests/      Validações de formulários
  Models/            Modelos User e Contact
bootstrap/           Inicialização da aplicação
config/              Configurações dos serviços
database/
  migrations/        Estrutura das tabelas
  factories/         Geração de dados para testes
  seeders/           Carga inicial de dados
lang/                Traduções
public/              Entrada HTTP e arquivos públicos
resources/
  views/             Telas e componentes Blade
  css/               Estilos
  js/                JavaScript
routes/              Definições das rotas
tests/               Testes automatizados
```

## Testes

O projeto contém testes de autenticação e perfil. Antes de executar a suíte, configure um **banco exclusivo para testes**: há cenários que utilizam `RefreshDatabase`, e a configuração de SQLite em memória está comentada no `phpunit.xml`.

## Documentação técnica

A documentação detalhada apresenta a arquitetura, os fluxos, o banco de dados, as telas, as configurações, as dependências e a análise do código próprio do projeto.

[Consultar a documentação completa em PDF (198 páginas)](docs/AgendaPro_Documentacao_Completa.pdf)

O relatório registra a análise da cópia local em 26/11/2026 e identifica os pontos que dependem de validação em execução. Valores sensíveis foram ocultados.

## Repositório

[https://github.com/raimundapedro24-lang/agendapro_Laravel](https://github.com/raimundapedro24-lang/agendapro_Laravel)

**Autor:** Ravir Silva de Menezes — **Nº 38**  
**Professor:** Francisco Leandro
