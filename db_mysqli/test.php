<?php
$op = isset($_GET['op']) ? $_GET['op'] : '1';

switch($op)
{
    case '1': 
        // do 1
        echo '11111';
        break;
        
    case '2': 
        // do 2
        echo '222222';
        break;
        
    case '3': 
        // do 3
        echo '33333';
        break;
}



?>