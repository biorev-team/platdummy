
<?php
if(isset($_FILES["file"]["type"]))
{
    $file_parts = pathinfo($_FILES["file"]["name"]);
    $file_name = $file_parts['filename'];
    
$validextensions = array("jpeg", "jpg", "png");
$temporary = explode(".", $_FILES["file"]["name"]);
//    print_r($temporary);
$file_extension = end($temporary);
if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg")
) && ($_FILES["file"]["size"] < 100000)//Approx. 100kb files can be uploaded.
&& in_array($file_extension, $validextensions)) {
if ($_FILES["file"]["error"] > 0)
{
echo "error";
}
else
{

$sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
$targetPath = "../../images/primary_images/".$file_name.time().'.'.$temporary[1]; // Target path where file is to be stored
move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
echo $file_name.time().'.'.$temporary[1];
}
}
else
{
echo "error";
}
}
?>
