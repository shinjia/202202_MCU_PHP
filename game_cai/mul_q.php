<?php

$a = mt_rand(1, 9);
$b = mt_rand(1, 9);

$pic_a = 'images/' . $a . '.jpg';
$pic_b = 'images/' . $b . '.jpg';


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>game99 cai</title>
</head>
<body>
<h1>CAI 練習</h1>
<p><img src="{$pic_a}"><img src="images/mul.jpg"><img src="{$pic_b}"></p>
<p><a href="mul_q.php">換一題</a> | 
<a href="mul_a.php?a={$a}&b={$b}">看答案</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>