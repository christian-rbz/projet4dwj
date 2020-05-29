<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8" />
	<link rel="stylesheet" href="public/stylesheet.css" />
	<!-- <link rel="icon" type="image/png" href=""/> -->
	<title>Le blog de Jean Forteroche</title>
	<meta name="viewport" content="width=device-width,initial-scale=1.0" />
	<link rel="icon" type="image/png" href="./public/images/favicon.png" /><!-- favicon -->

	<!-- Google Fonts -->
	<link href="https://fonts.googleapis.com/css?family=Poiret+One" rel="stylesheet">

	<!-- Fontawesome Icones -->
	<script src="https://kit.fontawesome.com/504cd5157f.js"></script>

	<!-- TinyMCE -->
	<script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
	<script>
		tinymce.init({
			selector: "#mytextarea",
			language_url: "./public/langs/fr_FR.js",
			language: "fr_FR",
		});
	</script>


	<meta name="description" content="Le blog de Jean Forteroche" />
	<meta name="keywords" content="Le blog de Jean Forteroche, blog, ecrivain" />
	<meta name="author" content="ChristianRbz" />
	<style>


	</style>
</head>

<body>
	<header>
		<a href="index.php?action=home"><h1>Accueil</h1></a>
		<a href="index.php?action=biography">Biographie</a>
		<?php if (isset($_SESSION['user'])) {
			echo '<a href="index.php?action=admin"><h3>Admin<h3></a>';
		} else {
		echo '<a href="index.php?action=login"><h3>Connexion<h3></a>';
		} 
		
		?>
	</header>
	
	<?= $content ?> 
</body>

<footer>
	
	</div>
	<div class="copyright">
		<p>Copyright © Jean Forteroche - 2020 - Tous droits réservés - Projet OpenClassrooms Christian Rbz</p>
	</div>
</footer>

</html>