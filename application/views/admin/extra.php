
                    <?php
                    foreach ($appdata as $val){
                        ?>
                        {
                        title: '<?php echo $val['cat_name']; ?>',
                        description: 'Name : <?php echo $val['name']; ?>, Number : <?php echo $val['number']; ?>',
                        start: '20<?php echo $val['year']; ?>-0<?php echo $val['month']; ?>-<?php echo $val['day']; ?>T<?php echo $val['start_hour']; ?>:<?php echo $val['start_minute']; ?>:00',
                        end: '20<?php echo $val['year']; ?>-0<?php echo $val['month']; ?>-<?php echo $val['day']; ?>T<?php echo $val['end_hour']; ?>:<?php echo $val['end_minute']; ?>:00',
                        editable: false,
                        },
                        <?php
                    }
                    ?>
{
title: 'Medium',
description: 'Name : confused, Number : 7441183308',
start: '2018-06-25T9:50:00',
end: '2018-06-25T10:2:00',
editable: false
},
{
title: 'Medium',
description: 'Name : confused, Number : 7441183308',
start: '2018-06-25T10:10:00',
end: '2018-06-25T10:22:00',
editable: false,
}
