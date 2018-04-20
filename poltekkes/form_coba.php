<?php
include 'header.php';
	echo'<form method="post" action="coba.php" enctype="multipart/form-data">
	<div>
		<label for="nama">
			nama: <input type="text" id="nama" name="nama_user">
		</label>
	</div>
	<div>
		<label for="nim">
			Nim: <input type="text" id="nim" name="nim_user">
		</label>
	</div>
	<div>
		<input type="submit" name="submit" value="Daftar" />
	</div>';
include 'footer.php';
?>