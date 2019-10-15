<?php require_once('includes/init.php'); ?>
<!doctype html>
<html class="no-js h-100" lang="en">
    <head>
        <?php get_page_title('Template'); ?>
        <?php require_once('partials/meta_tags.php'); ?>
        <?php require_once('partials/header_files.php'); ?>
    </head>
    <body class="h-100">
        <div class="container-fluid">
            <div class="row">
                <?php require_once('partials/main_sidebar.php'); ?>
                <main class="main-content col-lg-10 col-md-9 col-sm-12 p-0 offset-lg-2 offset-md-3">
                    <?php require_once('partials/main_navbar.php'); ?>
                        <div class="main-content-container container-fluid px-4">
                            <?php require_once('partials/page_header.php'); ?>
                            <!--Start page content from here-->

                                <p>Hello I am the cotent of page</p>

                            <!--Page content will end here-->
                        </div>
                    <?php require_once('partials/footer.php'); ?>
                </main>
            </div>
        </div>
        <?php require_once('partials/footer_files.php'); ?>
    </body>
</html>