<?php

$num = mt_rand(0,9);
$pic1 = 'images/' . $num . '.jpg';

$num = mt_rand(0,9);
$pic2 = 'images/' . $num . '.jpg';

$now = date('Y-m-d H:i:s', time());

$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
</head>
<body>
<p>現在是 {$now}</p>
<h1>你的幸運數字</h1>
<p><img src="{$pic1}"> <img src="{$pic2}"></p>
<p><a href="index.php">再執行一次</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>