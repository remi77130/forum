<?php


require 'require/database.php';

$header="MIME-Version: 1.0\r\n"; // PARAMETER ENCODAGE
$header.='FROM:natooporn.com"<remi_user@hguv5320.odns.fr>'."\n";
$header.='content-type: text/html; charset=utf-8"'."\n"; // PARAMETER ENCODAGE
$header.='content-transfert-Encoding: 8bit'; // PARAMETER ENCODAGE

$message ='

<html>

<body>
<div align="center">
j\'ai envoye ce mail avec php ! <br>

<img src="natooporn.com/images/NatooPorn.png/>;
</div>
</body>

</html>

';
mail("teste@gmail.com", "salut test", $message, $header);

?>