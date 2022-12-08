<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 
    <title>Tingbers</title>
</head>
<body>
<?php
    include "navbar.php";
?>
    <!-- Main content -->
    <section class="content">
        <?php
    function base(){
      echo str_replace("index.php","", $_SERVER['PHP_SELF']);
    }

    $URL = explode("/", $_SERVER['QUERY_STRING']);

      // echo "<pre>";
      // print_r($_SERVER['QUERY_STRING ']);
      // echo "<pre>";
    if (file_exists($URL[0] . ".php")){
    
    require_once($URL[0] . ".php");
    
    }else{

      require_once("404.php");
    }
    ?>

</section>

    
</body>
</html>
