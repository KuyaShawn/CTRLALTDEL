<!--
    This file is to catch the Confirmation PHP user data
        for the CbCSC Confirmation HTML web page.
    Date: Monday 25th of January, 2021
    Updated:
    Project Name: Coneybeare Sustainability Catalog
    File name: confirm.php
    Author/'s: CTRL ALT DEL
                Amanda H.
-->

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css"
          integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <!-- Stylesheets -->
    <link rel="stylesheet" href="../styles/styles.css">

    <title>Thank you for your application.</title>
</head>
<?php
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);
?>
<body>
<?php
include('../includes/header.html');
?>
<div class="container my-3">
    <!-- greeting to potential client -->
    <h1>Thank you for your application.</h1>
    <p>Thank you for providing your information.
        It has been sent to the Coneybeare Sustainability team for review.</p>

</div>

    <!-- Link to the universal Footer -->
    <?php
    include('../includes/footer.html');
    ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns"
            crossorigin="anonymous"></script>
    <script src="confirm.js"></script>


</body>
</html>