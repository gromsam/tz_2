<?php
include "DBMysql.php";
include "Controller.php";
include "User.php";

//Подключение к базе
$db = new DBMysql('localhost','root', '', '');

//Инициализация экземпляра для использования в общем контроллере
new \Controller\Controller($db);