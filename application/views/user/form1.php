<?php
/**
 * Created by PhpStorm.
 * User: gravit
 * Date: 6/21/2018
 * Time: 3:49 PM
 */
?>
<html>
<head>
    <title>Book an Appointment</title>
    <meta charset='utf-8' />
    <link href='<?=THEME?>fullcalendar.min.css' rel='stylesheet' />
    <link href='<?=THEME?>fullcalendar.print.min.css' rel='stylesheet' media='print' />
    <script src='<?=THEME?>lib/moment.min.js'></script>
    <script src='<?=THEME?>lib/jquery.min.js'></script>
    <script src='<?=THEME?>fullcalendar.min.js'></script>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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
    <script>

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                eventRender: function(eventObj, $el) {
                    $el.popover({
                        title: eventObj.title,
                        content: eventObj.description,
                        trigger: 'hover',
                        placement: 'top',
                        container: 'body'
                    });
                },
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'month,agendaWeek,agendaDay,listWeek'
                },
                defaultDate: '20<?php echo date("y-m-d"); ?>',
                navLinks: true, // can click day/week names to navigate views

                weekNumbers: true,
                weekNumbersWithinDays: true,
                weekNumberCalculation: 'ISO',

                editable: true,
                eventLimit: true, // allow "more" link when too many events
                events: [
                    <?php
                    foreach ($appdata as $val){
                    ?>
                    {
                        title: '<?php echo $val['cat_name']; ?>',
                        description: 'Booked from 20<?php echo $val['year']; ?>-0<?php echo $val['month']; ?>-<?php echo $val['day']; ?> <?php echo $val['start_hour']; ?>:<?php echo $val['start_minute']; ?> to 20<?php echo $val['year']; ?>-0<?php echo $val['month']; ?>-<?php echo $val['day']; ?> <?php echo $val['end_hour']; ?>:<?php echo $val['end_minute']; ?>',
                        start: '20<?php echo $val['year']; ?>-0<?php echo $val['month']; ?>-<?php echo $val['day']; ?>T<?php echo $val['start_hour']; ?>:<?php echo $val['start_minute']; ?>:00',
                        end: '20<?php echo $val['year']; ?>-0<?php echo $val['month']; ?>-<?php echo $val['day']; ?>T<?php echo $val['end_hour']; ?>:<?php echo $val['end_minute']; ?>:00',
                        editable: false,
                    },
                    <?php
                    }
                    ?>
                ]
            });

        });
        $(document).ready(function() {
            $('#calendar').fullCalendar({

                eventStartEditable: false,
            });
        });
    </script>
    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 900px;
            margin: 0 auto;
        }

    </style>
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
            <br>
            <h3>Select date of Appointment</h3>
            <br>
            <form action="<?=CTRL?>User/submit_date" id="new_form" method="post">
                <div class="form-group">
                    <input class="form-control" placeholder="Preffered date" name="date" type="date" data-date-inline-picker="false" data-date-open-on-focus="true" required>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            <br>
            <h3>Check available slots</h3>
            <br>
            <div id='calendar'></div>
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
