# 🚀 API REST em Laravel com Sanctum

API RESTful desenvolvida em Laravel 12 com autenticação via Laravel Sanctum, CRUD completo de categorias e produtos, validações e relacionamento entre entidades.

## 🛠 Tecnologias
- PHP 8.3
- Laravel 12
- MySQL
- Laravel Sanctum
- Insomnia

## 🔐 Autenticação
- Register
- Login
- Logout
- Tokens Bearer com Sanctum

## 📦 Funcionalidades
- CRUD de Categorias
- CRUD de Produtos
- Relacionamentos Eloquent
- Validações com Form Request
- Rotas protegidas

## ▶️ Como rodar o projeto
```bash
git clone https://github.com/SEU_USUARIO/laravel-api-rest-sanctum.git
cd laravel-api-rest-sanctum
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan serve


## 📡 Endpoints principais

### 🔐 Autenticação
- POST `/api/register` — Registrar usuário
- POST `/api/login` — Login do usuário
- POST `/api/logout` — Logout (rota protegida)

### 📦 Categorias
- GET `/api/categories` — Listar categorias
- POST `/api/categories` — Criar categoria
- GET `/api/categories/{id}` — Mostrar categoria
- PUT `/api/categories/{id}` — Atualizar categoria
- DELETE `/api/categories/{id}` — Excluir categoria

### 🛒 Produtos
- GET `/api/products` — Listar produtos
- POST `/api/products` — Criar produto
- GET `/api/products/{id}` — Mostrar produto
- PUT `/api/products/{id}` — Atualizar produto
- DELETE `/api/products/{id}` — Excluir produto
