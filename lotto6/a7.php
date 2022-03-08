<?php
$min = 1;
$max = 42;
$total = 6;

// 全部的球放進盒子裡
$a_full = range($min, $max);
// 打散
shuffle($a_full);
// 挑出前面六個
$a_box = array_slice($a_full, 0, $total);

// 畫面輸出
$str = '';
foreach($a_box as $one)
{
    $str .= '<img src="images/' . $one . '.jpg">';
}

// 排序
sort($a_box);

$str_sort = '';
foreach($a_box as $one)
{
    $str_sort .= '<img src="images/' . $one . '.jpg">';
}

$html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Title of the document</title>
</head>
<body>
<h1>你的樂透幸運數字</h1>
<p>原本的順序</p>
<p>{$str}</p>
<p>排序（由小排到大）</p>
<p>{$str_sort}</p>
<p><a href="?">再執行一次</a></p>
</body>
</html>
HEREDOC;

echo $html;
?>