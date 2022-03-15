<?php
include 'config.php';

// 連接資料庫
$link = db_open();

// 寫出 SQL 語法
$sqlstr = "INSERT INTO person(usercode, username, address, birthday, height, weight, remark) VALUES('P011', 'Bruce', 'Taichung', '1988/8/7', 167, 73, '')";

// 執行 SQL
$result = mysqli_query($link, $sqlstr);
if($result)
{
    echo 'ok';
}
else
{
    echo 'SQL Error;';
}

echo 'Done';
?>
