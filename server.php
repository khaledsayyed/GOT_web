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