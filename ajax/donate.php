<?php
    session_start();
    define("moonstudio", true);
    include '../engine/config.php';


    $server = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['server']))));
    $name = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['name']))));
    $tovar = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['tovar']))));
    $promo = $mysqli->real_escape_string(stripslashes(htmlspecialchars(trim($_POST['promo']))));


    $sql = "SELECT * FROM `servers` WHERE `name` = '{$server}'";
    $result = $mysqli->query($sql);
    $rows = $result->num_rows;

    if($rows != 1)
    {
        echo message('Ошибка', 'Выберите сервер', 'error');
        return false;
    }
    if($rows == 1)
    {
        $result->data_seek(0);
        $servers = $result->fetch_assoc();
        $server = $servers['code'];
    }
    if(empty($name))
    {
        echo message('Ошибка', 'Игровой ник не указан', 'error');
        return false;
    }


    if(!empty($promo))
    {
        $sql = "SELECT * FROM `promo` WHERE `name` = '{$promo}'";
        $result = $mysqli->query($sql);

        $rows = $result->num_rows;

        if($rows == 1)
        {
            $result->data_seek(0);
            $promo = $result->fetch_assoc();


            $sql = "SELECT * FROM `tovari` WHERE `id` = '{$tovar}'";
            $result = $mysqli->query($sql);

            $rows = $result->num_rows;

            if($rows == 1)
            {
                $result->data_seek(0);
                $tovar = $result->fetch_assoc();

                $price = ($tovar['price']*$promo['percent'])/100;
				$price = $tovar['price'] - $price;

            }
            else
            {
                echo message('Ошибка', 'Выберите товар', 'error');
                return false;
            }
        }
        else
        {
            echo message('Ошибка', 'Промокод не найден!', 'error');
            return false;
        }
    }
    else
    {
        $sql = "SELECT * FROM `tovari` WHERE `id` = '{$tovar}'";
        $result = $mysqli->query($sql);

        $rows = $result->num_rows;

        if($rows == 1)
        {
            $result->data_seek(0);
            $tovar = $result->fetch_assoc();

            $price = $tovar['price'];
        }
        else
        {
            echo message('Ошибка', 'Выберите товар', 'error');
            return false;
        }
    }




    $sql = "SELECT * FROM `last_buys` WHERE `name` = '{$name}' AND `category` = 'Привилегии' AND `server` = '{$server}' ORDER BY `id` DESC LIMIT 1";
    $result = $mysqli->query($sql);

    $rows = $result->num_rows;

    if($rows == 1 && $tovar['category'] == 'Привилегии')
    {
        $result->data_seek(0);
        $last = $result->fetch_assoc();


        $sql = "SELECT * FROM `tovari` WHERE `code` = '{$last['tovar']}'";
        $result = $mysqli->query($sql);

        $rows = $result->num_rows;

        if($rows > 0)
        {
            $result->data_seek(0);
            $lasttovar = $result->fetch_assoc();

            if($lasttovar['price'] < $tovar['price'])
            {
                $price = $tovar['price'] - $last['price'];

                if(!empty($promo))
                {
                    $pricee = ($price*$promo['percent'])/100;

					$price = $price - $pricee;
                }

                $url = GotoPay($name, $server, $price, $tovar['category'], $tovar['code'], $tovar['name'], $config['MerchantID'], $config['SecretWord']);

                echo json_encode(array(
                    'status' => 'info',
                    'url' => $url,
                    'title' => 'Информация',
                    'message' => 'Поскольку у Вас уже есть привилегия, сумма оплаты будет меньше',));
            }
            else
            {
                echo message('Ошибка', 'У вас высокий уровень привилегии', 'error');
            }
        }
        else
        {
            $url = GotoPay($name, $server, $price, $tovar['category'], $tovar['code'], $tovar['name'], $config['MerchantID'], $config['SecretWord']);
            echo json_encode(array('status' => 'success', 'url' => $url));
        }
    }
    else
    {
        $url = GotoPay($name, $server, $price, $tovar['category'], $tovar['code'], $tovar['name'], $config['MerchantID'], $config['SecretWord']);
        echo json_encode(array('status' => 'success', 'url' => $url));
    }


function GotoPay($nick, $serv, $sum, $cat, $tcode, $tname, $publickey, $secretword) {

    $account = $nick . ':' . $serv . ':' . $cat . ':' . $tcode . ':' . $tname;
    $currency = "RUB";
    $desc = "Донат";
    $signature = getFormSignature($account, $currency, $desc, $sum, $secretword);
    $url = 'https://unitpay.ru/pay/' . $publickey . '?sum=' . $sum . '&account=' . $account . '&desc=' . $desc . '&currency=' . $currency . '&signature='. $signature;

    return $url;

}
function getFormSignature($account, $currency, $desc, $sum, $secretKey) {
    $hashStr = $account.'{up}'.$currency.'{up}'.$desc.'{up}'.$sum.'{up}'.$secretKey;
    return hash('sha256', $hashStr);
}
?>
