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
<p>Dodaj pojazd</p>
<?php
If (isset($_POST['id_marki'])) {
	require ('config.php');
$id_marki = $_POST['id_marki'];
$id_modelu = $_POST['id_modelu'];
$id_koloru = $_POST['id_koloru'];
$rok_prod = $_POST['rok_prod'];
$nr_vin = $_POST['nr_vin'];
$przebieg = $_POST['przebieg'];
$rodzaj_poj = $_POST['rodzaj_poj'];
$nr_rej = $_POST['nr_rej'];
$poj_silnika = $_POST['poj_silnika'];
$powypadkowy = $_POST['powypadkowy'];
$cena = $_POST['cena'];
$rezerwacja = $_POST['rezerwacja'];




$zapytanie ="INSERT INTO tbPojazdy(id_marki, id_modelu, id_koloru, rok_prod, nr_vin, przebieg, rodzaj_poj, nr_rej, poj_silnika, powypadkowy, cena, rezerwacja) 
						VALUES ('$id_marki','$id_modelu','$id_koloru','$rok_prod','$nr_vin','$przebieg','$rodzaj_poj','$nr_rej','$poj_silnika','$powypadkowy','$cena','$rezerwacja')"or die(mysqli_error());
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
<td>MARKA</td>
<td>MODEL</td>
<td>KOLOR</td>
<td>ROK PRODUKCJI</td>
<td>VIN</td>
<td>PRZEBIEG</td>
</tr>
	<tr>
	<form action=dodawanie_samochodu.php method="post">
	<td><?php
require ('config.php');
$z = mysqli_query ($connect,"SELECT tbMarki.id_marki, tbMarki.nazwa_marki FROM tbMarki");
echo "<select  name=id_marki>";
echo '<option value="">'.'Marka'.'</option>';
while($option = mysqli_fetch_assoc($z)) {
echo '<option value="'.$option['id_marki'].'">'.$option['nazwa_marki'].'</option>';
}
echo '</select>';
	mysqli_close($connect);
?></td>
	<td><?php
require ('config.php');
$z = mysqli_query ($connect,"SELECT tbModele.id_modelu, tbModele.nazwa_modelu
FROM tbModele
");
echo "<select  name=id_modelu>";
echo '<option value="">'.'Model'.'</option>';
while($option = mysqli_fetch_assoc($z)) {
echo '<option value="'.$option['id_modelu'].'">'.$option['nazwa_modelu'].'</option>';
}
echo '</select>';
	mysqli_close($connect);
?></td>
	<td><?php
require ('config.php');
$z = mysqli_query ($connect,"SELECT tbKolory.id_koloru, tbKolory.nazwa_koloru
FROM tbKolory
");
echo "<select  name=id_koloru>";
echo '<option value="">'.'Kolor'.'</option>';
while($option = mysqli_fetch_assoc($z)) {
echo '<option value="'.$option['id_koloru'].'">'.$option['nazwa_koloru'].'</option>';
}
echo '</select>';
	mysqli_close($connect);
?></td>
	<td><input type="text" name="rok_prod" placeholder="rok produkcji"></td>
	<td><input type="text" name="nr_vin" placeholder="vin"></td>
	<td><input type="text" name="przebieg" placeholder="przebieg"></td>
	</tr>
<tr>
<td>RODZAJ POJAZDU</td>
<td>NR REJESTRACYJNY</td>
<td>POJEMNOŚĆ SILNIKA</td>
<td>POWYPADKOWY</td>
<td>CENA</td>
<td>REZERWACJA</td>
</tr>
	<tr>
	<td><select id="rodzaj_poj" name="rodzaj_poj">
		<option value="Sedan">Sedan</option>
		<option value="Hatchback">Hatchback</option>
		<option value="Kombi">Kombi</option>
		<option value="Van">Van</option>
		<option value="Kabriolet">Kabriolet</option>
		<option value="Coupe">Coupe</option>
		<option value="SUV">SUV</option>
	</select></td>
	<td><input type="text" name="nr_rej" placeholder="nr rejestracyjny"></td>
	<td><input type="text" name="poj_silnika" placeholder="pojemność silnika"></td>
	<td><select id="powypadkowy" name="powypadkowy">
		<option value="Nie">Nie</option>
		<option value="Tak">Tak</option>
	</select></td>
	<td><input type="text" name="cena" placeholder="cena"></td>
	<td><select id="rezerwacja" name="rezerwacja">
		<option value="Nie">Nie</option>
		<option value="Tak">Tak</option>
	</select></td>
	</tr>
</table>
	<button type="submit">Dodaj</button>
</center>
<center>
<p></p>
<input type="button" value="Wróć" onclick="window.location=('samochody.php')" />
<input type="button" value="Wróć do głównej" onclick="window.location=('index.php')" />
</center>
</section>
</body>
</html>