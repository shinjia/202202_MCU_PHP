<?php
session_start();

$ss_usertype = isset($_SESSION["usertype"]) ? $_SESSION["usertype"] : "";
$ss_usercode = isset($_SESSION["usercode"]) ? $_SESSION["usercode"] : "";


switch($ss_usertype)
{
   case "ADMIN" :
   case "MEMBER" :
        $msg = '<font color="#FF0000">Hi，' . $ss_usercode . ' 您好，</font>';
        break;
        
   default:
        $msg = '你尚未登入系統，請<a href="login.php">按這裡</a>登入！';
}


$html = <<< HEREDOC
<html><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>登入登出權限控制範例</title>
</head>
<body>
<p>{$msg}</p>
<p>
主功能表如下
<br><a href="page_a.php">page_a</a>---任何人均可觀看之網頁
<br><a href="page_b.php">page_b</a>---只有會員可用之網頁
<br><a href="page_c.php">page_c</a>---系統管理者可用之網頁
<br>
<br><a href="page_d.php">page_d</a>---系統管理者及會員均可用之網頁
</p>
<hr>

<p>
測試網頁
<br><a href="login.php">重新登入</a>
<br><a href="logout.php">登出</a>
</p>

<p>管理者使用功能
<br><a href="view_session.php">查看session變數</a>
<br><a href="user_input.php">新增使用者帳號</a>
<br><a href="user_list.php">查看所有使用者帳號</a>
</P>

</body>
</html>
HEREDOC;

echo $html;
?>