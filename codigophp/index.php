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
        $idUsuario=$_SESSION["ID"];
        echo "<h2>Hola ".$_SESSION["usuario"]." bienvenido de nuevo</h2>";
        $imgUsuario= $conn->query("SELECT Foto FROM usuarios WHERE ID=$idUsuario");
        $imgPerfil=$imgUsuario->fetchAll(PDO::FETCH_ASSOC);
        $img=$imgPerfil[0]['Foto'];
        echo "<img height='180px' width='300px' src='fotos/".$img."'>";
        $memes = $conn->query("SELECT ID,ruta,IdUsuario FROM Memes WHERE IdUsuario=$idUsuario");
        $memes_assoc=$memes->fetchAll(PDO::FETCH_ASSOC);
        print("<table class='styled-table'>");
        foreach($memes_assoc as $meme){
            print("<thead>");
            print("<tr>");
            print("<th>");
            print("<a href='eliminarMeme.php?ID=".$meme["ID"]."'><i class='fa-solid fa-trash-can'></i></a>");
            print($meme['ID']);
            print("</th>"); 
            print("</thead>");
            print("<td>");
            echo "<a href='mostrarMeme.php?id=".$meme['ID']."&url=".$meme['ruta']."'><img  width='50px' src='" . $meme["ruta"] . "'></a>";
            print("</td>");
            print("</tr>");
        }      
        print("</table>");
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