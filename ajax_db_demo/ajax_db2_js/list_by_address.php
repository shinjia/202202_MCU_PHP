<?php
include "config.php";

$code = isset($_GET["code"]) ? $_GET["code"] : "";

// 連接資料庫
$link = db_open();

// 寫出 SQL 語法
$sqlstr = "SELECT * FROM person ";
$sqlstr .= "WHERE address='" . $code . "' ";

// 執行SQL及處理結果
$result = mysqli_query($link, $sqlstr);
$total_rec = mysqli_num_rows($result);
$data = '';
while($row=mysqli_fetch_array($result))
{
   $uid      = $row["uid"];
   $username = $row["username"];
   $address  = $row["address"];
   $birthday = $row["birthday"];
   $height   = $row["height"];
   $weight   = $row["weight"];
   
   $data .= <<< HEREDOC
     <TR onclick="show_detail('{$uid}');" style="cursor:hand;"  class="omout" onmouseover="this.className='omover'" onmouseout="this.className='omout'">
       <TD>{$username}</TD>
       <TD>{$address}</TD>
       <TD>{$birthday}</TD>
       <TD>{$height}</TD>
       <TD>{$weight}</TD>
    </TR>
HEREDOC;
}


$html = <<< HEREDOC
<TABLE border="1" align="center">
   <TR>
      <TH>姓名</TH>
      <TH>地址</TH>
      <TH>生日</TH>
      <TH>身高</TH>
      <TH>體重</TH>
   </TR>
{$data}
</TABLE>
HEREDOC;

echo $html;
?>