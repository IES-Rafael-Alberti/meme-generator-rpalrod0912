<?php
require("testlogin.php");
require("conecta.php");

function volverAtras(){
      header("Location:Index.php");
      exit(0);
}
$id=$_POST['idMeme'];
$cajas=$_POST['cajas'];

 if (isset($_POST["texto1"])){
     //url for meme creation
    $url = 'https://api.imgflip.com/caption_image';
    $boxes=array();
 //The data you want to send via POST
      for($z=1;$z<=$cajas;$z++){
      $datoForm=$_POST["texto$z"];
      $colorForm=$_POST["color$z"];
      array_push($boxes,array("text" => $datoForm,
      "color" => $colorForm));
      }
 $fields = array(
         "template_id" => $id,
         "username" => "fjortegan",
         "password" => "pestillo",
         "boxes" =>$boxes
         ); 
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
 
 //if success show image
 if($data["success"]) {
      //CUIDADO CON LOS ESPACIOS
     //echo "<img src=".$data["data"]["url"].">";
     $memeName=$_SESSION["usuario"]."_".date("dmyhis").".jpg";
     file_put_contents("fotos/$memeName",file_get_contents($data["data"]["url"]));
     $urlImg=$data["data"]["url"];
     echo "<img src='".$data["data"]["url"]."'>";
     $sql="INSERT INTO Memes (ruta,IdUsuario) VALUES (:ruta,:IdUsuario)";
     $datoSql=array("ruta"=>$memeName,
                    "IdUsuario"=>$_SESSION['ID']);
      $stmt=$conn->prepare($sql);

      if ($stmt->execute($datoSql) !=1){
            print("Nose pudo guardar el meme");
            header("Location:editarMeme.php");
            exit(0);
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
      <form action="Index.php">
            <input type="submit" onclick="volverAtras" VALUE="VOLVER A INCIO">      
      </form>
</body>
</html>
