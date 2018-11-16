<?php
/**
 * Created by PhpStorm.
 * User: vovichua
 * Date: 16.11.18
 * Time: 16:15
 */

$url = explode(PHP_EOL, $_POST['this']);

foreach ($url as $value) {
    $item = array('http' , 'https');
    $search = array('https', 'http');

    $res = str_replace($search,$item,$value);
    echo "<pre>";
    var_dump($res);
}


