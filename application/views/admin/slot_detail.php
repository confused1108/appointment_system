<?php
/**
 * Created by PhpStorm.
 * User: gravit
 * Date: 6/21/2018
 * Time: 11:40 AM
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
                <li><a href="<?=CTRL?>Admin/dashboard">Home</a></li>
                <li class="active"><a href="<?=CTRL?>Admin/slots">Slots</a></li>
                <li><a href="<?=CTRL?>Admin/category">Category</a></li>
                <li><a href="<?=CTRL?>Admin/panels">Panels</a></li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <h3>Slots (In 24 hour format)</h3>
    <form action="<?=CTRL?>Admin/add_slots/?day_id=<?php echo $_GET['day_id']; ?>" id="new_form" method="post">
        <?php
        foreach ($slotdata as $val) {
            ?>
            <div class="form-inline" id="div_<?php echo $val['slot_id']; ?>">
                <div class="form-group">
                    <input type="name" class="form-control" placeholder="Start Hour" name="sth[]" value="<?php echo $val['start_hour']; ?>" required>
                </div>
                <div class="form-group">
                    <input type="name" class="form-control" placeholder="Start Minute" name="stm[]" value="<?php echo $val['start_minute']; ?>" required>
                </div>
                <h4 style="display:inline-block;"> - </h4>
                <div class="form-group">
                    <input type="name" class="form-control" placeholder="End Hour" name="enh[]" value="<?php echo $val['end_hour']; ?>" required>
                </div>
                <div class="form-group">
                    <input type="name" class="form-control" placeholder="End Minute" name="enm[]" value="<?php echo $val['end_minute']; ?>" required>
                </div>
                <a href="#" class="remove_field" id="remove_<?php echo $val['slot_id']; ?>">Remove</a>
            </div>
            <script>
                $(document).ready(function(){
                    $("#remove_<?php echo $val['slot_id']; ?>").click(function(){
                        $("#div_<?php echo $val['slot_id']; ?>").remove();
                    });
                });
            </script>
            <?php
        }
        ?>
        <div class="input_fields_wrap">
            <button class="add_field_button">Add More Slots</button>
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
                $(wrapper).append('<div> <div class="form-inline"><div class="form-group">\n' +
                    '                <input type="name" class="form-control" placeholder="Start Hour" name="sth[]" required>\n' +
                    '            </div>\n' +
                    '            <div class="form-group">\n' +
                    '                <input type="name" class="form-control" placeholder="Start Minute" name="stm[]" required>\n' +
                    '            </div>\n' +
                    '            <h4 style="display:inline-block;"> - </h4>\n' +
                    '            <div class="form-group">\n' +
                    '                <input type="name" class="form-control" placeholder="End Hour" name="enh[]" required>\n' +
                    '            </div>\n' +
                    '            <div class="form-group">\n' +
                    '                <input type="name" class="form-control" placeholder="End Minute" name="enm[]" required>\n' +
                    '            </div><a href="#" class="remove_field">Remove</a> </div>'); //add input box
            }
        });
        $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
            e.preventDefault(); $(this).parent('div').remove(); x--;
        })
    });
</script>
</html>