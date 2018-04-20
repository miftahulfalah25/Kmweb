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
        <a class="item" href="/poltekkes/">Home</a> -
		 <a class="item" href="/poltekkes/admin/list_user.php">Kelola User</a> -
        <a class="item" href="/poltekkes/admin/list_kategori.php">Kelola Kategori</a> -
        <a class="item" href="/poltekkes/admin/list_topik.php">Kelola Topik</a> 
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