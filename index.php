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
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/main.css">
</head>
<body>
    <div class="container">
        <header class="head">
            <div class="title">
                <h1>WHERE IS THE PARTY</h1>
            </div>
            <div class="location">
                <form action="" method="get">
                    <img src="maket/placeholder_1.svg" alt="" height="40px">
                    <select name="city" id="city">
                        <option value="ekb">Екатеринтург</option>
                        <option value="msc">Москва</option>
                        <option value="spb">Санкт-Петербург</option>
                        <option value="nsk">Новосибирск</option>
                    </select>
                </form>
            </div>
            <div class="search">
                <form action="" method="get">
                    <button type="submit"><img src="maket/search_1.svg" alt=""></button>
                    <input type="search" name="search" placeholder="Поиск">
                </form>
            </div>
            <div class="user">
                <?php
                if (isset($_SESSION['login'])) {
                    echo '<div class="avatar"></div><br>';
                    echo '<div class="login"><b>'.$_SESSION['login'].'</b></div><br>';
                    echo '<div class="create-event"><a href="event.php">Создать событие</a></div><br>';
                    echo '<form action="config/div.php" method="post"><input class="exit" name="exit" type="submit" value="Выйти"></form>';                    
                } else {
                    echo '<a class="auth" href="auth.php">Войти</a> ';
                    echo '<a class="auth" href="reg.php">Зарегистрироваться</a>';
                }
                ?>
            </div>
        </header>
        <nav>
            <ul>
                <li><a href="">Концерты</a></li>
                <li><a href="">Лекции и мастер-классы</a></li>
                <li><a href="">Спорт</a></li>
                <li><a href="">Другое</a></li>
            </ul>
        </nav>
        <main>
            <header>
                <div class="slider">
                    <div class="slide">
                        <div class="title">
                            <h2>События недели</h2>
                            <p>Выбор аудитории</p>
                        </div>
                    </div>
                </div>
            </header>
            <div class="content">
                <div class="foru">
                    <div class="title">Для вас</div>
                    <div class="slider">
                        <div class="slide"></div>
                    </div>
                </div>
                <div class="evnts">
                    <div class="title">Ближайшие события</div>
                    <div class="slider">
                        <div class="slide"></div>
                    </div>
                </div>
                <div class="compilations">
                    <div class="title">Подборки</div>
                    <div class="slider">
                        <div class="slide"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>