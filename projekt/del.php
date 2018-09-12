<?php

$pol=mysqli_connect('localhost','root','', 'sprawozdania') or die("Brak połaczenia z bazą");
	$l=$_POST['l'];
	$lp=1;
	while($lp<=$l){
	$idl='id'.$lp;
	$bl='b'.$lp;
	$id=$_POST[$idl];
	if ($_POST[$bl]){
	$del=@mysqli_query($pol,"delete from instrukcje where IdInstrukcji='$id'");
	if($del) echo "Udało sie<br>";
    else echo "Błąd <br>";
	}
	$lp++;
	}
	header("Location: dodaj2.php");
?>