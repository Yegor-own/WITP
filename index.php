<?php
session_start();
require_once 'config/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body>
    <?php require "nav.php"; ?>
    <nav class="container subjects">
        <ul>
            <li><a href="">Концерты</a></li>
            <li><a href="">Лекции и мастер-классы</a></li>
            <li><a href="">Спорт</a></li>
            <li><a href="">Другое</a></li>
        </ul>
    </nav>
    <main class="container">
        <div class="start">
            <div class="content">
                <img src="img/start.jpg" alt="">
                <h2>Самые крутые тусовки здесь</h2>
                <a href="event.php">Вперед!</a>
            </div>
        </div>
    </main><br><br>

    <script src="js/index.js"></script>
</body>
</html>