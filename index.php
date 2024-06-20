<?php
require_once __DIR__ . '/generate_pw.php';

session_start();

if (!empty($_GET['length'])) {

    // validazione intero con operatore ternario, length random tra 5 e 10 in caso di default

    $password_length = intval($_GET['length']) ? $_GET['length'] : rand(5, 10);

    $password = generate_password($password_length);
    echo $password;

    $_SESSION['password'] = $password;
    header('Location: ./result.php');
    die();
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
        <input name="length" type="number" id="lenght" style=" padding:5px; width: 60px;">
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