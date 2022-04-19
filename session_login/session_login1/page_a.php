<?php
session_start();


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登入登出權限控制範例</title>
</head>
<body>
<h1>所有的人</h1>
<p>所有用戶均能開啟這支程式</p>
</body>
</html>
HEREDOC;

echo $html;
?>