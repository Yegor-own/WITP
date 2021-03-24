<?php
session_start();
require_once 'config/db.php';
if (isset($_SESSION['rec'])) {
    $is = join("','", $_SESSION['subjects']);
    $events = mysqli_query($connection, "SELECT * FROM `events` WHERE `subject` IN ('".$is."')");
}
elseif (isset($_SESSION['sub'])) $subs = mysqli_query($connection, "SELECT * FROM `users` WHERE `login`='".$_SESSION['login']."'");
if (isset($_SESSION['city'])) $city = mysqli_query($connection, "SELECT * FROM `events` WHERE `city`='".$_SESSION['city']."'");
if (isset($_SESSION['search'])) $search = mysqli_query($connection, "SELECT * FROM `events` WHERE `title` LIKE '%".$_SESSION['search']."%'");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Главная</title>
    <link rel="stylesheet" href="css/font.css">
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
            <li><form action="config/div.php" method="get" <?php if (isset($_SESSION['rec'])) echo 'class="active"'; ?>><input name="recomendations" type="submit" value="Рекомендации"></form></li>
            <li><form action="config/div.php" method="get" <?php if (isset($_SESSION['sub'])) echo 'class="active"'; ?>><input type="submit" name="subs" value="Подписки"></form></li>
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
                    $cities = ['Екатеринбург', 'Москва', 'Санкт-Петербург', 'Новосибирск'];
                    if ($event['author'] != $_SESSION['login']) {
                ?>
                <div class="event">
                    <div class="image"><img src="/event-background/<?php echo $event['img']; ?>" alt="Лого"></div>
                    <div class="subject" style="background-color: <?php echo $colors[$event['subject']]; ?>"><span><?php echo $names[$event['subject']]; ?></span></div>
                    <div class="title"><h2><?php echo $event['title']; ?></h2></div>
                    <div class="desc"><h4><?php echo $event['description']; ?></h4></div>
                    <div class="desc"><h4>Время:    <?php echo $event['time']; ?><span>       </span><?php echo $event['date']; ?></h4></div>
                    <div class="location"><h4>Город:    <?php echo $cities[$event['city']]; ?></h4></div>
                    <?php
                    if ($event['crowdfunding']) {
                        $query = mysqli_query($connection, "SELECT * FROM `users` WHERE `login`='".$event['author']."'");
                        $q = mysqli_fetch_assoc($query);
                        echo '<div class="croudfinding"><h4>Нужен донат, карта автора '.$q['payment'].'</h4></div>';
                    }
                    ?>
                    <div class="author"><h4>Автор: <?php echo $event['author']; ?></h4><form action="config/div.php" method="post"><input type="hidden" name="author" value="<?php echo $event['author']; ?>"><button class="subscr" type="submit">Подписаться</button></form></div>
                    <form action="config/div.php" method="post"><input type="hidden" name="event" value="<?php echo $event['id']; ?>"><input name="sign" class="submit" type="submit" value="Записаться"></form><br>
                </div>
                <?php
                    }
                }
                ?>
        </div>
        <?php
            } elseif (isset($_SESSION['sub'])) {
            ?>
            <div class="subscribes">
                <?php
                $s = mysqli_fetch_assoc($subs);
                $tmp = explode(",", $s['subs']);
                foreach ($tmp as $key => $value) {
                    $av = mysqli_query($connection, "SELECT * FROM `users` WHERE `login`='".$value."'");
                    $avatar = mysqli_fetch_assoc($av);
                ?>
                <div class="subscribe">
                    <div class="name"><h3><?php echo $value; ?></h3></div>
                    <div class="avatar"><img src="user-image/<?php echo $avatar['img']; ?>" height="70px" width="70px" alt=""></div>
                </div>
                <?php
                }
                ?>
            </div>
            <?php
            }
        }
        if (isset($_SESSION['city'])) {
        ?>
        <div class="recomendations">
            <?php
            while ($localevents = mysqli_fetch_assoc($city)) {
                $colors = ['#FF7567', '#FEC053', 'cyan', 'blue', 'darkorchid'];
                $names = ['Музыка', 'Искусство', 'Наука', 'Спорт', 'Отдых'];
                $cities = ['Екатеринбург', 'Москва', 'Санкт-Петербург', 'Новосибирск'];
            ?>
            <div class="event">
                <div class="image"><img src="/event-background/<?php echo $localevents['img']; ?>" alt="Лого"></div>
                <div class="subject" style="background-color: <?php echo $colors[$localevents['subject']]; ?>"><span><?php echo $names[$localevents['subject']]; ?></span></div>
                <div class="title"><h2><?php echo $localevents['title']; ?></h2></div>
                <div class="desc"><h4><?php echo $localevents['description']; ?></h4></div>
                <div class="time"><h4>Время:    <?php echo $localevents['time']; ?><span>       </span><?php echo $localevents['date']; ?></h4></div>
                <div class="location"><h4><?php echo $cities[$localevents['city']]; ?></h4></div>
                <?php
                if ($localevents['crowdfunding']) {
                    $query = mysqli_query($connection, "SELECT * FROM `users` WHERE `login`='".$localevents['author']."'");
                    $q = mysqli_fetch_assoc($query);
                    echo '<div class="croudfinding"><h4>Нужен донат, карта автора '.$q['payment'].'</h4></div>';
                }
                ?>
                <div class="author"><h4>Автор: <?php echo $localevents['author']; ?></h4><form action="config/div.php" method="post"><input type="hidden" name="author" value="<?php echo $localevents['author']; ?>"><button class="subscr" type="submit">Подписаться</button></form></div>
                <form action="config/div.php" method="post"><input type="hidden" name="events" value="<?php echo $localevents['id']; ?>"><input name="sign" class="submit" type="submit" value="Записаться"></form><br>
            </div>
            <?php
            }
            ?>
        </div>
        <?php
        }
        if (isset($_SESSION['search'])) {
        ?>
        <div class="recomendations">
            <?php
            while ($result = mysqli_fetch_assoc($search)) {
                $colors = ['#FF7567', '#FEC053', 'cyan', 'blue', 'darkorchid'];
                $names = ['Музыка', 'Искусство', 'Наука', 'Спорт', 'Отдых'];
                $cities = ['Екатеринбург', 'Москва', 'Санкт-Петербург', 'Новосибирск'];
            ?>
            <div class="event">
                <div class="image"><img src="/event-background/<?php echo $result['img']; ?>" alt="Лого"></div>
                <div class="subject" style="background-color: <?php echo $colors[$result['subject']]; ?>"><span><?php echo $names[$result['subject']]; ?></span></div>
                <div class="title"><h2><?php echo $result['title']; ?></h2></div>
                <div class="desc"><h4><?php echo $result['description']; ?></h4></div>
                <div class="time"><h4>Время:    <?php echo $result['time']; ?><span>       </span><?php echo $result['date']; ?></h4></div>
                <div class="location"><h4><?php echo $cities[$result['city']]; ?></h4></div>
                <?php
                if ($result['crowdfunding']) {
                    $query = mysqli_query($connection, "SELECT * FROM `users` WHERE `login`='".$result['author']."'");
                    $q = mysqli_fetch_assoc($query);
                    echo '<div class="croudfinding"><h4>Нужен донат, карта автора '.$q['payment'].'</h4></div>';
                }
                ?>
                <div class="author"><h4>Автор: <?php echo $result['author']; ?></h4><form action="config/div.php" method="post"><input type="hidden" name="author" value="<?php echo $result['author']; ?>"><button class="subscr" type="submit">Подписаться</button></form></div>
                <form action="config/div.php" method="post"><input type="hidden" name="events" value="<?php echo $result['id']; ?>"><input name="sign" class="submit" type="submit" value="Записаться"></form><br>
            </div>
            <?php
            }
            ?>
        </div>
        <?php
        }
        ?>
    </main><br><br>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/nav.js"></script>
    <script src="js/index.js"></script>
</body>
</html>