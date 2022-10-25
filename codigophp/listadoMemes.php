<?php
require("testlogin.php");
require("recibirJson.php");
//if success shows images
if($data["success"]) {
    //iterates over memes array
    foreach($data["data"]["memes"] as $meme) {
        //show meme image
        $memeId=$meme["id"];
        $cajas=$meme["box_count"];
        $url=$meme["url"];
        echo "<a href='editarMeme.php?id=".$memeId."&cajas=".$cajas."&url=".$url."'><img  width='50px' src='" . $meme["url"] . "'></a>";
    }
}

?>