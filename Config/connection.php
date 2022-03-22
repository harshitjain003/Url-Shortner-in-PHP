<?php 

session_start();

$con = mysqli_connect('localhost','root','','url_shortner');

if(!$con){
    echo"Can't Connect To Database";
}


?>