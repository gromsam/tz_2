<?php

use User\User;

require_once 'config.php';

$user_ids = false;

// Как правило, в $_GET['user_ids'] должна приходить строка
// с номерами пользователей через запятую, например: 1,2,17,48
if(isset($_GET['user_ids']) && $_GET['user_ids']) {

    $user_ids = $_GET['user_ids'];

    // для предотвращения SQl инъекций распарсим строку на массив
    $user_ids = explode(',', $user_ids); //Массив ключей ID пользователей

    //Это будет массив с валидными IDS пользователей
    $ids = [];

    //Проходим циклом по ключам для формирования валидного массива IDS пользователей
    foreach($user_ids as $user_id){

        //Делаем примитивную валидацию. На выходе получим только цифру в т.ч. ноль
        $first_symbol = abs((int) $user_id[0]);

        //ID не может быть 0 поэтому его исключаем
        if($first_symbol != 0 ){
            $ids[] = $first_symbol;
        }
    }

    //Если валидный массив
    if (is_array($ids)){

        //Конвертируем массив в строку с разделителем ","
        $valid_keys_users = implode( ',', $ids );
        $user_ids = $valid_keys_users;
    }

}

if($user_ids){

//    $user = new User($db);

    $userList = User::getUsersByIds($user_ids);

    if(isset($userList) && $userList){
        echo "<ul>";
        foreach($userList as $user):
            echo "<li>";
                echo "<a href='/show_user.php?id=".$user['id']."'>";
                    echo $user['name'];
                echo "</a>";
            echo "</li>";
        endforeach;
        echo "</ul>";
    }

}
