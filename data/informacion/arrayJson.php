<?php
$data = array('query'=>"Sweet",'suggestions'=>array("hola","hi","hellow"));
$json = json_encode($data);
echo $json."<br>";


$dat=json_decode($json);
echo $dat->query."<br>";
for ($i = 0; $i < count($dat->suggestions); $i++) {
    echo $dat->suggestions[$i]."<br>";
}

?>
