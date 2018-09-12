<?php
session_start();
$pol=mysqli_connect('localhost','root','', 'sprawozdania') or die("Brak połaczenia z bazą");

if(isset($_POST['login'])){ //sprawdza czy login został pobrany
//następnie pobiera login i hasło
	$log=$_POST['login'];
	$pass=$_POST['pass'];
	echo  $log." ".$pass."<br>"; //dla sprawdzenia
	
	$zap="SELECT * FROM uzytkownicy WHERE Email='$log' and Haslo='$pass'";
	$wyn=mysqli_query($pol,$zap);
	if(!$wyn) //sprawdza czy wynik zapytania jest błędny
		echo "nie poprawny login hasło";
	$lr=mysqli_num_rows($wyn); //liczba rzędów z wyniku zapytania
	if ($lr==1) //sprawdza czy liczba rzędów jest równa dokładnie 1
	{
		//rzeczy do zapisania w sesji by przeszły dalej
		$_SESSION['zalogowany'] = true;
		$_SESSION['email'] = $log;

		$zapu="SELECT Status from uzytkownicy WHERE Email = '$log';";
		$wyni=mysqli_query($pol,$zapu);
		while($row = mysqli_fetch_array($wyni))
		{$rk=$row['Status'];} // przypisanie statusu do zmiennej
		if($rk =="2"){ //sprawdzenie statusu
		echo " wykladowca <br>";
		header("Location: indexwy.php");
	}

		else if($rk =="1"){ //sprawdzenie statusu
		echo " student";
		header("Location: indexst.php");
		}
	else
		echo ", coś poszło nie tak";
	}
	else //zwraca do logowania 
		header("Location: index.html");
}
else //zwraca do logowania
	header("Location: index.html");
mysqli_close($pol);
?>