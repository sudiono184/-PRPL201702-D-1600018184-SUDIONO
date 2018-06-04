<?php
	$db =  new mysqli("localhost","root","","hotel184");
	$sql = "create table pemesanan (Nomor_KTP varchar(11) not null primary key,nama_pelanggan varchar(20) not null, alamat varchar(10) not null, gender varchar(10) not null, nomorhp varchar(20) not null, jeniskamar varchar(10) not null,checkin varchar(30) not null,checkout varchar(30)not null, statuskamar varchar(30), totalbiaya varchar(30), infosisawaktusewa varchar(30))";

	$query = $db->query($sql);
	if($query){
		echo "<center><br><br><h1>Tabel berhasil dibuat</h1></center>";
	}else{
		echo "<center><h1>Tabel gagal dibuat</h1></center>".$db->error;
	}
	echo "<center><h3><a href='/hotel184/'> goto Menu</a></center>";
?>