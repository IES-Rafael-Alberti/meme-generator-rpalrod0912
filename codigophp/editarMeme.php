<?php
  /*  //checks query for custom text
    $text = isset($_GET["text"])? $_GET["text"] : 'I wanna be a developer';

    //checks query for image file
    $image = isset($_GET["image"])? "images/" . $_GET["image"] : 'images/dog.jpg';

    //load image
    $im = imagecreatefromjpeg($image);

    //response will be a jpeg image
    header('Content-Type: image/jpeg');

    //choose color
    $blue = imagecolorallocate($im, 0x14, 0x36, 0x42);

    //ruta archivo de fuente ttf
    $font_file = './fonts/Lora.ttf';
    
    //draws text with size 40
    imagefttext($im, 36, 0, 40, 100, $blue, $font_file, $text);

    //write image data in response
    imagejpeg($im);

    //destroy image object
    imagedestroy($im);
//url for meme creation
$url = 'https://api.imgflip.com/caption_image';

//The data you want to send via POST
$fields = array(
        "template_id" => "112126428",
        "username" => "fjortegan",
        "password" => "pestillo",
        "boxes" => array( 
            array("text" => "Frontend",
                  "color" => "#ff8484"),
            array("text" => "Alumno DAW",
                  "color" => "#D6FFF6"),
            array("text" => "Backend",
                  "color" => "#2374ab")
        ));


//url-ify the data for the POST
$fields_string = http_build_query($fields);

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, true);
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//So that curl_exec returns the contents of the cURL; rather than echoing it
curl_setopt($ch,CURLOPT_RETURNTRANSFER, true); 

//execute post
$result = curl_exec($ch);

//decode response
$data = json_decode($result, true);
*/

require("recibirJson.php");

//if success show image
$id=$_GET["id"];
if($data["success"]) {
    //iterates over memes array
    foreach($data["data"]["memes"] as $meme) {
        //show meme image
        if($meme["id"]==$id){
            echo "<a href='editarMeme.php?id=".$id."'><img  width='50px' src='" . $meme["url"] . "'></a>";
            $cajas=$meme["box_count"];
        }
 
    }
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
    <form action="editarMeme.php" method="post">
        <input type="text" name="idMeme" hidden value="<?php echo $_GET["id"];?>">
        <?php
            require("recibirJson.php");
            if($data["success"]) {
                //iterates over memes array
                foreach($data["data"]["memes"] as $meme) {
                    //show meme image
                    $i=1;
                    if($meme["id"]==$id){
                        while($i<=$meme["box_count"]){
                            echo "<label for='Texto'>Texto $i</label>";
                            echo "<input type='text' name='texto.$i.' id='texto.$i.'>";
                            echo "<br>";

                            $i++;
                        }
                        $cajas=$meme["box_count"];
                    }
                }
                }
        ?>
        <input type="submit" value="CREAR MEME";
    </form>
</body>
</html>