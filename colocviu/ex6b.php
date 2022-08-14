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
  font-size: 16px;
  margin: 0px 16px;
  cursor: pointer;

}
  
   body{
 
    background-color:rgb(145, 184, 255);
    

   }
</style>

  <title>ex6b</title>
  <style>
   table, th, td
   {
     border: 1px solid black;
   }
  </style>
 </head>
<body>

<?php

function nrMinMaxAvg(){

// creare variabile cu nume scurte
$anul=$_POST['an'];
$anul= trim($anul);
if (!$anul)
{
  echo '<h2>Nu s-a gasit anul</h2>';
  echo'<a href="ex6b.html"><button>Revenire la pagina anterioara</button>';


  exit;
}

if ($anul!=2021)
{
  echo '<h2>Nu ati introdus  anul 2021.</h2>';
  echo'<a href="ex6b.html"><button>Revenire la pagina anterioara</button>';

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
$query = "SELECT ROUND(MIN(NVL(valoare_totala, 0)), 2) AS ValoareaMinima, ROUND(MAX(NVL(valoare_totala, 0)), 2) AS ValoareaMaxima, ROUND(AVG(NVL(valoare_totala, 0)), 2) AS ValoareaMedie
FROM Factura
WHERE  SUBSTR(data, 1, 4)='2021';";

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
        <th>ValoareaMinima</th>
        <th>ValoareaMaxima</th>
        <th>ValoareaMedie</th>
        
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['ValoareaMinima']).'</td>';
  echo '<td>'.stripslashes($row['ValoareaMaxima']).'</td>';
  echo '<td>'.stripslashes($row['ValoareaMedie']).'</td></tr>';
}
echo '</table>';
// deconectarea de la BD
mysqli_close($connect);
}

//apel functie:
nrMinMaxAvg();

?>
<br>
<center><table>

<td><a href="pagina_principala.php"><button>Revenire la pagina principala</button></a></td>
<td><a href="end.html"><button>Pagina de final</button></a></td>
</table></center>

</body>
</html>
