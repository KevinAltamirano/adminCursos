 <?php

        if (isset($_POST['cursoName']) & isset($_POST['cursoIni'])) {

            $name= $_POST ['cursoName'];
            $ini= $_POST ['cursoIni'];
            $fin= $_POST ['cursoFin'];
            $prof=$_POST['cursoProf'];
            $precio= $_POST ['cursoPrecio'];
            $horas= $_POST ['cursoHoras'];
            $dias= $_POST ['cursoDias'];
            
            $conexion = mysql_connect("localhost","root","");
 
            mysql_select_db("reingenieria",$conexion);
        
            $sql="INSERT INTO curso (nombre,precio,fechaIni,fechaFin,horas,dias,cursoProf) VALUES('$name','$precio','$ini','$fin','$horas','$dias','$prof')";
            mysql_query($sql);
            header("location:homeAdmin.php");            
            }

 ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="../CSS/agregarCurso.css" rel="stylesheet">
    </head>
    <body>
        <ul>
            <li><a href="homeAdmin.php" >Cursos</a></li>
            <li><a href="listaAlumnos.php">Alumnos</a></li>
            <li><a href="agregarCurso.php" class="active">Agregar Curso</a></li>
            <li><a href="agregarAlumno.php">Agregar Alumno</a></li>
            <li><a href="loginCursos.php">LogOut</a></li>
        </ul>

        <div class="container">  
        <form id="contact" action="" method="post">
            <h3 style="text-align:center">Registro del Curso</h3>
            <h4 style="text-align:center">Rellene correctamente los campos establecidos</h4>
            <fieldset>
                <input placeholder="Nombre del Curso" type="text" tabindex="1" required autofocus name="cursoName">
            </fieldset>
            <fieldset>
                Fecha de Inicio 
                <input placeholder="Fecha de Inicio" type="date" tabindex="1" required name="cursoIni">
            </fieldset>
            <fieldset>
                Fecha de Final 
                <input placeholder="Fecha de Final" type="date" tabindex="1" required name="cursoFin">
            </fieldset>
            <fieldset>
                <input placeholder="Precio del Curso" type="text" tabindex="1" required autofocus name="cursoPrecio">
            </fieldset>
            <fieldset>
                <input placeholder="Horas del Curso" type="text" tabindex="1" required autofocus name="cursoHoras">
            </fieldset>
            <fieldset>
                <input placeholder="Dias del Curso" type="text" tabindex="1" required autofocus name="cursoDias">
                <input type="hidden" name="cursoProf" value="0">
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="submit">Agregar</button>
            </fieldset>
        </form>
    </div>
    </body>
</html>