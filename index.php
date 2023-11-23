<?php
$psw_length = $_GET['psw_length'];
$psw_length_num = intval($psw_length);
var_dump($psw_length_num); 
$string_letters = 'qwertyuiopasdfghjklzxcvbnm'; 
$psw = ''; 

function getRandomNumber($max, $min) {
    $num = mt_rand($max, $min);
    return $num;
};


for($i=0; $i< $psw_length_num; $i ++) {
    $index= getRandomNumber(0, 25); 
    $letter= $string_letters[$index]; 
    $psw .= $letter; 
};

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

    <p>la tua password è 
        <span> <?= $psw; ?> </span>
    </p>
</body>
</html>