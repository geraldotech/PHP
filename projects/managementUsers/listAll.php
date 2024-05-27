<?php

session_start();

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

require_once 'connect.php';


// Fetch all clients
$stmt = $connection->query("SELECT * FROM users WHERE role = 'client'");
$clients = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<?php
include('./layout/header.php')
?>
    <h2>List All Clients</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Address</th>
            <th>CPF / CNPJ</th>
            <th>Age</th>
            <th>Action</th>
        </tr>
        <?php foreach ($clients as $client): ?>
            <tr>
                <td><?php echo $client['ID']; ?></td>
                <td><?php echo $client['FirstName']; ?></td>
                <td><?php echo $client['Address']; ?></td>
                <td><?php echo $client['CPFCNPJ']; ?></td>
                <td><?php echo $client['Age']; ?></td>
                <td><a href="editClient.php?id=<?php echo $client['ID']; ?>">Edit</a></td>
                <td><a href="newOrder.php?id=<?php echo $client['ID']; ?>">New Order</a></td>
                <td><a href="editOrders.php?id=<?php echo $client['ID']; ?>">editOrders</a></td>
                <td><!-- <a href="deleteClient.php?id=<?php echo $client['ID']; ?>">deleteClient 1</a> -->

                <form method="post" action="deleteClient.php" id="deletForm">
                    <input type="hidden" name="client_id" value="<?php echo $client['ID']; ?>">
                    <input type="submit" value="Delete2">
                    <button onclick="confirmDelete(<?php echo $client['ID']; ?>)">Delete 2</button>
                </form>            
            </td>

            </tr>
        <?php endforeach; ?>
    </table>

    <script>
       function confirmDelete(userID) {
            var result = confirm("Are you sure you want to delete this user?");
            if (result) {
                // If user confirms, submit the form with user ID
                document.getElementById('deletForm' + userID).submit();
            }
        }
    </script>
</body>
</html>
