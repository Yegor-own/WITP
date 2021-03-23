<?php
session_start();
require_once "db.php";

if (isset($_POST['login']) 
    and isset($_POST['password'])
    and isset($_POST['name'])
    and isset($_POST['surname'])
    and isset($_POST['brith'])) {
    if (isset($_FILES['userimg']['name'])) {
        if (mysqli_query($connection, "INSERT INTO `users` (`login`, `password`, `name`, `surname`, `brith`, `img`) VALUES ('".$_POST['login']."', 
                                                                                                                            '".md5($_POST['password'])."', 
                                                                                                                            '".$_POST['name']."', 
                                                                                                                            '".$_POST['surname']."', 
                                                                                                                            '".$_POST['brith']."', 
                                                                                                                            '".$_FILES['userimg']['name']."')")) {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['image'] = $_FILES['userimg']['name'];
            move_uploaded_file($_FILES['userimg']['tmp_name'], '../user-image/'.$_FILES['userimg']['name']);
            header("Location: /index.php");
            exit();
        }
    } else {
        if (mysqli_query($connection, "INSERT INTO `users` (`login`, `password`) VALUES ('".$_POST['login']."', '".md5($_POST['password'])."')")) {
            $_SESSION['login'] = $_POST['login'];
            $_SESSION['image'] = 'unknown.jpg';
            header("Location: /index.php");
            exit();
        }
    }
}

if (isset($_GET['login']) and isset($_GET['password'])) {
    $query = mysqli_query($connection, "SELECT * FROM `users` WHERE `login`='".$_GET['login']."' AND `password`='".md5($_GET['password'])."'");
    $f = mysqli_fetch_assoc($query);
    $num_rows = mysqli_num_rows($query);
    if ($num_rows) {
        $_SESSION['login'] = $_GET['login'];
        $_SESSION['image'] = $f['img'];
        header("Location: /index.php");
        exit();
    } else {
        $_SESSION['error'] = 'Ошибка входа';
        header("Location: /auth.php");
        exit();
    }
}

if (isset($_POST['exit'])) {
    session_destroy();
    header("Location: /index.php");
    exit();
}

if (isset($_POST['subject'])
    and isset($_POST['title']) 
    and isset($_POST['descrioption'])
    and isset($_POST['time'])
    and isset($_POST['date'])
    and isset($_FILES['image'])) {
    if ($_POST['crowdfunding']) $_POST['crowdfunding'] = 1;
    else $_POST['crowdfunding'] = 0;
    if (mysqli_query($connection, "INSERT INTO `events` (`author`, `title`, `description`, `crowdfunding`, `img`, `subject`, `city`, `time`, `date`) VALUES (
        '".$_SESSION['login']."', 
        '".$_POST['title']."', 
        '".$_POST['descrioption']."', 
        '".$_POST['crowdfunding']."',
        '".$_FILES['image']['name']."',
        '".$_POST['subject']."',
        '".$_POST['city']."',
        '".$_POST['time']."',
        '".$_POST['date']."')")) {
            $target = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'], '../event-background/'.$target);
            header("Location: /index.php");
            exit();
    } else {
        echo 'Error';
    }
}

if (isset($_GET['recomendations'])) {
    $_SESSION['rec'] = true;
    unset($_GET['recomendations']);
    unset($_SESSION['sub']);
    unset($_SESSION['city']);
    unset($_SESSION['search']);
    header("Location: /index.php");
    exit();
}

if (isset($_GET['subs'])) {
    $_SESSION['sub'] = true;
    unset($_GET['subs']);
    unset($_SESSION['rec']);
    unset($_SESSION['city']);
    unset($_SESSION['search']);
    header("Location: /index.php");
    exit();
}

if (isset($_POST['sign'])) {
    $query = mysqli_query($connection, "SELECT * FROM `events` WHERE `id`='".$_POST['event']."'");
    $query = mysqli_fetch_assoc($query);
    $guest = $query['guests'].$_SESSION['login'];
    if (mysqli_query($connection, "UPDATE `events` SET `guests`='".$guest."' WHERE `id` = '".$_POST['event']."'")) {
        header("Location: /index.php");
        exit();
    }
}

if (isset($_GET['events'])) {
    $_SESSION['eve'] = true;
    unset($_GET['events']);
    unset($_SESSION['evey']);
    header("Location: /events.php");
    exit();
}

if (isset($_GET['yourevents'])) {
    $_SESSION['evey'] = true;
    unset($_GET['yourevents']);
    unset($_SESSION['eve']);
    header("Location: /events.php");
    exit();
}

if (isset($_POST['author'])) {
    $query = mysqli_query($connection, "SELECT * FROM `users` WHERE `login`='".$_SESSION['login']."'");
    $query = mysqli_fetch_assoc($query);
    if (strpos($query['subs'], $_POST['author']) === false) {
        if ($query['subs'] != $_SESSION['login']) {
            $sub = $query['subs'].','.$_POST['author'];
            if (mysqli_query($connection, "UPDATE `users` SET `subs`='".$sub."' WHERE `login`='".$_SESSION['login']."'")) {
                $_SESSION['sub'] = true;
                unset($_GET['subs']);
                unset($_SESSION['rec']);
                header("Location: /index.php");
                exit();
            }
        } else {
            header("Location: /index.php");
            exit();
        }
    } else {
        header("Location: /index.php");
        exit();
    }
}

if (isset($_POST['loginupdate']) or isset($_POST['nameupdate']) or isset($_POST['surnameupdate']) or isset($_FILES['userimgupdate'])) {
    if (!empty($_POST['loginupdate'])) {
        if (mysqli_query($connection, "UPDATE `users` SET `login`='".$_POST['loginupdate']."' WHERE `login`='".$_SESSION['login']."'")) {
            mysqli_query($connection, "UPDATE `events` SET `author`='".$_POST['loginupdate']."' WHERE `author`='".$_SESSION['login']."'");
            $_SESSION['login'] = $_POST['loginupdate'];
        }
    }
    if (!empty($_POST['nameupdate'])) {
        mysqli_query($connection, "UPDATE `users` SET `name`='".$_POST['nameupdate']."' WHERE `login`='".$_SESSION['login']."'");
    }
    if (!empty($_POST['surnameupdate'])) {
        mysqli_query($connection, "UPDATE `users` SET `surname`='".$_POST['surnameupdate']."' WHERE `login`='".$_SESSION['login']."'");
    }
    if (!empty($_FILES['userimgupdate']['name'])) {
        if (mysqli_query($connection, "UPDATE `users` SET `img`='".$_FILES['userimgupdate']['name']."' WHERE `login`='".$_SESSION['login']."'")) {
            $target = $_FILES['userimgupdate']['name'];
            move_uploaded_file($_FILES['userimgupdate']['tmp_name'], '../user-image/'.$target);
            $_SESSION['image'] = $target;
            unset($_FILES['userimgupdate']);
        }   
    }
    header("Location: /index.php");
    exit();
}

if (isset($_GET['city'])) {
    unset($_SESSION['rec']);
    unset($_SESSION['sub']);
    $_SESSION['city'] = $_GET['city'];
    header("Location: /index.php");
    exit();
}

if ($_GET['search']) {
    unset($_SESSION['rec']);
    unset($_SESSION['sub']);
    unset($_SESSION['city']);
    $_SESSION['search'] = $_GET['search'];
    header("Location: /index.php");
    exit();
}