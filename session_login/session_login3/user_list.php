<?php
// 可自行定義存檔的格式
$file_password = "user_password.txt";   // 存帳號及密碼的文字檔


$msg = '';
$a_data = file($file_password);
foreach($a_data as $one)
{
   $msg .= $one . '<BR>';
}


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登入登出權限控制範例</title>
</head>
<body>
<p>文字檔內之使用者清單</p>
<p>{$msg}</p>
<p><a href="index.php">回首頁</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>