<html>
<head>
	<title>Add Data</title>
</head>

<body>

<style>
body{ background-color: #FFE3D1;}
</style>

<?php

include_once("config_pihml.php");
if(isset($_POST['Submit'])) {
	
	$empresa = mysqli_real_escape_string($mysqli, $_POST['empresa']);
	$cnpj = mysqli_real_escape_string($mysqli, $_POST['cnpj']);
	$telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
	$logradouro = mysqli_real_escape_string($mysqli, $_POST['logradouro']);
	$complemento = mysqli_real_escape_string($mysqli, $_POST['complemento']);
	$cidade = mysqli_real_escape_string($mysqli, $_POST['cidade']);	
	$uf = mysqli_real_escape_string($mysqli, $_POST['uf']);	
	
	if(empty($empresa) || empty($cnpj) || empty($telefone) || empty($logradouro) || empty($complemento) || empty($cidade) || empty($uf)) {

		
		if(empty($empresa)) {
			echo "<font color='red'>Campo empresa está vazio.</font><br/>";
		}

		if(empty($cnpj)) {
			echo "<font color='red'>Campo cnpj está vazio.</font><br/>";
		}

		if(empty($telefone)) {
			echo "<font color='red'>Campo telefone está vazio.</font><br/>";
		}
		
		
		if(empty($logradouro)) {
			echo "<font color='red'>Campo logradouro está vazio.</font><br/>";
		}
		
		
		if(empty($complemento)) {
			echo "<font color='red'>Campo complemento está vazio.</font><br/>";
		}
		
		if(empty($cidade)) {
			echo "<font color='red'>Campo cidade está vazio.</font><br/>";
		}
		
		if(empty($uf)) {
			echo "<font color='red'>Campo uf está vazio.</font><br/>";
		}

		echo "<br/><a href='javascript:self.history.back();'>Retornar</a>";
	} else {

		$result = mysqli_query($mysqli,"INSERT INTO CLIENTE(NOME_EMPRESA,CNPJ,TELEFONE,LOGRADOURO,COMPLEMENTO,CIDADE,UF) VALUES
		('$empresa','$cnpj','$telefone','$logradouro','$complemento','$cidade','$uf')");

		echo "<font color='green'>Contato adicionado com sucesso.";
		echo "<br/><a href='indexpihml.php'>Ver contatos</a>";
	}
}
?>
</body>
</html>
