# 

Um sistema login e um cadastro simples desenvolvido em PHP.

- html
- css (bootstrap)
- javascript (jquery)
- PHP
- SQL

Cadastro de carro:

```js

Marca:
Modelo:
Cor:
Ano:
Valor:
Status: Novo / Seminovo
```

Deve ser possível cadastrar, alterar e excluir o cadastro do veículo.


Passos

- criação da database
- criar uma table para users:

```sql
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```