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
          <a class="menu active" href="indexwy.php">O stronie</a><a class="menu" href="dodaj2.php">Dodaj instrukcje</a><a class="menu" href="sprawozdania.php">Sprawdź sprawozdania</a>
          </nav>
          
          <section>
              <article>
               <p> Strona służy do sprawdzania sprawozdań przez wykładowców. </p>
              <p> Po dodaniu przez studentów sprawozdania na stronę dla studentów będą one dostępne dla wykładowców.</p> 
              <p> Wykładowcy mogą oceniać i komentować prace</p>
              </article>
          </section>
          <footer>Stronę wykonali: Domozych Karolina, Gebler Emilia, Krysztoforska Angelika, Pomarzyński Karol</footer>
      </div>   

  </body>

</html>