<?php
$nickname = isset($_POST['nickname']) ? $_POST['nickname'] : '';
$comment  = isset($_POST['comment'])  ? $_POST['comment']  : '';

// 設定
$is_file = true;
$is_mail = false;
$is_line = true;


// 用每天的日期來存檔
// $filename = 'data.txt';
$filename = 'save/data_' . date('Ymd',time()) . '.txt';

$now = date('Y-m-d H:i:s', time());

// 保存的資料內容
$data = <<< HEREDOC

時間：{$now}
姓名：{$nickname}
意見：{$comment}
------------------------------------------

HEREDOC;

// 寫入 (最原始)
// file_put_contents($filename, $data, FILE_APPEND);

// 存檔
$msg_file = '';
if($is_file)
{
    if(!file_exists($filename))
    {
        file_put_contents($filename, '');
    }

    // 新的資料在前面
    $old = file_get_contents($filename);
    $new = $data . $old;
    file_put_contents($filename, $new);
    $msg_file = '已將資料存檔';
}


// email 通知
$msg_mail = '';
if($is_mail)
{ 
    // 進行臨時設定
    ini_set('SMTP','msa.hinet.net');
    ini_set('smtp_port',25);
    ini_set('sendmail_from', 'shinjia168@gmail.com');

    $to = 'shinjia168@gmail.com';
    $title = '有客戶留言 ' . $nickname ;
    $content = $data;

    $result = mail($to, $title, $content);
    if($result)
    {
        $msg_mail = '已寄出信件通知';
    }
}


// LINE 通知
// Line Notify: PHP_LINE
$msg_line = '';
if($is_line)
{
    $token = 'Nh1EPX6WzvmqYDRhJLzeHWzCWob9c2flAvT1EsgPo1c';  // 更換自己的 token

    $url = "https://notify-api.line.me/api/notify";

    $headers = array(
    'Content-Type: multipart/form-data',
    'Authorization: Bearer ' . $token);

    // $message = array('message' => '【有留言】' . $data);

    
    $message = array(
    'message' => $data,
    'imageThumbnail' => 'https://placekeanu.com/240/160',
    'imageFullsize' => 'https://placekeanu.com/600/400',  
    'imageFile' => curl_file_create('D:\\xampp\htdocs\myweb\comment\line\dog.png'),
    'stickerPackageId' => 446,
    'stickerId' => 1988
    );
    

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL , $url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $message);
    $result = curl_exec($ch);
    curl_close($ch);

    if($result)
    {
        $msg_line = '已傳送 LINE 通知';
    }
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
<p>{$msg_file}</p>
<p>{$msg_mail}</p>
<p>{$msg_line}</p>
</body>
</html>
HEREDOC;

echo $html;
?>