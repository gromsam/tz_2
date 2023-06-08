<?php

//Заполните переменные для подключения к базе
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = '';

include "DBMysql.php";
include "Controller.php";
include "User.php";

//Подключение к базе
$db = new DBMysql($hostname,$username, $password, $database);

//Инициализация экземпляра для использования в общем контроллере
new \Controller\Controller($db);