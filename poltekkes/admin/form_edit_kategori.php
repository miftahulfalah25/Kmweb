<?php
include 'header.php';
include 'config.php';

$id_kategori=$_GET['kat'];
	
	$sql = "SELECT * FROM kategori WHERE id_kat ='$id_kategori'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	echo'
	
	<table>
	<form method="post" action="edit_kategori.php">
    <tr>      
		<td>Nama Kategori</td><td>:</td><td> <textarea id="nama_kategori" name="nama_kategori" /> '. $row['nama_kategori'] .'</textarea></td>
    </tr>
	<tr>      
		<td>Deskripsi</td><td>:</td><td> <textarea id="deksripsi_kategori" name="deksripsi_kategori" /> '. $row['deskripsi'] .'</textarea></td>
    </tr>
	<input type="hidden" name="id_kat" value='. $id_kategori .'>
	<tr><td></td>
		<td></td>
		<td><input type="submit" value="ubah" /></td>
	</tr>
	</table>
    
	
	</form>';

include 'footer.php';
?>