<?php
// including the database connection file
include_once("config.php");

if(isset($_POST['update']))
{

	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$codigo = mysqli_real_escape_string($mysqli, $_POST['codigo']);
	$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
	$valor = mysqli_real_escape_string($mysqli, $_POST['valor']);

	// verificam se tem campo nulo
	if(empty($codigo) || empty($nome) || empty($valor)) {

		if(empty($codigo)) {
			echo "<font color='red'>Campo Codigo está vazio.</font><br/>";
		}

		if(empty($nome)) {
			echo "<font color='red'>Campo Nome está vazio.</font><br/>";
		}

		if(empty($valor)) {
			echo "<font color='red'>Campo Valor está vazio.</font><br/>";
		}
	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE produtos SET codigo='$codigo',nome='$nome',valor='$valor' WHERE id='$id'");

		//redirectig to the display page. In our case, it is index.php
		header("Location: index.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM produtos WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$codigo = $res['codigo'];
	$nome = $res['nome'];
	$valor = $res['valor'];
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>
<style>

body{background-color: #ffe3d1;}

table{font-weight: bold;
    background-color: darkgrey;
    border: solid;}

.containerpai{display: flex;
    justify-content: center;}


a{font-size: larger;
text-decoration: none;
font-weight: bold;
color: black;}

a:hover{font-size: 30px;
color:cornflowerblue;
}

.atualizar{background-color: coral;
    box-shadow: 2px 2px 3px;
    font-weight: bold;}

.atualizar:hover{background-color: white;
cursor: pointer;}

</style>


	<a href="index.php">Home</a>
	<br/><br/>

	<div class="containerpai">
		<form name="form1" method="post" action="edit.php">
			<table border="0">
				<tr>
					<td>Codigo:</td>
					<td><input type="text" name="codigo" value="<?php echo $codigo;?>"></td>
				</tr>
				<tr>
					<td>Nome:</td>
					<td><input type="text" name="nome" value="<?php echo $nome;?>"></td>
				</tr>
				<tr>
					<td>Valor:</td>
					<td><input type="text" name="valor" value="<?php echo $valor;?>"></td>
				</tr>
				<tr>
					<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
					<td><input class="atualizar" type="submit" name="update" value="Atualizar"></td>
				</tr>
			</table>
		</form>
	</div>
</body>
</html>
