<html>
<head>
<title>Transakcje</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

<header><p>Transakcje</p></header>
<center>
<table>
<tr>
<td><button onclick="window.location.href='dodawanie_transakcji.php';">Dodawanie</button></td>
<td><button onclick="window.location.href='usuwanie_transakcji.php';">Usuwanie</button></td>
<td><button onclick="window.location.href='edytowanie_transakcji.php';">Edytuj</button></td>
<td><button onclick="window.location.href='index.php';">Wróć do głównej</button></td>
</tr>
</table>
</center>
<section>
<p>Lista transakcji</p>
<center>
<?php
		require ('config.php');
 $zapytanie = "SELECT * FROM tbTransakcje;"or die(mysqli_error());
  $wynik = mysqli_query($connect,$zapytanie);
echo  '<table border=10 width=80%>';
    echo '<tr>';
    echo '<td>ID</td>';
    echo '<td>ID KLIENTA</td>';
    echo '<td>ID POJAZDU</td>';
    echo '<td>RODZAJ TRANSAKCJI</td>';
    echo '<td>KWOTA</td>';
    echo '<td>NR FAKTURY</td>';
    echo '<td>SPOSÓB ZAPŁATY</td>';
    echo '<td>DATA TRANSAKCJI</td>';
    echo '<td>ZAPŁACONO</td>';
      echo'</tr>';
   while ($row = mysqli_fetch_assoc($wynik)) {
    echo '<tr>';
    echo '<td>'.$row["id_transakcji"].'</td>';
    echo '<td>'.$row["id_klienta"].'</td>';
    echo '<td>'.$row["id_pojazdu"].'</td>';
    echo '<td>'.$row["rodzaj_tran"].'</td>';
    echo '<td>'.$row["kwota"].'</td>';
    echo '<td>'.$row["nr_faktury"].'</td>';
    echo '<td>'.$row["sp_zaplaty"].'</td>';
    echo '<td>'.$row["data_transakcji"].'</td>';
    echo '<td>'.$row["zaplacono"].'</td>';
      echo'</tr>';
}
echo'</table>';
?>
</center>
</section>
</body>
</html>