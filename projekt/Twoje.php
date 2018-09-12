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
            <a class="menu" href="indexst.php">O stronie</a><a class="menu" href="dodaj.php">Dodaj sprawozdanie</a><a class="menu active" href="Twoje.php">Twoje sprawozdania</a><a class="menu" href="instrukcje.php">Instrukcje</a>
        </nav>

        <section>
            <article>
                <p> W tej zakładce znajdują się przesłane przez Ciebie sprawozdania. Możesz również sprawdzić swoją ocenę oraz komentarz do sprawozdania.</p>
				<div id="spoiler2" style="display:none">
<table cellpadding='2' border=1>
<tr>
<th><center>Zaliczenie</center></th>
<th><center>Komentarz</center></th>
<th><center>Plik</center></th>
<th><center>Data oddania</center></th>
<th><center>Data sprawdzenia</center></th>
</tr>
	<?php 
	$spr= mysqli_query($pol,"select * from prace inner join uzytkownicy on prace.pesel=uzytkownicy.pesel where Email='$log'");
	while($row = mysqli_fetch_array($spr))
  {
  echo "<tr>";
  echo "<td><center>".$row['Zaliczone']."</center></td>";
  echo "<td><center>".$row['Uwagi']."</center></td>";
  echo "<td><center><a href='".$row['Plik']."' target='_blank'>".$row['Plik']."</a></center></td>";
  echo "<td><center>".$row['DataOddania']."</center></td>";
  echo "<td><center>".$row['DataSprawdzenia']."</center></td>";
  echo "</tr>";
  }
echo "</table>";
	?>
</div>	<button id="rozw" title="Click to show/hide content" type="button" onclick="if(document.getElementById('spoiler2') .style.display=='none') {document.getElementById('spoiler2') .style.display=''}else{document.getElementById('spoiler2') .style.display='none'}">Sprawdź</button>
<br>
            </article>
        </section>
        <footer>Stronę wykonali: Domozych Karolina, Gebler Emilia, Krysztoforska Angelika, Pomarzyński Karol</footer>
    </div>

</body>

</html>
