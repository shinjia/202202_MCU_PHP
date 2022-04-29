<?php

function pagemake($content='', $head='')
{  
  $html = <<< HEREDOC
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>基本資料庫系統</title>
<link href="style.css" rel="stylesheet">
{$head}
</head>
<body>

<table width="760" border="0" bgcolor="#CCDDAA" align="center">
  <tr>
    <td><h2>目前和教學有關的範例是單筆顯示 display.php</h2></td>
  </tr>
  <tr>
    <td bgcolor="#66BBFF">
    	 <a href="index.php" target="_top">首頁</a> | db2系列：
    	 <a href="page.php?op=PAGE&page=note2">說明</a> |    	 
    	 <a href="list_page.php">資料列表</a> |
    </td>
  </tr>
  <tr>
    <td>
    	{$content}
    	<p>&nbsp;</p>
    </td>
  </tr>
  <tr>
    <td bgcolor="#66BBFF"><p align="center">版權聲明</p></td>
  </tr>
</table>
</body>
</html>  
HEREDOC;

echo $html;
}

?>