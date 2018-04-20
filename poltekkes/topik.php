<?php
	include 'config.php';
	session_start();
	$subyek=$_POST['topic_subject'];
	$id_kat=$_POST['kat_topik'];
	$konten=$_POST['post_content'];
	$username=$_SESSION['username'];
	$sql = "INSERT INTO topik (subyek,tanggal,topik_kat,topik_by)
						VALUES ('$subyek',NOW(),'$id_kat','$username')";
			$conn->query($sql);
			
	$id_topik=$conn->lastInsertId();
	
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
	$sql = "INSERT INTO post (konten,tanggal,post_topik,post_by, link_attachment)
						VALUES ('$konten',NOW(),'$id_topik','$username','$string')";
			$conn->query($sql);	

			
	
	echo '<script>alert("Berhasil Menambah Topik/Post'.$link.'")</script>';	
	echo "<script>window.location.href='form_topik.php'</script>";
?>