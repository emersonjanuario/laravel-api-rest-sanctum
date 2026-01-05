# 🚀 Laravel API REST com Sanctum

API REST profissional desenvolvida em **Laravel**, com autenticação via **Laravel Sanctum**, seguindo boas práticas de arquitetura, validação, segurança e organização de código.

Este projeto foi criado com foco em **portfólio profissional**, simulando uma API real de sistema comercial, com autenticação por token e CRUDs completos.

---

## 📌 Tecnologias utilizadas

- PHP 8.3+
- Laravel 12
- Laravel Sanctum (Autenticação via Token)
- MySQL
- Eloquent ORM
- Form Requests (Validações)
- Insomnia / Postman (Testes)
- Composer

---

## 🔐 Autenticação

A autenticação é feita via **Bearer Token**, utilizando o **Laravel Sanctum**.

Fluxo:
1. Registro do usuário
2. Login
3. Retorno do token
4. Token enviado no header `Authorization`

Exemplo:
```
Authorization: Bearer SEU_TOKEN_AQUI
```

---

## ⚙️ Funcionalidades

- Registro e login de usuários
- Autenticação por token (Sanctum)
- CRUD de Categorias
- CRUD de Produtos
- Relacionamento Produto → Categoria
- Validações com Form Requests
- Retornos JSON padronizados
- API pronta para consumo por frontend ou mobile

---

## 📡 Endpoints principais

### 🔹 Autenticação

| Método | Endpoint | Descrição |
|------|---------|----------|
| POST | `/api/register` | Registrar usuário |
| POST | `/api/login` | Login e geração do token |
| POST | `/api/logout` | Logout (revoga token) |

---

### 🔹 Categorias (Protegido por autenticação)

| Método | Endpoint | Descrição |
|------|---------|----------|
| GET | `/api/categories` | Listar categorias |
| POST | `/api/categories` | Criar categoria |
| GET | `/api/categories/{id}` | Detalhar categoria |
| PUT | `/api/categories/{id}` | Atualizar categoria |
| DELETE | `/api/categories/{id}` | Remover categoria |

---

### 🔹 Produtos (Protegido por autenticação)

| Método | Endpoint | Descrição |
|------|---------|----------|
| GET | `/api/products` | Listar produtos |
| POST | `/api/products` | Criar produto |
| GET | `/api/products/{id}` | Detalhar produto |
| PUT | `/api/products/{id}` | Atualizar produto |
| DELETE | `/api/products/{id}` | Remover produto |

---

## 🧪 Exemplos de requisições

### 📌 Registro de usuário
```bash
POST /api/register
```

```json
{
  "name": "Usuário Teste",
  "email": "teste@email.com",
  "password": "123456",
  "password_confirmation": "123456"
}
```

---

### 📌 Login
```bash
POST /api/login
```

```json
{
  "email": "teste@email.com",
  "password": "123456"
}
```

Resposta:
```json
{
  "token": "TOKEN_GERADO_PELO_SANCTUM"
}
```

---

### 📌 Criar produto
```bash
POST /api/products
```

Headers:
```
Authorization: Bearer TOKEN_GERADO
```

```json
{
  "category_id": 2,
  "name": "Mouse Gamer",
  "description": "Mouse RGB com 6 botões",
  "price": 150.90,
  "stock": 20
}
```

---

## 🛠️ Como rodar o projeto localmente

```bash
git clone https://github.com/emersonjanuario/laravel-api-rest-sanctum.git
cd laravel-api-rest-sanctum
composer install
cp .env.example .env
php artisan key:generate
```

Configure o banco de dados no `.env` e execute:

```bash
php artisan migrate
php artisan serve
```

A API estará disponível em:
```
http://127.0.0.1:8000
```

---

## 📂 Estrutura do projeto

- `app/Http/Controllers` → Controllers da API
- `app/Http/Requests` → Validações
- `app/Models` → Models Eloquent
- `routes/api.php` → Rotas da API
- `database/migrations` → Estrutura do banco

---

## 🚀 Roadmap (próximas melhorias)

- Paginação e filtros
- Upload de imagens de produtos
- Documentação Swagger/OpenAPI
- Deploy em produção
- Testes automatizados

---

## 👨‍💻 Autor

**Émerson Januário**  
Desenvolvedor Web | Backend PHP & Laravel  

🌐 Site: https://openmaster.com.br  
🐙 GitHub: https://github.com/emersonjanuario  

---

## ⭐ Se este projeto te ajudou

Deixe uma estrela ⭐ no repositório!
