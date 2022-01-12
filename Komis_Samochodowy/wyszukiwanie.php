<html>
<head>
<title>Wyszukaj</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css" type="text/css" />
</head>

<body>

<header><p>Wyszukaj pojazd</p></header>
<section>
<center>
<?php
If (isset($_POST['id']) || isset($_POST['id1'])) {
	require ('config.php');
$id = $_POST['id']??"";
$id1 = $_POST['id1']??"";
 $zapytanie = "SELECT tbMarki.id_marki, tbPojazdy.id_pojazdu, tbMarki.nazwa_marki, tbModele.nazwa_modelu, tbKolory.nazwa_koloru, tbPojazdy.rok_prod, tbPojazdy.nr_vin, tbPojazdy.przebieg, tbPojazdy.rodzaj_poj, tbPojazdy.nr_rej, tbPojazdy.poj_silnika, tbPojazdy.powypadkowy, tbPojazdy.cena, tbPojazdy.rezerwacja
FROM tbModele INNER JOIN (tbMarki INNER JOIN (tbKolory INNER JOIN tbPojazdy ON tbKolory.id_koloru = tbPojazdy.id_koloru) ON tbMarki.id_marki = tbPojazdy.id_marki) ON tbModele.id_modelu = tbPojazdy.id_modelu
WHERE (((tbPojazdy.id_pojazdu)='$id')) OR (((tbMarki.nazwa_marki)='$id1'));"or die(mysqli_error());
  $wynik = mysqli_query($connect,$zapytanie);
echo  '<table border=10 width=80%>';
    echo '<tr>';
    echo '<td align=center>ID</td>';
    echo '<td align=center>MARKA</td>';
    echo '<td align=center>MODEL</td>';
    echo '<td align=center>KOLOR</td>';
    echo '<td align=center>ROK PRODUKCJI</td>';
    echo '<td align=center>VIN</td>';
    echo '<td align=center>PRZEBIEG</td>';
    echo '<td align=center>RODZAJ POJAZDU</td>';
    echo '<td align=center>NR REJESTRACYJNY</td>';
    echo '<td align=center>POJEMNOŚĆ SILNIKA</td>';
    echo '<td align=center>POWYPATKOWY</td>';
    echo '<td align=center>CENA</td>';
    echo '<td align=center>REZERWACJA</td>';
      echo'</tr>';
   while ($row = mysqli_fetch_assoc($wynik)) {
    echo '<tr>';
    echo '<td align=center>'.$row["id_pojazdu"].'</td>';
    echo '<td align=center>'.$row["nazwa_marki"].'</td>';
    echo '<td align=center>'.$row["nazwa_modelu"].'</td>';
    echo '<td align=center>'.$row["nazwa_koloru"].'</td>';
    echo '<td align=center>'.$row["rok_prod"].'</td>';
    echo '<td align=center>'.$row["nr_vin"].'</td>';
    echo '<td align=center>'.$row["przebieg"].'</td>';
    echo '<td align=center>'.$row["rodzaj_poj"].'</td>';
    echo '<td align=center>'.$row["nr_rej"].'</td>';
    echo '<td align=center>'.$row["poj_silnika"].'</td>';
    echo '<td align=center>'.$row["powypadkowy"].'</td>';
    echo '<td align=center>'.$row["cena"].'</td>';
    echo '<td align=center>'.$row["rezerwacja"].'</td>';
      echo'</tr>';
}
echo'</table>';
}
?>
</center>
<center>

<table width=60%>
<tr>
<td>
<p>Wyszukaj po id pojazdu</p>
<center>
	<form action=wyszukiwanie.php method="post">
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
</td>
<td>
<p>Wyszukaj po marce pojazdu</p>
<center>
	<form action=wyszukiwanie.php method="post">
<?php
require ('config.php');
$z1 = mysqli_query ($connect,"SELECT tbMarki.nazwa_marki
FROM tbMarki;
");
echo "<select name=id1>";
echo '<option value="">'.'MARKA'.'</option>';
while($option = mysqli_fetch_assoc($z1)) {
echo '<option value="'.$option['nazwa_marki'].'">'.$option['nazwa_marki'].'</option>';
}
echo '</select>';
	mysqli_close($connect);
?>
	<button type="submit">Wyszukaj</button>
	</form>
</center>
</td>
</tr>
</table>
</center>
<center>
<?php
If (isset($_POST['id2']) || isset($_POST['id3'])) {
	require ('config.php');
$id2 = $_POST['id2']??"";
$id3 = $_POST['id3']??"";
 $zapytanie = "SELECT * FROM tbKlienci
 WHERE (((tbKlienci.id_klienta)='$id2')) OR (((tbKlienci.nazwisko)='$id3'));"or die(mysqli_error());
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
}
?>
</center>
<center>
<table width=60%>
<tr>
<td>
<p>Wyszukaj po id klienta</p>
<center>
	<form action=wyszukiwanie.php method="post">
<?php
require ('config.php');
$z = mysqli_query ($connect,"SELECT tbKlienci.id_klienta
FROM tbKlienci
");
echo "<select  name=id2>";
echo '<option value="">'.'ID'.'</option>';
while($option = mysqli_fetch_assoc($z)) {
echo '<option value="'.$option['id_klienta'].'">'.$option['id_klienta'].'</option>';
}
echo '</select>';
	mysqli_close($connect);
?>
	<button type="submit">Wyszukaj</button>
	</form>
</center>
</td>
<td>
<p>Wyszukaj po nazwisku</p>
<center>
	<form action=wyszukiwanie.php method="post">
<?php
require ('config.php');
$z1 = mysqli_query ($connect,"SELECT tbKlienci.nazwisko
FROM tbKlienci;
");
echo "<select name=id3>";
echo '<option value="">'.'NAZWISKO'.'</option>';
while($option = mysqli_fetch_assoc($z1)) {
echo '<option value="'.$option['nazwisko'].'">'.$option['nazwisko'].'</option>';
}
echo '</select>';
	mysqli_close($connect);
?>
	<button type="submit">Wyszukaj</button>
	</form>
</center>
</td>
</tr>
</table>
</center>
<center>
<?php
If (isset($_POST['id4']) ) {
	require ('config.php');
$id4 = $_POST['id4']??"";
 $zapytanie = "SELECT * FROM tbTransakcje
 WHERE tbTransakcje.id_transakcji='$id4';"or die(mysqli_error());
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
}
?>
</center>
<center>
<table width=60%>
<tr>
<td>
<p>Wyszukaj po id transakcji</p>
<center>
	<form action=wyszukiwanie.php method="post">
<?php
require ('config.php');
$z = mysqli_query ($connect,"SELECT tbTransakcje.id_transakcji
FROM tbTransakcje
");
echo "<select  name=id4>";
echo '<option value="">'.'ID'.'</option>';
while($option = mysqli_fetch_assoc($z)) {
echo '<option value="'.$option['id_transakcji'].'">'.$option['id_transakcji'].'</option>';
}
echo '</select>';
	mysqli_close($connect);
?>
	<button type="submit">Wyszukaj</button>
	</form>
</center>
</td>
</tr>
</table>
</center>
<center>
<input type="button" value="Wróć" onclick="window.location=('index.php')" />
</center>
</section>
</body>
</html>