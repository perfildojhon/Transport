<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
	<head>
		<meta charset="utf-8">
		<meta name="keywords" content="Status do servidor">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Server Status</title>
	</head>
	<body>
		<main>
			<section class="status">
				<p id="status">
					<?php
						require_once ('connection/index.php');
					?>
				</p>
			</section>
		</main>
	</body>
</html>
