<?php
session_start();
require_once "db.php";

if (isset($_POST['login']) and isset($_POST['password'])) {
    if (mysqli_query($connection, "INSERT INTO `users` (`login`, `password`) VALUES ('".$_POST['login']."', '".md5($_POST['password'])."')")) {
        $_SESSION['login'] = $_POST['login'];
        header("Location: /index.php");
        exit();
    }
}

if (isset($_GET['login']) and isset($_GET['password'])) {
    $query = mysqli_query($connection, "SELECT * FROM `users` WHERE `login`='".$_GET['login']."' AND `password`='".md5($_GET['password'])."'");
    $num_rows = mysqli_num_rows($query);
    if ($num_rows) {
        $_SESSION['login'] = $_GET['login'];
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
