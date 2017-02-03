<?php
    header('Content-type: text/xml');
	$id = $_POST['id'];
	//$id = $_GET["id"];
	$xmlName = "../../test/xmls/".$id;
	$xml=file_get_contents($xmlName);
	echo $xml;
?>