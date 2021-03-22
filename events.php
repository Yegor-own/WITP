<?php
session_start();
require_once 'config/db.php';
$events = mysqli_query($connection, "SELECT * FROM `events` WHERE `guests` LIKE '%".$_SESSION['login']."%'");   
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/events.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
</head>
<body>
    <?php
    require "nav.php";
    ?>
    <nav class="container subjects">
        <ul>
            <li><form action="config/div.php" method="get" class="active"><input name="events" type="submit" value="События"></form></li>
            <li><form action="config/div.php" method="get"><input type="submit" name="yourevents" value="Ваши события"></form></li>
        </ul>
    </nav>
    <main class="container">
        <div class="events">
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
            </div>
            <?php
            }
            ?>
        </div>
    </main><br><br>
    <script src="js/nav.js"></script>
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/slick.min.js"></script> -->
    <script src="js/index.js"></script>
</body>
</html>