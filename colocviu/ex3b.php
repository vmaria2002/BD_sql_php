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
  text-decoration: none;
  display: inline-block;
  font-size: 36px;
  margin: 0px 160px;
  cursor: pointer;

}
  
   body{
 
    background-color:rgb(145, 184, 255);
    

   }
</style>
  <title>Afișeze detaliile pentru facturile cu valoare sub 150 ordonat crescător după data și descrescător după valoare</title>
  <style>
   table, th, td
   {
     border: 1px solid black;
   }
  </style>
 </head>
<body>
 <h1></h1>
<?php
function localitate(){
// creare variabile cu nume scurte
$litera=$_POST['denumire'];
$litera= trim($litera);
if (!$litera)
{
  echo '<h2>Nu s-a gasit litera<h2>';
  echo'<a href="ex3b.html"><button>Revenire la pagina anterioara</button>';
  exit;
}

if ($litera!='a')
{
  echo '<h2>Nu ati introdus  litera a . Va rog sa incercati din nou.</h2>';
  echo'<a href="ex3b.html">Revenire la pagina anterioara';
  exit;
}

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
$query = "SELECT denumire FROM Localitate WHERE LOWER(denumire) LIKE '_$litera%'";

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
        <th>denumire</th>
    
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['denumire']).'</td></tr>';
  
}
echo '</table>';
// deconectarea de la BD
mysqli_close($connect);
}
localitate();
?>
<br/>
<a href="pagina_principala.php"><button>Revenire la pagina principala</button></a>

</body>
</html>
