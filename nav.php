<nav class="head container">
    <div class="title">
        <h1><a href="/index.php">WHERE IS THE PARTY</a></h1>
    </div>
    <div class="location">
        <form action="config/div.php" method="get">
            <button type="submit" class="subsity"><img src="maket/placeholder_1.svg" alt="" height="40px"></button>
            <select name="city" id="city">
                <option value="0">Екатеринбург</option>
                <option value="1">Москва</option>
                <option value="2">Санкт-Петербург</option>
                <option value="3">Новосибирск</option>
            </select>
        </form>
    </div>
    <div class="search">
        <form action="config/div.php" method="get">
            <button type="submit"><img src="maket/search_1.svg" alt=""></button>
            <input type="search" name="search" placeholder="Поиск">
        </form>
    </div>
    <div class="user">
        <?php
        if (isset($_SESSION['login'])) {
            echo '<div class="login">'.$_SESSION['login'].'  <img src="/img/drop.png" alt="" height="10px" width="10px"></div>';
            echo '<div class="avatar">
                    <img src="/user-image/'.$_SESSION['image'].'" alt="" height="70px" width="70px">
                    <ul class="submenu">
                        <li class="userbutton"><a href="events.php">События</a></li>
                        <li class="userbutton"><a href="new_event.php">Новое событие</a></li>
                        <li class="userbutton"><a href="settings.php">Настройки</a></li>
                        <li><form action="config/div.php" method="post"><input class="exit" name="exit" type="submit" value="Выйти"></form></li>
                    </ul> 
                </div>'; 
        } else {
            echo '<a class="auth" href="reg.php">Регистрация</a>';
            echo '<a class="auth" href="auth.php">Вход</a>';
        }
        ?>
        <!-- SUCKTION -->
    </div> 
</nav>