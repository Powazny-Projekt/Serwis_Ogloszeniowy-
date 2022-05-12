<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="logowanie.css" rel="stylesheet" type="text/css">
    <title>Logowanie</title>
</head>
<body>
  <div id="napis"> <!--Na tym jest chyba umieszczony napis-->
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br> <!--To musi być, bez tego nie widać tego napisu-->
    <hr>
    <div class="bounce"> <!--Dzięki temu rusza się napis-->
        <br><br><h1>Serwis ogłoszeniowy</h1> <!--Napis-->
   </div>
   <hr>

   <?php
    $blad = ''; // zmienna dzięki której po wpisaniu błędnej nazwy bądź hasła wyskoczy powiadomienie

    if ($_SERVER["REQUEST_METHOD"] == "POST") { // sprawdza czy wysyłany jest formularz
        $pol = mysqli_connect('localhost', 'root','', 'serwis_ogloszeniowy'); // połączenie z bazą danych
    
        $Nazwa = $_POST['Nazwa']; // wyciąga nazwę z formularza
        
        $zap = "SELECT Id, Imie, Nazwisko, Haslo, Telefon FROM uzytkownicy WHERE nazwa = '$Nazwa'"; // sprawdza czy w bazie danych istnieje podana przez użytkownika nazwa
        $wyk = mysqli_query($pol, $zap); // wykonuje 23 i 27 linijke

        while ($wiersz = mysqli_fetch_array($wyk)) {
            if (($wiersz["Haslo"]) == md5(htmlspecialchars($_POST["Haslo"])) && // jeżeli hasło podane przez użytkownika jest takie same jak hasło w bazie danych
                 $wiersz["Imie"] == $_POST["Imie"] && // jeżeli imie podane przez użytkownika jest takie same jak imie w bazie danych
                 $wiersz["Nazwisko"] == $_POST["Nazwisko"]) { // jeżeli nazwisko podane przez użytkownika jest takie same jak nazwisko w  bazie danych
                    session_start(); // sesja się zaczyna

                    $_SESSION["loggedin"] = true; // Serwer zapamiętuje czy użytkownik jest zalogowany
                    $_SESSION["id"] = $wiersz["id"]; // Serwer zapamiętuje ID użytkownika
                    $_SESSION["Nazwa"] = $Nazwa; // Serwer zapamiętuje nazwę użytkownika
                    $_SESSION["Imie"] = $wiersz["Imie"]; // Serwer zapamiętuje imie użytkownika
                    $_SESSION["Nazwisko"] = $wiersz["Nazwisko"]; // Serwer zapamiętuje nazwisko użytkownika
                    $_SESSION["Telefon"] = $wiersz["Telefon"]; // Serwer zapamiętuje Telefon użytkownika

                    header("Location: glowna.php"); // przekierowuje na stronę główną
                    exit; // zamyka sesje
            } else {
                $blad = "Podane dane są nieprawidłowe"; // jeżeli hasło, imie i nazwisko (jedno z podanych) są błędne, pojawia się powiadomienie
            }
        }
    
        mysqli_close($pol); // zamknięcie połączenia z bazą danych
    }
    ?>

<div id="logowanie">
    <form action="" method="POST">
    <a href="rejestracja.php"><button type="button">Nie masz konta? Zarejestruj się</button></a> <!--Przekierowuje do rejestracji-->
        <input type="text" name="Nazwa" placeholder="Twoja nazwa użytkownika" minlength="3" maxlength="20" required> <!--Pole tekstowe do wpisania nazwy użytkownika-->
        <input type="text" name="Imie" placeholder="Twoje imię" minlength="3" maxlength="20" required><br> <!--Pole tekstowe do wpisania imienia użytkownika-->
        <input type="text" name="Nazwisko" placeholder="Twoje nazwisko" minlength="3" maxlength="20" required><br> <!--Pole tekstowe do wpisania nazwiska użytkownika-->
        <input type="password" name="Haslo" placeholder="Podaj hasło" minlength="5" maxlength="30" required><br> <!--Pole tekstowe do wpisania hasła użytkownika-->
        <p class="blad"><?php echo $blad ?></p> <!--W tym miejscu jest wyświetlany napis z 43 linijki-->
        <input type='submit' value="Zaloguj się"> <!--Logowanie-->
    </form>
</div>

</body>
</html>