<?php
session_start();

if (empty($_SESSION['password'])) {
    header('Location: ./index.php');
    die();
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
    <h1>La password generata è</h1>
    <div>
        <p>
            pw: <?php echo $_SESSION['password'] ?>
        </p>
    </div>
</body>

</html>