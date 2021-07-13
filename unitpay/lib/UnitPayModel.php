<?php

class UnitPayModel
{
    private $mysqli;

    static function getInstance()
    {
        return new self();
    }

    private function __construct()
    {
        $sitebase = Config::GetUniConf(2);

        $port = ini_get("mysqli.default_port");

        $this->mysqli = @new mysqli (
            $sitebase['MySQL_Host'], $sitebase['MySQL_Login'], $sitebase['MySQL_Password'], $sitebase['MySQL_DataBase'], $port
        );
        $this->mysqli->set_charset("utf8");
        /* проверка подключения */
        if (mysqli_connect_errno()) {
            throw new Exception('Не удалось подключиться к бд');
        }
    }

    function createPayment($unitpayId, $account, $sum, $itemsCount)
    {
        $query = '
            INSERT INTO
                unitpay_payments (unitpayId, account, sum, itemsCount, dateCreate, status)
            VALUES
                (
                    "'.$this->mysqli->real_escape_string($unitpayId).'",
                    "'.$this->mysqli->real_escape_string($account).'",
                    "'.$this->mysqli->real_escape_string($sum).'",
                    "'.$this->mysqli->real_escape_string($itemsCount).'",
                    NOW(),
                    0
                )
        ';

        return $this->mysqli->query($query);
    }

    function getPaymentByUnitpayId($unitpayId)
    {
        $query = '
                SELECT * FROM
                    unitpay_payments
                WHERE
                    unitpayId = "'.$this->mysqli->real_escape_string($unitpayId).'"
                LIMIT 1
            ';

        $result = $this->mysqli->query($query);

        if (!$result){
            throw new Exception($this->mysqli->error);
        }

        return $result->fetch_object();
    }

    function confirmPaymentByUnitpayId($unitpayId)
    {
        $query = '
                UPDATE
                    unitpay_payments
                SET
                    status = 1,
                    dateComplete = NOW()
                WHERE
                    unitpayId = "'.$this->mysqli->real_escape_string($unitpayId).'"
                LIMIT 1
            ';
        return $this->mysqli->query($query);
    }
    function donateForAccount($account, $count)
    {
        $account = explode(':', $account);
        
        $name = $account[0];
        $nametovar = $account[4];
        $tovar = $account[3];
        $server = $account[1];
        $category = $account[2];

        $query = "INSERT INTO `last_buys`(`name`,`tovarname`,`tovar`,`price`,`server`,`category`,`status`)
                  VALUES ('{$name}', '{$nametovar}', '{$tovar}', '{$count}', '{$server}', '{$category}', '0')";

        return $this->mysqli->query($query);
    }
}
