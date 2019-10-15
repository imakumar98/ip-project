<?php

    //Function to get title of page
    function get_page_title($title){
        ?><title><?php echo $title; ?> | Henry Harvin</title><?php
    }


    //Function to get page header with name
    function get_page_header($name){
        ?>
            <div class="page-header row no-gutters py-4">
                <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                    <span class="text-uppercase page-subtitle">Dashboard</span>
                    <h3 class="page-title"><?php echo $name; ?></h3>
                </div>
            </div>
        <?php
    }




?>