<?php
	include 'config.php';
	
	$name=$_POST['nama_user'];
	$nip=$_POST['nip_user'];
	$tanggal=$_POST['tanggal_lahir_user'];
	$jabatan=$_POST['jabatan_user'];
	$golongan=$_POST['golongan_user'];
	$pendidikan=$_POST['pendidikan_user'];
	$ijazah=$_POST['ijazah_user'];
	$kontak=$_POST['kontak_user'];
	$username=$_POST['username_user'];
	$password=$_POST['password_user'];
	$encrypt=md5($password);
	$email=$_POST['email_user'];
	
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
	
	
	
	
	
	$sql = 'SELECT * FROM login WHERE  username = :username';
		$stmt = $conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->execute();
        if($stmt->rowCount())
        {
			echo '<script>alert("Pendaftaran gagal, username telah terdaftar")</script>';	
			echo '<script>window.location="javascript:history.back()"</script>';
        }  
        else
        {
			$sql = "INSERT INTO user (nama,nip,tanggal_lahir,jabatan,golongan,pendidikan,ijazah,kontak,username,foto)
						VALUES ('$name','$nip','$tanggal','$jabatan','$golongan','$pendidikan','$ijazah','$kontak','$username','$string')";
			$conn->query($sql);
			$sql = "INSERT INTO login (username,password,email)
						VALUES ('$username','$encrypt','$email')";
			$conn->query($sql);
			echo '<script>alert("Pendaftaran Berhasil")</script>';	
			echo "<script>window.location.href='form_login.php'</script>";
		
        }
?>