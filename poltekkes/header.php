<html>
<head>
    
    <title>PHP-MySQL forum</title>
	<?php
		session_start();
	?>
</head>
<body>


<img src="img/logo.png" style="width:80px;height:80px;">
<h1>Forum Kepegawaian Poltekkes</h1>

    <div id="wrapper">
    <div id="menu">
        <a class="item" href="/poltekkes/daftar_kategori.php">Home</a> -
		 <a class="item" href="/poltekkes/form_cari.php">Cari Topik</a> -
        <a class="item" href="/poltekkes/form_topik.php">Buat topik Baru</a> -
        <a class="item" href="/poltekkes/form_kategori.php">Tambah Kategory</a> -
		<?php
		echo ' <a class="item" href="/poltekkes/profil_user.php">Profil Pengguna</a> '; 
        ?> - 
		<a class="item" href="/poltekkes/daftar_notifikasi.php">Notifikasi</a> - 
		<a class="item" href="/poltekkes/admin/home_admin.php">Panel Admin</a>
		<div id="userbar">
		<?php
			
			if(isset($_SESSION['signed_in']))
			{
				 
				echo 'Hai ' . $_SESSION['username'] . '. Bukan anda? <a href="logout.php">Log out</a>';				
			}
			else
			{
				echo '<a href="form_login.php">Log in</a> or <a href="form_daftar.php">Daftar Akun</a>.';
			}
		?>
		</div>
	</div>
        <div id="content">