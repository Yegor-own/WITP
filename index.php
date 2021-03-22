<?php
session_start();
require_once 'config/db.php';
$events = mysqli_query($connection, "SELECT * FROM `events`");
$rows = mysqli_num_rows($events);
$rows = ceil($rows / 2);
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
    <?php
    require "nav.php";
    if (isset($_SESSION['login'])) {
    ?>
    <nav class="container subjects">
        <ul>
            <li><form action="config/div.php" method="get" class="active"><input name="recomendations" type="submit" value="Рекомендации"></form></li>
            <li><form action="config/div.php" method="get"><input type="submit" name="subs" value="Подписки"></form></li>
        </ul>
    </nav>
    <?php
    }
    ?>
    <main class="container">
        <?php 
        if (!isset($_SESSION['login'])) {
        ?>
        <div class="start">
            <div class="content">
                <img src="img/start.jpg" alt="">
                <h2>Самые крутые тусовки здесь</h2>
                <a href="reg.php">Вперед!</a>
            </div>
        </div>
        <?php
        }
        if (isset($_SESSION['login'])) {
            if ($_SESSION['rec']) {
        ?>
        <div class="recomendations">
                <?php
                while ($event = mysqli_fetch_assoc($events)) {
                    $colors = ['#FF7567', '#FEC053', 'cyan', 'blue', 'darkorchid'];
                    $names = ['Музыка', 'Искусство', 'Наука', 'Спорт', 'Отдых'];
                ?>
                <div class="event">
                    <div class="image"><img src="/event-background/<?php echo $event['img']; ?>" alt="Лого"></div>
                    <div class="subject" style="background-color: <?php echo $colors[$event['subject']]; ?>"><span><?php echo $names[$event['subject']]; ?></span></div>
                    <div class="title"><h2><?php echo $event['title']; ?></h2></div>
                    <div class="desc"><h4><?php echo $event['description']; ?></h4></div>
                    <div class="author"><h4>Автор: <?php echo $event['author']; ?></h4><form action="config/div.php" method="post"><input type="hidden" name="author" value="<?php echo $event['login']; ?>"><button class="subscr" type="submit">Подписаться</button></form></div>
                    <form action="config/div.php" method="post"><input type="hidden" name="event" value="<?php echo $event['id']; ?>"><input name="sign" class="submit" type="submit" value="Записаться"></form><br>
                </div>
                <?php
                }
                ?>
        </div>
        <?php
            }
        }
        ?>
    </main><br><br>
    <script src="js/nav.js"></script>
    <script src="js/index.js"></script>
</body>
</html>