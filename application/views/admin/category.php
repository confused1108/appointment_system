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
                <li class="active"><a  href="<?=CTRL?>Admin/dashboard">Home</a></li>
                <li><a href="<?=CTRL?>Admin/slots">Slots</a></li>
                <li><a href="<?=CTRL?>Admin/category">Category</a></li>
                <li><a href="<?=CTRL?>Admin/panels">Panels</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Name</th>
            <th>Time (in minutes)</th>
            <th>Remove</th>
            <th>Update</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($catdata as $val) {
            ?>

            <tr>
                <td><?php echo $val['cat_name']; ?></td>
                <td><?php echo $val['cat_minutes']; ?></td>
                <td><a href="<?=CTRL?>Admin/remove_cat/?cat_id=<?php echo $val['cat_id']; ?>"><button type="button" class="btn btn-danger">Remove</button></a></td>
                <td><a href="<?=CTRL?>Admin/update_cat/?cat_id=<?php echo $val['cat_id']; ?>"><button type="button" class="btn btn-primary">Update</button></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
    <br>
    <br>
    <h4>Create more categories</h4>
    <form action="<?=CTRL?>Admin/add_category" id="new_form" method="post">
        <div class="form-inline">
            <div class="form-group">
                <input type="name" class="form-control" placeholder="Name" name="name[]" required>
            </div>
            <div class="form-group">
                <input type="name" class="form-control" placeholder="Time (in minutes)" name="time[]" required>
            </div>
        </div>
        <div class="input_fields_wrap">
            <button class="add_field_button">Add More Fields</button>
        </div>
    </form>
    <br>
    <button type="submit" class="btn btn-primary" form="new_form">Submit</button>
</div>
</body>
<script>
    $(document).ready(function() {
        var max_fields      = 5; //maximum input boxes allowed
        var wrapper         = $(".input_fields_wrap"); //Fields wrapper
        var add_button      = $(".add_field_button"); //Add button ID
        var x = 1; //initlal text box count
        $(add_button).click(function(e){ //on add input button click
            e.preventDefault();
            if(x < max_fields){ //max input box allowed
                x++; //text box increment
                $(wrapper).append('<div> <div class="form-inline"><div class="form-group"><input type="name" class="form-control" placeholder="Name" name="name[]" required> </div> <div class="form-group"> <input type="name" class="form-control" placeholder="Time (in minutes)" name="time[]" required> </div><a href="#" class="remove_field">Remove</a> </div>'); //add input box
            }
        });
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>
</html>