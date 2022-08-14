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


  <title>ex4b </title>
  <style>
   table, th, td
   {
     border: 1px solid black;
   }
  </style>
 </head>
<body>
 
<?php

function perechiFacturi(){
// creare variabile cu nume scurte

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
$query = " SELECT DISTINCT F1.id_f AS F1,  F2.id_f AS F2
                from Factura F1 JOIN Factura f2  ON (f1.id_f <> f2.id_f) 
                JOIN Difuzare d1 ON (f1.id_f = d1.id_f)
                JOIN Localitate l1 ON (L1.id_l= d1.id_l)
                JOIN Difuzare d2 ON (f2.id_f = d2.id_f)
                JOIN Localitate l2 ON (L2.id_l= d2.id_l)
                WHERE  d1.id_l = d2.id_l and f1.id_f > f2.id_f;";

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
        <th>f1</th>
        <th>f2</th>
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['F1']).'</td>';
  echo '<td>'.stripslashes($row['F2']).'</td></tr>';
}
echo '</table>';
// deconectarea de la BD
mysqli_close($connect);
}
perechiFacturi();
?>
<br/>
<a href="pagina_principala.php"><button>Revenire la pagina principala</button></a>

</body>
</html>
