<?php
$h = isset($_GET['h']) ? $_GET['h'] : '';
$w = isset($_GET['w']) ? $_GET['w'] : '';

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
<h1>BMI 身體質量指數</h1>

<form method="post" action="calc.php">

<p>身高：<input type="text" name="height" size="4" value="{$h}"> 公分</p>
<p>體重：<input type="text" name="weight" size="4" value="{$w}"> 公斤</p>
<p><input type="submit" value="計算 BMI"></p>

</form>

</body>
</html>
HEREDOC;

echo $html;
?>