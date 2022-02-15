<?php

$a = mt_rand(10, 99);
$b = mt_rand(10, 99);

$pic_a1 = 'images/' . floor($a/10) . '.jpg';  // a 的十位數
$pic_a2 = 'images/' . ($a%10) . '.jpg';  // a 的個位數
$pic_b1 = 'images/' . floor($b/10) . '.jpg';  // b 的十位數
$pic_b2 = 'images/' . ($b%10) . '.jpg';  // b 的個位數


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>game99 cai</title>
</head>
<body>
<h1>CAI 練習</h1>
<p><img src="{$pic_a1}"><img src="{$pic_a2}"><img src="images/add.jpg"><img src="{$pic_b1}"><img src="{$pic_b2}"></p>
<p><a href="add_q.php">換一題</a> | 
<a href="add_a.php?a={$a}&b={$b}">看答案</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>