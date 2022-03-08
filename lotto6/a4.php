<?php
$min = 1;
$max = 12;
$total = 6;

// 產生球
$a_box = array();
$check = '';
for($i=0; $i<$total; $i++)
{
    do {
        $num = mt_rand($min, $max);
        $check .= ($num . ', ');

        // 檢查此數是否出現在陣列內
        $found = false;
        foreach($a_box as $one)
        {
            if($one==$num)
            {
                $found = true;
            }
        }
    } while ($found);

    $a_box[] = $num;
}

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
<p>{$check}</p>
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