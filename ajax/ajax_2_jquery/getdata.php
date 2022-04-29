<?php
$p_code = isset($_GET['code']) ? $_GET['code'] : 'XX';

switch($p_code)
{
   case 'TP' :
        $a_data = array('木柵', '萬華', '信義', '大同' );
        break;
   
   case 'NT' :
        $a_data = array('板橋', '三重', '永和', '新莊', '新店' );
        break;
   
   default:
        $a_data = array('xxx', 'yyy', 'zzz');
}


$str = '';
$str .= '<SELECT size="6">';
foreach($a_data as $one)
{
   $str .= '<OPTION>' . $one . '</OPTION>' . "\n";
}
$str .= '</SELECT>';


echo $str;

?>