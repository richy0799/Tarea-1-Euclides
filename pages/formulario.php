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

        //Variables que guardan las opciones seleccionadas en la tabla
        $EC = (int)$_POST["c5"] + (int)$_POST["c9"] + (int)$_POST["c13"] + (int)$_POST["c17"] + (int)$_POST["c25"] + (int)$_POST["c29"];
        $OR = (int)$_POST["c2"] + (int)$_POST["c10"] + (int)$_POST["c22"] + (int)$_POST["c26"] + (int) $_POST["c30"] + (int)$_POST["c34"];
        $CA = (int)$_POST["c7"] + (int)$_POST["c11"] + (int)$_POST["c15"] + (int)$_POST["c19"] + (int) $_POST["c31"] + (int)$_POST["c35"];
        $EA = (int)$_POST["c4"] + (int)$_POST["c12"] + (int)$_POST["c24"] + (int)$_POST["c28"] + (int)$_POST["c32"] + (int)$_POST["c36"];

        //Declaracion de la variable del resultado final
        $Estilo = "";
        $Minimo = 400000.0;

        //Select para obtener todos los valores de la tabla recinto_estilo
        $sql = "SELECT * FROM recinto_estilo";
        $query = mysqli_query($connection, $sql);

        //Recorre todos los valores traidos desde la base de datos
        while ($Row = mysqli_fetch_array($query)) {

                //Resta de los valores seleccionados y de la base de datos necesaria para el algoritmo
                $Resta_EC = $Row['ec'] - $EC;
                $Resta_OR = $Row['or'] - $OR;
                $Resta_CA = $Row['ca'] - $CA;
                $Resta_EA = $Row['ea'] - $EA;
                
                //Algoritmo de la distancia euclidiana para encontrar el estilo de aprendizaje
                $Distancia_Euclidiana = sqrt(pow($Resta_EC, 2) + pow($Resta_OR, 2) + pow($Resta_CA, 2) + pow($Resta_EA, 2));
                if ($Distancia_Euclidiana < $Minimo) {
                        $Minimo = $Distancia_Euclidiana;
                        $Estilo = $Row['estilo'];
                }
        }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
<html><head>
  <?php include 'navbar.php'; ?>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <title>Tarea 1 Euclides</title>
  <meta http-equiv="CONTENT-TYPE" content="text/html; charset=utf-8">
  <meta name="generator" content="Bluefish 2.2.2" >
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
</head>
<body>
<p><b>¿CUAL ES SU ESTILO DE APRENDIZAJE?</b></p>
<p><b>Instrucciones:</b></p>
<p> Para utilizar el instrumento usted debe conceder una calificación alta a aquellas palabras que mejor caracterizan la forma en que usted aprende, y una calificación baja a las palabras que menos caracterizan su estilo de aprendizaje.</p>
<p> Le puede ser difícil seleccionar las palabras que mejor describen su estilo de aprendizaje, ya que no hay respuestas correctas o incorrectas.</p>
<p> Todas las respuestas son buenas, ya que el fin del instrumento es describir cómo y no juzgar su habilidad para aprender.</p>
<p> De inmediato encontrará nueve series o líneas de cuatro palabras cada una. Ordene de mayor a menor cada serie o juego de cuatro palabras que hay en cada línea, ubicando 4 en la palabra que mejor caracteriza su estilo de aprendizaje, un 3 en la palabra siguiente en cuanto a la correspondencia con su estilo; a la siguiente un 2, y un 1 a la palabra que menos caracteriza su estilo. Tenga cuidado de ubicar un número distinto al lado de cada palabra en la misma línea.</p>
<p><b>No olvide escribir su CARNET, seleccionar género y recinto y hacer click en los botones CALCULAR, para que vea el resultado, y en el botón ENVIAR para guardarlo...  Mil gracias !</b></p>
<h3>Yo aprendo...</h3>
<form name="formulario" action="formulario.php" method="post">
        <table style="text-align: left; width: 100%;" border="1" cellpadding="2" cellspacing="2">
                <tbody>
                        <tr>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c1">
                                        <option value="1">1</option>  
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        discerniendo<br>
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c2">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        ensayando<br>
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c3">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        involucrándome
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c4">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        practicando
                                </td>
                        </tr>
                        <tr>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c5">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        receptivamente 
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c6">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        relacionando 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c7">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        analíticamente 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c8">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        imparcialmente 
                                </td>
                        </tr>
                        <tr>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c9">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        sintiendo 
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c10">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        observando 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c11">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        pensando 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c12">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        haciendo 
                                </td>
                        </tr>
                        <tr>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c13">
                                        <option value="1">1</option>   
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        aceptando 
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c14">
                                        <option value="1">1</option>   
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        arriesgando 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c15">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        evaluando 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c16">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        con cautela 
                                </td>
                        </tr>
                        <tr>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c17">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        intuitivamente 
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c18">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        productivamente 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c19">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        lógicamente 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c20">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        cuestionando 
                                </td>
                        </tr>
                        <tr>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c21">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        abstracto 
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c22">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        observando 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c23">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        concreto 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c24">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        activo 
                                </td>
                        </tr>
                        <tr>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c25">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        orientado al presente 
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c26">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        reflexivamente 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c27">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        orientado hacia el futuro 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c28">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        pragmático 
                                </td>
                        </tr>
                        <tr>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c29">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        aprendo más de la experiencia 
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c30">
                                        <option value="1">1</option>   
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        aprendo más de la observación 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c31">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        aprendo más de la conceptualización 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c32">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        aprendo más de la experimentación 
                                </td>
                        </tr>
                        <tr>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c33">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        emotivo 
                                </td>
                                <td style="vertical-align: top; width: 25%;">
                                        <select name="c34">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        reservado 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c35">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        racional 
                                </td>
                                <td style="vertical-align: top;">
                                        <select name="c36">
                                        <option value="1">1</option>    
                                        <option value="2">2</option>    
                                        <option value="3">3</option>    
                                        <option value="4">4</option>
                                        </select>
                                        abierto 
                                </td>
                        </tr>
                </tbody>
        </table>
        <br>
        <input name="Calcular" value="Calcular" type="submit" class="w3-button w3-blue w3-border w3-round-large"></input>
</form>
<form name="final" action="formulario.php" method="post" class="w3-panel w3-border w3-round-xxlarge">
        <?php echo "<font size='3'><b>ESTILO: $Estilo  </b></font>" ?>
</form>
</body></html>