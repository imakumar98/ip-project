<?php

    require_once('includes/init.php');



    $meeting = new Meeting();

    echo $meeting->create('Cricket', 2, 'HOT', 'IDK', 'Complete section 2', '10-11-19', 4, 2);



?>