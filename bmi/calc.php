<?php
$height = isset($_POST['height']) ? $_POST['height'] : 0;
$weight = isset($_POST['weight']) ? $_POST['weight'] : 0;

if($height<=0)
{
    die('Error!! <a href="input.php?h='.$height.'&w='.$weight.'">Input again</a>');
}

// 計算 bmi
// $bmi = $weight / pow(($height/100),2);
// $bmi = $weight / (($height/100)**2);  // PHP 7.x
$bmi = $weight / (($height/100)*($height/100));

// 取兩位小數
// $bmi = floor($bmi*100) / 100;
// $bmi = number_format($bmi, 2);
$bmi = round($bmi, 2);

// 數學運算子 (+ - * / ^ **)
// 關係運算子 (==  >  >=  <  <=  !=)
// 邏輯運算 (&&  ||  !)
// 程式的錯誤：語法錯誤，邏輯錯誤，數字誤差

// 條件判斷
$msg = '';
$pic = '';
$url = '';
if($bmi>=24) 
{
    $msg = '月巴月半';
    $pic = 'images/s1.jpg';
    $url = 'page1.html';
}
elseif($bmi>=22 && $bmi<24)
{
    $msg = '過重';
    $pic = 'images/s2.jpg';
    $url = 'page2.html';
}
elseif($bmi>=17.5 && $bmi<22)
{
    $msg = '正常';
    $pic = 'images/s3.jpg';
    $url = 'page3.html';
}
elseif($bmi<17.5)
{
    $msg = '太輕';
    $pic = 'images/s4.jpg';
    $url = 'page4.html';
}
else
{
    $msg = '程式一定出錯了！！！';
}

$html = <<< HEREDOC
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>BMI</h1>    
<p>BMI = {$bmi}</p>
<p>{$msg}</p>
<p><img src="{$pic}"></p>
<p><a href="{$url}">建議參考</a></p>
<iframe src="{$url}" width="600" height="400"></iframe>
<hr>
<p>Height: {$height}</p>
<p>Weight: {$weight}</p>
</body>
</html>
HEREDOC;

echo $html;
?>