<?php
$connection = mysqli_connect('localhost','root','','app');

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if(mysqli_connect_errno()){
    echo 'Connection invalid!!!</br>';
    echo mysqli_connect_error();
    exit();
}