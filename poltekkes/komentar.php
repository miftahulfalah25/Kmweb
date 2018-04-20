<?php
	include 'config.php';
	session_start();
	$konten=$_POST['komentar'];
	$post_topik=$_POST['id_topik'];
	$username=$_SESSION['username'];
	
	
	//start upload
	$link = NULL;
	$string = NULL;
		if($_FILES['attachment']['size'] != 0){
			$ekstensi_diperbolehkan	= array('txt','jpg','xls','xlsx','pdf','rar','zip','doc','docx','ppt','pptx');
			$nama = $_FILES['attachment']['name'];
			$x = explode('.', $nama);
			$ekstensi = strtolower(end($x));
			$ukuran	= $_FILES['attachment']['size'];
			$file_tmp = $_FILES['attachment']['tmp_name'];	
 
			if(in_array($ekstensi, $ekstensi_diperbolehkan) == true){
					$link = "file/".$nama;
					$string = preg_replace('/\s+/', '', $link);	
					move_uploaded_file($file_tmp, $string);
					// $query = mysql_query("INSERT INTO upload VALUES(NULL, '$nama')");
					$link = "file/".$nama;
					$string = preg_replace('/\s+/', '', $link);	
				
			}else{
				echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
			}
		}
	//end upload
	
	$sql = "INSERT INTO post (konten,tanggal,post_topik,post_by,link_attachment)
						VALUES ('$konten',NOW(),'$post_topik','$username','$string')";
			$conn->query($sql);		
	
	$sql = "SELECT * FROM topik WHERE id_topik ='$post_topik'";
	$stmt = $conn->prepare($sql);
	$stmt->execute();
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	
	
	
	$sql1="INSERT INTO notifikasi (tanggal,notif_by,notif_pos)
						VALUES (NOW(),'$username','$post_topik') ";
		$conn->query($sql1);		
	
	echo '<script>alert("Berhasil Menambah komentar")</script>';	
	echo "<script>window.location.href='daftar_post.php?id=$post_topik'</script>";
?>