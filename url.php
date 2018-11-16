<?php
/**
 * Created by PhpStorm.
 * User: vovichua
 * Date: 16.11.18
 * Time: 16:15
 */
//echo "<pre>";
//var_dump($_POST['this']);

$url = preg_split("[\n]", $_POST['this'], -1, PREG_SPLIT_OFFSET_CAPTURE);

echo "<pre>";
var_dump($url);