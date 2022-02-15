<?php

$a = isset($_GET['a']) ? $_GET['a'] : 1;
$b = isset($_GET['b']) ? $_GET['b'] : 1;

$ans = $a / $b;

$pic_ans = '<img src="images/' . $ans . '.jpg">';


$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>game99 cai</title>
</head>
<body>
<h1>CAI 答案</h1>

<p>{$a} / {$b} = {$ans}</p>
<p>{$pic_ans}</p>
<p><a href="div_q.php">下一題</a> | <a href="index.php">回主選單</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>