<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Регистрация</title>
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/nav.css">
    <link rel="stylesheet" href="css/auth.css">
</head>
<body>
    <?php require "nav.php"; ?>
    <main class="container rblock">
        <form action="config/div.php" method="post" enctype="multipart/form-data">
        <div class="title">
                <?php if (!empty($_SESSION['error'])) echo $_SESSION['error']; ?>
                <h1>Регистрация</h1>
            </div>
            <input type="text" name="login" placeholder="Логин"><br>
            <input type="password" name="password" placeholder="Пароль"><br>
            <input type="text" name="name" placeholder="Имя"><br>
            <input type="text" name="surname" placeholder="Фамилия"><br>
            <input type="date" name="brith" placeholder="Дата рождения"><br>
            <div class="subj">Интересы <img src="img/drop.png" height="15px" alt=""></div><br>
            <ul class="subject">
                <li><input type="checkbox" name="subject0" value="0">Музыка</li>
                <li><input type="checkbox" name="subject1" value="1">Искусство</li>
                <li><input type="checkbox" name="subject2" value="2">Наука</li>
                <li><input type="checkbox" name="subject3" value="3">Спорт</li>
                <li><input type="checkbox" name="subject4" value="4">Отдых</li>
            </ul>
            <div class="input__wrapper">
                <input name="userimg" type="file" name="file" id="input__file" class="input input__file" multiple>
                <label for="input__file" class="input__file-button">
                    <span>Выберите аватар</span>
                </label>
            </div><br>
            <button type="submit">Далее</button>
        </form>
    </main><br><br>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="js/reg.js"></script>
</body>
</html>