<!DOCTYPE HTML>
<html>
  <head>
    <title>Rejestracja</title>
     <link href="logowanie.css" rel="stylesheet" type="text/css">

     <meta charset="utf-8">
     <meta name="description" content="Opis zawartości strony dla wyszukiwarek">
     <meta name="keywords" content="projekt, strona, brief">
     <meta name="author" content="Tobiasz, Maks, Bartosz">
     <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
  </head>
  <body>
    <div id="napis"> <!--Na tym jest chyba umieszczony napis-->
      <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <!--To musi być, bez tego nie widać tego napisu xD-->
      <hr>
      <div class="bounce"> <!--Dzięki temu rusza się napis-->
       <br><br><h1>Serwis ogłoszeniowy</h1> <!--Napis-->
     </div>
     <hr>
    
    <?php
    $blad = ''; // zmienna dzięki której po wpisaniu błędnej nazwy bądź hasła wyskoczy powiadomienie
    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $connect = mysqli_connect('localhost', 'root', '', 'serwis_ogloszeniowy'); // połączenie z bazą danych
        @$Nazwa = $_POST['Nazwa']; // Pobiera Nazwę wprowadzoną przez użytkownika i wysyła do bazy
        @$Imie = $_POST["Imie"]; // Pobiera Imie wprowadzoną przez użytkownika i wysyła do bazy
        @$Nazwisko = $_POST["Nazwisko"]; // Pobiera Nazwisko wprowadzoną przez użytkownika i wysyła do bazy
        @$Haslo = $_POST["Haslo"]; // Pobiera Hasło wprowadzoną przez użytkownika i wysyła do bazy
        @$Adres_email = $_POST["Adres_email"]; // Pobiera Adres Email wprowadzoną przez użytkownika i wysyła do bazy
        @$Miejscowosc = $_POST["Miejscowosc"]; // Pobiera Miejscowość wprowadzoną przez użytkownika i wysyła do bazy
        @$Telefon = $_POST["Telefon"]; // Pobiera Telefon wprowadzoną przez użytkownika i wysyła do bazy
        $Haslo = md5(htmlspecialchars($Haslo)); // Pobiera hasło wprowadzone przez użytkownika i wysyła do bazy jako zakodowane hasło

        // Usuwa spacje z początku i końca wprowadzonych pól
        $Nazwa = trim($Nazwa);
        $Imie = trim($Imie);
        $Nazwisko = trim($Nazwisko);
        $Adres_email = trim($Adres_email);
        $Miejscowosc = trim($Miejscowosc);
        $Telefon = trim($Telefon);
        
        $select = "SELECT id FROM uzytkownicy WHERE Nazwa = '$Nazwa' OR Adres_email = '$Adres_email' OR Telefon = '$Telefon'"; // szuka w bazie czy istnieje już dana nazwa i adres email
        $wyk = mysqli_query($connect, $select); // wykonuje zapytanie wyzej
        $jestwbazie = false; // nie ma w bazie
        while ($wiersz = mysqli_fetch_array($wyk)) { // sprawdza kazdy wiersz bazy
            $jestwbazie = true; // jest  w bazie
        };
        
        if (!$jestwbazie) { // jeżeli nie ma w bazie to: 
            $zap = "INSERT INTO uzytkownicy(Nazwa, Imie, Nazwisko, Haslo, Adres_email, Miejscowosc, Telefon) VALUES 
                    ('".$Nazwa."','".$Imie."','".$Nazwisko."','".$Haslo."', '".$Adres_email."','".$Miejscowosc."','".$Telefon."')"; // do podanych pól kolejno wprowadza dane wprowadzone przez użytkownika
            mysqli_query($connect, $zap); // wykonuje zapytanie wyzej
            
            mysqli_close($connect); // zamyka połączenie
            
            header("Location: glowna.php"); // przekierowuje na strone główna
        } else {
          $blad = 'Ta nazwa uzytkownika, email bądź numer telefonu są juz zajete!'; // w przeciwnym wypadku, jeżeli nazwa bądź email (któreś z nich) pojawia się powiadomienie
        }
    }
    
    ?>

    <div id="rejestracja">
    <form action="" method="POST">
        <a href="logowanie.php"><button type="button">Masz już konto? Zaloguj się</button></a> <!--Przekierowuje do logowania-->
      <input type="text" name="Nazwa" placeholder="Twoja nazwa użytkownika" minlength="3" maxlength="20" required> <!--Pobiera nazwę użytkownika-->
      <input type="text" name="Imie" placeholder="Twoje imię" minlength="3" maxlength="20" required><br> <!--Pobiera imię użytkownika-->
      <input type="text" name="Nazwisko" placeholder="Twoje nazwisko" minlength="3" maxlength="20" required><br> <!--Pobiera nazwisko użytkownika-->
      <input type="password" name="Haslo" placeholder="Podaj hasło" minlength="5" maxlength="30" required><br> <!--Pobiera hasło użytkownika-->
      <input type="email" name="Adres_email" placeholder="Twój adres email" minlength="3" maxlength="35" required><br> <!--Pobiera adres email użytkownika-->
      <input type="text" name="Miejscowosc" placeholder="Miejscowość w której mieszkasz" minlength="3" maxlength="40" required><br> <!--Pobiera miejscowość od użytkownika-->
      <input type="text" name="Telefon" placeholder="Twój numer telefonu" minlength="9" maxlength="12" required><br> <!--Pobiera numer telefonu od użytkownika-->
      <p class="blad"><?php echo $blad ?></p> <!--Pojawia się informacja o błędzie-->
    <input type= 'submit' value= "Zarejestruj się"> <!--Przycisk wysyłający do bazy danych podane informacje w inputach oraz przekierowujący na główną stronę-->
   </form>
  </div>
  
  </body>
</html>
