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
$_SESSION["logged_in_name"] = $name; 
$db=null;#closedb?>
<h1>You have logged in successfully</h1>
<?php
endif;	
}catch (PDOException $e){
	
	die("Connection failed: " . $e->getMessage());

}		
endif;	
// sending discussions
 if(isSet($_GET["discussions"])&&$_GET["discussions"]=="all"):
<<<<<<< HEAD
 #This is a very complicated query that get the discussion and the first 3 comments (if moore than 3 available)
 $query="SELECT d.title, d.time_posted, d.upvotes,d.downvotes,d.content, d.files,c1.user_commented,c1.com_time,c1.comment_text,c2.user_commented,c2.com_time,c2.comment_text,c3.user_commented,c3.com_time,c3.comment_text,d.user FROM discussions d LEFT OUTER JOIN discussion_comments c1 ON c1.dis_id=d.dis_id LEFT OUTER JOIN discussion_comments c2 ON c2.dis_id=d.dis_id AND c2.cid<>c1.cid LEFT OUTER JOIN discussion_comments c3 ON c3.dis_id=d.dis_id AND c3.cid<>c2.cid AND c3.cid<>c1.cid WHERE ( c1.cid is null OR (c1.cid=(SELECT MAX(cid) FROM discussion_comments where dis_id=d.dis_id))) AND ( c2.cid is null OR(c2.cid=(SELECT MAX(cid) FROM discussion_comments where dis_id=d.dis_id AND cid<>c1.cid))) ORDER BY d.time_posted DESC ";
=======
 $query="SELECT d.title, d.time_posted, d.upvotes,d.downvotes,d.content, d.files,c1.user_commented,c1.com_time,c1.comment_text,c2.user_commented,c2.com_time,c2.comment_text,c3.user_commented,c3.com_time,c3.comment_text,d.user FROM discussions d LEFT OUTER JOIN discussion_comments c1 ON c1.dis_id=d.dis_id LEFT OUTER JOIN discussion_comments c2 ON c2.dis_id=d.dis_id AND c2.cid<>c1.cid LEFT OUTER JOIN discussion_comments c3 ON c3.dis_id=d.dis_id AND c3.cid<>c2.cid AND c3.cid<>c1.cid WHERE ( c1.cid is null OR (c1.cid=(SELECT MAX(cid) FROM discussion_comments where dis_id=d.dis_id))) AND ( c2.cid is null OR(c2.cid=(SELECT MIN(cid) FROM discussion_comments where dis_id=d.dis_id))) ORDER BY d.time_posted DESC ";
>>>>>>> origin/master
 try{
 $db = new PDO("mysql:host=localhost:3307;dbname=got", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$rows = $db->query($query);	
	 header("Content-type: application/xml"); ?>
<?xml version="1.0" encoding="UTF-8"?>
<discussions>
<?php if ($rows->rowCount() > 0) :
 foreach ($rows as $row) : 
 $txt=xml_entities($row[4]);?>
<discussion title="<?=$row[0];?>" datetime="<?=$row[1]?>" upvotes="<?=$row[2]?>" downvotes="<?=$row[3]?>" postedBy="<?=$row[15]?>">
		<text> <?=$txt ?></text>
	<?php if($row[5]!==null):?>	<img><?= $row[5]; ?></img><?php endif;?>
	<comments> <?php
	for($i=6;$row[$i]!==NULL&&$i<13;$i=$i+3): ?>
		<comment user_commented="<?= $row[$i]; ?>" comment_datetime="<?= $row[$i+1]; ?>">
		<?= $row[$i+2]; ?>
		</comment>
	<?php endfor;?>
	</comments>
</discussion>   <?php endforeach;   endif;	
?></discussions><?php	  
 }catch (PDOException $e){
	die("Connection failed: " . $e->getMessage());
}		
 endif;
 function xml_entities($string) {#used to escape xml spcial characters
    return preg_replace(array("/</","/>/", "/\"/",  "/'/",  "/&/"),array("&lt;","&gt;", "&quot;", "&apos;","&amp;"  ) , $string
    );
}
function is_photo_uploaded_and_moved($charac) {
	// bail if there were no upload forms
   if(empty($_FILES)):
       return false;
endif;
   $file = $_FILES['cphoto']['tmp_name']; // check for uploaded photo
	if( !empty($file) && is_uploaded_file( $file )):
            move_uploaded_file($file, "characters/$charac.jpg");//rename and move
            return true;
        endif;
  
    // return false if no files were found
   return false;
}

if(isSet($_POST["cname"])&&isSet($_POST["house"])&& isSet($_POST["cstory"])&&isSet($_POST["state"])){
	$cname=$_POST["cname"];
	$house=$_POST["house"];
	$cstory=xml_entities($_POST["cstory"]);
	$state=$_POST["state"];
	{if(isSet($_FILES["cphoto"])&& $_FILES["cphoto"]!=NULL){is_photo_uploaded_and_moved($cname);
	
		$query="INSERT INTO characters(name,house,story,state) VALUES('$cname','$house','$cstory','$state')";
try{

$db = new PDO("mysql:host=localhost:3307;dbname=got", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec($query);

header("Location: ./Admin/adminpage.php?st=success");



}catch (PDOException $e){
	
	die("Connection failed: " . $e->getMessage());

}
	}
	}

}
/*if( isset( $_POST["aemail"]))
{
$anam=$_POST["aemail"];
try{
$query1="SELECT name, password, email FROM users WHERE name='$anam'";


$db = new PDO("mysql:host=localhost:3307;dbname=got", "root", "");
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$db->exec($query);

header("Location: ./Admin/adminpage.php?st=success");



}catch (PDOException $e){
	
	die("Connection failed: " . $e->getMessage());

}
	}*/
	


	?>