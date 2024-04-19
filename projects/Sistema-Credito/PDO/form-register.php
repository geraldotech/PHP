<!DOCTYPE  html>
<html>
  <head>
  <title>Register Data</title>
</head>
    <body>
    <?php
//post
if(isset($_POST['acao'])){
  $username = "lucy";
  $password = "lucy";
  $database = "users";
  $table = "todo_list";
  $servername = 'localhost';

  //post data
  $content = $_POST['content'];


  try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO $database.todo_list (content) VALUES ('$content');";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
  } catch(PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }
  
  $conn = null;
}
?>
        <form  method="POST">
            <input  type="text"  name="content">          
            <input  type="submit"  name="acao" value="submit">
        </form>
    </body>
</html>
