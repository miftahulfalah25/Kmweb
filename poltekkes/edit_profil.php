<?php
include 'header.php';
include 'config.php';
$username=$_SESSION['username'];
	$sql = "SELECT * FROM user WHERE username ='$username'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
	if($_SERVER['REQUEST_METHOD'] != 'POST'){
		echo '
	<table>
	<form method="post" action="" enctype="multipart/form-data">
	<tr>
		<td>Nama</td><td>:</td> <td><input type="text" id="nama" name="nama_user" value ="'. $row['nama'] .'" ></td>
	</tr>
	<tr>
		<td> Nip</td><td>:</td> <td><input type="text" id="nip" name="nip_user" value ="'. $row['nip'] .'"></td>
	</tr>
	<tr>
		<td>Tanggal Lahir</td><td>:</td> <td><input type="date" id="tanggal_lahir" name="tanggal_lahir_user" value ="'. $row['tanggal_lahir'] .'"></td>
	</tr>
	<tr>
		<td>Jabatan</td><td>:</td> <td><input type="text" id="jabatan" name="jabatan_user" value ="'. $row['jabatan'] .'"></td>
	</tr>
	<tr>
		<td>Golongan</td><td>:</td> <td><input type="text" id="golongan" name="golongan_user" value ="'. $row['golongan'] .'"></td>
	</tr>
	<tr>
		<td>Pendidikan</td><td>:</td> <td><input type="text" id="pendidikan" name="pendidikan_user" value ="'. $row['pendidikan'] .'"></td>
	</tr>
	<tr>
		<td>Ijazah</td><td>:</td> <td><input type="text" id="ijazah" name="ijazah_user" value ="'. $row['ijazah'] .'"></td>
	</tr>
	<tr>
		<td>Kontak</td><td>:</td> <td><input type="text" id="kontak" name="kontak_user" value ="'. $row['kontak'] .'"></td>
	</tr>
	<tr>
		<td>upload foto profil (jpg/png)</td><td>:</td> <td><input type="file" name="attachment" /></td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><input type="submit" name="submit" value="ubah" /></td>
	</tr>
	</table>';
	
	}
	else{
		$name=$_POST['nama_user'];
		$nip=$_POST['nip_user'];
		$tanggal=$_POST['tanggal_lahir_user'];
		$jabatan=$_POST['jabatan_user'];
		$golongan=$_POST['golongan_user'];
		$pendidikan=$_POST['pendidikan_user'];
		$ijazah=$_POST['ijazah_user'];
		$kontak=$_POST['kontak_user'];
		
		//start upload
	$link = NULL;
		if(true){
			$ekstensi_diperbolehkan	= array('jpg','png');
			$nama = $_FILES['attachment']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['attachment']['size'];
			$file_tmp = $_FILES['attachment']['tmp_name'];	
			
			if(in_array($ekstensi, $ekstensi_diperbolehkan) == true){
					
					$link = "foto/".$nama;
					$string = preg_replace('/\s+/', '', $link);				
					move_uploaded_file($file_tmp, $string);
					// $query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
				
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
	//end upload
	
	
		$sql = "UPDATE `user` SET `nama`='$name',`nip`='$nip',`tanggal_lahir`='$tanggal',`jabatan`='$jabatan',`golongan`='$golongan',`nama`='$pendidikan',`ijazah`='$ijazah',`kontak`='$kontak',`foto`='$string'
				WHERE `username`='$username'";					
		$conn->query($sql);
			
		echo '<script>alert("Berhasil Merubah Profil")</script>';	
		echo "<script>window.location.href='profil_user.php'</script>";
	}

include 'footer.php';
?>


