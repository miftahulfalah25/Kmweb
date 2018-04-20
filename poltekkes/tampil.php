<?php
include 'header.php';
	include 'config.php';
				$sql = "SELECT * FROM daftar";
				$stmt = $conn->prepare($sql);
				$stmt->execute();
				while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
			
					 echo $row['nama'];
					 echo ' ';
					 echo $row['nim'];
					 echo "<br>";
				}
							

include 'footer.php';
?>