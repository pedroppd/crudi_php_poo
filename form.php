<?php
include_once('crudCadastro.php');

//include_once('conexao.php');
?>
<html>
<head>
    <meta charset="utf-8">
	<title>formulario</title>
</head>
<body>

<form method="post">
NOME:<input type="text" name="nome" id="nome" value="<?php if(isset($_GET['edit'])) echo $row['nome_usuario'];  ?>"><br><br>

SOBRENOME:<input type="text" name="sobrenome" id="sobrenome" value="<?php if(isset($_GET['edit'])) echo $row['sobrenome_usuario']; ?>"><br><br>

IDADE:<input type="number" name="idade" id="id" value="<?php if(isset($_GET['edit'])) echo $row['idade_usuario']; ?>"><br><br>

ENDEREÇO:<input type="text" name="endereco" id="endereco" value="<?php if(isset($_GET['edit'])) echo $row['endereco_usuario']; ?>"><br><br>

CIDADE:<input type="text" name="cidade" id="cidade" value="<?php if(isset($_GET['edit'])) echo $row['cidade_usuario']; ?>"><br><br>

ESTADO:<select name="estado" value="<?php if(isset($_GET['edit'])) echo $row['estado_idestado']; ?>">
       <?php 
       $sql=$con->query('SELECT * FROM estado');
       
       while($dados=$sql->fetch_array()){
       	 $id=$dados['idestado'];
       	 $estado=$dados['nome_estado'];
       	 echo "<option value=".$id.">".$estado."</option>";
       }  
       
        ?>
     </select><br><br>
LOGIN:<input type="text" name="login" id="login" value="<?php if(isset($_GET['edit'])) echo $row['login_usuario']; ?>"><br><br>

SENHA:<input type="password" name="senha" id="senha" value="<?php if(isset($_GET['edit'])) echo $row['senha_usuario']; ?>"><br><br>

  
<?php 
if(isset($_GET['edit'])){
?>
<button type="submit" name="update">update</button>
<?php
}else{
 ?>
 <button type="submit" name="save">Salvar</button>
 <?php 
 }
  ?>
  </form>
  <br><br><br>



<?php 
include_once('conexao.php');
echo'<table border="1px">';
echo'<tr>';
echo'<th>ID:</th>';
echo'<th>NOME:</th>';
echo'<th>SOBRENOME</th>';
echo'<th>IDADE:</th>';
echo'<th>ENDEREÇO:</th>';
echo'<th>CIDADE:</th>';
echo'<th>LOGIN:</th>';
echo'<th>SENHA:</th>';
echo'<th>EXCLUIR:</th>';
echo'<th>EDIT:</th>';


echo'</tr>';
$sql=$con->query("SELECT * FROM usuario");

while($dados=$sql->fetch_array()){
    $id=$dados['idusuario'];
    $nome=$dados['nome_usuario'];
    $sobrenome=$dados['sobrenome_usuario'];
    $idade=$dados['idade_usuario'];
    $endereco=$dados['endereco_usuario'];
    $cidade=$dados['cidade_usuario'];
    $login=$dados['login_usuario'];
    $senha=$dados['senha_usuario'];
      
      echo"<tr>";
      
      echo "<td>".$id."</td>";
      echo "<td>".$nome."</td>";
      echo "<td>".$sobrenome."</td>";
      echo "<td>".$idade."</td>";
      echo "<td>".$endereco."</td>";
      echo "<td>".$cidade."</td>";
      echo "<td>".$login."</td>";
      echo "<td>".$senha."</td>";
      ?>
      <td><a href="?del=<?php echo $id ?>;"onclick='return confirm("tem certeza que deseja deletar esse usuario ?");'>delete</a></td>
      <td><a href="?edit=<?php echo $id ?>">edit</a></td>
      

     
<?php
 echo"</tr>";
}
echo'</table>';
?>

</body>
</html>