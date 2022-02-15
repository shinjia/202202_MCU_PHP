<?php

$a = isset($_GET['a']) ? $_GET['a'] : 1;
$b = isset($_GET['b']) ? $_GET['b'] : 1;

$ans = $a * $b;

// 圖形版本
$n1 = $ans % 10;  // 個位數
$n2 = floor($ans / 10);  // 十位數

// $n1_pic = '<img src="images/' . $n1 . '.jpg">';
// $n2_pic = '<img src="images/' . $n2 . '.jpg">';

if($n2==0)
{
    $pic = '<img src="images/'.$n1.'.jpg">';
}
else
{
    $pic = '<img src="images/'.$n2.'.jpg">' . '<img src="images/'.$n1.'.jpg">';
}

$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>九九乘法CAI練習</title>
</head>
<body>
<h1>九九乘法CAI練習</h1>
<p>{$a} 乘以 {$b} 等於 {$ans}</p>
<p>{$pic}</p>

<p><a href="question.php">練習下一題</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>
