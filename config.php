<?php
include "DBMysql.php";
include "Controller.php";
include "User.php";

//Подключение к базе
$db = new DBMysql('localhost','root', 'delo1982', 'tz');

//Инициализация экземпляра для использования в общем контроллере
new \Controller\Controller($db);