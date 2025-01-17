<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Site</title>
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

	<!-- Строка меню -->
	<div class="container">
		<div class="row">
			<nav class="col-lg-12 col-md-12 col-sm-12">
				<?php
				require_once("pages/menu.php"); //Подключаем файл с меню
				require_once("pages/fuctions.php"); //Подключаем файл с функциями
				?>
			</nav>
		</div>
		<div class="column">
			<section class="col-lg-12 col-md-12 col-sm-12">
				<?php
				if (isset($_GET["page"])) {
					$page = htmlspecialchars($_GET["page"]);
					if ($page === "1")
						include("pages/home.php");
					if ($page === "2")
						include("pages/upload.php");
					if ($page === "3")
						include("pages/gallery.php");
					if ($page === "4")
						include("pages/regictration.php");
					if ($page === "5")
						include("pages/login.php");
				}
				?>
			</section>
		</div>
	</div>
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>

</html>