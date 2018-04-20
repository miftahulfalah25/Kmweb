<?php
include 'header.php';
include 'config.php';
include 'raita.php';
include 'pdf2text.php';
include 'doc2txt.php';
$time_start = microtime(true); 
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
	
	echo'
	<table>
	<form method="post" action="" enctype="multipart/form-data">
    <tr>      
		<td>kata kunci pencarian </td><td>:</td><td> <input type="text" name="input" /></td>
    </tr>
	<tr><td></td>
		<td></td>
		<td><input type="submit" value="search" /></td>
	</tr>
	</table>
	';
	}
	
	else
	{
	
		$found = 0;
	
		$sql = "SELECT * , Upper(subyek) as subyek2 FROM topik where status_top='1'"; //pencrian topik
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
		echo "<h3>Pencarian Topik dengan keyword : ";
			echo $_POST['input'] ;
			echo "</h3><br><table border='1' width='100%'> <tr>";
			echo '<th>daftar topik</th>
				  <th>tanggal posting</th></tr>';
	if(strlen($_POST['input'])>2){
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		//memanggil fungsi raita
		$a = raita($row['subyek2'],strtoupper($_POST['input']) );
		//echo $a;
		if($a!=-1){
			
			$found += 1;
			echo'
			<tr>
				<td><h3><a href="daftar_post.php?id='. $row['id_topik'] .'">' . $row['subyek'] . '</a><h3></td>
				<td>'. $row['tanggal'] .'</td>
				
			</tr>';
		}
		
		}
	}
		if ($found==0){
			echo'
			<tr>
				<td colspan="2"> Pencarian tidak ditemukan silahkan ubah kata kunci</td>
				
			</tr>';
		}
		echo'</table> Total ditemukan = '.$found.' <br/> <br/>';
		
		
		
		
		$found = 0;
	
		$sql = "SELECT * , Upper(konten) as konten2 FROM post "; //pencarian konten
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
		echo "<h3>Pencarian konten dengan keyword : ";
			echo $_POST['input'] ;
			echo "</h3><br><table border='1' width='100%'> <tr>";
			echo '<th>daftar konten</th>
				  <th>tanggal posting</th></tr>';
	if(strlen($_POST['input'])>2){
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		//memanggil fungsi raita
		$a = raita($row['konten2'],strtoupper($_POST['input']) );
		if($a!=-1){
			
			$found += 1;
			echo'
			<tr>
				<td><h3><a href="daftar_post.php?id='. $row['post_topik'] .'">' . $row['konten'] . '</a><h3></td>
				<td>'. $row['tanggal'] .'</td>
			</tr>';
		
		}
		
		}
	}
		if ($found==0){
			echo'
			<tr>
				<td colspan="2"> Pencarian tidak ditemukan silahkan ubah kata kunci</td>
				
			</tr>';
		}
		echo'</table> Total ditemukan = '.$found.'<br/><br/>';
				
		$found = 0;
	
		$sql = "SELECT * ,link_attachment as link FROM post "; //pencarian fle
		$stmt = $conn->prepare($sql);
		$stmt->execute();
		
		echo "<h3>Pencarian file dengan keyword : ";
			echo $_POST['input'] ;
			echo "</h3><br><table border='1' width='100%'> <tr>";
			echo "<th >kutipan isi file</th>
				  <th > file </th>
				  <th >tanggal posting</th></tr>";
	if(strlen($_POST['input'])>2){
		while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
		//decode pdf
		$text = pdf2text($row['link']);
		//decode word
		$docObj = new Doc2Txt($row['link']);
		$text2 = $docObj->convertToText();
		//memanggil fungsi raita
		$a = raita(strtoupper($text),strtoupper($_POST['input']) );
		$b = raita(strtoupper($text2),strtoupper($_POST['input']) );
		//echo $a;
		if($a!=-1){
			
			$found += 1;
			echo"
			<tr> 
				<td >" . $rest = substr($text, $a,100) . "</td>
				<td style='max-width:200px; word-wrap:break-word;'> <a href='".$row['link_attachment']."'> ".$row['link_attachment']." </a></td>
				<td >". $row['tanggal'] ."</td>
			</tr>";
		
		}
		else if ($b!=-1){
			$found += 1;
			echo"
			<tr>
				<td >" . $rest = substr($text2, $b,100) . "</td>
				<td style='max-width:200px; word-wrap:break-word;'> <a href='".$row['link_attachment']."'> ".$row['link_attachment']."</a></td>
				<td >". $row['tanggal'] ."</td>
			</tr>";
			
		}
		
		}
	}
		if ($found==0){
			echo'
			<tr>
				<td colspan="3"> Pencarian tidak ditemukan silahkan ubah kata kunci</td>
				
			</tr>';
		}
		echo'</table> Total ditemukan = '.$found.'<br/><br/>';
		echo 'Total execution time in seconds: ' . (microtime(true) - $time_start);
		
	
	}
				
include 'footer.php';
?>