<?php
	$db = new mysqli("localhost","root","");
	$sql = "Create database hotel184";
	$query = $db->query($sql);
	if($query){
		echo "<center><br><br><h1>Databases success</h1></center>"; 
	}else{
		echo "<center><h1>Databases gagal dibuat </h1></center>".$db->error;
	}
	echo "<center></h3><a href='/hotel184/'> goto Menu</a></h3></center>";
?>