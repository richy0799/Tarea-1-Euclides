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
    $Sexo = "";
    $Minimo = 400000.0;

    //Variables que almacenan los valores ingresados por el usuario
    $Estilo = $_POST["Estilo"];
    $Promedio = $_POST["Promedio"];
    $Recinto = $_POST["Recinto"];

    //Select para obtener todos los valores de la tabla estilo_sexo_promedio_recinto
    $sql = "SELECT * FROM  estilo_sexo_promedio_recinto";
    $query = mysqli_query($connection, $sql);

    //Recorre todos los valores traidos desde la base de datos y
    //les asigna un valor numérico 
    while ($Row = mysqli_fetch_array($query)) {

        //Variables que guardan los datos obtenidos de la base de datos
        $Estilo_db = $Row['estilo'];
        $Promedio_db = $Row['promedio'];
        $Recinto_db = $Row['recinto'];

        //Asigna valores numericos a las variables anteriores
        if ($Recinto_db == 'Paraíso') {
            $Recinto_db = 1;
        } else {
            $Recinto_db = 2;
        };

        //Asigna valores numericos a las variables anteriores
        if ($Estilo_db == 'Divergente') {
            $Estilo_db = 1;
        } else if ($Estilo_db == 'Convergente') {
            $Estilo_db = 2;
        } else if ($Estilo_db == 'Asimilador') {
            $Estilo_db = 3;
        } else {
            $Estilo_db = 4;
        }

        //Resta de los valores ingresados y de la base de datos necesaria para el algoritmo
        $Resta_Estilo = $Estilo_db - $Estilo;
        $Resta_Promedio = $Promedio_db - $Promedio;
        $Resta_Recinto = $Recinto_db - $Recinto;

        //Algoritmo de la distancia euclidiana para encontrar el sexo
        $Distancia_Euclidiana = sqrt(pow($Resta_Estilo, 2) + pow($Resta_Promedio, 2) + pow($Resta_Recinto, 2));
        if ($Distancia_Euclidiana < $Minimo) {
            $Minimo = $Distancia_Euclidiana;
            $Sexo = $Row['sexo'];
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
<form name="final" action="sexo.php" method="post" class="w3-display-middle">
    <br>
        <div class="w3-panel w3-border w3-round-xxlarge">
        <h3>Adivinar sexo</h3>
        <h5>Ingrese la información que se le solicita a continuación<br> y haga click en el botón Calcular para que el sistema le <br>muestre su sexo</h5>  
        </div>
    <br>
    <div class="w3-panel w3-border w3-round-xxlarge">
        <div class="w3-panel  w3-round-xxlarge">
            Seleccione su estilo de aprendizaje:
            <select name="Estilo" value="Estilo">
                <option value=1>Divergente</option>
                <option value=2>Convergente</option>
                <option value=3>Asimilador</option>
                <option value=4>Acomodador</option>
            </select>
        </div>
        <div class="w3-panel  w3-round-xxlarge">
            Ingrese su promedio:
            <input class="w3-input" type="Text" name="Promedio">
        </div>
        <div class="w3-panel  w3-round-xxlarge">
            Seleccione su recinto:
            <select name="Recinto" value="Recinto">
                <option value=1>Paraíso</option>
                <option value=2>Turrialba</option>
            </select>
        </div>
        <input name="Calcular" value="Calcular" type="submit" class="w3-button w3-blue w3-border w3-round-large">
        <br><br>
        <?php echo "<font size='3'><b>SEXO: $Sexo </b></font>" ?>
        <br><br><br>
    </div>
</form>
</body></html>