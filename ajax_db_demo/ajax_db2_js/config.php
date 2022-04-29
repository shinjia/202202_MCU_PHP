<?php

define('DB_SERVERIP', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_DATABASE', 'class');

define('SET_CHARACTER', 'set character set utf8');   // utf8或big5或此列加註移除

define('ERROR_CONNECT', '無法連接伺服器！');
define('ERROR_DATABASE', '無法開啟資料庫！');
define('ERROR_CHARACTER', '無法使用指定的校對字元表！');


function db_open()
{
   $link = mysqli_connect(DB_SERVERIP, DB_USERNAME, DB_PASSWORD, DB_DATABASE) or die(ERROR_CONNECT);
   if(defined('SET_CHARACTER')) mysqli_query($link, SET_CHARACTER) or die(ERROR_CHARACTER);
   return $link;
}


function db_close($link)
{
   mysqli_close($link);
}

?>