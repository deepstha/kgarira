<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="google-site-verification" content="X6WiUfQrZinPUv39juh6Hlqtm_1batJnBmCu9FCTUK0"/>
    <meta name="facebook-domain-verification" content="4b77hirkn43cqpbn7mahqmqtp5efa6" />
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet">
    <!-- DATERANGEPICKER CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    
    <!-- script -->
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"
            integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP -->
    <script  src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <!-- BOOTSTRAP Select -->
    <script  src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js" crossorigin="anonymous"></script>
    <!-- APEXCHARTS INTEGRATIONS -->
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <!-- DATERANGEPICKER INTEGRATIONS -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?> data-target=".navbar" data-offset="10">
    <?php wp_body_open(); ?>
    <div class="theme-wrapper">
        <!-- PRELOADER STARTS -->
        <div class="preloader"></div>
        <!-- PRELOADER ENDS -->
        <!-- HEADER SECTION STARTS -->
        <header class="header" id="header">
            <nav class="navbar navbar-expand-lg m-0">
                <a class="navbar-brand logo" href="/" ><img src="<?php echo esc_url( get_template_directory_uri());?>/src/assets/images/logo.svg" alt="KrispCall" title="Kgarira"  width="135" height="32"></a>
                <div class="ml-auto">
                    <div class="dropdown">
                        <div class="btn btn-secondary dropdown-toggle profile" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <div class="icon-avatar item-center bg-info border-r-50">
                                RK
                            </div>   
                            <span>Ravi Kuinkel</span>
                        </div>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Profile</a>
                            <a class="dropdown-item" href="#">Online</a>
                            <a class="dropdown-item" href="#">Sign Out</a>
                        </div>
                    </div>
                </div>
            </nav>
        </header>
<!-- HEADER SECTION ENDS -->