```sql

-- Inserir um novo cliente
INSERT INTO clientes (nome, email, telefone)
VALUES ('Nome do Cliente', 'cliente@email.com', '123456789');

-- Verifica qual o ID do cliente recém-criado
SELECT id FROM clientes WHERE nome = 'Nome do Cliente';

-- Inserir um novo pedido para esse cliente (supondo que o ID do cliente seja 1)
INSERT INTO orders (cliente_id, produto, quantidade, preco, data_pedido)
VALUES (2, 'Ventilador', 1, 80.50, CURDATE());


```