<?php

/*
  Tarea 1: Algoritmo de la Distancia Euclidiana
  Ricardo Chinchila Gonzalez
  B72204
  2022
*/

error_reporting(E_ERROR | E_PARSE);
//Conexion con la base de datos
include("database_connection.php");

//if al que se accede al hacer click en el boton
if (isset($_POST["Calcular"])) {

  //Declaracion de la variable del resultado final
  $Estilo = "";
  $Minimo = 300000.0;

  //Variables que almacenan los valores ingresados por el usuario
  $Recinto = $_POST["Recinto"];
  $Promedio = $_POST["Promedio"];
  $Sexo = $_POST["Sexo"];

  //Select para obtener todos los valores de la tabla estilo_sexo_promedio_recinto
  $sql = "SELECT * FROM  estilo_sexo_promedio_recinto";
  $query = mysqli_query($connection, $sql);

  //Recorre todos los valores traidos desde la base de datos 
  while ($Row = mysqli_fetch_array($query)) {

    //Variables que guardan los datos obtenidos de la base de datos
    $Recinto_db = $Row['recinto'];
    $Promedio_db = $Row['promedio'];
    $Sexo_db = $Row['sexo'];

    //Asigna valores numericos a las variables anteriores
    if ($Recinto_db == 'Paraíso') {
      $Recinto_db = 1;
    } else {
      $Recinto_db = 2;
    };
    //Asigna valores numericos a las variables anteriores
    if ($Sexo_db == 'F') {
      $Sexo_db = 1;
    } else {
      $Sexo_db = 2;
    }
    
    //Resta de los valores ingresados y de la base de datos necesaria para el algoritmo
    $Resta_Recinto = $Recinto_db - $Recinto;
    $Resta_Promedio = $Promedio_db - $Promedio;
    $Resta_Sexo = $Sexo_db - $Sexo;
    
    //Algoritmo de la distancia euclidiana para encontrar el estilo de aprendizaje
    $Distancia_Euclidiana = sqrt(pow($Resta_Recinto, 2) + pow($Resta_Promedio, 2) + pow($Resta_Sexo, 2));
    if ($Distancia_Euclidiana < $Minimo) {
      $Minimo = $Distancia_Euclidiana;
      $Estilo = $Row['estilo'];
    }
  }
}
?>

<html><head>
  <?php include 'navbar.php'; ?>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>Tarea 1 Euclides</title>
  <meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">
  <meta name="generator" content="Bluefish 2.2.2" >
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
  <form name="final" action="estilo.php" method="post" class="w3-display-middle">
    <br>
    <div class="w3-panel w3-border w3-round-xxlarge">
      <h3>Adivinar estilo de aprendizaje</h3>
      <h5>Ingrese la información que se le solicita a continuación<br> y haga click en el botón Calcular para que el sistema le <br>muestre su estilo de aprendizaje</h5>  
    </div>
    <br>
    <div class="w3-panel w3-border w3-round-xxlarge">
      <div class="w3-panel  w3-round-xxlarge">
        Seleccione su recinto:
        <select name="Recinto" value="Recinto">
          <option value=1>Paraíso</option>
          <option value=2>Turrialba</option>
        </select>
      </div>
      <div class="w3-panel  w3-round-xxlarge">
        Ingrese su promedio:
        <input class="w3-input" type="Text" name="Promedio"></p>
      </div>
      <div class="w3-panel w3-round-xxlarge">
        Seleccione su sexo:
        <select name="Sexo" value="Sexo">
          <option value=1>Femenino</option>
          <option value=2>Masculino</option>
        </select>
      </div>
      <input class="w3-button w3-blue w3-border w3-round-large" name="Calcular" value="Calcular" type="submit" >
      <br><br>
      <?php echo "<font size='3'><b>ESTILO: $Estilo </b></font>" ?></p>
      <br><br><br>
    </div>
  </form>
</body></html>