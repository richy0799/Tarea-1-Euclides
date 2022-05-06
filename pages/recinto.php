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
    $Recinto = "";
    $Minimo = 300000.0;

    //Variables que almacenan los valores ingresados por el usuario
    $Sexo = $_POST["Sexo"];
    $Estilo = $_POST["Estilo"];
    $Promedio = $_POST["Promedio"];

    //Select para obtener todos los valores de la tabla estilo_sexo_promedio_recinto
    $sql = "SELECT * FROM  estilo_sexo_promedio_recinto";
    $query = mysqli_query($connection, $sql);

    //Recorre todos los valores traidos desde la base de datos y
    //les asigna un valor numérico 
    while ($Row = mysqli_fetch_array($query)) {

        //Variables que guardan los datos obtenidos de la base de datos
        $Sexo_db = $Row['sexo'];
        $Promedio_db = $Row['promedio'];
        $Estilo_db = $Row['estilo'];

        //Asigna valores numericos a las variables anteriores
        if ($Sexo_db == 'F') {
            $Sexo_db = 1;
        } else {
            $Sexo_db = 2;
        }

        //Asigna valores numericos a las variables anteriores
        if ($Estilo_db == 'DIVERGENTE') {
            $Estilo_db = 1;
        } else if ($Estilo_db == 'CONVERGENTE') {
            $Estilo_db = 2;
        } else if ($Estilo_db == 'ASIMILADOR') {
            $Estilo_db = 3;
        } else {
            $Estilo_db = 4;
        }

        //Resta de los valores ingresados y de la base de datos necesaria para el algoritmo
        $Resta_Sexo = $Sexo_db - $Sexo;
        $Resta_Promedio = $Promedio_db - $Promedio;
        $Resta_Estilo = $Estilo_db - $Estilo;

        //Algoritmo de la distancia euclidiana para encontrar el recinto
        $Distancia_Euclidiana = sqrt(pow($Resta_Sexo, 2) + pow($Resta_Promedio, 2) + pow($Resta_Estilo, 2));
        if ($Distancia_Euclidiana < $Minimo) {
            $Minimo = $Distancia_Euclidiana;
            $Recinto = $Row['recinto'];
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
    <form name="final" action="recinto.php" method="post" class="w3-display-middle">
        <br>
            <div class="w3-panel w3-border w3-round-xxlarge">
            <h3>Adivinar recinto</h3>
            <h5>Ingrese la información que se le solicita a continuación<br> y haga click en el botón Calcular para que el sistema le <br>muestre su recinto de origen</h5>  
            </div>
        <br>
        <div class="w3-panel w3-border w3-round-xxlarge">
            <div class="w3-panel w3-round-xxlarge">
                Seleccione su estilo de aprendizaje:
                <select name="Estilo" value="Estilo">
                    <option value=1>Divergente</option>
                    <option value=2>Convergente</option>
                    <option value=3>Asimilador</option>
                    <option value=4>Acomodador</option>
                </select>
            </div>
            <div class="w3-panel w3-round-xxlarge">
                Ingrese su promedio:
                <input class="w3-input" type="Text" name="Promedio"><br>
            </div>
            <div class="w3-panel w3-round-xxlarge">
                Seleccione su sexo:
                <select name="Sexo" value="Sexo">
                    <option value=1>Femenino</option>
                    <option value=2>Masculino</option>
                </select>
            </div>
            <input name="Calcular" value="Calcular" type="submit" class="w3-button w3-blue w3-border w3-round-large">
            <br><br>
            <?php echo "<font size='3'><b>RECINTO: $Recinto </b></font>" ?>
            <br><br><br>
        </div>
    </form>
</body></html>
