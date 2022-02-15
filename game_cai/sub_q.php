<?php

$a = mt_rand(10, 99);
$b = mt_rand(1, $a);  // b要比a小

$pic_a1 = 'images/' . floor($a/10) . '.jpg';
$pic_a2 = 'images/' . ($a%10) . '.jpg';
$pic_b1 = 'images/' . floor($b/10) . '.jpg';
$pic_b2 = 'images/' . ($b%10) . '.jpg';

if($b<10)
{
    $pic_b1 = '';
}


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>game99 cai</title>
</head>
<body>
<h1>CAI 練習</h1>
<p><img src="{$pic_a1}"><img src="{$pic_a2}"><img src="images/sub.jpg"><img src="{$pic_b1}"><img src="{$pic_b2}"></p>
<p><a href="sub_q.php">換一題</a> | 
<a href="sub_a.php?a={$a}&b={$b}">看答案</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>
