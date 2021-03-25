<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $_SESSION['eventname']; ?></title>
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/event.css">
</head>
<body>
    <?php require "nav.php"; ?>
    <nav class="container subjects">
        <ul>
            <li><form action="config/div.php" method="get" <?php if (isset($_SESSION['tech'])) echo 'class="active"'; ?>><input name="tech" type="submit" value="Техподдержка"></form></li>
            <li><form action="config/div.php" method="get" <?php if (isset($_SESSION['eventsettings'])) echo 'class="active"'; ?>><input name="eventsettings" type="submit" value="Настройки события"></form></li>
        </ul>
    </nav>
    <main class="container">
        <?php
        if (isset($_SESSION['tech'])) {
        ?>
        <div class="chat">
            <form action="config/div.php">
                <input type="text" name="message">
                <button type="submit"><img src="img/submit.png" height="30px" alt="Отправить"></button>
            </form>
        </div><br><br>
        <?php
        } elseif (isset($_SESSION['eventsettings'])) {
        ?>
        <div class="eventsettings">
            <form action="config/div.php" method="post" enctype="multipart/form-data">
                <div class="title">
                    <h1>Создать событие</h1>
                </div>
                <select name="subjectset">
                    <option value="0">Музыка</option>
                    <option value="1">Искусство</option>
                    <option value="2">Наука</option>
                    <option value="3">Спорт</option>
                    <option value="4">Отдых</option>
                </select><br>
                <input type="text" placeholder="Название" name="titleset"><br>
                <textarea name="descriptionset" id="" cols="30" rows="10" placeholder="Описание"><?php  ?></textarea><br>
                <div class="input__wrapper">
                    <input name="imageset" type="file" name="file" id="input__file" class="input input__file" multiple>
                    <label for="input__file" class="input__file-button">
                        <span>Выберите картинку</span>
                    </label>
                </div><br>
                <select name="cityset" class="city">
                    <option value="0">Екатеринбург</option>
                    <option value="1">Москва</option>
                    <option value="2">Санкт-Петербург</option>
                    <option value="3">Новосибирск</option>
                </select><br>
                <input type="time" name="timeset"><br>
                <input type="date" name="dateset">
                <div class="chekbox">
                    <label for="crowdfunding">Краудфандинг:</label>
                    <input type="checkbox" name="crowdfundingset" id="">
                </div><br>
                <button type="submit">Создать</button>
            </form>
        </div><br><br>
        <?php
        }
        ?>
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/nav.js"></script>
</body>
</html>