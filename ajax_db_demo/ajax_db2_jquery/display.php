<?php
include "config.php";

$uid = $_GET["uid"];

// 連接資料庫
$link = db_open();


// 寫出 SQL 語法
$sqlstr = "SELECT * FROM person WHERE uid=" . $uid;

// 執行 SQL
$result = @mysqli_query($link, $sqlstr);
if($row=mysqli_fetch_array($result))
{
   $uid      = $row["uid"];
   $username = $row["username"];
   $address  = $row["address"];
   $birthday = $row["birthday"];
   $height   = $row["height"];
   $weight   = $row["weight"];
   
   $data = <<< HEREDOC
   <TABLE border="1">
     <TR><TH>姓名</TH> <TD>{$username}</TD></TR>
     <TR><TH>地址</TH> <TD>{$address}</TD></TR>
     <TR><TH>生日</TH> <TD>{$birthday}</TD></TR>
     <TR><TH>身高</TH> <TD>{$height}</TD></TR>
     <TR><TH>體重</TH> <TD>{$weight}</TD></TR>
   </TABLE>
HEREDOC;
}
else
{
	 $data = '查無相關記錄！';
}


$html = <<< HEREDOC
{$data}
HEREDOC;

echo $html;
?>