<?php

$a = isset($_GET['a']) ? $_GET['a'] : 1;
$b = isset($_GET['b']) ? $_GET['b'] : 1;

$ans = $a + $b;

$n1 = $ans % 10;       // 個位數
$n2 = floor($ans/10) % 10;  // 十位數
$n3 = floor($ans/100);  // 百位數

$pic_n1 = '<img src="images/' . $n1 . '.jpg">';
$pic_n2 = '<img src="images/' . $n2 . '.jpg">';
$pic_n3 = '<img src="images/' . $n3 . '.jpg">';

// 補充 (百位數有零時不顯示圖)
if( $n3==0 )
{
   $pic_n3 = '';
}
else
{
   $pic_n3 = '<img src="images/' . $n3 . '.jpg">';
}


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>game99 cai</title>
</head>
<body>
<h1>CAI 答案</h1>

<p>{$a} + {$b} = {$ans}</p>
<p>{$pic_n3}{$pic_n2}{$pic_n1}</p>
<p><a href="add_q.php">下一題</a> | <a href="index.php">回主選單</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>