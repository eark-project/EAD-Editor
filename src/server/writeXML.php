<?php

$fileName = $_POST["filename"];
$content = $_POST["content"];
$ffname = "xml/".$fileName.".xml";
$file = fopen($ffname, "w");
fwrite($file, $content);
fclose($file);
?>