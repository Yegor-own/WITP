<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Создать событие</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/new_event.css">
</head>
<body>
    <?php require "nav.php" ?>
    <main class="container eblock">
        <form action="config/div.php" method="post" enctype="multipart/form-data">
            <div class="title">
                <h1>Создать событие</h1>
            </div>
            <select name="subject">
                <option value="0">Музыка</option>
                <option value="1">Искусство</option>
                <option value="2">Наука</option>
                <option value="3">Спорт</option>
                <option value="4">Отдых</option>
            </select><br>
            <input type="text" placeholder="Название" name="title"><br>
            <textarea name="descrioption" id="" cols="30" rows="10" placeholder="Описание"></textarea><br>
            <div class="input__wrapper">
                <input name="image" type="file" name="file" id="input__file" class="input input__file" multiple>
                <label for="input__file" class="input__file-button">
                    <span>Выберите картинку</span>
                </label>
            </div><br>
            <select name="city" class="city">
                <option value="ekb">Екатеринбург</option>
                <option value="msc">Москва</option>
                <option value="spb">Санкт-Петербург</option>
                <option value="nsk">Новосибирск</option>
            </select><br>
            <input type="time" name="time"><br>
            <input type="date" name="date">
            <div class="chekbox">
                <label for="crowdfunding">Краудфандинг:</label>
                <input type="checkbox" name="crowdfunding" id="">
            </div><br>
            <button type="submit">Создать</button>
        </form>
    </main>
    <script src="js/nav.js"></script>
</body>
</html>