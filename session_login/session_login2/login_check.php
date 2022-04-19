<?php
session_start();

$ss_usertype = isset($_POST["usertype"]) ? $_POST["usertype"] : "";
$ss_usercode = isset($_POST["usercode"]) ? $_POST["usercode"] : "";
$ss_password = isset($_POST["password"]) ? $_POST["password"] : "";

// 假設用戶資料 (資料存於文字檔) 可自行定義存檔的格式
$file_password = "user_password.txt";   // 存帳號及密碼的文字檔
$a_chk_list = file($file_password);

// 會員檢查，注意格式
$chk_string  = "!" . $ss_usercode . "#" . $ss_password . "@" . $ss_usertype;
$chk_string .= "\n";   // 用file讀入的資料後面會多出符號 (Windows:\n; Linux: \r\n)

$valid = false; 
if(in_array($chk_string, $a_chk_list))
{
   $valid = true;
   $_SESSION["usertype"] = $ss_usertype;
   $_SESSION["usercode"] = $ss_usercode;
}
else
{
   $_SESSION["usertype"] = "";
   $_SESSION["usercode"] = "";
}

if($valid)
{
   $msg = $ss_usercode . ' 你好，歡迎光臨！ ';
}
else
{
   $msg = '登入錯誤';
}


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登入登出權限控制範例</title>
</head>
<body>
<p>{$msg}</p>
<br><br>
<p><a href="index.php">進入首頁</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>