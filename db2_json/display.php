<?php
include 'config.php';
include 'utility.php';

$uid = $_GET['uid'];

// 連接資料庫
$pdo = db_open();

// 寫出 SQL 語法
$sqlstr = "SELECT * FROM person WHERE uid=? ";

$sth = $pdo->prepare($sqlstr);
$sth->bindValue(1, $uid, PDO::PARAM_INT);

$a_json = array();

$data = '';
// 執行SQL及處理結果
if($sth->execute())
{
   // 成功執行 query 指令
   if($row = $sth->fetch(PDO::FETCH_ASSOC))
   {
      $uid = $row['uid'];
      $usercode = convert_to_html($row['usercode']);
      $username = convert_to_html($row['username']);
      $address  = convert_to_html($row['address']);
      $birthday = convert_to_html($row['birthday']);
      $height   = convert_to_html($row['height']);
      $weight   = convert_to_html($row['weight']);
      $remark   = convert_to_html($row['remark']);
  
     $a_json['usercode'] = $usercode;  
     $a_json['username'] = $username;
     $a_json['address'] = $address;
     $a_json['birthday'] = $birthday;
     $a_json['height'] = $height;
     $a_json['weight'] = $weight;
     $a_json['remark'] = $remark;
   }
   else
   {
 	   $data = '查不到相關記錄！';
   }
}
else
{
   // 無法執行 query 指令時
   $data = error_message('display');
}

$str_json = json_encode($a_json);
echo $str_json;
$data .= $str_json;

$html = <<< HEREDOC
<button onclick="location.href='list_page.php';">返回列表</button>
<h2>顯示資料</h2>
{$data}


<script>
var vjson = {$str_json};

   var s_usercode = vjson.usercode;
   var s_username = vjson.username;
   var s_address  = vjson.address;
   var s_birthday = vjson.birthday;
   var s_height   = vjson.height;
   var s_weight   = vjson.weight;
   var s_remark   = vjson.remark;
   
   document.write('<table border="1">');
   document.write('<tr><td>' + s_usercode + '</td></tr>');
   document.write('<tr><td>' + s_username + '</td></tr>');
   document.write('<tr><td>' + s_address  + '</td></tr>');
   document.write('<tr><td>' + s_birthday + '</td></tr>');
   document.write('<tr><td>' + s_height   + '</td></tr>');
   document.write('<tr><td>' + s_weight   + '</td></tr>');
   document.write('<tr><td>' + s_remark   + '</td></tr>');
   document.write('</table>');
</script>

HEREDOC;
 
include 'pagemake.php';
pagemake($html, '');
?>