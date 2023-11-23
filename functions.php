<?php

$psw_length = isset($_GET['psw_length']) ? $_GET['psw_length'] : null ;
$psw_length_num = intval($psw_length);
$string_letters = 'qwertyuiopasdfghjklzxcvbnm'; 
$string_letters_up = 'ABCDEFGHIL';
$string_numbers = '0123456789';
$string_symbols = '&%£!?@ç'; 
$psw = ''; 
$msg= ''; 

function getRandomNumber($min, $max) {
    $num = mt_rand($min, $max);
    return $num;
};

if ($psw_length_num > 5) {
    $msg= 'Ecco la tua password!';


//la password è minimo di 5 caratteri, deve contenere tutti e 4 i parametri almeno una volta
//il primo parametro può comparire al massimo lungezzaPassword - 3, perchè deve lasciare lo spazio ad almeno 1 carattere per ogni parametro rimanente
$num_letters = getRandomNumber(1,($psw_length_num -3)); 
//il secondo parametro può comparire al massimo lunghezzaPassword -2, perchè deve lasciare spazio agli altri 2 parametri
$num_letters_up = getRandomNumber(1, (($psw_length_num -2) - $num_letters)); 
//terzo parametro: lunghezzpassword - 1
$num_symbols = getRandomNumber(1, ($psw_length_num -1) - ($num_letters_up + $num_letters));
//qui arriviamo fino alla lunghezza completa della password
$num_numbers = $psw_length_num - ($num_letters + $num_letters_up + $num_symbols);


for($i=0; $i< $num_letters; $i ++) {
    $index= getRandomNumber(0, 25); 
    $letter= $string_letters[$index]; 
    $psw .= $letter; 
};

    for($i=0; $i < $num_letters_up; $i ++){
        $index= getRandomNumber(0, 9);
        $letter_up = $string_letters_up[$index];
        $psw .= $letter_up;
    };

    for($i= 0; $i < $num_numbers; $i ++) {
        $index= getRandomNumber(0, 9);
        $number = $string_numbers[$index];
        $psw .= $number;
    }; 

    for($i= 0; $i < $num_symbols; $i ++) {
        $index= getRandomNumber(0, 6);
        $symbol = $string_symbols[$index];
        $psw .= $symbol;
    }; 
} else if ( isset($_GET['psw_length']) === false) { 
    $msg = 'Non hai ancora inserito la password';
} else if ($psw_length_num < 5) {
    $msg= 'Ops! qualcosa è andato storto.' ;
}