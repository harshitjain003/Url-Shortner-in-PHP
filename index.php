<!DOCTYPE html>
<html lang="en">
    <?php 
    if(isset($_GET["l"])){
        if ($_GET["l"]!=''){
            $url = $_GET["l"];
            
        }else{
            echo"invalid parameter";
        }
    }else{
        echo"invalid";
        die();
    }
    ?>
    <head>
        <title>Url Shortner By Harshit Jain</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    
    </body>
</html>