
<?


$tempFile =  $_FILES['uploadedfile']['tmp_name'];  // path of the temp file created by PHP during upload
$imginfo_array = getimagesize($tempFile);   // returns a false if not a valid image file
 
if ($imginfo_array !== false) 
    {
    $mime_type = $imginfo_array['mime'];
    switch($mime_type) { 
 
	case "image/jpeg":
		echo"Uploaded";
 
    }
}
else {
    echo "This is not a valid image file";
}




?>