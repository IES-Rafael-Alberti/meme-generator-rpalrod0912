<?php
    require("conecta.php");
    $ID=$_GET['ID'];
    $sql="DELETE FROM Memes WHERE ID=:idMeme";
    $data=array("idMeme"=>$ID);
    $stmt=$conn->prepare($sql);
    if($stmt->execute($data) != 1){
        print("No se puede eliminar el meme");
        exit(0); 
    }
    header("Location: Index.php");
    exit(0);
?>