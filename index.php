<?php
require __DIR__ . '/functions.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PhP Password</title>
</head>
<body>
    <label for='psw_length'>Inserisci la lunghezza della password. Deve essere tra 5 e 10 caratteri</label>
    <form action='./index.php' method='GET'>
        <input name='psw_length' type='number' min='5' max='10'>
        <button type="submit">Invia</button>
    </form>
    
    <p> <?= $msg ?> 
        <span> <?= $psw; ?> </span>
    </p>
</body>
</html>