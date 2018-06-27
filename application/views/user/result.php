<?php
/**
 * Created by PhpStorm.
 * User: gravit
 * Date: 6/21/2018
 * Time: 5:58 PM
 */
?>
<html>
<head>
    <title>Book an Appointment</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<br><br>
<h2 style="text-align: center;">
    <?php
    if($error=="yes"){
        echo "Please enter time according to slots only";
    }
    else if($error=="yes1"){
        echo "Your preferred time is not available";
    }
    else if($error=="yes2"){
        echo "Please keep categories in mind while entering time";
    }
    else if($error=="no"){
        echo "You have successfully booked an appointment";
    }
    ?>
</h2>
<a href="<?=CTRL?>User"><button type="submit" class="btn btn-primary" style="margin-right: auto; margin-left: auto; display: block;">Book another Appointment</button></a>

</body>
</html>