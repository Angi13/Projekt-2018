<?php
	$pol=mysqli_connect('localhost','root','', 'sprawozdania') or die("Brak połaczenia z bazą");
	$l=$_POST['l'];
	$lp=1;
	while($lp<=$l){
	$idl='id'.$lp;
	$id=$_POST[$idl];
	$aktl='akt'.$lp;
	if ($_POST[$aktl]){
	$zall='zal'.$lp;
	$uwl='uw'.$lp;
	$zal=$_POST[$zall];
	$uw=$_POST[$uwl];
	$row = mysqli_fetch_array(mysqli_query($pol,"select * from prace where IdPracy='$id';"));
	echo $zal." ".$row['Zaliczone']."<br>";
	if ($zal==$row['Zaliczone'])
	{
		echo "Nic nie zmieniono :D<br>";
	}
	else{
		$upd = @mysqli_query($pol,"update prace set Zaliczone='$zal', Uwagi='$uw', DataSprawdzenia=CURDATE() where IdPracy='$id';");
		if($upd) echo "Aktulizacja pomyślna <br>";
    else echo "Błąd <br>";
		echo "Zaktualizowano<br>";
	}
	}
	$lp++;
	}
	header("Location: sprawozdania.php");
?>