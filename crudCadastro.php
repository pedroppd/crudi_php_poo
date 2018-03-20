<?php
include_once('conexao.php'); 

if(isset($_POST['save'])){
	
	$nome=$con->real_escape_string($_POST['nome']);
	$sobrenome=$con->real_escape_string($_POST['sobrenome']);
	$idade=$con->real_escape_string($_POST['idade']);
	$endereco=$con->real_escape_string($_POST['endereco']);
	$cidade=$con->real_escape_string($_POST['cidade']);
	$estado=$con->real_escape_string($_POST['estado']);
	$login=$con->real_escape_string($_POST['login']);
	$senha=$con->real_escape_string($_POST['senha']);

	$sql = $con->query ("INSERT INTO usuario(nome_usuario, sobrenome_usuario, idade_usuario, endereco_usuario, cidade_usuario, login_usuario, senha_usuario, estado_idestado)
	values('$nome', '$sobrenome', '$idade', '$endereco', '$cidade', '$login', '$senha', '$estado')");
}




if (isset($_GET['del'])) {
$con->query("DELETE FROM usuario WHERE idusuario=".$_GET['del']);

}

if (isset($_GET['edit'])) {
$sql=$con->query("SELECT * FROM usuario WHERE idusuario=".$_GET['edit']);
$row=$sql->fetch_array();
}

if (isset($_POST['update'])) {

   
   $sql=$con->query("UPDATE usuario SET  nome_usuario='".$_POST['nome']."' 
   ,sobrenome_usuario='".$_POST['sobrenome']."' 
   ,idade_usuario'".$_POST['idade']."' 
   ,endereco_usuario='".$_POST['endereco']."' 
   ,cidade_usuario='".$_POST['cidade']."'  
   ,login_usuario='".$_POST['login']."' 
   ,senha_usuario='".$_POST['senha']."'
   ,estado_idestado='".$_POST['estado']."' WHERE idusuario=".$_GET['edit']);

   header('location:form.php');
}
 


 ?>