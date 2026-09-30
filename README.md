# Projeto: AdicoMural

Um projeto desenvolvido na tentativa de recriar o [ADICOM](https://adicom.uffs.edu.br), destinado a requisição de serviços no ambiente da UFFS. O objetivo principal é o de trazer uma interface nova, que permita mais praticidade e fácil acesso dos usuários, sendo mais atrativa visualmente. Deste modo, o projeto tem como base o [Mural](https://github.com/practice-uffs/mural), desenvolvido em PHP e com framework [Laravel](https://laravel.com).

## Instalação

> **NOTA:** os passos principais de instalação também se encontram na página do Mural: [practice.uffs.edu.br/mural](https://practice.uffs.edu.br/mural).

### 1. Dependências

Para executar o projeto, você precisa ter o seguinte instalado:

- [PHP 8.x](https://www.php.net/downloads);
- [Composer](https://getcomposer.org/download/);
- [NodeJS](https://nodejs.org/en/);
- [NPM](https://www.npmjs.com/package/npm);

>*IMPORTANTE:* se sua distribuição  linux não tem PHP 8.x disponível, rode `sudo add-apt-repository ppa:ondrej/php` antes de começar.

Você precisa de várias extensões PHP instaladas também:

```
sudo apt-get update
sudo apt install php8.0-cli php8.0-mbstring php8.0-zip php8.0-xml php8.0-curl php8.0-sqlite3 php8.0-curl
```

### 2. Configuração

Clonar o repositório:

```
git clone --recurse-submodules https://github.com/GustavoTerebinto/Adicom-Mural
cd Adicom-Mural
```

#### 2.1 PHP

Instale as dependências do PHP usando o comando abaixo:

```
composer update
composer install
```

#### 2.2 Banco de Dados

O banco de dados padrão do Laravel é o SQLite. Para criar uma base usando esse SGBD, rode:

```
touch database/database.sqlite
```
Ou caso preferir usar o PostgreSQL, você pode criar uma base de dados externamente.

#### 2.3 Node

Instale também as dependências do NodeJS executando:

```
npm install
```

#### 2.4 Laravel

Caso for usar PostgreSQL, edite o `.env.example` na seção de conexão DB para:

- DB_CONNECTION=pgsql
- DB_HOST=127.0.0.1
- DB_PORT=5432
- DB_DATABASE=sua_base_de_dados
- DB_USERNAME=postgres
- DB_PASSWORD=postgres

Caso for usar o SQLite, edite o `.env.example` na seção de conexão DB para:

- DB_CONNECTION=sqlite

Crie o arquivo `.env` a partir do arquivo `.env.example`:

```
cp .env.example .env
```

Criação as tabelas do banco de dados com as migrações esquemas:

```
php artisan migrate
```

Rode os seeders (que crias as categorias/serviços padrão):

```
php artisan db:seed
```

>*DICA:* enquanto estiver desenvolvendo, rode `npm run watch` para manter os scripts javascript sendo gerados sob demanda quando alterados.

Por fim, garanta que o storage do Laravel está disponível para acesso web:

```
php artisan storage:link
```

#### 2.5 Credentials do Google

O projeto possui integração com o Google Drive, mas para que a integração funcione corretamente é necessário gerar e adicionar um arquivo de credenciais na pasta `config/google`. Para gerar este arquivo é necessário realizar autenticação com a conta cujo Drive será utilizado [neste link](https://console.developers.google.com/) e criar um novo projeto. Com o projeto criado basta acessar o Marketplace (presente no menu lateral) e buscar pela "Google Drive API", acessá-la e clicar no botão "ativar".
 
Depois que a ativação é concluída basta acessar a página da API e clicar em "Credenciais" no menu lateral, em seguida em "Criar credenciais" e "ID do cliente OAuth". Nesse momento pode ser necessário configurar a tela de permissão OAuth, para isso basta seguir o passo a passo inserindo as configurações desejadas. Com a tela de permissão configurada basta criar o ID do cliente OAuth, como URL de redirecionamento é possível utilizar a url `https://developers.google.com/oauthplayground/`. Depois de gerar o ID do cliente OAuth é possível fazer o download do JSON com as credenciais por meio da página de credenciais.
 
Com o JSON em mãos basta salvá-lo na pasta `config/google` com o nome `credentials.json`.  Depois desses passos ao executar o comando `php artisan serve` pela primeira vez será solicitado que faça login com a conta do Google utilizada.

>O passo acima já foi executado na conta Google da **dir.dcs**, de modo que o Drive já está habilitado e é apenas necessário acessar a conta para gerar uma nova chave, no caso um json.

### 3. Utilizacão

#### 3.1 Rodando o projeto

Depois de seguir todos os passos de instalação, inicie o servidor do Laravel:

```
php artisan serve
```

A aplicação estará rodando na porta `8001` e poderá ser acessada em [localhost:8001](http://localhost:8001).

#### 3.2 Utilização da API

Se você utilizar a API dessa aplicacão, todos endpoints estarão acessivel em `/api`, por exemplo [localhost:8081/api](http://localhost:8081/api). Os endpoints que precisam de uma chave de autenticação devem ser utilizar o seguinte cabeçalho HTTP:

```
Authorization: Bearer XXX
```

onde `XXX` é o valor da sua chave de acesso (passaporte Practice), por exemplo `c08cbbfd6eefc83ac6d23c4c791277e4`.
Abaixo está um exemplo de requisição para o endpoint `user` utilizando a chave de acesso acima:

```bash
curl -H 'Accept: application/json' -H "Authorization: Bearer c08cbbfd6eefc83ac6d23c4c791277e4" http://localhost:8001/api/user
```


