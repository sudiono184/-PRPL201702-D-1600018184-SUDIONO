<?php
	$db =  new mysqli("localhost","root","","hotel184");
	$Nomor_KTP = @$_GET['Nomor_KTP'];
	$sql = "DELETE from pemesanan where Nomor_KTP='$Nomor_KTP' ";

	$query = $db->query($sql);
	if($query){
		echo "<br><br><br><center><h1>delete success </h1></center></br></br></br>";
	}else{
		echo "<center><h1>delete failed </h1></center>".$db->error;
	}
	
	echo "<center><h2><td><a href='output.php'> tampilkan kembali tabel</a><br></h2></center>";
	echo "<center><h2><a href='/hotel184/'> goto Menu</a></h2></center>";
?>2