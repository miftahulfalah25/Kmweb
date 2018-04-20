<?php
include 'pdf2text.php';
include 'raita.php';
include 'doc2txt.php';

$docObj = new Doc2Txt('file/InfojabDosenJFUedit01-04-16.doc');
$txt = $docObj->convertToText();
//$a=pdf2text('file/RangkumSeluruhResolusi_4Apr16.pdf');
//echo $txt;
$b = raita(strtoupper($txt),strtoupper('eselon') );
echo $rest = substr($txt, $b,100);
echo $b;




?>