<!doctype html>
<html lang="pl">

  <head>
    <meta charset="UTF-8">
    <title>Sprawozdania</title>
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
          <a class="menu" href="indexwy.php">O stronie</a><a class="menu" href="dodaj2.php">Dodaj instrukcje</a><a class="menu active" href="sprawozdania.php">Sprawdź sprawozdania</a>
          </nav>
          
          <section>
              <article>
               <p> Tutaj możesz sprawdzić i skomentować przesłane sprawozdania. </p>

<form action='akt.php' method='post' enctype='multipart/form-data'><br><br><br>
<table cellpadding='2' border=1>
<tr>
<th><center>Imię</center></th>
<th><center>Nazwisko</center></th>
<th><center>Zaliczenie</center></th>
<th><center>Komentarz</center></th>
<th><center>Plik</center></th>
<th><center>Data oddania</center></th>
<th><center>Data sprawdzenia</center></th>
</tr>
	<?php 
	$l=1;
	$spr= mysqli_query($pol,'select * from prace join uzytkownicy on prace.pesel=uzytkownicy.pesel');
	while($row = mysqli_fetch_array($spr))
  {
  echo "<tr>";
  echo "<td><center>".$row['Imie']."</center></td>";
  echo "<td><center>".$row['Nazwisko']."</center></td>";
  echo "<td><center><input type='text' name='zal$l' value='{$row['Zaliczone']}'></center></td>";
  echo "<td><center><input type='text' name='uw$l' value='{$row['Uwagi']}'></center></td>";
  echo "<td><center><a href='pliki/".$row['Plik']."' target='_blank'>".$row['Plik']."</a></center></td>";
  echo "<td><center>".$row['DataOddania']."</center></td>";
  echo "<td><center>".$row['DataSprawdzenia']."</center></td>";
  echo "<td><center><input type='submit' name='akt$l' value='Oceń'/></center></td>"; //przesyła numer przycisku
  echo "<input type='hidden' name='id$l' value='{$row['IdPracy']}'/>"; 
  echo "<input type='hidden' name='l' value='{$l}'/>";
  echo "</tr>";
  $l++;
  }
echo "</table>";

	?>
	</form>
</div>
<br>
              
              </article>
          </section>
          <footer>Stronę wykonali: Domozych Karolina, Gebler Emilia, Krysztoforska Angelika, Pomarzyński Karol</footer>
      </div>   

  </body>

</html>