<?php

$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登入登出權限控制範例</title>
</head>
<body>
<h1>登入</h1>
<form name="form1" method="post" action="login_check.php">
帳號：<input type="text"     name="usercode" size="10"><br>
密碼：<input type="password" name="password" size="10">
<br><br>
用戶類型
<br><input type="radio" name="usertype" value="MEMBER">會員
<br><input type="radio" name="usertype" value="ADMIN">系統管理者
<p>
<input type="submit" value="登入">
</form>
<HR>
<p>注意：此範例之帳號及密碼定義在『user_password.txt』內，且密碼經過md5()函式的編碼保護。</p>
</body>
</html>
HEREDOC;

echo $html;
?>