<?php
class Config
{
    public static function GetUniConf($type) {
        include '../engine/config_site.php';

        if($type == 1) {
            return $config;
        }
        else if($type == 2) {
            return $sitebase;
        }
    }
}
?>
