
<?php
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['usuario'];
$idcaixa = $_GET['idcaixa'];
?>

<html>

<head>
	<title>Delete Caixa</title>
</head>

<script type="text/javascript">
		function loginsucesso(){
			setTimeout("window.location='/visaosystem/listacaixa.php'", 0);
		}
	</script>

<body>

<?php
$host = "localhost";
$user = "root";
$senha = "";
$banco = "startsales";
$conexao = mysqli_connect ($host, $user, $senha) or die (mysql_error());
mysqli_select_db($conexao, $banco) or die (mysql_error());

$sqlcaixa = mysqli_query($conexao, "DELETE FROM caixa WHERE idcaixa = '$idcaixa'");

mysqli_query($conexao, $sqlcaixa);
mysqli_close($conexao);

echo "<script>loginsucesso()</script>";

?>
</body>
</html>
