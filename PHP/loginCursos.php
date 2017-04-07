    <?php
    define('DB_SERVER','localhost'); 
    define('DB_DATABASE','reingenieria'); 
    define('DB_USERNAME','root'); 
    define('DB_PASSWORD',''); 

    $con = mysql_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD); 
    mysql_select_db(DB_DATABASE,$con); 
    session_start();
    

 if (isset($_POST['username']) & isset($_POST['password'])) {
         
         $nombre= htmlentities($_POST['username']);
         $pass = htmlentities($_POST['password']);
         $_SESSION['nickname']="$nombre";

        if(verificar_login($_POST['username'],$_POST['password'],$result) == 1)
            {
                
                if($nombre=="admin"){
                    header("location:homeAdmin.php");
                    //echo 'console.log("Usuario Administrador");';
                }
                else{
                    header("location:home.php");
                }
            }
            else
            {
                    
                //echo "alert('Incorrecto');";
                $message = "Usuario Incorrecto";
                echo "<script type='text/javascript'>alert('$message');</script>";
                //header("location:loginTecnoVigilancia.php");
            }
}



        function verificar_login($user,$password,&$result)
        {
            $sql = "SELECT * FROM administrador WHERE adminNombre='$user' and adminPass='$password'";
            $rec = mysql_query($sql);
            $count = 0;
            while($row = mysql_fetch_object($rec))
            {   
                $count++;
                $result = $row;
            }
            if($count == 1)
            {
                return 1;
            }
            else
            {
                return 0;
            }
        }
    ?>



<html lang="en">
        <head>
            <title></title>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <link href="../CSS/loginCursos.css" rel="stylesheet">
            
        </head>
        <body class="align">
            <div class="grid">
            <form action="" method="post" class="form login">
                    <header class="login__header">
                        <h3 class="login__title">Institucion Mexicana de Artes y Musica</h3>
                    </header>
                <div class="login__body">
                    <div class="form__field">
                        <input type="text" placeholder="Usuario" required name="username">
                    </div>
                    <div class="form__field">
                        <input type="password" placeholder="Password" name = "password">
                    </div>
            </div>
            <footer class="login__footer">
                <input type = "submit" value = " Submit "/><br />
            </footer>
                </form>
            </div>
        </body>
        <script type="text/javascript">
        document.oncontextmenu = function(){return false;}
        </script>
    </html> 
