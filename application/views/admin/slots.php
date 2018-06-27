<?php
/**
 * Created by PhpStorm.
 * User: gravit
 * Date: 6/20/2018
 * Time: 4:56 PM
 */
?>
<html>
<head>
    <title>Slots</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Appointment</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a  href="<?=CTRL?>Admin/dashboard">Home</a></li>
                <li class="active"><a href="<?=CTRL?>Admin/slots">Slots</a></li>
                <li><a href="<?=CTRL?>Admin/category">Category</a></li>
                <li><a href="<?=CTRL?>Admin/panels">Panels</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h3>Days (click to edit slots)</h3>
    <ul>
        <?php
        foreach ($daydata as $val) {
            ?>
            <a href="<?=CTRL?>Admin/slot_detail/?day_id=<?php echo $val['day_id']; ?>"><li><?php echo $val['day_name']; ?></li></a>
            <?php
        }
        ?>
    </ul>
</div>
</body>
</html>