<?php
session_start();
$nameR= $_SESSION['nickname'];
//echo $nameR;
$servidor       = "localhost";
$usuario        = "root";
$clave          = "";
$basedatos      = "reingenieria";
 
$conexion=mysql_connect ($servidor, $usuario, $clave) or die ('problema conectando porque :' . mysql_error());
mysql_select_db ($basedatos,$conexion);
 

$idMtro="SELECT idMaestro FROM maestro WHERE user='$nameR'";
$result=mysql_query($idMtro,$conexion) or die ("problema con cadena de conexion<br><b>" . mysql_error()."</b>");
$rows=mysql_fetch_array($result) ;
$id=$rows[0]; 
                        

$cadena         ="SELECT * FROM curso WHERE cursoProf=0";
$tabla          = mysql_query($cadena, $conexion) or die ("problema con cadena de conexion<br><b>" . mysql_error()."</b>");
$registros_encontrados ="";
$registros_encontrados = htmlentities($registros_encontrados, ENT_QUOTES,'UTF-8');
$registros_encontrados = mysql_num_rows($tabla);


$registros_encontrados2 ="";
$resultado2="";

    if (isset($_POST["idCurso"]))
        {
             $prof=$_POST["idCurso"];
            $message = "ID Curso Recibido $prof";
            $insert="UPDATE curso SET cursoProf=$id WHERE idCurso=$prof";
            mysql_query($insert);
        }


?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/homeAdmin.css" rel="stylesheet">
        <script type="text/javascript" src="../JS/tablesorterPlugin/jquery-latest.js"></script>
        <script type="text/javascript" src="../JS/tablesorterPlugin/jquery.tablesorter.js"></script>
    </head>
    <body>
        <ul>
            <li><a href="home.php" >Horarios</a></li>
            <li><a href="aceptarCurso.php" class="active">Cursos Disponibles</a></li>
            <li><a href="loginCursos.php">LogOut</a></li>
            <li><a class="active" ;>Usuario : <?php echo $nameR?></a></li>
        </ul>
        <div class="table-title">
        </div>
        <table class="table-fill" id="myTable">
        <thead>
            <tr>
                <th class="text-left">Id</th>
                <th class="text-left">Nombre</th>
                <th class="text-left">Precio</th>
                <th class="text-left">Inicio</th>
                <th class="text-left">Final</th>
                <th class="text-left">Horas</th>
                <th class="text-left">Dias</th>
                <th class="text-left">Aceptar Curso</th>
            </tr>
        </thead>
        <br><br>
        <tbody class="table-hover">
           <tr>
            <?php
                while ($registro = mysql_fetch_array($tabla)){   
            ?>
                <td class="text-left0">
            <?php
               echo $registro['idCurso'];
            ?>
                </td>
                <td class="text-left0">
            <?php
               echo $registro['nombre'];
            ?>
                </td>
                <td class="text-left0">
            <?php
               echo $registro['precio'];
            ?>
                </td> 
                <td class="text-left0">
            <?php
               echo $registro['fechaIni'];
            ?>
                </td>
                <td class="text-left0">
            <?php
               echo $registro['fechaFin'];
            ?>
                </td>
                <td class="text-left0">
            <?php
               echo $registro['horas'];
            ?>
                </td>
                <td class="text-left0">
            <?php
               echo $registro['dias'];
            ?>
                </td>
                <td class="text-left0">
                    <form action="" method="post">
                        <input type="hidden" name="idCurso" value="<?php echo $registro['idCurso'];?>">
                        <button name="submit" type="submit" id="submit">Si</button>
                    </form>
                </td>
                
            </tr> 
            <?php               
                }
             ?>
        </tbody>
    </table>
         <script>
            $(document).ready(function() 
                { 
                    $("#myTable").tablesorter(); 
                } 
            );
        </script>
    </body>
</html>