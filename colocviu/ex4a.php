<html>
 <head>

 <style>
    h1
    {
      background-color:rgb(45, 128, 223);
text-align:center;

    }
   
    h2{
      background-color: rgb(255, 0, 0);
      text-align:center;
      color: rgb(0, 0, 0);
        text-align:center;
        font-size: 50px;
       
    }



button {
  border: none;
  color: rgb(118, 165, 218);
  padding: 10px 260px;
  text-align:center;

  font-size: 36px;
  margin: 0px 160px;


}
  
   body{
 
    background-color:rgb(145, 184, 255);
    

   }
</style>

  <title>ex4a</title>
  <style>
   table, th, td
   {
     border: 1px solid black;
   }
  </style>
 </head>
<body>
 
<?php

function clienti(){

// creare variabile cu nume scurte
$localitati=$_POST['localitati'];
$localitati= trim($localitati);

if (!$localitati)
{
  echo '<h2>Nu s-au gasit localitatile.</h2>';
  echo'<a href="ex4a.html"><button>Revenire la pagina anterioara</button>';

  exit;
}

if ($localitati!='Cluj-Napoca si Bistrita')
{
  echo '<h2>Nu ati introdus  localitatile: Cluj-Napoca si Bistrita</h2>';
  echo'<a href="ex4a.html"><button>Revenire la pagina anterioara</button>';
  exit;
}
//if (!get_magic_quotes_gpc())
//{
 // $valoare = addslashes($valoare);
//}

$user = 'colocviu_final';
$pass = 'colocviu_final';
$host = 'localhost';
$db_name = 'colocviu';

// se conectează la BD

$connect = mysqli_connect($host, $user, $pass, $db_name);
// se verifică dacă a funcţionat conectarea
if ($connect->connect_error)
{
  die('Eroare la conectare: ' . $connect->connect_error);
}
// se emite interogarea
$query = "SELECT distinct nume FROM localitate l1, localitate l2, Client NATURAL JOIN Factura NATURAL JOIN Difuzare WHERE lower(l1.denumire)='cluj-napoca' and lower(l2.denumire)='bistrita'";

$result = mysqli_query($connect, $query);

// verifică dacă rezultatul este în regulă
if (!$result)
{
  die('Interogare gresita: ' . mysqli_error());
}
// se obţine numărul tuplelor returnate

$num_results = mysqli_num_rows($result);

// se afişează fiecare tuplă returnată
echo '<table style="width:100%">
  <tr>
        <th>Nume clienti</th>
    
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['nume']).'</td></tr>';
  
}
echo '</table>';
// deconectarea de la BD
mysqli_close($connect);
}
clienti();
?>

<a href="pagina_principala.php"><button>Revenire la pagina principala</button></a>

</body>
</html>
