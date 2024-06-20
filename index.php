<?php
if (!empty($_GET['length'])) {
    $password = '';

    $chars = range('a', 'z');
    $upper_chars = range('A', 'Z');
    $nums = range('0', '9');
    $symb = range('!', '/');

    // se unisco tutti in un array:
    // tot = 26 + 26 + 10 + 20;
    // prob char = 26/tot;
    // prob upp = 26/tot;
    // prob numb = 10/tot;
    // mentre così ogni char_type ha le stesse prob


    $pass_chars = [
        $chars,
        $upper_chars,
        $nums,
        $symb
    ];

    for ($i = 0; $i < $_GET['length']; $i++) {
        $first_rand = rand(0, 3);
        $char_type = $pass_chars[$first_rand];
        $password .= $char_type[rand(0, count($char_type) - 1)];
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>
</head>

<body>
    <h1>Password Generator</h1>
    <form method="GET" action="">
        <label for="length">Quanti caratteri?</label>
        <input name="length" type="number" id="lenght" style="width: 60px">
        <input type="submit" value="Genera Password"></input>
    </form>
    <?php

    if (!empty($_GET['length'])) {
        $length = $_GET['length'];
        echo 'Lunghezza password: ' . $length;
        echo '<br>';
        echo 'password: ' . $password;
    }

    ?>

</body>

</html>