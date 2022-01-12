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
	<form action=edytowanie_transakcji.php method="post">
<?php
require ('config.php');
$z = mysqli_query ($connect,"SELECT tbTransakcje.id_transakcji
FROM tbTransakcje
");
echo "<select  name=id>";
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
<p>Edytuj transakcje</p>
<center>
	<form action=edytowanie_transakcji.php method="post">
<?php
If (isset($_POST['id']) ) {
	require ('config.php');
$id = $_POST['id']??"";
 $zapytanie = "SELECT * FROM tbTransakcje
 WHERE tbTransakcje.id_transakcji='$id';"or die(mysqli_error());
  $wynik = mysqli_query($connect,$zapytanie);
echo  '<table width=80%>';
    echo '<tr>';
    echo '<td>ID</td>';
    echo '<td>ID KLIENTA</td>';
    echo '<td>ID POJAZDU</td>';
    echo '<td>RODZAJ TRANSAKCJI</td>';
    echo '<td>KWOTA</td>';
      echo'</tr>';
   while ($row = mysqli_fetch_assoc($wynik)) {
    echo '<tr>';
    echo '<td><input type="text" name="id_transakcji" placeholder="klient" value="'.$row["id_transakcji"].'" readonly></td>';
    echo '<td><input type="text" name="id_klienta" placeholder="klient" value="'.$row["id_klienta"].'"></td>';
    echo '<td><input type="text" name="id_pojazdu" placeholder="pojazd" value="'.$row["id_pojazdu"].'"></td>';
    echo '<td><select name="rodzaj_tran">
		<option value="'.$row["rodzaj_tran"].'">'.$row["rodzaj_tran"].'</option>
		<option value="Kupno">Kupno</option>
		<option value="Sprzedaż">Sprzedaż</option>
	</select></td>';
    echo '<td><input type="text" name="kwota" placeholder="kwota" value="'.$row["kwota"].'"></td>';
      echo'</tr>';
	  echo '<tr>';
    echo '<td>NR FAKTURY</td>';
    echo '<td>SPOSÓB ZAPŁATY</td>';
    echo '<td>DATA TRANSAKCJI</td>';
    echo '<td>ZAPŁACONO</td>';
      echo'</tr>';
	      echo '<tr>';
    echo '<td><input type="text" name="nr_faktury" placeholder="nr faktury" value="'.$row["nr_faktury"].'"></td>';
    echo '<td><select name="sp_zaplaty">
		<option value="'.$row["sp_zaplaty"].'">'.$row["sp_zaplaty"].'</option>
		<option value="Przelew">Przelew</option>
		<option value="Gotówka">Gotówka</option>
	</select></td>';
    echo '<td><input type="date" name="data_transakcji" placeholder="data transakcji" value="'.$row["data_transakcji"].'"></td>';
    echo '<td><select name="zaplacono">
		<option value="'.$row["zaplacono"].'">'.$row["zaplacono"].'</option>
		<option value="Tak">Tak</option>
		<option value="Nie">Nie</option>
	</select></td>';
      echo'</tr>';
   }

echo'</table>';

}
?>
</center>
<?php
If (isset($_POST['id_transakcji'])) {
	require ('config.php');
$id_transakcji = $_POST['id_transakcji'];
$id_klienta = $_POST['id_klienta'];
$id_pojazdu = $_POST['id_pojazdu'];
$rodzaj_tran = $_POST['rodzaj_tran'];
$kwota = $_POST['kwota'];
$nr_faktury = $_POST['nr_faktury'];
$sp_zaplaty = $_POST['sp_zaplaty'];
$data_transakcji = $_POST['data_transakcji'];
$zaplacono = $_POST['zaplacono'];



$zapytanie ="UPDATE tbtransakcje SET  id_klienta = '$id_klienta', id_pojazdu = '$id_pojazdu', rodzaj_tran = '$rodzaj_tran', kwota = '$kwota', nr_faktury = '$nr_faktury', sp_zaplaty = '$sp_zaplaty', data_transakcji = '$data_transakcji', zaplacono = '$zaplacono' WHERE tbtransakcje.id_transakcji = '$id_transakcji';"or die(mysqli_error());
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
<input type="button" value="Wróć" onclick="window.location=('transakcje.php')" />
<input type="button" value="Wróć do głównej" onclick="window.location=('index.php')" />
</center>
</section>
</body>
</html>