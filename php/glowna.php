<!DOCTYPE html>
<html lang="pl">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width">
		<title>Serwis ogłoszeniowy</title>
		<link rel="stylesheet" href="style.css">
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700,400italic,700italic&amp;subset=latin-ext">
	</head>
	<body>
	<?php
	    session_start();
		$pol = mysqli_connect('localhost', 'root', '', 'serwis_ogloszeniowy'); // polaczenie z baza danych

		if ($_SERVER["REQUEST_METHOD"] == "POST") { // pobieranie danych z logowania
			@$tresc = $_POST["tresc"];
			$Imie = $_SESSION["Imie"];
			$Nazwisko = $_SESSION["Nazwisko"];
			$Nazwa = $_SESSION["Nazwa"];
			$Telefon = $_SESSION["Telefon"];


			$zap = "INSERT INTO ogloszenia(Tresc, Imie, Nazwisko, Nazwa, Telefon) VALUES 
			('".$tresc."', '$Imie', '$Nazwisko', '$Nazwa', '$Telefon')"; // uzupelnianie tabeli w bazie danych z danych przy logowaniu i treści
			
		    mysqli_query($pol, $zap);
			header("location: glowna.php");
		}
		
		mysqli_close($pol);
	?>
	
		<header class="header">
			<div class="container">
				<h1>Serwis ogłoszeniowy<br><img src="logo.png"></img></h1> <!--Napis główny na stronie-->
				<a href="wyloguj.php">Wyloguj</a> <!--Wylogowywanie z konta-->
			</div>
		</header>
		<nav class="nav">
			<div class="container">
				<ul>
					<li><a href="glowna.php">Ogłoszenia</a></li> <!--Podstrona z ogłoszeniami-->
					<li><a href="O nas.html">O nas</a></li> <!--Podstrona z informacjami o nas-->
					<li><a href="kontakt.html">Kontakt</a></li> <!--Podstrona z kontaktem do nas-->
				</ul>
			</div>
		</nav>
		<section class="section" id="ogloszenia">
			<div class="container">
				<h2>Ogłoszenia</h2>	
			</div>
		</section>
		<form action="" method="POST">
			<input type="text" name="tresc" id="tresc" placeholder="Tu możesz dodać swoje ogłoszenie" maxlength="5000"> <!--pole do dodawania ogłoszeń-->
			<input type="submit" value='' id="dodaj"></input>
		</form>

		<br><br><br>

		<div id=pokaz>
		<ul>
		<?php
			$pol = mysqli_connect('localhost', 'root','', 'serwis_ogloszeniowy'); //wyswietlanie ogloszen
			$zap = "SELECT nazwa, tresc, data FROM ogloszenia
					ORDER BY id DESC";
			$wyk = mysqli_query($pol, $zap);
			while ($wiersz = mysqli_fetch_array($wyk)) {
				print '<div id=username>' . $wiersz['nazwa'] . ' ' . '<br>' . 'napisał/a: ' . '<br>' . $wiersz['data'] . '<br>' . '</div>' . '<textarea id="pole" disabled>' . $wiersz['tresc'] . '</textarea>' . '<br>' . '<br>' . '<br>' . '<br>';
			}
			
			mysqli_close($pol);
		?>
		</ul>
		</div>
		
		<footer class="footer">
			<div class="container">		
			</div>
		</footer>

		<script src="jquery.js"></script>
		<script src="stickyfill.js"></script>
	
	</body>
</html>