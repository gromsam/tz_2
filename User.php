<?php

namespace User;

use Controller\Controller;

/**
 * Базовый класс пользователя
 */
class User extends Controller
{

    /**
     * Получение пользователей из базы
     *
     * @param string $ids пример 1,3,4
     * @return array $users
     */
    static function getUsersByIds($ids){
        $users = self::$db->query("SELECT id, name FROM users WHERE id in ($ids) ORDER BY name");
        return $users;
    }


}