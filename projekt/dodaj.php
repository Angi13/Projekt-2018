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
	$pol=mysqli_connect('localhost','root','', 'sprawozdania') or die("Brak połaczenia z bazą");?>

    <div id="wrapper">
        <header>
            <img src="logo.png" alt="Logotyp uczelni - Uniwersytet Technologiczno-Przyrodniczy">
        </header>
        <nav>
            <a class="menu" href="indexst.html">O stronie</a><a class="menu active" href="dodaj.php">Dodaj sprawozdanie</a><a class="menu" href="Twoje.php">Twoje sprawozdania</a><a class="menu" href="instrukcje.php">Instrukcje</a>
        </nav>

        <section>
            <article>
                <p> Tu możesz umieścić swoje sprawozdanie. Zostanie ono przesłane do profesora do oceny.</p>
                <h6> Twoje sprawozdanie musi być plikiem pdf!</h6>
			<form enctype="multipart/form-data" action="wyslij.php" method="post">
			<input type="file" name="plik" id="plik"><br>
			<input type="submit" value="Wyślij" name="submit"/>
			</form>
            </article>
        </section>
        <footer>Stronę wykonali: Domozych Karolina, Gebler Emilia, Krysztoforska Angelika, Pomarzyński Karol</footer>
    </div>

</body>

</html>
