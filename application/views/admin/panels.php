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
    <title>Panels</title>
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
                <li class="active"><a  href="<?=CTRL?>Admin/dashboard">Home</a></li>
                <li><a href="<?=CTRL?>Admin/slots">Slots</a></li>
                <li><a href="<?=CTRL?>Admin/category">Category</a></li>
                <li><a href="<?=CTRL?>Admin/panels">Panels</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h4 style="text-align: center;">Panels (number of services you can provide in parallel)</h4>
    <?php
    foreach ($paneldata as $val) {
        ?>
        <form style="width: 200px;margin-left: auto;margin-right: auto;display: block;" method="post" enctype="multipart/form-data" action="<?= CTRL ?>Admin/add_panel/?panel_id=<?php echo $val['panel_id']; ?>">
            <div class="form-inline">
                <div class="form-group">
                    <input type="number" class="form-control" placeholder="Panels" min="1" name="panel" value="<?php echo $val['panel_num']; ?>" required>
                </div>
                <br>
                <br>
                <button style="margin-left: auto;margin-right: auto;display: block;" type="submit"
                        class="btn btn-primary">Update
                </button>
            </div>
        </form>
        <?php
    }
    ?>
</div>
</body>
</html>
