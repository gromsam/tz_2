<?php

namespace Controller;

class Controller
{
    public static $db;

    /**
     * Инициализация экземляра класса базы
     */
    public function __construct($db)
    {
        self::$db = $db;
    }

}