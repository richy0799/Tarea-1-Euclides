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
        $Profesor = "";
        $Minimo = 300000.0;

        //Variables que almacenan los valores ingresados por el usuario
        $A = $_POST["A"];        $B = $_POST["B"];        $C = $_POST["C"];
        $D = $_POST["D"];        $E = $_POST["E"];        $F = $_POST["F"];
        $G = $_POST["G"];        $H = $_POST["H"];

        //Select para obtener todos los valores de la tabla profesores
        $sql = "SELECT * FROM  profesores";
        $query = mysqli_query($connection, $sql);

        //Recorre todos los valores traidos desde la base de datos 
        while ($Row = mysqli_fetch_array($query)) {

                //Variables que guardan los valores obtenidos de la base de datos
                $A_db = $Row['a'];
                $B_db = $Row['b'];
                $C_db = $Row['c'];
                $D_db = $Row['d'];
                $E_db = $Row['e'];
                $F_db = $Row['f'];
                $G_db = $Row['g'];
                $H_db = $Row['h'];

                //Asigna valores numericos a las variables anteriores
                if ($B_db == 'F') {
                        $B_db = 1;
                } else if ($B_db == 'F') {
                        $B_db = 2;
                } else {
                        $B_db = 3;
                };

                //Asigna valores numericos a las variables anteriores
                if ($C_db == 'B') {
                        $C_db = 1;
                } else if ($C_db == 'I') {
                        $C_db = 2;
                } else {
                        $C_db = 3;
                };

                //Asigna valores numericos a las variables anteriores
                if ($E_db == 'DM') {
                        $E_db = 1;
                } else if ($E_db == 'ND') {
                        $E_db = 2;
                } else {
                        $E_db = 3;
                };

                //Asigna valores numericos a las variables anteriores
                if ($F_db == 'L') {
                        $F_db = 1;
                } else if ($F_db == 'A') {
                        $F_db = 2;
                } else {
                        $F_db = 3;
                };

                //Asigna valores numericos a las variables anteriores
                if ($G_db == 'N') {
                        $G_db = 1;
                } else if ($G_db == 'S') {
                        $G_db = 2;
                } else {
                        $G_db = 3;
                };

                //Asigna valores numericos a las variables anteriores
                if ($H_db == 'N') {
                        $H_db = 1;
                } else if ($H_db == 'S') {
                        $H_db = 2;
                } else {
                        $H_db = 3;
                };

                //Resta de los valores ingresados y de la base de datos necesaria para el algoritmo
                $Resta_A = $A_db - $A;
                $Resta_B = $B_db - $B;
                $Resta_C = $C_db - $C;
                $Resta_D = $D_db - $D;
                $Resta_E = $E_db - $E;
                $Resta_F = $F_db - $F;
                $Resta_G = $G_db - $G;
                $Resta_H = $H_db - $H;

                //Algoritmo de la distancia euclidiana para encontrar el tipo de profesor
                $Distancia_Euclidiana = sqrt(pow($Resta_A, 2) + pow($Resta_B, 2) + pow($Resta_C, 2) + pow($Resta_D, 2) + pow($Resta_E, 2) + pow($Resta_F, 2) + pow($Resta_G, 2) + pow($Resta_H, 2));
                if ($Distancia_Euclidiana < $Minimo) {
                $Minimo = $Distancia_Euclidiana;
                $Profesor = $Row['class'];
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
        <p>
        <form name="final" action="profesor.php" method="post" class="w3-display-middle">
              
                <div class="w3-panel w3-border w3-round-xxlarge">
                        <h3>Determinar tipo de profesor</h3>
                        <h5>Ingrese la información que se le solicita a continuación<br> y haga click en el botón Calcular para que el sistema <br>determine el tipo de profesor</h5>  
                
                </div>
              
                <div class="w3-panel w3-border w3-round-xxlarge">
                        <div class="w3-panel w3-round-xxlarge">
                                Edad:
                                <select name="A" value="A">
                                        <option value=1>edad <= 30</option>
                                        <option value=2>edad > 30 & <= 55</option>
                                        <option value=3>edad > 55</option>
                                </select>
                        </div>
                        <div class="w3-panel w3-round-xxlarge">
                                Sexo:
                                <select name="B" value="B">
                                        <option value=1>Femenino</option>
                                        <option value=2>Masculino</option>
                                        <option value=3>NA</option>
                                </select>
                        </div>
                        <div class="w3-panel  w3-round-xxlarge">
                                Autoevaluacion:
                                <select name="C" value="C">
                                        <option value=1>Begginer</option>
                                        <option value=2>Intermediate</option>
                                        <option value=3>Advanced</option>
                                </select>
                        </div>
                        <div class="w3-panel  w3-round-xxlarge">
                                Veces impartidas:
                                <select name="D" value="D">
                                        <option value=1>Nunca</option>
                                        <option value=2>1 a 5</option>
                                        <option value=3>más de 5</option>
                                </select>
                        </div>
                        <div class="w3-panel  w3-round-xxlarge">
                                Disciplina/Especializacion:
                                <select name="E" value="E">
                                        <option value=1>Decision-making</option>
                                        <option value=2>Network Design</option>
                                        <option value=3>Other</option>
                                </select>
                        </div>
                        <div class="w3-panel  w3-round-xxlarge">
                                Hablilidad con computadoras:
                                <select name="F" value="F">
                                        <option value=1>Baja</option>
                                        <option value=2>Media</option>
                                        <option value=3>Alta</option>
                                </select>
                        </div>
                        <div class="w3-panel  w3-round-xxlarge">
                                Experiencia enseñanza via web:
                                <select name="G" value="G">
                                        <option value=1>Nunca</option>
                                        <option value=2>Algunas veces</option>
                                        <option value=3>A menudo</option>
                                </select>
                        </div>
                        <div class="w3-panel  w3-round-xxlarge">
                                Experiencia usando sitios web:
                                <select name="H" value="H">
                                        <option value=1>Nunca</option>
                                        <option value=2>Algunas veces</option>
                                        <option value=3>A menudo</option>
                                </select>
                        </div>
                        <input name="Calcular" value="Calcular" type="submit" class="w3-button w3-blue w3-border w3-round-large">
                        <br><br>
                        <?php echo "<font size='3'><b>PROFESOR: $Profesor</b></font>" ?>
                        <br><br><br>
                </div>
        </form>
</p>
</body></html>