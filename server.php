<?php
if(isSet($_GET["characters"])):

if($_GET["characters"]=="all"):
$query="SELECT * FROM characters";

else:
$char=$_GET["characters"];
$query="SELECT * FROM characters where name='$char'";
endif;
try{
	//in my laptop mysql at port 3307 you may need to change this
$db = new PDO("mysql:host=localhost:3307;dbname=got", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


$rows = $db->query($query);


header("Content-type: application/json");
?>
{
	"characters":  [
<?php
$count = $rows->rowCount();
if ($count > 0) :
$order=1;
foreach ($rows as $row) :
if($order==$count):?>
{"name": "<?= $row[0]; ?>", "house": "<?= $row[1]; ?>","story": "<?=$row[2]; ?>" ,"state": "<?=$row[3]; ?>"}
 <?php else:?>
{"name": "<?= $row[0]; ?>", "house": "<?= $row[1]; ?>","story": "<?=$row[2]; ?>" ,"state": "<?=$row[3]; ?>"},
<?php endif;$order++;
 endforeach; 
  endif;  	?>]
}
<?php
}catch (PDOException $e){
	
	die("Connection failed: " . $e->getMessage());

}
endif;
?>

<?php

if(isSet($_POST["title"])&&isSet($_POST["text"])):
session_start();
if(!isset($_SESSION["logged_in_name"])):die("u need to log in first");
endif;
$files="";
$dir="./temp";
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
		if (($file = readdir($dh)) !== false) {    
		   if(preg_match("/^(.)*.([jJ][pP][gG]|[pP][Nn][gG])$/",$file)):
		 $files=$file;
		endif;
		}
	
        while (($file = readdir($dh)) !== false) {    
		   if(preg_match("/^(.)*.([jJ][pP][gG]|[pP][Nn][gG])$/",$file)):
		   
		   $files=$files.'|'.$file;
		 rename($dir."/".$file,"discussion_files/".$file);
		   endif;
        }
        closedir($dh);
		
    }
}
$title=$_POST["title"];
$text=$_POST["text"];

$user = $_SESSION["logged_in_name"] ; 
$query="INSERT INTO discussions(title,content,files,user,upvotes,downvotes) VALUES('$title','$text','$files','$user',0,0)";
try{

$db = new PDO("mysql:host=localhost:3307;dbname=got", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec($query);


}catch (PDOException $e){
	
	die("Connection failed: " . $e->getMessage());

}
endif;

if(isSet($_GET["save_pic_temporarly"])&&$_GET["save_pic_temporarly"]==true):
$output_dir = "temp/";
if(isset($_FILES["file"]))
{
	$ret = array();
	
//	This is for custom errors;	
/*	$custom_error= array();
	$custom_error['jquery-upload-file-error']="File already exists";
	echo json_encode($custom_error);
	die();
*/
	$error =$_FILES["file"]["error"];
	//You need to handle  both cases
	//If Any browser does not support serializing of multiple files using FormData() 
	if(!is_array($_FILES["file"]["name"])) //single file
	{
 	 	$fileName = $_FILES["file"]["name"];
 		move_uploaded_file($_FILES["file"]["tmp_name"],$output_dir.$fileName);
    	$ret[]= $fileName;
	}
	else  //Multiple files, file[]
	{
	  $fileCount = count($_FILES["file"]["name"]);
	  for($i=0; $i < $fileCount; $i++)
	  {
	  	$fileName = $_FILES["file"]["name"][$i];
		move_uploaded_file($_FILES["file"]["tmp_name"][$i],$output_dir.$fileName);
	  	$ret[]= $fileName;
	  }
	
	}
  
	
 }
 endif;
 ?>
 <?php
 if(isSet($_POST["login_name"])&&isSet($_POST["login_password"])):
			$name=$_POST["login_name"];
			$pass=$_POST["login_password"];
$query="SELECT name,password FROM users where name='$name'";

try{
	//in my laptop mysql at port 3307 you may need to change this
$db = new PDO("mysql:host=localhost:3307;dbname=got", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$user_result = $db->query($query);	
$user_result = $user_result->fetch(); 
if($user_result[0]==$name&&$user_result[1]==$pass):
session_start();
$_SESSION["logged_in_name"] = $name; ?>
<h1>You have logged in successfully</h1>
<?php
endif;	
}catch (PDOException $e){
	
	die("Connection failed: " . $e->getMessage());

}		
endif;		
?>	