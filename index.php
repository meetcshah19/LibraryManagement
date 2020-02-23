<?php
$servername = "127.0.0.1";
$username = "root";
$password = "veerryanac";
$db = "bassgn";
$port = "3306";
$conn = new mysqli($servername, $username, $password,$db);


if(isset($_POST["username"])&&$_POST["password"]){
    $hash=password_hash($_POST['password'],PASSWORD_BCRYPT);
    $sql2="select * from clients where username='".$_POST['username']."'";
    $result = $conn->query($sql2);
    if($result->num_rows<1){
    $sql = "INSERT INTO clients (username, password) VALUES ('".$_POST['username']."','".$hash."');";
    $conn->query($sql);
    }else{
        echo "username already present";
    }
}
?>

<html>
   
   <head>
      <title>User Register</title>
   </head>
   
   <body>
   <form action="<?php $_PHP_SELF ?>" method="POST">
        Register <br>
        Username : <input type="text" name="username"><br>Password : 
        <input type="password" name="password" required><br>
        <input type="submit" value="Register" required>
    </form>
    <form action="login.php" method="POST">
        <input type="submit" value="Login">
    </form>
    
    </body>

</html>