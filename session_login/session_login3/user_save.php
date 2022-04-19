<?php
$usertype = isset($_POST["usertype"]) ? $_POST["usertype"] : "";
$usercode = isset($_POST["usercode"]) ? $_POST["usercode"] : "";
$password = isset($_POST["password"]) ? $_POST["password"] : "";


// 可自行定義存檔的格式
$file_password = "user_password.txt";   // 存帳號及密碼的文字檔

$new_user_string  = "!" . $usercode . "#" . md5($password) . "@" . $usertype;

// 將新資料加到原有清單之後
$old_data = file_get_contents($file_password);
$new_data = $old_data  . $new_user_string . "\r\n";
file_put_contents($file_password, $new_data);


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登入登出權限控制範例</title>
</head>
<body>
<p>使用者帳號已建立</p>
<p><a href="index.php">回首頁</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>