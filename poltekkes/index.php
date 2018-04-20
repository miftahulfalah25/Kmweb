<?php
include 'header.php';
if(isset($_SESSION['signed_in'])){

echo "Selamat Datang di web forum KM Poltekkes Anda dapat memulai menggunakan dengan memilih Menu di Atas";
}
else{
echo "Selamat Datang di web forum KM Poltekkes Silakan Login / Daftar terlebih dahulu pada menu kanan atas";
}
include 'footer.php';
?>