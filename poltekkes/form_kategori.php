<?php
include 'header.php';

if(isset($_SESSION['signed_in'])){
	echo'
	<table >
	<form method="post" action="kategori.php" enctype="multipart/form-data">
	<tr>
		<td><label for="nama_kategori">Nama kategori</td>
		<td>:</td> 
		<td><input type="text" id="nama_kategori" name="nama_kategori"></td>
		</label>
	</tr>
	<tr>
		<td><label for="deksripsi">Deskripsi</td>
		<td>:</td> 
		<td><textarea id="deksripsi_kategori" name="deksripsi_kategori" /></textarea></td>
		</label>
	</tr>
	<tr>
		<td></td> 
		<td></td> 
		<td><input type="submit" name="submit" value="Tambah Kategori" /></td> 
	</tr>
	</table>	';
	
}
else {
	echo"Silahkan Login terlebih Dahulu";
}
include 'footer.php';
?>