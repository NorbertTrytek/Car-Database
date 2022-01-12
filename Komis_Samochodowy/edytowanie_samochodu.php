<html>
<head>
<title>Edytowanie</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

<header><p>Edytowanie</p></header>
<section>
<center>
	<form action=edytowanie_samochodu.php method="post">
<?php
require ('config.php');
$z = mysqli_query ($connect,"SELECT tbPojazdy.id_pojazdu
FROM tbPojazdy
");
echo "<select  name=id>";
echo '<option value="">'.'ID'.'</option>';
while($option = mysqli_fetch_assoc($z)) {
echo '<option value="'.$option['id_pojazdu'].'">'.$option['id_pojazdu'].'</option>';
}
echo '</select>';
	mysqli_close($connect);
?>
	<button type="submit">Wyszukaj</button>
	</form>
</center>
<p>Edytuj samochodu</p>
<center>
	<form action=edytowanie_samochodu.php method="post">
<?php
If (isset($_POST['id']) ) {
	require ('config.php');
$id = $_POST['id']??"";
 $zapytanie = "SELECT * FROM tbPojazdy
 WHERE tbPojazdy.id_pojazdu='$id';"or die(mysqli_error());
  $wynik = mysqli_query($connect,$zapytanie);
echo  '<table width=80%>';
    echo '<tr>';
    echo '<td>ID</td>';
    echo '<td>MARKA</td>';
    echo '<td>MODEL</td>';
    echo '<td>KOLOR</td>';
    echo '<td>ROK PRODUKCJI</td>';
    echo '<td>NR VIN</td>';
    echo '<td>PRZEBIEG</td>';
      echo'</tr>';
   while ($row = mysqli_fetch_assoc($wynik)) {
    echo '<tr>';
    echo '<td><input type="text" name="id_pojazdu" placeholder="pojazd" value="'.$row["id_pojazdu"].'" readonly></td>';
	
		$z = mysqli_query ($connect,"SELECT tbMarki.id_marki, tbMarki.nazwa_marki FROM tbMarki");
		$z1 = mysqli_query ($connect,"SELECT tbMarki.id_marki, tbMarki.nazwa_marki
FROM tbMarki INNER JOIN tbPojazdy ON tbMarki.id_marki = tbPojazdy.id_marki
WHERE (((tbPojazdy.id_pojazdu)=$id));");
		echo '<td><select  name=id_marki>';
		while($option1 = mysqli_fetch_assoc($z1)) {
		echo '<option value="'.$option1['id_marki'].'">'.$option1['nazwa_marki'].'</option>';
		}
		while($option = mysqli_fetch_assoc($z)) {
		echo '<option value="'.$option['id_marki'].'">'.$option['nazwa_marki'].'</option>';
	}
echo '</select>';
echo '</td>';

		$z = mysqli_query ($connect,"SELECT tbModele.id_modelu, tbModele.nazwa_modelu FROM tbModele");
		$z1 = mysqli_query ($connect,"SELECT tbModele.id_modelu, tbModele.nazwa_modelu
FROM tbModele INNER JOIN tbPojazdy ON tbModele.id_modelu = tbPojazdy.id_modelu
WHERE (((tbPojazdy.id_pojazdu)=$id));");
		echo '<td><select  name=id_modelu>';
		while($option1 = mysqli_fetch_assoc($z1)) {
		echo '<option value="'.$option1['id_modelu'].'">'.$option1['nazwa_modelu'].'</option>';
		}
		while($option = mysqli_fetch_assoc($z)) {
		echo '<option value="'.$option['id_modelu'].'">'.$option['nazwa_modelu'].'</option>';
	}
echo '</select>';
echo '</td>';

		$z = mysqli_query ($connect,"SELECT tbKolory.id_koloru, tbKolory.nazwa_koloru FROM tbKolory");
		$z1 = mysqli_query ($connect,"SELECT tbKolory.id_koloru, tbKolory.nazwa_koloru
FROM tbKolory INNER JOIN tbPojazdy ON tbKolory.id_koloru = tbPojazdy.id_koloru
WHERE (((tbPojazdy.id_pojazdu)=$id));");
		echo '<td><select  name=id_koloru>';
		while($option1 = mysqli_fetch_assoc($z1)) {
		echo '<option value="'.$option1['id_koloru'].'">'.$option1['nazwa_koloru'].'</option>';
		}
		while($option = mysqli_fetch_assoc($z)) {
		echo '<option value="'.$option['id_koloru'].'">'.$option['nazwa_koloru'].'</option>';
	}
echo '</select>';
echo '</td>';

    echo '<td><input type="text" name="rok_prod" placeholder="rok produkcji" value="'.$row["rok_prod"].'"></td>';
    echo '<td><input type="text" name="nr_vin" placeholder="nr vin" value="'.$row["nr_vin"].'"></td>';
    echo '<td><input type="text" name="przebieg" placeholder="przebieg" value="'.$row["przebieg"].'"></td>';
      echo'</tr>';
	  echo '<tr>';
    echo '<td>RODZAJ POJAZDU</td>';
    echo '<td>NR REJESTRACYJNY</td>';
    echo '<td>POJEMNOISC SILNIKA</td>';
    echo '<td>POWYPADKOWY</td>';
    echo '<td>CENA</td>';
    echo '<td>REZERWACJA</td>';
      echo'</tr>';
	      echo '<tr>';
    echo '<td><select id="rodzaj_poj" name="rodzaj_poj">
		<option value="'.$row["rodzaj_poj"].'">'.$row["rodzaj_poj"].'</option>
		<option value="Sedan">Sedan</option>
		<option value="Hatchback">Hatchback</option>
		<option value="Kombi">Kombi</option>
		<option value="Van">Van</option>
		<option value="Kabriolet">Kabriolet</option>
		<option value="Coupe">Coupe</option>
		<option value="SUV">SUV</option>
	</select></td>';
    echo '<td><input type="text" name="nr_rej" placeholder="nr rejestracyjny" value="'.$row["nr_rej"].'"></td>';
    echo '<td><input type="text" name="poj_silnika" placeholder="pojemnosc silnika" value="'.$row["poj_silnika"].'"></td>';
    echo '<td><select id="powypadkowy" name="powypadkowy">
		<option value="'.$row["powypadkowy"].'">'.$row["powypadkowy"].'</option>
		<option value="Nie">Nie</option>
		<option value="Tak">Tak</option>
	</select></td>';
    echo '<td><input type="text" name="cena" placeholder="cena" value="'.$row["cena"].'"></td>';
    echo '<td><select id="rezerwacja" name="rezerwacja">
		<option value="'.$row["rezerwacja"].'">'.$row["rezerwacja"].'</option>
		<option value="Nie">Nie</option>
		<option value="Tak">Tak</option>
	</select></td>';
      echo'</tr>';
   }

echo'</table>';

}
?>
</center>
<?php
If (isset($_POST['id_pojazdu'])) {
	require ('config.php');
$id_pojazdu = $_POST['id_pojazdu'];
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



$zapytanie ="UPDATE tbpojazdy SET id_marki = '$id_marki', id_modelu = '$id_modelu', id_koloru = '$id_koloru', rok_prod = '$rok_prod', nr_vin = '$nr_vin', przebieg = '$przebieg', rodzaj_poj = '$rodzaj_poj',
nr_rej = '$nr_rej', poj_silnika = '$poj_silnika', powypadkowy = '$powypadkowy', cena = '$cena', rezerwacja = '$rezerwacja' WHERE tbpojazdy.id_pojazdu = $id_pojazdu;"or die(mysqli_error());
$wynik = mysqli_query($connect,$zapytanie);
if ($wynik) {
		echo '<center><p>Prawidłowo edytowano baze danych</p></center>';	
	}else echo '<center><p>Bład</p></center>';
	mysqli_close($connect);
}
?>
<center><button type="submit">Edytuj</button></center>
</form>
<center>
<p></p>
<input type="button" value="Wróć" onclick="window.location=('samochody.php')" />
<input type="button" value="Wróć do głównej" onclick="window.location=('index.php')" />
</center>
</section>
</body>
</html>