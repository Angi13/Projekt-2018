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
            <a class="menu" href="indexst.php">O stronie</a><a class="menu" href="dodaj.php">Dodaj sprawozdanie</a><a class="menu" href="Twoje.php">Twoje sprawozdania</a><a class="menu active" href="instrukcje.php">Instrukcje</a>
        </nav>

        <section>
            <article>
                <p> W tej zakładce umieszczane są instrukcje do laboratoriów.</p>
				Instrukcje: <br>
				<div id="spoiler" style="display:none">
				<?php 
				$inst= mysqli_query($pol,'select * from instrukcje');
				while($row = mysqli_fetch_assoc($inst))
				{
					echo "<a href='instrukcje/".$row['Instrukcja']."' target='_blank'>".$row['Instrukcja']."</a> <br>";
				}
				?>
				</div>	<button id="rozw" title="Click to show/hide content" type="button" onclick="if(document.getElementById('spoiler') .style.display=='none') {document.getElementById('spoiler') .style.display=''}else{document.getElementById('spoiler') .style.display='none'}">Rozwiń/Zwiń</button>
            </article>
        </section>
        <footer>Stronę wykonali: Domozych Karolina, Gebler Emilia, Krysztoforska Angelika, Pomarzyński Karol</footer>
    </div>




</body>

</html>
