<?php

echo "Eu sou a view cliente";

?>
<!DOCTYPE html>
<html>
<head>
	<title>Curso de MVC</title>
</head>	
<body>
	<h1>Curso de MVC - Mayara</h1>
	<p> Estamos estudando PHP.</p>
	<p></p>

	<?php

	foreach ($clientes as $client){
		echo $client["nome"]."<br/>";
	}

	?>
</body>
</html>	