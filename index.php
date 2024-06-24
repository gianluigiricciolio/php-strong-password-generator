<?php
require_once __DIR__ . '/generate_pw.php';

session_start();


$condition = (
    !empty($_GET['numbers']) ||
    !empty($_GET['characters']) ||
    !empty($_GET['symbols'])
);

if ($condition) {

    // validazione intero con operatore ternario, length 10 in caso di default

    $password_length = !empty($_GET['length']) ? intval($_GET['length']) : 10;

    $password = generate_password($password_length);
    echo $password;

    $_SESSION['password'] = $password;

    $_SESSION['numbers'] = $_GET['numbers'];
    $_SESSION['characters'] = $_GET['characters'];
    $_SESSION['symbols'] = $_GET['symbols'];
    $_SESSION['no_repetitions'] = $_GET['no_repetitions'];


    header('Location: ./result.php');
} else echo 'Inserire una lunghezza valida e almeno un tipo di carattere';

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
        <div>
            <div>
                <input name="numbers" id="numbers" type="checkbox">
                <label for="numbers">Numbers</label>
            </div>
            <div>
                <input name="characters" id="characters" type="checkbox">
                <label for="characters">Characters</label>
            </div>
            <div>
                <input name="symbols" id="symbols" type="checkbox">
                <label for="symbols">Symbols</label>
            </div>
            <div>
                <input name="no_repetitions" id="no-rep" type="checkbox">
                <label for="no-rep">No Repetitions</label>
            </div>

        </div>
    </form>

</body>

</html>