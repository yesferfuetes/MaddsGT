<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Pagina no encontrada</title>
	<style type="text/css">
		/* ESTILOS PAGE 404 */
		body{
			margin: 0;
			padding: 0;
			font-family: "montserrat",sans-serif;
			height: 100vh;
			background-image: linear-gradient(125deg,#74b9ff,#ff7675);
		}

		.container{
			height: 100vh;
			display: flex;
			flex-direction: column;
			/* gap: 30px; */
			align-items: center;
			justify-content: center;
			color: #343434;
		}

		.container h1 {
			font-size: 160px;
			margin: 0;
			padding: 0;
			font-weight: 900;
			letter-spacing: 20px;
		}

		.container a{
			text-decoration: none;
			background: #0984e3;
			color: #fff;
			padding: 12px 24px;
			display: inline-block;
			border-radius: 25px;
			font-size: 14px;
			text-transform: uppercase;
			transition: 0.4s;
		}

		.container a:hover {
			background: #74b9ff;
		}

	</style>
</head>
<body>
	<div class="container">
		<h2>Oops! Page not found.</h2>
		<h1>404</h1>
		<p>We can´t find the page you´re looking for.</p>
		<a href="<?= BASE_URL; ?>">Go Back home.</a>
	</div>
</body>
</html>