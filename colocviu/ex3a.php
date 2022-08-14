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

 
  <title>ex3a</title>
  <style>
   table, th, td
   {
     border: 1px solid black;
   }

   </style>
<body>
 <h1></h1>
<?php

function detaliiFactura(){
// creare variabile cu nume scurte
$valoare=$_POST['valoare'];
$valoare= trim($valoare);
if (!$valoare)
{
  echo '<h2>Nu s-a introdus valoarea.</h2>';
  
 echo'<a href="ex3a.html"><button>Revenire la pagina anterioara</button>';
  exit;
}

if ($valoare!=150)
{
  echo '<h2>Nu s-a introdus cifra 150. Incercati din nou</h2>';
  echo'<a href="ex3a.html"><button>Revenire la pagina anterioara<button>';
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
$query = "SELECT id_f, data, nr_pagini, cost_pagina, nr_zile, valoare, tva, id_c FROM Factura WHERE valoare< $valoare  ORDER BY  DATA ASC, valoare DESC";
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
        <th>nr_crt</th>
        <th>Id_f</th>
	      <th>data</th>
        <th>nr_pagini</th>
        <th>cost_pagina</th>
      	<th>nr_zile</th>
        <th>valoare</th>
        <th>tva</th>
        <th>id_c</th>
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.($i+1).'</td>';
  echo '<td>'.stripslashes($row['id_f']).'</td>';
  echo '<td>'.stripslashes($row['data']).'</td>';
  echo '<td>'.stripslashes($row['nr_pagini']).'</td>';
  echo '<td>'.stripslashes($row['cost_pagina']).'</td>';
  echo '<td>'.stripslashes($row['nr_zile']).'</td>';
  echo '<td>'.stripslashes($row['valoare']).'</td>';
  echo '<td>'.stripslashes($row['tva']).'</td>';
  echo '<td>'.stripslashes($row['id_c']).'</td></tr>';
  
}
echo '</table>';
// deconectarea de la BD
mysqli_close($connect);
}


detaliiFactura();

?>
<br/>
<a href="pagina_principala.php"><button>Revenire la pagina principala</button></a>

</body>
</html>
