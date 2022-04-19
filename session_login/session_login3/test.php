<?php
$a = isset($_GET['key']) ? $_GET['key'] : '12345';
$b = md5($a);

echo $a;
echo '<br>';
echo $b;
?>