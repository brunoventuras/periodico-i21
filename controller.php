<?php
$file = 'json/const_var.json';

$json = json_decode(file_get_contents($file));
$json->imgs = $_POST['val'];
$json_editado = file_put_contents($file,json_encode($json));
$json = json_decode(file_get_contents($file));

echo $_POST['val'];
?>