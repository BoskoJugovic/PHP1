<?php

include ("dbconn.php");

if(isset($_POST['ime']) && isset($_POST['prezime'])){
    $ime = $_POST['ime'];
    $prezime = $_POST['prezime'];
    if(strlen($ime)<3 || strlen($prezime)<3){
        echo "Prijavni obrazac nije ispravno popunjen";
    }else{
        // header("Location: prijava.php");
        echo "Prijava je prihvacena";
    }
}


$stmt = $pdo->prepare("insert into pregledi values (NULL,?,?,?,?,?)");
$stmt->execute([
    $_POST['ime'],
    $_POST['prezime'],
    $_POST['lekar'],
    $_POST['datum'],
    $_POST['zakazano']
]);

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="prijava.php" method="post">

        <input type="text" name="ime" placeholder="ime"></input>
        <br>
        <input type="text" name="prezime" placeholder="prezime"></input>
        <br>
        <select name="lekar">
            <option value="ortoped">Ortoped</option>
            <option value="stomatolog">Stomatolog</option>
            <option value="psihijatar">Psihijatar</option>
        </select>
        <br>
        <input type="date" name="datum"></input><br>
        <label>Zakazano<br><input type="radio" name="zakazano" >FALSE</input><input type="radio" name="zakazano">TRUE</input></label><br>
        <button>Submit</button>

    </form>
</body>
</html>


