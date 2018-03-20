<?php 
$con = new MySQLi('localhost', 'root', '', 'loja');

if (!$con) {
	echo $con->error();
}

 ?>