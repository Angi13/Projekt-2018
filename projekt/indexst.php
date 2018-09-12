<!doctype html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <title>Sprawozdania</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="favicon.ico">
    <link href="/favicon.ico" rel="shortcut icon" type="image/x-icon">

</head>

<body>
   <?php //połączenie z bazą
	$pol=mysqli_connect('localhost','root','', 'sprawozdania') or die("Brak połaczenia z bazą");
	session_start();
	if($_SESSION['zalogowany']==false)
		header("Location: index.html");?>
    <div id="wrapper">
	<header>
            <table>
                <tr>
                    <td>
                        <img src="logo.png" alt="Logotyp uczelni - Uniwersytet Technologiczno-Przyrodniczy"></td>
                    <td>Zalogowany użytkownik: <?php $log=$_SESSION['email']; echo $log; ?></td>
                    <td><a href="wyl.php">Wyloguj</a></td>
                </tr>
            </table>
        </header>
        <nav>
            <a class="menu active" href="indexst.php">O stronie</a><a class="menu" href="dodaj.php">Dodaj sprawozdanie</a><a class="menu" href="Twoje.php">Twoje sprawozdania</a><a class="menu" href="instrukcje.php">Instrukcje</a>
        </nav>

        <section>
            <article>
                <p> Strona służy do wstawiania sprawozdań przez studentów. </p>
                <p>Instrukcję do sprawozdań będą dostępne cały czas.</p>
                <p>Tu również swoje komentarze będzie wstawiał Profesor.</p>
            </article>
        </section>
        <footer>Stronę wykonali: Domozych Karolina, Gebler Emilia, Krysztoforska Angelika, Pomarzyński Karol</footer>
    </div>

</body>

</html>
