<?php
session_start();

unset($_SESSION["usertype"]);
unset($_SESSION["usercode"]);

// header('location: index.php');

$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登入登出權限控制範例</title>
</head>
<body>
已登出
<BR><a href="index.php">按此處回首頁</a>
</body>
</html>
HEREDOC;

echo $html;
?>