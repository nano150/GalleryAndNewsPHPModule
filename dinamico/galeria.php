<!DOCTYPE html>
<html>
	<head>
	<title>Galeria</title>
	</head>

	<body>
			<article>				
				<?php
				include_once ("../model/DAOGalery.php");
				include_once ("../model/DAOContents.php");					

				
				$imagenes = Galery::getInstance() -> getGalery();
				$ruta = "../galeria/";
				
				echo "<h1>Galeria</h2>";
				while ($img = mysql_fetch_assoc($imagenes)) {
					echo "<a href='" . $ruta . $img['nombre_archivo'] . "'><img width='150px' style='margin: 1%' title='" . $img['descripcion'] . "' src='" . $ruta . $img['nombre_archivo'] . "'/></a>";

				}
				
				?>
			</article>
			<footer>			
			</footer>
		</div>
	</body>
</html>