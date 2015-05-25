<!DOCTYPE html>
<html>
<head>
<title>Noticias</title>
<body>
<article>
<?php

include_once ("../model/connection/FactoryConnection.php");
include_once ("../model/DAOContents.php");

$connection = FactoryConnection::getInstance() -> getConnection('MySQL');

if (!isset($_REQUEST['id'])) {
	$link = $connection -> connect(DAOContents::getInstance() -> hostName, DAOContents::getInstance() -> dbUser, DAOContents::getInstance() -> dbPassword, DAOContents::getInstance() -> dbName);
	$query = "SELECT * FROM `noticias` ORDER BY `fecha` DESC";
	$result = $connection -> execute($query);
	$connection -> disconnect($link);
	
	echo "<h1>Noticias</h1>";

	while ($titular = mysql_fetch_assoc($result)) {
		echo "<p><a href=''>(" . DAOContents::getInstance() -> cambiaf_a_normal($titular['fecha']) . ")</a><a href='noticias.php?id=" . $titular['id'] . "'>" . $titular['titular'] . "</a></p>";
	}
} else {
	$link = $connection -> connect(DAOContents::getInstance() -> hostName, DAOContents::getInstance() -> dbUser, DAOContents::getInstance() -> dbPassword, DAOContents::getInstance() -> dbName);
	$query = "SELECT * FROM `noticias` WHERE id='" . $_REQUEST['id'] . "'";
	$result = $connection -> execute($query);
	$connection -> disconnect($link);

	$fila = mysql_fetch_assoc($result);
	if($fila['imagen']!=''){
		echo "<h1>" . $fila['titular']."</h1>
		<h2>" . $fila['fecha']."</h2>			
		<p>" . $fila['noticia'] . "</p>
		<p><img width='200px' src='../galeria/noticias/" . $fila['imagen'] . "'></p>";
	}else{
		echo "<h1>" . $fila['titular']."</h1>
			<p>" . $fila['noticia'] . "</p>";
	}
}
?>
</article>

<footer>
</footer>

</body>
</html>