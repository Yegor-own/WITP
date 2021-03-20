<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Войти</title>
</head>
<body>
    <div class="container">
        <?php
        if (isset($_SESSION['error'])) {echo $_SESSION['error'];}
        ?>
        <form action="config/div.php" method="get">
            <input type="text" name="login" placeholder="Логин">
            <input type="password" name="password" placeholder="Пароль">
            <button type="submit">Войти</button>
        </form>
    </div>
</body>
</html>