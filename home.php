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
if(isset($_SESSION['username'])){
    echo "BOOKS ISSUED <br><table> <tr>
    <th>Name</th>
  </tr>";
    $sql2="select name from books where cid='".$_SESSION['cid']."' and status=2";
    $result = $conn->query($sql2);
    while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row['name']."</td></tr>";
    }
    echo "<table><br>";
    echo "BOOKS AVAILIBLE <br><table> <tr>
    <th>Name</th>
  </tr>";
    $sql2="select distinct name from books;";
    $result = $conn->query($sql2);
    while($row = $result->fetch_assoc()){
        echo "<tr><td>".$row['name']."</td></tr>";
    }
    echo "</table>";
    
}
else{
    header('location:login.php');
    exit;
}




?>
<html>
   
   <head>
      <title>Book Issue/Checkout</title>
   </head>
   
   <body>
   
   <form action="issue.php" method="POST">
        Book :<input type="text" name="book"><br>
        <input type="submit" value="Request Issue">
    </form>

   <form action="checkout.php" method="POST">
        Book :<input type="text" name="book"><br>
        <input type="submit" value="Checkout">
    </form>
    <form action="logout.php" method="POST">
        <input type="submit" value="Logout">
    </form>
    </body>

</html>
<?php
if(isset($_SESSION['e1'])){
    echo $_SESSION['e1'];
    $_SESSION['e1']="";
}
if(isset($_SESSION['e2'])){
    echo $_SESSION['e2'];
    $_SESSION['e2']="";
}
?>