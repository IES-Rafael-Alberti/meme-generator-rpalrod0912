<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="generarMeme.php" method="post">
        <input type="text" name="idMeme" hidden value="<?php echo $_GET["id"];?>">
        <?php
            $id=$_GET["id"];
            $cajas=$_GET["cajas"];
            $url=$_GET["url"];
            $i=1;
                        echo "<img width='150px' src='".$url."'>";
                        while($i<=$cajas){
                            echo "</br><label for='texto$i'>Texto $i</label>";
                            echo "<input type='text2' name='texto$i' id='texto$i'>";
                            echo "<br>";
                            $i++;
                        }
        ?>
        </br>
        <input type="submit" value="CREAR MEME";
    </form>
</body>
</html>