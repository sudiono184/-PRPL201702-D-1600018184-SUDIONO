<html>
<head><title></title></head>					``
<style type="text/css">
body{
background-color :white;
background-size:cover;
}
</style>
<body></body>
</html>
<?php
	$db =  new mysqli("localhost","root","","hotel184");
	$sql = "SELECT * FROM pemesanan";
	$data = $db->query($sql);
	echo "<h1><center><br><br> DATA PELANGGAN<br></center></h1>";
	echo "<center><table border='4' cellpadding='5' cellspacing='0'></center>";
	echo "<tr bgcolor='#CCCCCC'><td><center>No.</center></td><td><center>Nomor ID</center></td><td><center>nama_pelanggan</center></td><td><center>alamat</center></td><td><center>gender</center></td><td><center>nomorhp</center></td><td><center>jeniskamar</center></td><td><center>checkin</center></td><td><center>checkout</center></td><td><center>statuskamar</center></td><td><center>totalbiaya</center></td><td><center>infosisawaktusewa</center></td><td colspan=3><center>Aksi</center></td></tr>";
	if($data->num_rows > 0){
		$no = 1;
		while($row = $data->fetch_assoc()){
			echo "<tr>";
			echo "<td>".$no++."</td>";
			echo "<td>".$row['Nomor_KTP']."</td>";
			echo "<td>".$row['nama_pelanggan']."</td>";
			echo "<td>".$row['alamat']."</td>";
			echo "<td>".$row['gender']."</td>";
			echo "<td>".$row['nomorhp']."</td>";
			echo "<td>".$row['jeniskamar']."</td>";
			echo "<td>".$row['checkin']."</td>";
			echo "<td>".$row['checkout']."</td>";
			echo "<td>".$row['statuskamar']."</td>";
			echo "<td>".$row['totalbiaya']."</td>";
			echo "<td>".$row['infosisawaktusewa']."</td>";
			echo "<td><a href='finput.php?Nomor_KTP=".$row['Nomor_KTP']."'> Input </a></td>";
			echo "<td><a href='hapus.php?Nomor_KTP=".$row['Nomor_KTP']."'> hapus </a></td>";
			echo "</tr>";	
		}
	}else{
		echo "TIDAK ADA DATA TERINPUT";
	}
	echo "</table>";
	
	$db->close();
?>
<html>
	<head>
		<title></title>
	</head>
	<body>
	<br><br>
	<table border="5px">
		<foRm method='POST' action="output.php">
			<tr>
				<td>
				from :
				<input type="date" id="from" name="from">
				</td>
				<td>
				to :
				<input type="date" id="to" name="to">
				<input type="submit" value="filter"></td>
			</tr></form>
	<tbody>
	<?php
                require('filter.php');
                $from = (isset($_POST['from']) ? $_POST['from'] : '');
                $to = (isset($_POST['to']) ? $_POST['to'] : '');

                  if(!$from == null && !$to == null){
                    $result = $konek->query("SELECT * FROM pemesanan where checkin between '".$_POST['from']."' AND  '".$_POST['to']."' ORDER by Nomor_KTP ASC");
                    echo "<tr>
                    	<td>Nomor ID</td>
                    	<td>nama_pelanggan</td>
                    	<td>alamat</td>
                    	<td>gender</td>
                    	<td>nomorhp</td>
                    	<td>jeniskamar</td>
                        <td>Check-In</td>
                        <td>Check-Out</td>
                        <td>Status Kamar</td>
                        <td>Total Biaya</td>
                        <td>Informasi Sisa Waktu Sewa</td>
                        </tr>";
                    while ($mem = mysqli_fetch_assoc($result)):
					
                    echo '<tr>';
                    echo '<td>'.$mem['Nomor_KTP'].'</td>';
                    echo '<td>'.$mem['nama_pelanggan'].'</td>';
                    echo '<td>'.$mem['alamat'].'</td>';
                    echo '<td>'.$mem['gender'].'</td>';
                    echo '<td>'.$mem['nomorhp'].'</td>';
                    echo '<td>'.$mem['jeniskamar'].'</td>';
                    echo '<td>'.$mem['checkin'].'</td>';
                    echo '<td>'.$mem['checkout'].'</td>';
                    echo '<td>'.$mem['statuskamar'].'</td>';
                    echo '<td>'.$mem['totalbiaya'].'</td>';
                    echo '<td>'.$mem['infosisawaktusewa'].'</td>';
                    echo '</tr>';

                  endwhile;
                }else{
                  $result = $konek->query("SELECT * FROM pemesanan");
				    echo "<table border='1'>";
                    echo "<tr>
                    	<td>Nomor ID</td>
                    	<td>nama_pelanggan</td>
                    	<td>alamat</td>
                    	<td>gender</td>
                    	<td>nomorhp</td>
                    	<td>jeniskamar</td>
                        <td>Check-In</td>
                        <td>Check-Out</td>
                        <td>Status Kamar</td>
                        <td>Total Biaya</td>
                        <td>Informasi Sisa Waktu Sewa</td>
                        </tr>";
                  while ($mem = mysqli_fetch_assoc($result)):
				
                  echo '<tr>';
                    echo '<td>'.$mem['Nomor_KTP'].'</td>';
                    echo '<td>'.$mem['nama_pelanggan'].'</td>';
                    echo '<td>'.$mem['alamat'].'</td>';
                    echo '<td>'.$mem['gender'].'</td>';
                    echo '<td>'.$mem['nomorhp'].'</td>';
                    echo '<td>'.$mem['jeniskamar'].'</td>';
                    echo '<td>'.$mem['checkin'].'</td>';
                    echo '<td>'.$mem['checkout'].'</td>';
                    echo '<td>'.$mem['statuskamar'].'</td>';
                    echo '<td>'.$mem['totalbiaya'].'</td>';
                    echo '<td>'.$mem['infosisawaktusewa'].'</td>';
                   echo '</tr>';

                endwhile;
                }
                /* free result set */
                $result->close(); 

?>
</tbody>
</table>
<center><br>
<td>--- PEMBAYARAN ---</td>
<P><SCRIPT language="JavaScript">
<!--
//window.onload = function(){}
function jumlah_hari(){
    var bil1 = parseFloat(document.finput.checkin.value);
    if (isNaN (bil1))
    bil1=0.0;
    var bil2 = parseFloat(document.finput.checkout.value);
    if (isNaN (bil2))
    bil2=0.0;
    var hasil = bil2 - bil1;
    document.write("<center>STRUK TRANSAKSI PEMBAYARAN</center>");
    document.write("<hr>");
    document.write("<center>Lamanya hari penginapan : " + hasil +"hari</center>");
}
function harga(){
    var VIP = parseFloat(document.finput.class_kamar_pesanan.value);
    if (isNaN (VIP))
    VIP=0.0;
    var bil1 = parseFloat(document.finput.checkin.value);
    if (isNaN (bil1))
    bil1=0.0;
    var bil2 = parseFloat(document.finput.checkout.value);
    if (isNaN (bil2))
    bil2=0.0;
    var hasil = bil2 - bil1;
    var harga = VIP * hasil;
    document.write("<center>STRUK TRANSAKSI PEMBAYARAN</center>");
    document.write("<hr>");
    document.write("<center>Lamanya hari penginapan : " + hasil +" hari</center>");
    document.write("<center>total jumlah harga :Rp. "+ harga +"</center>");
}
function denda(){
    var dnd = parseFloat(document.finput.totalbiaya.value);
    if (isNaN (dnd))
    dnd=0.0;
    var bil3 = parseFloat(document.finput.checkin.value);
    if (isNaN (bil3))
    bil3=0.0;
    var bil4 = parseFloat(document.finput.checkout.value);
    if (isNaN (bil4))
    bil4=0.0;
    var hsl = bil4 - bil3;
    var tot = dnd * hsl;
    document.write("<center>STRUK TRANSAKSI PEMBAYARAN</center>");
    document.write("<hr>");
    document.write("<center>total denda : " + hsl +" hari</center>");
    document.write("<center>total nominal denda :Rp. "+ tot +"</center>");

}
function kabeh(){
    var VIP = parseFloat(document.finput.class_kamar_pesanan.value);
    if (isNaN (VIP))
    VIP=0.0;
    var bil1 = parseFloat(document.finput.checkin.value);
    if (isNaN (bil1))
    bil1=0.0;
    var bil2 = parseFloat(document.finput.checkout.value);
    if (isNaN (bil2))
    bil2=0.0;
    var dnd = parseFloat(document.finput.totalbiaya.value);
    if (isNaN (dnd))
    dnd=0.0;
    var bil3 = parseFloat(document.finput.checkin.value);
    if (isNaN (bil3))
    bil3=0.0;
    var bil4 = parseFloat(document.finput.checkout.value);
    if (isNaN (bil4))
    bil4=0.0;
    var hsl = bil4 - bil3;
    var tot = dnd * hsl;
    var hasil = bil2 - bil1;
    var harga = VIP * hasil;
    var totalbayar = harga + tot;

    document.write("<center>STRUK TRANSAKSI PEMBAYARAN</center>");
    document.write("<center>HOTEL184</center>");
    document.write("<hr>");
    document.write("<center>Lamanya hari penginapan : " + hasil +" hari</center>");
    document.write("<center>total jumlah harga      :Rp. "+ harga +"</center>");
    document.write("<center>total hari berdenda     : " + hsl +" hari</center>");
    document.write("<center>total nominal denda     :Rp. "+ tot +"</center>");
    document.write("<center>total bayar             :Rp. "+ totalbayar +"</center>");
    
}
--></SCRIPT></P></center>
<FORM NAME ="finput">
<PRE>
<font color="black">Tanggal checkin  :<input type="text" size="11" name="checkin"></font></br>
<font color="black">Tanggal checkout :<input type="text" size="11" name="checkout"></font></br>
<font color="black">Harga kamar      :<input type="text" size="11" name="class_kamar_pesanan"></font></br>
<font color="black">Nominal Denda    :<input type="text" size="11" name="totalbiaya" placeholder="jika ada denda"></font>
</PRE>
<tr>
        <td>Harga kamar</td>
        <td><pre>
            Standart room    = 100000<br>
            VIP room         = 200000<br>
            VVIP room        = 300000<br>
            Exclusive room   = 400000</pre><br>
        </td>
</tr>
<br>
<tr>
        <td>Jenis Kamar</td>
        <td>:</td>
        <td>
        <select name="jeniskamar">
          <option value="Standart room">Standart room</option>
          <option value="VIP room">VIP room</option>
          <option value="VVIP room">VVIP room</option>
          <option value="Exclusive room">Exclusive room</option>

          </select>         
      </tr>

</PRE>
<INPUT TYPE="button" value="Lama Sewa" onclick="jumlah_hari()">
<INPUT TYPE="button" value="total Biaya Kamar" onclick="harga()">
<INPUT TYPE="button" value="Total Denda" onclick="denda()">
<INPUT TYPE="button" value="Total Semua" onclick="kabeh()">
<button type="submit" onclick="window.print()">print</button>
<INPUT TYPE="reset" value="Ulang"><br/><br/>
</form>
<h2><a href='/hotel184/'><br><br>BACK MENU</a></h2>;
</body>
</html>