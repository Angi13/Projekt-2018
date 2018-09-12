<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<?php
 //połączenie z bazą
$pol=mysqli_connect('localhost','root','', 'sprawozdania') or die("Brak połaczenia z bazą");
session_start();
$log=$_SESSION['email'];
$target_dir = "pliki/";
$target_file = $target_dir . basename($_FILES["plik"]["name"]);
	$filename=basename($_FILES["plik"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if ($uploadOk == 0) {
    echo "Nie udało się zgrać pliku.";

} else {
    if (move_uploaded_file($_FILES["plik"]["tmp_name"], $target_file)) {
        echo "Plik ". basename( $_FILES["plik"]["name"]). " został przesłany.";
		}
		else {
        echo "Błąd wysyłania pliku.";
    }
}
$row = mysqli_fetch_array(mysqli_query($pol,"select * from uzytkownicy where Email='$log';"));
$pesel=$row['Pesel'];
$dodaj=@mysqli_query($pol,"insert into prace (Pesel, Plik, DataOddania) values ($pesel,'$filename',CURDATE())");
if($dodaj) echo "<br>Dodano do bazy pomyślnie <br>";
    else echo "<br>Błąd <br>";
	
mysqli_close($pol);
//wrócenie do strony
header("Location: dodaj.php");
?>
</html>