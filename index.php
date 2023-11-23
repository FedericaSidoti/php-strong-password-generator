<?php
$psw_length = $_GET['psw_length'];
$psw_length_num = intval($psw_length);
$string_letters = 'qwertyuiopasdfghjklzxcvbnm'; 
$string_letters_up = 'ABCDEFGHIL';
$string_numbers = '0123456789'; 
$psw = ''; 

function getRandomNumber($min, $max) {
    $num = mt_rand($min, $max);
    return $num;
};

$num_letters = getRandomNumber(0,$psw_length_num); 
$num_letters_up = getRandomNumber(0, ($psw_length_num - $num_letters)); 
$num_numbers = $psw_length_num - ($num_letters + $num_letters_up);


for($i=0; $i< $num_letters; $i ++) {
    $index= getRandomNumber(0, 25); 
    $letter= $string_letters[$index]; 
    $psw .= $letter; 
};

if ($num_letters !== $psw_length_num) {
    for($i=0; $i < $num_letters_up; $i ++){
        $index= getRandomNumber(0, 9);
        $letter_up = $string_letters_up[$index];
        $psw .= $letter_up;
    };
};


if (($num_letters_up + $num_letters) !== $psw_length_num) {
    for($i= 0; $i < $num_numbers; $i ++) {
        $index= getRandomNumber(0, 9);
        $number = $string_numbers[$index];
        $psw .= $number;
    }
}

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
</body>
</html>