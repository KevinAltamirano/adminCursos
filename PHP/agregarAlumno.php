 <?php

        if (isset($_POST['nombre']) & isset($_POST['email'])) {

            $name= $_POST ['nombre'];
            $email= $_POST ['email'];
            $idCurso= $_POST ['idCurso'];
            
            $conexion = mysql_connect("localhost","root","");
 
            mysql_select_db("reingenieria",$conexion);
        
            $sql="INSERT INTO alumno (nombre,email,idCurso) VALUES('$name','$email','$idCurso')";
            mysql_query($sql);
            header("location:listaAlumnos.php");            
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
            <li><a href="agregarCurso.php" >Agregar Curso</a></li>
            <li><a href="agregarAlumno.php" class="active">Agregar Alumno</a></li>
            <li><a href="loginCursos.php">LogOut</a></li>
        </ul>

        <div class="container">  
        <form id="contact" action="" method="post">
            <h3 style="text-align:center">Registro del Alumno</h3>
            <h4 style="text-align:center">Rellene correctamente los campos establecidos</h4>
            <fieldset>
                <input placeholder="Nombre del Alumno" type="text" tabindex="1" required autofocus name="nombre">
            </fieldset>
            <fieldset>
                <input placeholder="Email" type="text" tabindex="1" required autofocus name="email">
            </fieldset>
            <fieldset>
                <input placeholder="ID Curso" type="text" tabindex="1" required autofocus name="idCurso">
            </fieldset>
            <fieldset>
                <button name="submit" type="submit" id="submit">Agregar</button>
            </fieldset>
        </form>
    </div>
    </body>
</html>