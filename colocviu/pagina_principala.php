<html>
 <head>

 <style>
 h1
    {
        color:rgb(255, 39, 0);

        text-align:center;
        font-size: 50px;
    }
   

    body
{
    background-image: url("frame_body.png");
    background-repeat: no-repeat;
}

button {
  border: none;
  color: rgb(255, 39, 0);
  padding: 5px 5px;
  text-align:center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 5px 7px;
  cursor: pointer;

}




 </style>

  <title>paginaPrincipala</title>
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


$user = 'colocviu_final';
$pass = 'colocviu_final';
$host = 'localhost';
$db_name = 'colocviu';

 $connect = mysqli_connect($host, $user, $pass, $db_name);
 if (mysqli_connect_errno())
 {
  echo 'Eroare de conectare la BD:'.mysqli_connect_error();
  exit();
 }

?>
<html>
<body>
<h1>Pagina principala
</br>Colocviu final-subiect S02
</br>
</br> Vasilache Maria, grupa 30228
</h1>
<?php

?>
<br/>
<a href="ex3a.html"><button> Rezolvare ex3-a </button></a></br>
<a href="ex3b.html"><button> Rezolvare ex3-b </button></a></br>
<a href="ex4a.html"><button> Rezolvare ex4-a </button></a></br>
<a href="ex4b.html"><button> Rezolvare ex4-b </button></a></br>
<a href="ex5a.html"><button> Rezolvare ex5-a </button></a></br>
<a href="ex5b.html"><button> Rezolvare ex5-b </button></a></br>
<a href="ex6a.html"><button> Rezolvare ex6-a </button></a></br>
<a href="ex6b.html"><button> Rezolvare ex6-b </button></a></br>


</body>
</html>