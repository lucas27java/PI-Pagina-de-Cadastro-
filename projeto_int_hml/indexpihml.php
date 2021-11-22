<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Projeto Integrado</title>

</head>
<body>
	<style>

table{border: solid;}

.container{display: flex;
    margin: 69px 1px 0px;
    width: 1017px;
    justify-content: flex-end;}

body{background-color:#FFE3D1 ;}

td{background-color: white;}

a{
color: black;
text-decoration: none;}

a :hover{background-color: white;}

.titulos{font-weight: bold;}

.bottom{margin: 1px 1px 1px;}

input{background-color: cornsilk;
    font-weight: bold;
    border-radius: 5px;}

</style>
</body>
</html>


<?php
//including the database connection file
include_once("config_pihml.php");
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM CLIENTE ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM CLIENTE ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>

<a class="bottom" href="addpihml.html"><input type="button" value="Novo Contato"></a>

	<div class="container">
		<table width='80%' border=0>
		<tr class="titulos">
			<td>Empresa</td>
			<td>CNPJ</td>
			<td>Telefone</td>
			<td>Logradouro</td>
			<td>Complemento</td>
			<td>Cidade</td>
			<td>Uf</td>
			<td>Atualizacao</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($result)) {
			echo "<tr>";
			echo "<td>".$res['NOME_EMPRESA']."</td>";
			echo "<td>".$res['CNPJ']."</td>";
			echo "<td>".$res['TELEFONE']."</td>";
			echo "<td>".$res['LOGRADOURO']."</td>";
			echo "<td>".$res['COMPLEMENTO']."</td>";
			echo "<td>".$res['CIDADE']."</td>";
			echo "<td>".$res['UF']."</td>";
			echo "<td><a href=\"edit_pihml.php?id=$res[id]\">Editar</a> | <a href=\"delete_pihml.php?id=$res[id]\" onClick=\"return confirm('Tem certeza que você quer remover?')\">Deletar</a></td>";
		}
		?>
		</table>
	</div>
</body>
</html>

