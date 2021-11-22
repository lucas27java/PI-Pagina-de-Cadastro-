<html>
<head>
	<title>Add Data</title>
</head>

<body>

<style>
body{background-color: #FFE3D1;}

a{text-decoration: none;
color: black;
font-weight: bolder;
}

a:hover{font-size: 20px;
color:cornflowerblue}
</style>
<?php

include_once("config.php");
if(isset($_POST['Submit'])) {
	$codigo = mysqli_real_escape_string($mysqli, $_POST['codigo']);
	$nome = mysqli_real_escape_string($mysqli, $_POST['nome']);
	$valor = mysqli_real_escape_string($mysqli, $_POST['valor']);

	if(empty($codigo) || empty($nome) || empty($valor)) {

		if(empty($codigo)) {
			echo "<font color='red'>Campo Código está vazio.</font><br/>";
		}

		if(empty($nome)) {
			echo "<font color='red'>Campo Nome está vazio.</font><br/>";
		}

		if(empty($valor)) {
			echo "<font color='red'>Campo Valor está vazio.</font><br/>";
		}

		echo "<br/><a href='javascript:self.history.back();'>Retornar</a>";
	} else {

		$result = mysqli_query($mysqli, "INSERT INTO produtos(codigo,nome,valor) VALUES('$codigo','$nome','$valor')");

		echo "<font color='green'>Produtos adicionado com sucesso.";
		echo "<br/><a href='index.php'>Ver Produtos</a>";
	}
}
?>
</body>
</html>
