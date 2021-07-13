<?php

    if(!defined("moonstudio")) return header("Location: /");

    $action = stripslashes(htmlspecialchars(trim($_GET['action'])));

    $url = explode('/', $action);

    if(empty($url[0]))
    {
		$title = ''.$config['ServerName'].' | Игровой сервер MineCraft';
        //$page = PUBLIC_DIR.'/main.php';
    }
    else
    {
        switch ($url[0])
	    {
            case 'admin':
            {
                if(IfAdmin())
                {
                    if(empty($url[1]))
                    {
                        $title = 'Главная | Админ панель';
                        $page = ADMIN_DIR.'/main.php';
                    }
                    else if($url[1] == "settings")
                    {
                        $title = 'Настройки | Админ панель';
                        $page = ADMIN_DIR.'/settings.php';
                    }
                    else if($url[1] == "servers")
                    {
                        $title = 'Серверы | Админ панель';
                        $page = ADMIN_DIR.'/servers.php';
                    }
                    else if($url[1] == "addserver")
                    {
                        $title = 'Добавление сервера | Админ панель';
                        $page = ADMIN_DIR.'/addserver.php';
                    }
                    else if($url[1] == "category")
                    {
                        $title = 'Категории | Админ панель';
                        $page = ADMIN_DIR.'/category.php';
                    }
                    else if($url[1] == "addcategory")
                    {
                        $title = 'Добавление категории | Админ панель';
                        $page = ADMIN_DIR.'/addcategory.php';
                    }
                    else if($url[1] == "otziv")
                    {
                        $title = 'Отзывы | Админ панель';
                        $page = ADMIN_DIR.'/otziv.php';
                    }
                    else if($url[1] == "addotziv")
                    {
                        $title = 'Добавление отзыва | Админ панель';
                        $page = ADMIN_DIR.'/addotziv.php';
                    }
                    else if($url[1] == "tovar")
                    {
                        $title = 'Товары | Админ панель';
                        $page = ADMIN_DIR.'/tovar.php';
                    }
                    else if($url[1] == "addtovar")
                    {
                        $title = 'Добавление товаров | Админ панель';
                        $page = ADMIN_DIR.'/addtovar.php';
                    }
                    else if($url[1] == "promo")
                    {
                        $title = 'Промо-коды | Админ панель';
                        $page = ADMIN_DIR.'/promo.php';
                    }
                    else if($url[1] == "addpromo")
                    {
                        $title = 'Добавление промо-кодов | Админ панель';
                        $page = ADMIN_DIR.'/addpromo.php';
                    }
                    else header("Location: /admin");
                }
                else
                {
                    $title = 'Вход | Админ панель';
                    $page = ADMIN_DIR.'/login.php';
                }
                break;
            }
            case 'logout':
            {
                session_unset();
                session_destroy();
                header("Location: /");
                break;
            }
            default:
		    {
				header("Location: /");
            }
        }
    }
?>
