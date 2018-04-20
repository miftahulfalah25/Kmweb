<?php
include 'header.php';
include 'config.php';

	if(isset($_SESSION['signed_in'])){
	$username=$_SESSION['username'];
	$sql = "SELECT * FROM user WHERE username ='$username'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
					 
		echo  '
		
		<table>
		<tr>      
		<td>Foto Profil</td><td>:</td><td> <img src='.$row['foto'].' style="width:80px;height:80px;"> </td>
		</tr>
		<tr>      
		<td>Nama</td><td>:</td><td> '.$row['nama'].'</td>
		</tr>
		<tr>      
		<td>Nip</td><td>:</td><td> '.$row['nip'].'</td>
		</tr>
		<tr>      
		<td>tanggal lahir</td><td>:</td><td> '.$row['tanggal_lahir'].'</td>
		</tr>
		<tr>      
		<td>jabatan</td><td>:</td><td> '.$row['jabatan'].'</td>
		</tr>
		<tr>      
		<td>golongan</td><td>:</td><td> '.$row['golongan'].'</td>
		</tr>
		<tr>      
		<td>pendidikan</td><td>:</td><td> '.$row['pendidikan'].'</td>
		</tr>
		<tr>      
		<td>ijazah</td><td>:</td><td> '.$row['ijazah'].'</td>
		</tr>
		<tr>      
		<td>kontak</td><td>:</td><td> '.$row['kontak'].'</td>
		</tr>
		<tr>      
		<td>username</td><td>:</td><td> '.$row['username'].'</td>
		</tr>
		
		<tr><td></td>
		<td></td>
		<td> <a href="edit_profil.php"><button>edit profil</button></a></td>
		</tr>
		
		</table>
		
		
		
		';
	}
	}
	else{
		echo"Silahkan Login terlebih Dahulu";
	}

include 'footer.php';
?>