<?php
session_start();
$servername = "127.0.0.1";
$username = "root";
$password = "veerryanac";
$db = "bassgn";
$port = "3306";
$conn = new mysqli($servername, $username, $password,$db);
// echo "hi";
// die();
// echo $_SESSION['username'];

    $sql2="select * from books where status=1";
    $result = $conn->query($sql2);

    echo "<table><br>";
    echo "ISSUE REQUESTS <br><table> <tr>
    <th>Name</th>
    <th>Book id</th>
    <th>Customer id</th>
  </tr>";
    while($row = $result->fetch_assoc()){
                echo "<tr><td>".$row['name']."</td><td>".$row['bid']."</td><td>".$row['cid']."</td></tr>";
    }
    echo "</table><br>";




?>
<html>
   
   <head>
      <title>Admin</title>
   </head>
   
   <body>
   
   <form action="addbook.php" method="POST">
        Book Name:<input type="text" name="book"><br>
        Quantity:<input type="text" name="q"><br>
        <input type="submit" value="Add Book">
    </form>

   <form action="issuebook.php" method="POST">
        Book ID:<input type="text" name="bid"><br>
        <input type="submit" value="Issue book">
    </form>

    <form action="login.php" method="POST">
        <input type="submit" value="Logout">
    </form>


    
    </body>

</html>