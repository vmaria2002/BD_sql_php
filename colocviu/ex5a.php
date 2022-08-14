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

  <title>ex5a</title>
  <style>
   table, th, td
   {
     border: 1px solid black;
   }
  </style>
 </head>
<body>
 
<?php

function localitati(){
// creare variabile cu nume scurte
$valoare=$_POST['valoare'];
$valoare= trim($valoare);

$LunaSiAnul=$_POST['LunaSiAnul'];
$LunaSiAnul= trim($LunaSiAnul);

if (!$valoare || !$LunaSiAnul )
{
  echo '<h2>Nu s-a gasit valoarea sau LunaSiAnul</h2>';
  echo'<a href="ex5a.html"><button>Revenire la pagina anterioara</button>';


  exit;
}

if ($valoare!='200' || $LunaSiAnul!='septembrie 2021')
{
  echo '<h2>Nu ati introdus valoarea 200 si luna septembrie, anul 2021.</h2>';
  echo'<a href="ex5a.html"><button>Revenire la pagina anterioara</button>';

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
$query = " SELECT  distinct upper(l.denumire) as den ,upper( f.valoare) as val 
          FROM Factura f  JOIN Difuzare d ON  f.id_f = d.id_f
           JOIN Localitate l ON l.id_l = d.id_l
            WHERE d.id_f in (SELECT id_f  FROM Difuzare   WHERE exists( select* from difuzare where lower(substr(datai, 1, 7))='2021-09' OR lower(substr(datas, 1, 7))='2021=09')) and f.valoare  in (select valoare from factura where valoare> ALL (SELECT ff.valoare  FROM Factura ff WHERE ff.valoare < 200))";

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
        <th>valoare</th>
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['den']).'</td>';
  echo '<td>'.stripslashes($row['val']).'</td></tr>';
}
echo '</table>';
// deconectarea de la BD
mysqli_close($connect);
}

localitati();

?>
<br/>
<a href="pagina_principala.php"><button>Revenire la pagina principala</button></a>

</body>
</html>
