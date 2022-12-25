<?php

include ("dbconn.php");

if(isset($_POST['u'])){
    
    $stmt = $pdo->prepare("select * from users where username=? and password=?");
    $stmt->execute([
        $_POST['u'],
        $_POST['p']
        ]);
        $u = $stmt->fetch();
        

        $_SESSION['ulogovan'] = TRUE;
        $_SESSION['user'] = $u;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <label>Username<input type="text" name="u"></input></label><br>
        <label>Password<input type="text" name="p"></input></label><br>
        <button>Submit</button>
    </form>
</body>
</html>