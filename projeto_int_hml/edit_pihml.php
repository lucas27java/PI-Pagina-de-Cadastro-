<?php
// including the database connection file
include_once("config_pihml.php");

if(isset($_POST['update']))
{
	$id = mysqli_real_escape_string($mysqli, $_POST['id']);
	$empresa = mysqli_real_escape_string($mysqli, $_POST['empresa']);
	$cnpj = mysqli_real_escape_string($mysqli, $_POST['cnpj']);
	$telefone = mysqli_real_escape_string($mysqli, $_POST['telefone']);
	$logradouro = mysqli_real_escape_string($mysqli, $_POST['logradouro']);
	$complemento = mysqli_real_escape_string($mysqli, $_POST['complemento']);
	$cidade = mysqli_real_escape_string($mysqli, $_POST['cidade']);	
	$uf = mysqli_real_escape_string($mysqli, $_POST['uf']);	


	// verificam se tem campo nulo
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
	} else {
		//updating the table
		$result = mysqli_query($mysqli, "UPDATE CLIENTE SET NOME_EMPRESA ='$empresa',CNPJ ='$cnpj',TELEFONE='$telefone',
		LOGRADOURO='$logradouro',COMPLEMENTO='$complemento',CIDADE='$cidade',UF='$uf'
		WHERE id='$id'");

		//redirectig to the display page. In our case, it is index.php
		header("Location:indexpihml.php");
	}
}
?>
<?php
//getting id from url
$id = $_GET['id'];

//selecting data associated with this particular id
$result = mysqli_query($mysqli, "SELECT * FROM cliente WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
		$empresa = $res['NOME_EMPRESA'];
		$cnpj =$res['CNPJ'];
		$telefone =$res['TELEFONE'];
		$logradouro =$res['LOGRADOURO'];
		$complemento =$res['COMPLEMENTO'];
		$cidade =$res['CIDADE'];
		$uf =$res['UF'];
}
?>
<html>
<head>
	<title>Edit Data</title>
</head>

<body>


<style>


.home{display: flex;
justify-content: center;}

.homer{padding: 15px;
    background-color: white;
    color: black;
    text-decoration: none;
    border: solid;
    border-radius: 7px;
    background-color: coral;
font-weight: bolder;}

.homer:hover{background-color: white;
cursor: pointer;}

table{background-color: darkgray;
    box-shadow: 2px 1px 3px;
    border: #bfbaba solid;
    margin: 28px 1px 1px;
    font-weight: bolder;
    border: solid;
    padding: 5px;
    border-radius: 5px;
border: solid;}

td{background-color: darkgrey;}

form{display: flex;
    justify-content: center;}

body{background-color: #FFE3D1;}

.atualizar{padding: 7px;
    background-color: white;
    color: black;
    text-decoration: none;
    border: solid;
    border-radius: 7px;
    background-color: coral;
    font-weight: bolder;
}
.atualizar:hover{background-color: white;
cursor: pointer;}

tr{ 
font-weight: bold;
background-color: white;}

a{background-color: white;
color: black;
text-decoration: none;}

a:hover{font-weight: bold;
color: cornflowerblue;}

</style>
	<div class="home"><a class="homer" href="indexpihml.php">Home</a></div>
	<br/><br/>

	<form name="form1" method="post" action="edit_pihml.php">
		<table border="0">
		
			<tr>
				<td>Empresa:</td>
				<td><input type="text" name="empresa" placeholder="Digite o nome da empresa" value="<?php echo $empresa;?>"></td>
			</tr>
			
			<tr>
				<td>CNPJ:</td>
				<td><input type="text" name="cnpj" placeholder="Digite seu CNPJ" value="<?php echo $cnpj;?>"></td>
			</tr>
			
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="telefone" placeholder="Digite seu Telefone" value="<?php echo $telefone;?>"></td>
			</tr>
			
				<tr>
				<td>Logradouro:</td>
				<td><input type="text" name="logradouro" placeholder="Digite seu Logradouro" value="<?php echo $logradouro;?>"></td>
			</tr>
			
				<tr>
				<td>Complemento:</td>
				<td><input type="text" name="complemento" placeholder="Digite seu Complemento" value="<?php echo $complemento;?>"></td>
			</tr>
			
				<tr>
				<td>Cidade:</td>
				<td><input type="text" name="cidade" placeholder="Digite sua Cidade" value="<?php echo $cidade;?>"></td>
			</tr>
			
				<tr>
				<td>Uf:</td>
				<td><input type="text" name="uf" placeholder="Digite seu UF" value="<?php echo $uf;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input class="atualizar" type="submit" name="update" value="Atualizar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
