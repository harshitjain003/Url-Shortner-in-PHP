<!DOCTYPE html>
<html lang="en">
<?php require 'Config/connection.php';?>

<head>
    <title>Url Shortner By Harshit Jain</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="static/style.css" rel="stylesheet">
</head>

<body>
    <!-- NAVBAR STARTS -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand" href="/">Url Shortner</a>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Dropdown
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                    </li>
                </ul>
            </div>
            <div class="d-flex">
                <a href="login.php" class="btn bg-warning btn-sm text-bold m-2 ">Login</a>
                <a href="login.php" class="btn bg-warning btn-sm text-bold m-2">Sign Up</a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        </div>
    </nav>
    <!-- NAVBAR ENDS -->
    <div class="container main-form mt-4">
        <h1 class="m-3 text-center">Enter Link To Get A Short Link!</h1>
        <div class="row">
            <form class="d-flex" method="post">
                <input class="form-control input" type="url" name="url" value="" placeholder="Enter Url Here....." required>

                <button type="submit" name="generate" class="btn btn-primary mx-2">Generate</button>
            </form>
        </div>
        <?php

        if (isset($_POST['generate'])) {
            $long_url = mysqli_real_escape_string($con, $_POST['url']);
            function getUrl()
            {
                $n = 10;
                $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $randomString = '';

                for ($i = 0; $i < $n; $i++) {
                    $index = rand(0, strlen($characters) - 1);
                    $randomString .= $characters[$index];
                }

                return $randomString;
            }
            $short_url = getUrl();
            $status = 1;
            $created_on = date("Y/m/d");
            $sql = "INSERT INTO `short_urls` (`long_url`, `short_url`, `status`,`created_on`) VALUES ('$long_url','$short_url','$status','$created_on');";
            $query = mysqli_query($con, $sql);
            $base_url = "localhost/url shortner/";
            echo '<div class="alert mt-3 alert-info" role="alert">';
            echo $base_url.$short_url;
            echo '</div>';

        
        }

        ?>
        
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>