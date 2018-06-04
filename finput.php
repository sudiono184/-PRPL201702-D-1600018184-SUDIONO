<!DOCTYPE html>
<html>
<head>
	<title></title>
<style type="text/css">
body{
background-image:url("bg1.jpg");
background-size:cover;
}
h1{
color:black;
font-family:times new roman;
}

h2{
color:white;
font-family:times new roman;
}
</style>
</head>
<body>
	<center>
	<h1><br><br><br><br>ROOM RESERVATION</h1>
	<form action="input.php" method="post">
  		<table width="500px" height="400px" cellpadding="2" cellspacing="0" border="4" bgcolor="white">
   		<tr>
    		<td>NO.ID</td>
    		<td>:</td>
    		<td><input type="number" name="Nomor_KTP" placeholder="NO id"required></td>
   		</tr>
   		<tr>
    		<td>NAMA</td>
    		<td>:</td>
    		<td><input type="text" name="nama_pelanggan" placeholder="Nama Lengkap" required></td>
   		</tr>
   		<tr>
    		<td>ALAMAT</td>
    		<td>:</td>
    		<td><input type="text" name="alamat" placeholder="Kota"required></td>
   		</tr>
		<tr>
    		<td>JENIS KELAMIN</td>
    		<td>:</td>
    		<td><input type="radio" name="gender" value="Laki-Laki" checked=/>Laki-Laki </br>
        <input type="radio" name="gender" value="Perempuan" checked=/>Perempuan </br>
          
      </tr>
		<tr>
    		<td>NO.HP</td>
    		<td>:</td>
    		<td><input type="number" name="nomorhp" placeholder="08**********" required></td>
   		</tr>
		<tr>
    		<td>jeniskamar</td>
    		<td>:</td>
    		<td>
           <select name="jeniskamar">
          <option value="Standart room">Standart room</option>
          <option value="VIP room">VIP room</option>
          <option value="VVIP room">VVIP room</option>
          <option value="Exclusive room">Exclusive room</option>

          </select>    		
      </tr>
		<tr>
    		<td>checkin</td>
    		<td>:</td>
    		<td><input type="date" name="checkin" placeholder="10-01-2018" required></td>
   		</tr>
      <tr>
        <td>checkout</td>
        <td>:</td>
        <td><input type="date" name="checkout" placeholder="10-01-2018" required></td>
      </tr>
      <tr>
        <td>Status Kamar</td>
        <td>:</td>
        <td><input class="form" type="text" name="statuskamar" pattern="[A-Za-z]+" required></td>
      </tr>
      <tr>  
        <td>Total Biaya</td>
          <td>:</td>
          <td><input class="form" type="" name="totalbiaya"  required></td>   
      </tr>
      <tr>
        <td>Informasi Sisa Waktu Sewa</td>
        <td>:</td>
        <td><input class="form" type="text" name="infosisawaktusewa"  required></td>
      </tr>
   		<tr>
    		<td>&nbsp;</td>
    		<td></td>
    		<td><input type="submit" name="add" value="Save">	<input type="reset" value="Reset"></td>
   		</tr>
  		</table>
 	</form>
</center>
</body>
</html>