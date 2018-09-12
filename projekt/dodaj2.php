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
          <a class="menu" href="indexwy.php">O stronie</a><a class="menu active" href="dodaj2.php">Dodaj instrukcje</a><a class="menu" href="sprawozdania.php">Sprawdź sprawozdania</a>
          </nav>
          
          <section>
              <article>
               <p> Tutaj możesz dodać instrukcje jako wykładowca. Możesz też przejrzeć dodane wcześniej instrukcje. </p>
			   <br> Dodaj plik:
              <form enctype="multipart/form-data" action="wyslij2.php" method="post">
				<input type="file" name="plik" id="plik"><br>
				<input type="submit" value="Wyślij" name="submit"/>
			  </form>
			  Sprawdź wcześniejsze:<br>
			  <div id="spoiler" style="display:none">
			  <form action='del.php' method='post' enctype='multipart/form-data'>
				<?php 
				$inst= mysqli_query($pol,"select * from instrukcje where Email='$log'");
				$l=1;
				while($row = mysqli_fetch_assoc($inst))
				{
					echo "<a href='instrukcje/".$row['Instrukcja']."' target='_blank'>".$row['Instrukcja']."</a>";
					echo "<input type='hidden' name='id$l' value='{$row['IdInstrukcji']}'/>";
					echo "<input type='hidden' name='l' value='{$l}'/>";
					echo "<input type='submit' name='b$l' value='Usuń'/><br>";
					$l++;
				}
				?>
				</form>
				</div>	<button id="rozw" title="Click to show/hide content" type="button" onclick="if(document.getElementById('spoiler') .style.display=='none') {document.getElementById('spoiler') .style.display=''}else{document.getElementById('spoiler') .style.display='none'}">Rozwiń/Zwiń</button>
              </article>
          </section>
          <footer>Stronę wykonali: Domozych Karolina, Gebler Emilia, Krysztoforska Angelika, Pomarzyński Karol</footer>
      </div>   

  </body>

</html>