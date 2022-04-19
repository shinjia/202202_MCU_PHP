<?php
session_start();

$ss_usertype = isset($_SESSION["usertype"]) ? $_SESSION["usertype"] : "";
$ss_usercode = isset($_SESSION["usercode"]) ? $_SESSION["usercode"] : "";


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登入登出權限控制範例</title>
</head>
<body>
<p>此程式為查看session的變數內容，謹供程式開發測試用。</p>
<p>
usertype:{$ss_usertype}<br>
usercode:{$ss_usercode}
</p>
</body>
</html>
HEREDOC;

echo $html;
?>