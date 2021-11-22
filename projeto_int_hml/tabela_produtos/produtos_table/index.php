<?php
//including the database connection file
include_once("config.php");
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM produtos ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($mysqli, "SELECT * FROM produtos ORDER BY id DESC"); // using mysqli_query instead
?>

<html>
<head>
	<title>Homepage</title>
</head>

<body>

<style>
body{background-color: #FFE3D1;}


a{text-decoration: none;
color: black;
font-weight: bold;}

a:hover{font-size: 20px;
color:cornflowerblue}
</style>

<a href="add.html">Adicionar Produtos</a><br/><br/>

	<table width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td>Codigo</td>
		<td>Nome</td>
		<td>Valor</td>
		<td>Atualização</td>
	</tr>
	<?php

	while($res = mysqli_fetch_array($result)) {
		echo "<tr>";
		echo "<td>".$res['codigo']."</td>";
		echo "<td>".$res['nome']."</td>";
		echo "<td>".$res['valor']."</td>";
		echo "<td><a href=\"edit.php?id=$res[id]\">Editar</a> ";
	}
	?>
	</table>
</body>
</html>
