<html>
<head>
<title>Dodawanie</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

<header><p>Dodawanie</p></header>
<section>
<p>Dodaj klienta</p>
<?php
If (isset($_POST['nazwisko'])) {
	require ('config.php');
$nazwisko = $_POST['nazwisko'];
$imie = $_POST['imie'];
$data_ur = $_POST['data_ur'];
$pesel = $_POST['pesel'];
$kod_pocztowy = $_POST['kod_pocztowy'];
$miasto = $_POST['miasto'];
$ulica = $_POST['ulica'];
$nr_domu = $_POST['nr_domu'];
$telefon = $_POST['telefon'];
$mail = $_POST['mail'];
$rodzaj_dok = $_POST['rodzaj_dok'];
$nr_dok = $_POST['nr_dok'];



$zapytanie ="INSERT INTO tbKlienci(nazwisko, imie, data_ur, pesel, kod_pocztowy, miasto, ulica, nr_domu, telefon, mail, rodzaj_dok, nr_dok) 
						VALUES ('$nazwisko','$imie','$data_ur','$pesel','$kod_pocztowy','$miasto','$ulica','$nr_domu','$telefon','$mail','$rodzaj_dok','$nr_dok')"or die(mysqli_error());
$wynik = mysqli_query($connect,$zapytanie);
if ($wynik) {
		echo '<center><p>Prawidłowo dodano do bazy danych</p></center>';	
	}else echo '<center><p>Bład</p></center>';
	mysqli_close($connect);
}
?>
<center>
<table width=80%>
<tr>
<td>NAZIWSKO</td>
<td>IMIE</td>
<td>DATA URODZENIA</td>
<td>PESEL</td>
<td>KOD POCZTOWY</td>
<td>MIASTO</td>
</tr>
	<tr>
	<form action=dodawanie_klienta.php method="post">
	<td><input type="text" name="nazwisko" placeholder="nazwisko"></td>
	<td><input type="text" name="imie" placeholder="imie"></td>
	<td><input type="date" name="data_ur" placeholder="data urodzenia"></td>
	<td><input type="text" name="pesel" placeholder="pesel"></td>
	<td><input type="text" name="kod_pocztowy" placeholder="kod pocztowy"></td>
	<td><input type="text" name="miasto" placeholder="miasto"></td>
	</tr>
<tr>
<td>ULICA</td>
<td>NR DOMU</td>
<td>TELEFON</td>
<td>MAIL</td>
<td>RODZAJ DOKUMENTU</td>
<td>NR DOKUMENTU</td>
</tr>
	<tr>
	<td><input type="text" name="ulica" placeholder="ulica"></td>
	<td><input type="text" name="nr_domu" placeholder="nr domu"></td>
	<td><input type="text" name="telefon" placeholder="telefon"></td>
	<td><input type="text" name="mail" placeholder="mail"></td>
	<td><input type="text" name="rodzaj_dok" placeholder="rodzaj dokumentu"></td>
	<td><input type="text" name="nr_dok" placeholder="nr dokumentu"></td>
	</tr>
</table>
	<button type="submit">Dodaj</button>
</center>
<center>
<p></p>
<input type="button" value="Wróć" onclick="window.location=('klienci.php')" />
<input type="button" value="Wróć do głównej" onclick="window.location=('index.php')" />
</center>
</section>
</body>
</html>