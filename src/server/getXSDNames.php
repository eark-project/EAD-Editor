<?php
    $dirPath = dir("../../test/xsds/");
	$imgArray = array();
	while (($file = $dirPath->read()) !== false)
	{
	  if ((substr($file, -3)=="xsd"))
	  {
		 $imgArray[ ] = trim($file);
	  }
	}
	$dirPath->close();
	
	$json = json_encode($imgArray);
	
	echo $json;
	
?>