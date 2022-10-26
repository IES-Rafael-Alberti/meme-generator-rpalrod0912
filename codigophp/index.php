<?php
require("testlogin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require 'cabecera.php'?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PANEL_DE_CONTROL</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    CREAR MEME: <a href="listadoMemes.php"><i class="fa-solid fa-plus"></i></a>
    <?php
        require("conecta.php");
        echo "<h2>Hola ".$_SESSION["usuario"]." bienvenido de nuevo</h2>";
        $idUsuario=$_SESSION["ID"];
        $memes = $conn->query("SELECT ID,ruta,IdUsuario FROM Memes WHERE IdUsuario=$idUsuario");
        $memes_assoc=$memes->fetchAll(PDO::FETCH_ASSOC);
        foreach($memes_assoc as $meme){
            echo "<a href='verMeme.php?id=".$meme['ID']."&url=".$meme['ruta']."'><img  width='50px' src='" . $meme["ruta"] . "'></a>";
        }      
        //Error en la query usarios
        /*$usuarios=$conn->query("SELECT * FROM Memes WHERE IdUsuario=$idusuario");
        $datos=array("idusuario"=>$idusuario);
        $usuarios_assoc=$usuarios->fetch(PDO::FETCH_ASSOC);
        */
    ?>
    <form action="desconectar.php">
        <input type="submit" value="DESCONECTAR">
    </form>
   <!-- Mascotas: <i class='fa-solid fa-plus'></i>
-->
   <!--    <?php
    /*$mascotas =$conn->query("SELECT * FROM MASCOTAS");

    print("<table class='styled-table'>");
    while ($mascota = $mascotas->fetchObject()){
        print("<tr>");
        print("<td>");
        print($mascota->nombre);
        print("</td>");
        print("</tr>");
    }
    print("</table>");*/
    ?>-->
</body>
</html>