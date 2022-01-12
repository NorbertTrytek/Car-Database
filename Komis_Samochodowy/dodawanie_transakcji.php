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
<p>Dodaj transakcje</p>
<?php
If (isset($_POST['id_klienta'])) {
	require ('config.php');
$id_klienta = $_POST['id_klienta'];
$id_pojazdu = $_POST['id_pojazdu'];
$rodzaj_tran = $_POST['rodzaj_tran'];
$kwota = $_POST['kwota'];
$nr_faktury = $_POST['nr_faktury'];
$sp_zaplaty = $_POST['sp_zaplaty'];
$data_transakcji = $_POST['data_transakcji'];
$zaplacono = $_POST['zaplacono'];



$zapytanie ="INSERT INTO tbTransakcje(id_klienta, id_pojazdu, rodzaj_tran, kwota, nr_faktury, sp_zaplaty, data_transakcji, zaplacono) 
						VALUES ('$id_klienta','$id_pojazdu','$rodzaj_tran','$kwota','$nr_faktury','$sp_zaplaty','$data_transakcji','$zaplacono')"or die(mysqli_error());
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
<td>KLIENT</td>
<td>POJAZD</td>
<td>RODZAJ TRANSAKCJI</td>
<td>KWOTA</td>
</tr>
	<tr>
	<form action=dodawanie_transakcji.php method="post">
	<td><?php
require ('config.php');
$z = mysqli_query ($connect,"SELECT tbKlienci.id_klienta, tbKlienci.nazwisko
FROM tbKlienci
");
echo "<select  name=id_klienta>";
echo '<option value="">'.'Klient'.'</option>';
while($option = mysqli_fetch_assoc($z)) {
echo '<option value="'.$option['id_klienta'].'">'."Id: ".$option['id_klienta']." - ".$option['nazwisko'].'</option>';
}
echo '</select>';
	mysqli_close($connect);
?></td>
	<td><?php
require ('config.php');
$z = mysqli_query ($connect,"SELECT tbPojazdy.id_pojazdu, tbPojazdy.nr_vin
FROM tbPojazdy
");
echo "<select  name=id_pojazdu>";
echo '<option value="">'.'Pojazd'.'</option>';
while($option = mysqli_fetch_assoc($z)) {
echo '<option value="'.$option['id_pojazdu'].'">'."Id: ".$option['id_pojazdu']." - ".$option['nr_vin'].'</option>';
}
echo '</select>';
	mysqli_close($connect);
?></td>
	<td><select id="rodzaj_tran" name="rodzaj_tran">
		<option value="Kupno">Kupno</option>
		<option value="Sprzedaż">Sprzedaż</option>
	</select></td>
	<td><input type="text" name="kwota" placeholder="kwota"></td>
	</tr>
<tr>
<td>NR FAKTURY</td>
<td>SPOSÓB ZAPŁATY</td>
<td>DATA TRANSAKCJI</td>
<td>ZAPŁACONO</td>
</tr>
	<tr>
	<td><input type="text" name="nr_faktury" placeholder="nr faktury"></td>
	<td><select id="sp_zaplaty" name="sp_zaplaty">
		<option value="Przelew">Przelew</option>
		<option value="Gotówka">Gotówka</option>
	</select></td>
	<td><input type="date" name="data_transakcji" placeholder="data transakcji"></td>
	<td><select id="zaplacono" name="zaplacono">
		<option value="Tak">Tak</option>
		<option value="Nie">Nie</option>
	</select></td>
	</tr>
</table>
	<button type="submit">Dodaj</button>
</center>
<center>
<p></p>
<input type="button" value="Wróć" onclick="window.location=('transakcje.php')" />
<input type="button" value="Wróć do głównej" onclick="window.location=('index.php')" />
</center>
</section>
</body>
</html>