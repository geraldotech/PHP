<?php
include('connect.php');

// Query to retrieve orders for a specific user
$user_id = 2; // Assuming the user ID you want to retrieve orders for is 1
$sql = "SELECT orders.*, clientes.nome AS cliente_nome
        FROM orders
        INNER JOIN clientes ON orders.cliente_id = clientes.id
        WHERE clientes.id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each order
    while ($row = $result->fetch_assoc()) {
        echo "<hr>"; 
        echo "Cliente: " . $row["cliente_nome"]. "<br>";
        echo "<hr>"; 
        echo "Pedido ID: " . $row["id"]. "<br>";
        echo "Produto: " . $row["produto"]. "<br>";
        echo "cliente_Id: " . $row["cliente_id"]. "<br>";
        echo "Quantidade: " . $row["quantidade"]. "<br>";
        echo "Preço: " . $row["preco"]. "<br>";
        echo "Data do Pedido: " . $row["data_pedido"]. "<br><br>";
    }
} else {
    echo "0 results";
}

// Close connection (optional as PHP will automatically close the connection when the script ends)
$conn->close();
?>
