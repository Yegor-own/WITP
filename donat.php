<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donat</title>
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/donat.css">
</head>
<body>
    <?php require "nav.php"; ?>
    <main class="container rblock">
        <form action="config/div.php" method="post" enctype="multipart/form-data">
            <div class="title">
                <h1>Донат</h1>
            </div>
            <input type="number" name="amount" placeholder="Сумма перевода"><br>
            <input type="number" name="numbercard" placeholder="Номер карты"><br>
            <input type="date" name="validity" placeholder="Срок действия"><br>
            <input type="text" name="cvc" placeholder="CVC / CVV"><br>
            <input type="text" name="name" placeholder="Имя и Фамилия"><br>
            <button type="submit">Далее</button>
        </form>
    </main><br><br>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/nav.js"></script>
</body>
</html>