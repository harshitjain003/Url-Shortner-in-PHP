<?php
require 'Config/connection.php';
if (isset($_GET["l"])) {
    if ($_GET["l"] != '') {
        $url = $_GET["l"];
        $sql = "SELECT * FROM `short_urls` WHERE `short_url` = '$url';";
        $result = mysqli_query($con, $sql);
        $row_cnt = mysqli_num_rows($result);
        if ($row_cnt > 0) {
            $data = mysqli_fetch_assoc($result);
            $new_visit = $data['vists'];
            $new_visit++;
            $visit_update = "UPDATE `short_urls` SET `vists`='$new_visit' WHERE `short_url` = '$url' ;";
            $update_visit = mysqli_query($con, $visit_update);
            $redirect_url = $data['long_url'];
            header('location:'.$redirect_url);
        }else{
            header('location:index.php');
        }
    } else {
        header('location:index.php');

    }
}
?>

