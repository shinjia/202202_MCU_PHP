<?php

$b = mt_rand(1, 9);
$c = mt_rand(1, 9);  // 預先產生答案

$a = $b * $c;

$pic_a1 = 'images/' . floor($a/10) . '.jpg';  // a 的十位數
$pic_a2 = 'images/' . ($a%10) . '.jpg';  // a 的個位數
$pic_b = 'images/' . $b . '.jpg';


// 補充
if( $a<10 )
{
   $pic_a1 = '';
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
<p><img src="{$pic_a1}"><img src="{$pic_a2}"><img src="images/div.jpg"><img src="{$pic_b}"></p>
<p><a href="div_q.php">換一題</a> | 
<a href="div_a.php?a={$a}&b={$b}">看答案</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>