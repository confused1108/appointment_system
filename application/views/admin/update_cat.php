<?php
/**
 * Created by PhpStorm.
 * User: gravit
 * Date: 6/20/2018
 * Time: 6:00 PM
 */
?>
<html>
<head>
    <title>Category</title>
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
                <li class="active"><a href="#">Home</a></li>
                <li><a href="<?=CTRL?>Admin/slots">Slots</a></li>
                <li><a href="<?=CTRL?>Admin/category">Category</a></li>
                <li><a href="<?=CTRL?>Admin/panels">Panels</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h2 style="text-align: center">Update Category</h2>
    <br><br>
    <?php
    foreach ($catdata as $val) {
        ?>
        <form class="form-horizontal" action="<?= CTRL ?>Admin/update_cat_data/?cat_id=<?php echo $val['cat_id']; ?>" method="post">
            <div class="form-group">
                <label class="control-label col-sm-2" for="email">Name:</label>
                <div class="col-sm-10">
                    <input style="width: 50%;" type="text" class="form-control" id="email" name="name" value="<?php echo $val['cat_name']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-2" for="pwd">Time (in minutes):</label>
                <div class="col-sm-10">
                    <input style="width: 50%;" type="text" class="form-control" id="pwd" name="time" value="<?php echo $val['cat_minutes']; ?>" required>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
        <?php
    }
    ?>
</div>
</body>
</html>