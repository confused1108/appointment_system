<html>
<head>
    <title>Dashboard</title>
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
    <script>

        $(document).ready(function() {

            $('#calendar').fullCalendar({
                eventClick: function(eventObj) {
                    $('#modal_'+eventObj.id).modal('show');
                    //alert('Clicked ' + eventObj.id);
                },
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
                        id:<?php echo $val['id']; ?>,
                        title: '<?php echo $val['cat_name']; ?>',
                        description: '',
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
    </script>
    <script>

    </script>
    <style>

        body {
            margin: 40px 10px;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            max-width: 800px;
            margin: 0 auto;
        }

    </style>
</head>
<body>
<?php
foreach ($appdata as $val) {
    ?>
    <div class="container">
        <div class="modal fade" id="modal_<?php echo $val['id']; ?>" role="dialog">
            <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Appointment Booking</h4>
                    </div>
                    <div class="modal-body">
                        <p><b>Name</b> : <?php echo $val['name']; ?></p>
                        <p><b>Number</b> : <?php echo $val['number']; ?></p>
                        <p><b>Category</b> : <?php echo $val['cat_name']; ?>
                        <p><b>From</b> : 20<?php echo $val['year']; ?>-0<?php echo $val['month']; ?>-<?php echo $val['day']; ?> <?php echo $val['start_hour']; ?>:<?php echo $val['start_minute']; ?></p>
                        <p><b>To</b> : 20<?php echo $val['year']; ?>-0<?php echo $val['month']; ?>-<?php echo $val['day']; ?> <?php echo $val['end_hour']; ?>:<?php echo $val['end_minute']; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <?php
}
?>
<nav class="navbar navbar-inverse" style="margin-top: 0; padding-top: 0;">
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
                <li class="active"><a href="<?=CTRL?>Admin/dashboard">Home</a></li>
                <li><a href="<?=CTRL?>Admin/slots">Slots</a></li>
                <li><a href="<?=CTRL?>Admin/category">Category</a></li>
                <li><a href="<?=CTRL?>Admin/panels">Panels</a></li>
            </ul>

        </div>
    </div>
</nav>

<div class="container">
<!--    <h3>Appointment System</h3>-->
<!--    <p>Welcome to the appointment System</p>-->
<!--    <h1 style="font-weight: bold;">calendar will be displayed here</h1>-->
</div>
    <div id='calendar'></div>


</body>
</html>