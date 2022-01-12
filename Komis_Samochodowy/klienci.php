<html>
<head>
<title>Klienci</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

<header><p>Klienci</p></header>
<center>
<table>
<tr>
<td><button onclick="window.location.href='dodawanie_klienta.php';">Dodawanie</button></td>
<td><button onclick="window.location.href='usuwanie_klienta.php';">Usuwanie</button></td>
<td><button onclick="window.location.href='edytowanie_klienta.php';">Edytuj</button></td>
<td><button onclick="window.location.href='index.php';">Wróć do głównej</button></td>
</tr>
</table>
</center>
<section>
<p>Lista klientow</p>
<center>
<?php
		require ('config.php');
 $zapytanie = "SELECT * FROM tbKlienci;"or die(mysqli_error());
  $wynik = mysqli_query($connect,$zapytanie);
echo  '<table border=10 width=80%>';
    echo '<tr>';
    echo '<td>ID</td>';
    echo '<td>NAZWISKO</td>';
    echo '<td>IMIE</td>';
    echo '<td>DATA URODZENIA</td>';
    echo '<td>PESEL</td>';
    echo '<td>KOD POCZTOWY</td>';
    echo '<td>MIASTO</td>';
    echo '<td>ULICA</td>';
    echo '<td>NR DOMU</td>';
    echo '<td>TELEFON</td>';
    echo '<td>MAIL</td>';
    echo '<td>RODZAJ DOKUMENTU</td>';
    echo '<td>NR DOKUMENTU</td>';
      echo'</tr>';
   while ($row = mysqli_fetch_assoc($wynik)) {
    echo '<tr>';
    echo '<td>'.$row["id_klienta"].'</td>';
    echo '<td>'.$row["nazwisko"].'</td>';
    echo '<td>'.$row["imie"].'</td>';
    echo '<td>'.$row["data_ur"].'</td>';
    echo '<td>'.$row["pesel"].'</td>';
    echo '<td>'.$row["kod_pocztowy"].'</td>';
    echo '<td>'.$row["miasto"].'</td>';
    echo '<td>'.$row["ulica"].'</td>';
    echo '<td>'.$row["nr_domu"].'</td>';
    echo '<td>'.$row["telefon"].'</td>';
    echo '<td>'.$row["mail"].'</td>';
    echo '<td>'.$row["rodzaj_dok"].'</td>';
    echo '<td>'.$row["nr_dok"].'</td>';
      echo'</tr>';
}
echo'</table>';
?>
</center>
</section>
</body>
</html>