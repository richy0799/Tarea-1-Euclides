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
    $Red = "";
    $Minimo = 400000.0;
    
    //Variables que almacenan los valores ingresados por el usuario
    $Fiabilidad = $_POST["Fiabilidad"];
    $Links = $_POST["Links"];
    $Capacidad = $_POST["Capacidad"];
    $Costo = $_POST["Costo"];

    //Select para obtener todos los valores de la tabla redes
    $sql = "SELECT * FROM  redes";
    $query = mysqli_query($connection, $sql);

    //Recorre todos los valores traidos desde la base de datos y
    //les asigna un valor numérico 
    while ($Row = mysqli_fetch_array($query)) {

        //Variables que guardan los datos obtenidos de la base de datos
        $Fiabilidad_db = $Row['reliability'];
        $Links_db = $Row['number_of_links'];
        $Capacidad_db = $Row['capacity'];
        $Costo_db = $Row['cost'];

        //Asigna valores numericos a las variables anteriores
        if ($Capacidad_db == 'Low') {
            $Capacidad_db = 1;
        } else if ($Capacidad_db == 'Medium') {
            $Capacidad_db = 2;
        } else {
            $Capacidad_db = 3;
        }

        //Asigna valores numericos a las variables anteriores
        if ($Costo_db == 'Low') {
            $Costo_db = 1;
        } else if ($Costo_db == 'Medium') {
            $Costo_db = 2;
        } else {
            $Costo_db = 3;
        }
        
        //Resta de los valores ingresados y de la base de datos necesaria para el algoritmo
        $Resta_Fiabilidad = $Fiabilidad_db - $Fiabilidad;
        $Resta_Links = $Links_db - $Links;
        $Resta_Capacidad = $Capacidad_db - $Capacidad;
        $Resta_Costo = $Costo_db - $Costo;

        //Algoritmo de la distancia euclidiana para encontrar el tipo de red
        $Distancia_Euclidiana = sqrt(pow($Resta_Fiabilidad, 2) + pow($Resta_Links, 2) + pow($Resta_Capacidad, 2)+ pow($Resta_Costo, 2));
        if ($Distancia_Euclidiana < $Minimo) {
            $Minimo = $Distancia_Euclidiana;
            $Red = $Row['class'];
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
<form name="final" action="red.php" method="post" class="w3-display-middle">
    <br>
    <div class="w3-panel w3-border w3-round-xxlarge">
        <h3>Determinar clase de red</h3>
        <h5>Ingrese la información que se le solicita a continuación<br> y haga click en el botón Calcular para que el sistema <br>determine la clasificación de su red</h5>  
    </div>
    <br>
    <div class="w3-panel w3-border w3-round-xxlarge">
        <div class="w3-panel  w3-round-xxlarge">
            Fiabilidad:
            <select name="Fiabilidad" value="Fiabilidad">
                <option value=2>2</option>
                <option value=3>3</option>
                <option value=4>4</option>
                <option value=5>5</option>
            </select>
        </div>
        <div class="w3-panel  w3-round-xxlarge">
            Numero de links:
            <select name="Links" value="Links">
                <option value=7>7</option>
                <option value=8>8</option>
                <option value=9>9</option>
                <option value=10>10</option>
                <option value=11>11</option>
                <option value=12>12</option>
                <option value=13>13</option>
                <option value=14>14</option>
                <option value=15>15</option>
                <option value=16>16</option>
                <option value=17>17</option>
                <option value=18>18</option>
                <option value=19>19</option>
                <option value=20>20</option>
            </select>
        </div>
        <div class="w3-panel  w3-round-xxlarge">
            Capacidad:
            <select name="Capacidad" value="Capacidad">
                <option value=1>Low</option>
                <option value=2>Medium</option>
                <option value=3>High</option>
            </select>
        </div>
        <div class="w3-panel  w3-round-xxlarge">
            Costo:
            <select name="Costo" value="Costo">
                <option value=1>Low</option>
                <option value=2>Medium</option>
                <option value=3>High</option>
            </select>
        </div>
        <input name="Calcular" value="Calcular" type="submit" class="w3-button w3-blue w3-border w3-round-large">
        <br><br>
        <?php echo "<font size='3'><b>RED: $Red </b></font>" ?>
        <br><br><br>
    </div>
</form>
</body></html>