<html>
<head>
<title>Samochody</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

<header><p>Samochody</p></header>
<center>
<table>
<tr>
<td><button onclick="window.location.href='dodawanie_samochodu.php';">Dodawanie</button></td>
<td><button onclick="window.location.href='usuwanie_samochodu.php';">Usuwanie</button></td>
<td><button onclick="window.location.href='edytowanie_samochodu.php';">Edytuj</button></td>
<td><button onclick="window.location.href='index.php';">Wróć do głównej</button></td>
</tr>
</table>
</center>
<section>
<p>Lista samochodów</p>
<center>
<?php
		require ('config.php');
 $zapytanie = "SELECT tbMarki.id_marki, tbPojazdy.id_pojazdu, tbMarki.nazwa_marki, tbModele.nazwa_modelu, tbKolory.nazwa_koloru, tbPojazdy.rok_prod, tbPojazdy.nr_vin, tbPojazdy.przebieg, tbPojazdy.rodzaj_poj, tbPojazdy.nr_rej, tbPojazdy.poj_silnika, tbPojazdy.powypadkowy, tbPojazdy.cena, tbPojazdy.rezerwacja
FROM tbModele INNER JOIN (tbMarki INNER JOIN (tbKolory INNER JOIN tbPojazdy ON tbKolory.id_koloru = tbPojazdy.id_koloru) ON tbMarki.id_marki = tbPojazdy.id_marki) ON tbModele.id_modelu = tbPojazdy.id_modelu;"or die(mysqli_error());
  $wynik = mysqli_query($connect,$zapytanie);
echo  '<table border=10 width=80%>';
    echo '<tr>';
    echo '<td>ID</td>';
    echo '<td>MARKA</td>';
    echo '<td>MODEL</td>';
    echo '<td>KOLOR</td>';
    echo '<td>ROK PRODUKCJI</td>';
    echo '<td>VIN</td>';
    echo '<td>PRZEBIEG</td>';
    echo '<td>RODZAJ POJAZDU</td>';
    echo '<td>NR REJESTRACYJNY</td>';
    echo '<td>POJEMNOŚĆ SILNIKA</td>';
    echo '<td>POWYPATKOWY</td>';
    echo '<td>CENA</td>';
    echo '<td>REZERWACJA</td>';
      echo'</tr>';
   while ($row = mysqli_fetch_assoc($wynik)) {
    echo '<tr>';
    echo '<td>'.$row["id_pojazdu"].'</td>';
    echo '<td>'.$row["nazwa_marki"].'</td>';
    echo '<td>'.$row["nazwa_modelu"].'</td>';
    echo '<td>'.$row["nazwa_koloru"].'</td>';
    echo '<td>'.$row["rok_prod"].'</td>';
    echo '<td>'.$row["nr_vin"].'</td>';
    echo '<td>'.$row["przebieg"].'</td>';
    echo '<td>'.$row["rodzaj_poj"].'</td>';
    echo '<td>'.$row["nr_rej"].'</td>';
    echo '<td>'.$row["poj_silnika"].'</td>';
    echo '<td>'.$row["powypadkowy"].'</td>';
    echo '<td>'.$row["cena"].'</td>';
    echo '<td>'.$row["rezerwacja"].'</td>';
      echo'</tr>';
}
echo'</table>';
?>
</center>
</section>
</body>
</html>