<?php
session_start();

$ss_usercode = isset($_POST["usercode"]) ? $_POST["usercode"] : "";
$ss_password = isset($_POST["password"]) ? $_POST["password"] : "";
$ss_usertype = isset($_POST["usertype"]) ? $_POST["usertype"] : "";

// 假設用戶資料 (資料應存於文字檔或資料庫，此處直接寫在程式內，示範用)

// session變數『usertype』 記錄使用者身分，其值可能為
//   (1)ADMIN  管理者
//   (2)MEMBER 會員
//   (3)未定義為一般訪客

$valid = false;
$_SESSION["usertype"] = "";
$_SESSION["usercode"] = "";
      
// 會員檢查
if($ss_usertype=="MEMBER")
{
   if($ss_password=="11111")
   {
      $valid = true;
      $_SESSION["usertype"] = "MEMBER";
      $_SESSION["usercode"] = $ss_usercode;
   }
}

// 系統管理者檢查
if($ss_usertype=="ADMIN")
{
   if($ss_password=="12345")
   {
      $valid = true;
      $_SESSION["usertype"] = "ADMIN";
      $_SESSION["usercode"] = $ss_usercode;
   }
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