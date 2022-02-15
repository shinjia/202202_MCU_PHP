<?php

$name = '王小明';
$birth = 1977;
$photo = 'images/head2.jpg';

$age = date('Y',time()) - $birth;  // 計算年齡

/*
$name = '陳信嘉';
$age = 55;
$photo = 'images/head1.jpg';
*/


// 三小引號
$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
</head>
<body>
<h1>Hello World</h1>
<p>姓名：{$name}</p>
<p>年齡：{$age}</p>
<p><img src="{$photo}"></p>

</body>
</html>
HEREDOC;

echo $html;
?>