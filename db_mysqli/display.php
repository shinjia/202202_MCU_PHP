<?php
include 'config.php';

$uid = isset($_GET['uid']) ? $_GET['uid'] : 0;

// 連接資料庫
$link = db_open();

// 寫出 SQL 語法
$sqlstr = "SELECT * FROM person WHERE uid=" . $uid;

// 執行 SQL
$result = mysqli_query($link, $sqlstr);

// $row = mysqli_fetch_row($result);
// $row = mysqli_fetch_assoc($result);
// $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
// $row = mysqli_fetch_all($result);
/*
foreach($row as $key=>$value)
{
  echo $key . '--->' . $value;
  echo '<br/>';
}
echo '<pre>';
print_r($row);
echo '</pre>';
exit;
*/

if($row=mysqli_fetch_array($result, MYSQLI_ASSOC))
{
   $uid      = $row['uid'];
   $usercode = $row['usercode'];
   $username = $row['username'];
   $address  = $row['address'];
   // $birthday = substr($row['birthday'], 0, 4);
   $birthday = date('Y', strtotime($row['birthday']));
   $height   = $row['height'];
   $weight   = $row['weight'];
   $remark   = $row['remark'];

   $age = date('Y', time()) - substr($row['birthday'], 0, 4) + 1;

   $data = <<< HEREDOC
   <table border="1">
      <tr>
        <th>代碼</th>
        <td>{$usercode}</td>
      </tr>
      <tr>
        <th>姓名</th>
        <td>{$username}</td>
      </tr>
      <tr>
        <th>地址</th>
        <td>{$address}</td>
      </tr>
      <tr>
        <th>生日</th>
        <td>{$birthday} ；{$age}歲</td>
      </tr>
      <tr>
        <th>身高</th>
        <td>{$height}</td>
      </tr>
      <tr>
        <th>體重</th>
        <td>{$weight}</td>
      </tr>
      <tr>
        <th>備註</th>
        <td>{$remark}</td>
      </tr>
    </table>
HEREDOC;
}
else
{
  $data = '找不到資料！';
}

db_close($link);


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>基本資料庫系統</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<p><a href="index.php">回首頁</a></p>

<h2>詳細資料</h2>

{$data}

</body>
</html>
HEREDOC;

echo $html;
?>
