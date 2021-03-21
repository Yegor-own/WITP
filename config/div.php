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

if (isset($_POST['subject'])
    and isset($_POST['title']) 
    and isset($_POST['descrioption'])
    and isset($_FILES['image'])) {
    if ($_POST['crowdfunding']) $_POST['crowdfunding'] = 1;
    else $_POST['crowdfunding'] = 0;
    if (mysqli_query($connection, "INSERT INTO `events` (`login`, `title`, `description`, `crowdfunding`, `img`, `subject`) VALUES (
        '".$_SESSION['login']."', 
        '".$_POST['title']."', 
        '".$_POST['descrioption']."', 
        '".$_POST['crowdfunding']."',
        '".$_FILES['image']['name']."',
        '".$_POST['subject']."')")) {
            foreach ($_FILES["image"]["error"] as $key => $error) {
                if ($error == UPLOAD_ERR_OK) {
                    $tmp_name = $_FILES["image"]["tmp_name"][$key];
                    $name = basename($_FILES["image"]["name"][$key]);
                    move_uploaded_file($tmp_name, "..img/$name");
                }
            }
            // $target = basename($_FILES['image']['name']);
            // move_uploaded_file($_FILES['file']['tmp_name'], "../img/$target");
            header("Location: /index.php");
            exit();
    }
}