<?php
include 'config.php';

// 連接資料庫
$pdo = db_open();

// 新增資料表之SQL語法 (採用陣列方式，可以設定多個)
$a_table['person'] = '
CREATE TABLE person (
  uid int(11) NOT NULL auto_increment,
  usercode varchar(255) NULL,
  username varchar(255) NULL,
  address  varchar(255) NULL,
  birthday date default NULL,
  height   int(11) default NULL,
  weight   float(11) default NULL,
  remark   varchar(255) NULL,
  PRIMARY KEY  (uid)
  )
';

// 執行SQL及處理結果
$msg = '';
foreach($a_table as $key=>$sqlstr)
{
   $msg .= '資料表『' . $key . '』.........';
   
   $sth = $pdo->exec($sqlstr);   
   if($sth===FALSE)
   {
      $msg .= '無法建立！<br />';
      $msg .= print_r($pdo->errorInfo(),TRUE) . '<br />' . $sqlstr;
   }
   else
   {
      $msg .= '建立完成';
   }
}


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>基本資料庫系統</title>
</head>
<body>
<h2>資料表建立結果</h2>
{$msg}
</body>
</html>
HEREDOC;

include 'pagemake.php';
pagemake($html, '');
?>