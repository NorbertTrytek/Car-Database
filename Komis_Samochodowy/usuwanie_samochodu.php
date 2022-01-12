<html>
<head>
<title>Usuwanie</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

<header><p>Usuwanie</p></header>
<section>
<p>Usuwanie po id</p>
<?php
If (isset($_POST['id_pojazdu'])) {
	require ('config.php');

$id_pojazdu = $_POST['id_pojazdu'];



$zapytanie ="DELETE FROM tbPojazdy WHERE id_pojazdu='$id_pojazdu' "or die(mysqli_error());
$wynik = mysqli_query($connect,$zapytanie);
if ($wynik) {
		echo '<center><p>Prawidłowo usunięto id: ',$id_pojazdu,' z bazy danych</p></center>';	
	}else echo '<center><p>Bład</p></center>';
	mysqli_close($connect);
}
?>
<center>
	<form action=usuwanie_samochodu.php method="post">
	<input type="text" name="id_pojazdu" placeholder="id pojazdu">
	<button type="submit">Usuń</button>
</center>
<center>
<input type="button" value="Wróć" onclick="window.location=('samochody.php')" />
<input type="button" value="Wróć do głównej" onclick="window.location=('index.php')" />
</center>
</section>
</body>
</html>