<div id="links"><ul><h4 style="color:#880011;text-align:center;background-color:white;border-radius:4px;margin-top:2px;">Suggested Videos<h4>
<?php
$query = "SELECT title,uploader,pic,url FROM links";

try{
	 $db = new pdo("mysql:host=localhost:3307;dbname=got", "root", "");
$links= $db->query($query);	

foreach($links as $link):?>
<li><a href="<?=$link[3]?>">
<div class="link" onclick="">
<h5><?=$link[0]?></h5>
<img src="links_pics/<?=$link[2]?>" title="<?=$link[0]?>" width="10" height="150" alt="<?=$link[0]?>" target="_blank"/> 
<p><?=$link[1]?></p>
</div></a>
</li>
<?php
endforeach;
}catch (pdoexception $e){
die("connection failed: " . $e->getmessage());
}

?>
</ul></div>
