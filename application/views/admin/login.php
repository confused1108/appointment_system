<?php
/**
 * Created by PhpStorm.
 * User: gravit
 * Date: 6/20/2018
 * Time: 4:36 PM
 */
?>
<html>
<head>
    <title>Dashboard</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2 style="text-align: center">LogIn</h2>
    <br><br>
    <form class="form-horizontal" action="<?=CTRL?>Admin/checklogin" method="post">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Username:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="email" placeholder="Enter email" name="username" required>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password" required>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <div class="checkbox">
                    <label><input type="checkbox" name="remember"> Remember me</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-default">Sign In</button>
            </div>
        </div>
    </form>
</div>
</body>
</html>
