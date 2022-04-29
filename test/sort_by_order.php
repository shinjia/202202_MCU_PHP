<?php

$order = array('台北', '桃園', '台中', '台南');
$array = array(
    array('id' => '桃園', 'title' => 'AA'),
    array('id' => '台南', 'title' => 'BB'),
    array('id' => '台北', 'title' => 'CC'),
    array('id' => '台中', 'title' => 'DD'),
);

usort($array, function ($a, $b) use ($order) {
    $pos_a = array_search($a['id'], $order);
    $pos_b = array_search($b['id'], $order);
    return $pos_a - $pos_b;
});

echo '<pre>';
print_r($array);
echo '</pre>';

// var_dump($array);

?>