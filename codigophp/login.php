<?php
    if (isset($_POST["usuario"])){
        require("conecta.php");
        $usuario=$_POST["usuario"];
        $pwd=$_POST["pwd"];

        $sql="SELECT * FROM usuarios WHERE Nombre=:usuario AND Pwd=:pwd";
        $datos=array("usuario"=>$usuario,
                        "Pwd"=>$pwd);
        $stmt=$conn->prepare($sql);
        $stmt->execute($datos);
        if ($stmt->rowCount()==1){
            session_start();
            $_SESSION["usuario"] = $usuario;
            session_write_close();
            header("Location: Index.php");
            exit(0);
        }
        header("Location: login.php");
        exit(0);
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="usuario">Nombre de Usuario</label>
        <input type="text" id="usuario" name="usuario">
        <label for="pwd">Contraseña</label>
        <input type="password" id="pwd" name="pwd">
        <input type="submit" value="Iniciar Sesión">
    </form>
    <h2>O
        <a href="registro.php">Registrate</a>
</body>
</html>