<?php
require("recibirJson.php");
//if success shows images
if($data["success"]) {
    //iterates over memes array
    foreach($data["data"]["memes"] as $meme) {
        //show meme image
        $memeId=$meme["id"];
        echo "<a href='editarMeme.php?id=".$memeId."'><img  width='50px' src='" . $meme["url"] . "'></a>";
        $cajas=$meme["box_count"];
    }
}

?>