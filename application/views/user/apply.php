<?php
/**
 * Created by PhpStorm.
 * User: gravit
 * Date: 6/21/2018
 * Time: 1:31 PM
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
    <style>
        .hide-replaced.ws-inputreplace {
            display: none !important;
        }
        .input-picker .picker-list td > button.othermonth {
            color: #888888;
            background: #fff;
        }
        .ws-inline-picker.ws-size-2, .ws-inline-picker.ws-size-4 {
            width: 49.6154em;
        }
        .ws-size-4 .ws-index-0, .ws-size-4 .ws-index-1 {
            border-bottom: 0.07692em solid #eee;
            padding-bottom: 1em;
            margin-bottom: 0.5em;
        }
        .picker-list.ws-index-2, .picker-list.ws-index-3 {
            margin-top: 3.5em;
        }
        div.ws-invalid input {
            border-color: #c88;
        }
        .ws-invalid label {
            color: #933;
        }
        div.ws-success input {
            border-color: #8c8;
        }
        
        .form-row {
            padding: 5px 10px;
            margin: 5px 0;
        }
        label {
            display: block;
            margin: 3px 0;
        }
        .form-row input {
            width: 220px;
            padding: 3px 1px;
            border: 1px solid #ccc;
            box-shadow: none;
        }
        .form-row input[type="checkbox"] {
            width: 15px;
        }
        .date-display {
            display: inline-block;
            min-width: 200px;
            padding: 5px;
            border: 1px solid #ccc;
            min-height: 1em;
        }
        .show-inputbtns .input-buttons {
            display: inline-block;
        }
    </style>
    <?php
    if(isset($error)){
    if($error=="yes"){
        echo "<script> alert(\"Please enter time according to slots only\"); </script>";
    }
    else if($error=="yes1"){
        echo "<script> alert(\"Your preferred time is not available\"); </script>";
        }
    else if($error=="yes2"){
        echo "<script> alert(\"Please keep categories in mind while entering time\"); </script>";
        }
    else if($error=="no"){
        echo "<script> alert(\"You have successfully booked an appointment\"); </script>";
        }
    }
    ?>
</head>
<body>
<h2 style="text-align:center;">Book an Appointment</h2>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <h4 style="text-align:center; color:blue;">Please check categories before applying</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Time (in minutes)</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($catdata as $val) {
                    ?>

                    <tr>
                        <td><?php echo $val['cat_name']; ?></td>
                        <td><?php echo $val['cat_minutes']; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
            <br>
            <h4 style="text-align:center; color:blue;">Please check slots before applying</h4>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Day</th>
                    <th>From</th>
                    <th>To</th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($slotdata as $val) {
                    ?>

                    <tr>
                        <td>
                            <?php
                            foreach($daydata as $val2){
                                if($val2['day_id']==$val['day_id']){
                                    echo $val2['day_name'];
                                }
                            }
                            ?>
                        </td>
                        <td><?php echo $val['start_hour']; ?>:<?php echo $val['start_minute']; ?></td>
                        <td><?php echo $val['end_hour']; ?>:<?php echo $val['end_minute']; ?></td>
                    </tr>
                    <?php
                }
                ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-8" style="border-left: 1px solid black;">
            <br><br>
            <?php
            if(isset($appdata)) {
                    ?>
                    <form action="<?= CTRL ?>User/add_appointment" id="new_form" method="post">
                        <input type="name" placeholder="Name" name="date" style="visibility: hidden;"
                               value="<?php echo $date; ?>" required>
                        <div class="form-group">
                            <input type="name" class="form-control" placeholder="Name" name="name" value="<?php echo $name; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="name" class="form-control" placeholder="Number" name="number" value="<?php echo $number; ?>" required>
                        </div>
                        <div class="form-group">
                            <select type="name" class="form-control" name="category" required>
                                <option disabled selected value> -- Reason of Appointment --</option>
                                <?php
                                foreach ($catdata as $val) {
                                    ?>
                                    <option value="<?php echo $val['cat_id']; ?>"><?php echo $val['cat_name']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <select type="name" class="form-control" name="slot" required>
                                <option disabled selected value> -- Preferred Time Slot --</option>
                                <?php
                                foreach ($timedata as $val) {
                                    ?>
                                    <option value="<?php echo $val['slot_id']; ?>"><?php echo $val['start_hour']; ?>
                                        :<?php echo $val['start_minute']; ?> - <?php echo $val['end_hour']; ?>
                                        :<?php echo $val['end_minute']; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Prefferd Time (hours)" name="thour"
                                   min="0" max="24" value="<?php echo $thour; ?>" required>
                        </div>
                        <div class="form-group">
                            <input type="number" class="form-control" placeholder="Prefferd Time (minutes)" name="tmin"
                                   min="0" max="59" value="<?php echo $tmin; ?>" required>
                        </div>
                        <br><br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                    <?php

            }
            else {
                ?>
                <form action="<?= CTRL ?>User/add_appointment" id="new_form" method="post">
                    <input type="name" placeholder="Name" name="date" style="visibility: hidden;"
                           value="<?php echo $datedata; ?>" required>
                    <div class="form-group">
                        <input type="name" class="form-control" placeholder="Name" name="name" required>
                    </div>
                    <div class="form-group">
                        <input type="name" class="form-control" placeholder="Number" name="number" required>
                    </div>
                    <div class="form-group">
                        <select type="name" class="form-control" name="category" required>
                            <option disabled selected value> -- Reason of Appointment --</option>
                            <?php
                            foreach ($catdata as $val) {
                                ?>
                                <option value="<?php echo $val['cat_id']; ?>"><?php echo $val['cat_name']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select type="name" class="form-control" name="slot" required>
                            <option disabled selected value> -- Preferred Time Slot --</option>
                            <?php
                            foreach ($timedata as $val) {
                                ?>
                                <option value="<?php echo $val['slot_id']; ?>"><?php echo $val['start_hour']; ?>
                                    :<?php echo $val['start_minute']; ?> - <?php echo $val['end_hour']; ?>
                                    :<?php echo $val['end_minute']; ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Prefferd Time (hours)" name="thour"
                               min="0" max="24" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" placeholder="Prefferd Time (minutes)" name="tmin"
                               min="0" max="59" required>
                    </div>
                    <br><br>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
                <?php
            }
            ?>
        </div>
    </div>
</div>
</body>
<script>
    webshim.setOptions('forms-ext', {
        replaceUI: 'auto',
        types: 'date',
        date: {
            startView: 2,
            inlinePicker: true,
            classes: 'hide-inputbtns'
        }
    });
    webshim.setOptions('forms', {
        lazyCustomMessages: true
    });
    //start polyfilling
    webshim.polyfill('forms forms-ext');

    //only last example using format display
    $(function () {
        $('.format-date').each(function () {
            var $display = $('.date-display', this);
            $(this).on('change', function (e) {
                //webshim.format will automatically format date to according to webshim.activeLang or the browsers locale
                var localizedDate = webshim.format.date($.prop(e.target, 'value'));
                $display.html(localizedDate);
            });
        });
    });
</script>
</html>