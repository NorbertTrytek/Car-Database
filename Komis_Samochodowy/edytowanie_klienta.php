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
	<form action=edytowanie_klienta.php method="post">
<?php
require ('config.php');
$z = mysqli_query ($connect,"SELECT tbKlienci.id_klienta
FROM tbKlienci
");
echo "<select  name=id>";
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
<p>Edytuj klienta</p>
<center>
	<form action=edytowanie_klienta.php method="post">
<?php
If (isset($_POST['id']) ) {
	require ('config.php');
$id = $_POST['id']??"";
 $zapytanie = "SELECT * FROM tbKlienci
 WHERE tbKlienci.id_klienta='$id';"or die(mysqli_error());
  $wynik = mysqli_query($connect,$zapytanie);
echo  '<table width=80%>';
    echo '<tr>';
    echo '<td>ID</td>';
    echo '<td>NAZWISKO</td>';
    echo '<td>IMIE</td>';
    echo '<td>DATA URODZENIA</td>';
    echo '<td>PESEL</td>';
    echo '<td>KOD POCZTOWY</td>';
    echo '<td>MIASTO</td>';
      echo'</tr>';
   while ($row = mysqli_fetch_assoc($wynik)) {
    echo '<tr>';
    echo '<td><input type="text" name="id_klienta" placeholder="klient" value="'.$row["id_klienta"].'" readonly></td>';
    echo '<td><input type="text" name="nazwisko" placeholder="nazwisko" value="'.$row["nazwisko"].'"></td>';
    echo '<td><input type="text" name="imie" placeholder="imie" value="'.$row["imie"].'"></td>';
    echo '<td><input type="date" name="data_ur" placeholder="data urodzenia" value="'.$row["data_ur"].'"></td>';
    echo '<td><input type="text" name="pesel" placeholder="pesel" value="'.$row["pesel"].'"></td>';
    echo '<td><input type="text" name="kod_pocztowy" placeholder="kod pocztowy" value="'.$row["kod_pocztowy"].'"></td>';
    echo '<td><input type="text" name="miasto" placeholder="miasto" value="'.$row["miasto"].'"></td>';
      echo'</tr>';
	  echo '<tr>';
    echo '<td>ULICA</td>';
    echo '<td>NR DOMU</td>';
    echo '<td>TELEFON</td>';
    echo '<td>MAIL</td>';
    echo '<td>RODZAJ DOKUMENTU</td>';
    echo '<td>NR DOKUMENTU</td>';
      echo'</tr>';
	      echo '<tr>';
    echo '<td><input type="text" name="ulica" placeholder="ulica" value="'.$row["ulica"].'"></td>';
    echo '<td><input type="text" name="nr_domu" placeholder="nr domu" value="'.$row["nr_domu"].'"></td>';
    echo '<td><input type="text" name="telefon" placeholder="telefon" value="'.$row["telefon"].'"></td>';
    echo '<td><input type="text" name="mail" placeholder="mail" value="'.$row["mail"].'"></td>';
    echo '<td><input type="text" name="rodzaj_dok" placeholder="rodzaj dokumentu" value="'.$row["rodzaj_dok"].'"></td>';
    echo '<td><input type="text" name="nr_dok" placeholder="nr dokumentu" value="'.$row["nr_dok"].'"></td>';
      echo'</tr>';
   }

echo'</table>';

}
?>
</center>
<?php
If (isset($_POST['id_klienta'])) {
	require ('config.php');
$id_klienta = $_POST['id_klienta'];
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



$zapytanie ="UPDATE tbklienci SET nazwisko = '$nazwisko', imie = '$imie', data_ur = '$data_ur', pesel = '$pesel', kod_pocztowy = '$kod_pocztowy', 
miasto = '$miasto', ulica = '$ulica', nr_domu = '$nr_dok', telefon = '$telefon', mail = '$mail', rodzaj_dok = '$rodzaj_dok', nr_dok = '$nr_dok' WHERE tbklienci.id_klienta = $id_klienta;"or die(mysqli_error());
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
<input type="button" value="Wróć" onclick="window.location=('klienci.php')" />
<input type="button" value="Wróć do głównej" onclick="window.location=('index.php')" />
</center>
</section>
</body>
</html>