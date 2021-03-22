<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Настройки</title>
    <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <?php require "nav.php"; ?>
    <main class="container rblock">
        <form action="config/div.php" method="post" enctype="multipart/form-data">
            <div class="title">
                <h1>Настройки</h1>
            </div>
            <input type="text" name="loginupdate" placeholder="Логин"><br>
            <input type="text" name="nameupdate" placeholder="Имя"><br>
            <input type="text" name="surnameupdate" placeholder="Фамилия"><br>
            <div class="input__wrapper">
                <input name="userimgupdate" type="file" name="file" id="input__file" class="input input__file" multiple>
                <label for="input__file" class="input__file-button">
                    <span>Выберите аватар</span>
                </label>
            </div><br>
            <button type="submit">Далее</button>
        </form>
    </main>
    <script src="js/nav.js"></script>
</body>
</html>