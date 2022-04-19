<?php

$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登入登出權限控制範例</title>
</head>
<body>
<p>你尚未登入系統，請<a href="login.php">按這裡</a>重新登入！</p>
</body>
</html>
HEREDOC;

echo $html;
?>