<div id="links"><ul>Suggested Videos
<?php
$query = "SELECT title,uploader,pic FROM links";

try{
	 $db = new pdo("mysql:host=localhost:3307;dbname=got", "root", "");
$links= $db->query($query);	

foreach($links as $link):


endforeach;
}catch (pdoexception $e){
die("connection failed: " . $e->GETmessage());
}

?>
</ul></div>