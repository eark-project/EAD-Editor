<?php 
	$text="";
	$textXML = "";
	if(@$_POST['ujtartalom'] === 'Save') 
	{
			$allowedExts = array(
			  "xsd"
			); 

			$extension = end(explode(".", $_FILES["file"]["name"]));
			$error="";
			if ( 100000000 < $_FILES["file"]["size"]  ) {
				//$error="Túl nagy fájl méret! Maximális méret 10 MB!";
			  die( 'Please provide a smaller file [E/1]: '.$_FILES["file"]["size"] );
			}

			if ( ! ( in_array($extension, $allowedExts ) ) ) {
				//$error=" Érvénytelen fájl típus! Kérem válasszon másik fájlt";
				die('Please provide another file type [E/2].');
			}else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"], "../../test/xsds/" . $_FILES["file"]["name"]); 
				$text="The file upload was successful!";
			}
			
	}
	
	if(@$_POST['savexml'] === 'Save XML') 
	{
			$allowedExts = array(
			  "xml"
			); 

			$extension = end(explode(".", $_FILES["file"]["name"]));
			$error="";
			if ( 100000000 < $_FILES["file"]["size"]  ) {
				//$error="Túl nagy fájl méret! Maximális méret 10 MB!";
			  die( 'Please provide a smaller file [E/1]: '.$_FILES["file"]["size"] );
			}

			if ( ! ( in_array($extension, $allowedExts ) ) ) {
				//$error=" Érvénytelen fájl típus! Kérem válasszon másik fájlt";
				die('Please provide another file type [E/2].');
			}else
			{
				move_uploaded_file($_FILES["file"]["tmp_name"], "../../test/xmls/" . $_FILES["file"]["name"]); 
				$textXML="The file upload was successful!";
			}
			
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>XSDForm Demo</title>
<style type="text/css">
.container {
  margin: 50px auto;
  width: 800px;
}
 
.login {
  position: relative;
  margin: 0 auto;
  padding: 20px 20px 20px;
  width: 800px;
  background: rgba(0, 0, 0, 0.08);
}



body {
  font: 13px/20px "Lucida Grande", Tahoma, Verdana, sans-serif;
  background: #0ca3d2;
}

.XSLTransformTable {
table-layout: fixed;
border-collapse: collapse;
border-style: none;
border-width: 0px;
text-align: left;
width: 800px;
background: #d3e9e9;
}

.XSLTransformTable tr:nth-child(2n+1) {
background: none repeat scroll 0 0 #F5FAFA;
}

.XSLTransformTable tbody tr td.mainSectionHeader {
color: #15428B;
font-size: large;
font-weight: bold;
padding: 15px 10px 15px 10px;
}

.XSLTransformTable tbody tr td.mainSectionTitle {
color: black;
font-size: medium;
font-weight: bold;
padding: 5px 10px 5px 10px;
}

.XSLTransformTable tbody tr td.standardFieldName {
color: #15428B;
font-weight: bold;
vertical-align: top;
}

.XSLTransformTable tbody tr td.standardFieldValue {
color: black;
word-wrap: break-word;
text-align: center;
}

.XSLTransformTable tbody tr td {
padding: 2px 10px 2px 10px;
border: 1px solid #C5DCDA;
}


a, a:visited {
color: #1B83BE;
}

a:hover {
cursor: pointer;
}


#logout .error
{
color:white;
text-decoration: none;
font-size:16px;
background: none;
border: 1px solid white;
-webkit-box-shadow: none;
-moz-box-shadow: none;
box-shadow: none;
font-style: normal;
font-weight: normal;
margin-bottom: 0;
padding: 10px 10px;
transition: all .18s ease-in-out;
-moz-transition: all .18s ease-in-out;
-webkit-transition: all .18s ease-in-out;

-webkit-border-radius: 1000px;
border-radius: 1000px;
}

#logout .error:hover {
border-color: #e66f66;
color: #e66f66;
}

.text {
	width:95%;
	background: white;
	padding:15px;
}

.green {
	width:95%;
	background: #01DF74;
	padding:15px;
}


</style>
</head>

<body>

<div class="container">
<div class="login">

	<div class="text">
	<h2>XSDForm test site</h2>
	<h3>Test site: <a href="../client/emptyForm.html">Empty form</a></h3>
	<h4>Upload your own xsd file:</h4>
	<p>
	<?php if($text !="") {  echo "<p class='green'>".$text."</p>"; }?>
	<form id="form1" name = "form1" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
		 
			<div class="col-md-6">
				<label>Select your XSD file:</label>
				<input  type="file" name='file' id="file" size="30"  />
			</div>
			
		</div>
		
		<div class="col-md-12">
			
			 <input type="submit" name="ujtartalom" value="Save" style="margin-top:15px !important;" class="btn btn-primary">
		</div>
	  
	</form>	
	</p>
	
	<h4>Available XML files (click to see the result):</h4>
	<p>
	<?php
	$dirPath = dir('../../test/xmls/');
	$imgArray = array();
	while (($file = $dirPath->read()) !== false)
	{
	  if ((substr($file, -3)=="xml"))
	  {
		 $imgArray[ ] = trim($file);
	  }
	}
	$dirPath->close();
	sort($imgArray);
	$c = count($imgArray);
	for($i=0; $i<$c; $i++)
	{
	   echo "<a href='../client/filledForm.html?fileid=".$imgArray[$i]."' >".$imgArray[$i]."</a><br/>";
	}
	?>
	</p>
	
	<h4>Upload your own XML file:</h4>
	<p>
	<?php if($textXML !="") {  echo "<p class='green'>".$textXML."</p>"; }?>
	<form id="form1" name = "form1" action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">
		 
			<div class="col-md-6">
				<label>Select your XML file:</label>
				<input  type="file" name='file' id="file" size="30"  />
			</div>
			
		</div>
		
		<div class="col-md-12">
			
			 <input type="submit" name="savexml" value="Save XML" style="margin-top:15px !important;" class="btn btn-primary">
		</div>
	  
	</form>	
	</p>
								
	
	<h4>Available annotation commands:</h4>
	<p><ul>
	<li><b>disabled</b>: the input filed will be disabled</li>
	<li><b>hidden</b>: the whole ead tag will be hidden</li>
	<li><b>noinputfield</b>: the ead tag won't have input field, only attribute(s)</li>
	</ul>
	For example:
<xmp>
<xs:annotation>
	<xs:appinfo>
		<disabled/>
	</xs:appinfo>
	<xs:documentation xml:lang="sl">
		I don't know in Slovenian
	</xs:documentation>
	<xs:documentation xml:lang="en">
		Record Identifier
	</xs:documentation>
</xs:annotation>
	</xmp>
	</p>
	
	
	</div>



</div>
</div>
</body>
</html>
