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


  <title>EX6a</title>
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

//crearea unei functii:

function afiseazaNumarulDePagini(){

// creare variabile cu nume scurte
$anul=$_POST['an'];
$anul= trim($anul);
if (!$anul)
{
  echo '<h2>Nu s-a gasit anul</h2>';
  echo'<a href="ex6a.html"><button>Revenire la pagina anterioara</button>';

  exit;
}

if ($anul!=2021)
{
  echo '<h2>Nu ati introdus  anul 2021.</h2>';
  echo'<a href="ex6a.html"><button>Revenire la pagina anterioara</button>';

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



$query = "SELECT DISTINCT zi, sum(nvl(nr_pagini, 0)) AS Pagini
          FROM Factura   right  outer JOIN  septembrie ON ZI =SUBSTR(data, 9, 10)
          JOIN  Difuzare ON FACtURA.ID_F = Difuzare.ID_f
          right JOIN  Localitate ON Difuzare.ID_l = Localitate.id_l
            
          WHERE UPPER(SUBSTR(data, 1, 7)) ='2021-09'
          GROUP BY  data, denumire, zi , nr_pagini 
          union
           SELECT DISTINCT zi, sum(nvl(nr_pagini, 0)) AS Pagini
          FROM Factura   right  outer JOIN  septembrie ON ZI =SUBSTR(data, 9, 10)
          GROUP BY   zi 
          order by zi";

$result = mysqli_query($connect, $query);

// verifică dacă rezultatul este în regulă

$num_results = mysqli_num_rows($result);
//$num_results =1;
// se afişează fiecare tuplă returnată
echo '<table style="width:100%">
  <tr>
        <th>zi</th>
        <th>Pagini</th>
  </tr>';
for ($i = 0; $i < $num_results; $i++)
{
  $row = mysqli_fetch_assoc($result);
  
  echo '<tr><td>'.stripslashes($row['zi']).'</td>';
  echo '<td>'.stripslashes($row['Pagini']).'</td></tr>';
}
echo '</table>';




// deconectarea de la BD
mysqli_close($connect);
}
afiseazaNumarulDePagini();
?>
<br/>
<a href="pagina_principala.php"><button>Revenire la pagina principala</button></a>

</body>
</html>
