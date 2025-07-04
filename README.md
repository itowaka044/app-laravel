### Passo a passo

Clone Repositório
```sh
git clone -b laravel-11-with-php-8.3 https://github.com/itowaka044/app-laravel
```

```sh
cd app-laravel
```

Suba os containers do projeto

```sh
docker-compose up -d
```


Crie o Arquivo .env

```sh
cp .env.example .env
```


Acesse o container app

```sh
docker-compose exec app bash
```


Instale as dependências do projeto

```sh
composer install
```


Gere a key do projeto Laravel

```sh
php artisan key:generate
```


Rodar as migrations

```sh
php artisan migrate
```


Rodar npm

```sh
npm install
```

```sh
npm run dev
```


Acesse o projeto
[http://localhost:8000](http://localhost:8000)

Acesse o banco (user = username / password = userpass)
[http://localhost:8080](http://localhost:8080)
