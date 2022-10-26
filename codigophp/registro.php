<?php
    if (isset($_POST["usuario"])){
        require("conecta.php");
        $usuario=$_POST["usuario"];
        $pwd=$_POST["password"];
        $foto=$_FILES["foto"]["name"];
        file_put_contents("fotos/$foto",file_get_contents($_FILES["foto"]["tmp_name"]));
        $sql="INSERT INTO usuarios (Nombre,Pwd,Foto) VALUES (:usuario,:contrasena,:foto)";

        $datos=array("usuario"=>$usuario,
                        "contrasena"=>$pwd,
                        "foto"=>$foto);
        $stmt=$conn->prepare($sql);
        if ($stmt->execute($datos)!=1){
            print("No se pudo registrar ese usuario");
            exit(0);
        }
        print("Te has dado de alto exitosamente");
        header("Location: Index.php");
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
    <form action="registro.php" method="post" enctype="multipart/form-data">
    <label for="usuario">Nombre de Usuario</label>
    <input type="text" name="usuario" id="usuario">
    <label for="contraseña">Contraseña</label>
    <input type="password" name="password" id="password">Contraseña</input>
    <label for="foto">Foto</label>
    <input type="file" name="foto" id="foto">
    <input type="submit" value="Registarme">
    </form>
</body>
</html>