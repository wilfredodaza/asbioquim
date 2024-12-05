<?php
    require 'pages/models/HeadModel.php';
    $menu = new HeadModel;
    $general = $menu->getTable("general");
    $host = $_SERVER['HTTP_HOST'];
    $base_url = $host == 'localhost' ? "http://localhost/asbioquim" : "https://asbioquim.com.co";
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title><?= !empty($general[0]->title) ? $general[0]->title : 'Asbioquim S.A.S' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">

    <meta name="description" content="<?= !empty($general[0]->description) ? $general[0]->description : 'Asbioquim S.A.S' ?> " />
    <meta name="keywords" content="<?= !empty($general[0]->keywords) ? $general[0]->keywords : 'Asbioquim S.A.S' ?> "/>

    <meta name="author" content="iplanetcolombia.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= $base_url ?>/public/page/images/shorticon/<?= !empty($general[0]->logo) ? $general[0]->logo : 'iplanet.png' ?> " />

    <!-- Google Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Fira+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- CSS Global Compulsory (Do not remove)-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/font-awesome/all.min.css" />
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/flaticon/flaticon.css" />

    <!-- Page CSS Implementing Plugins (Remove the plugin CSS here if site does not use that feature)-->
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/select2/select2.css" />
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/datetimepicker/datetimepicker.min.css" />
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/magnific-popup/magnific-popup.css" />
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/swiper/swiper.min.css" />
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/animate/animate.min.css" />

    <!-- Template Style -->
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/style.css" />
    <link rel="stylesheet" href="<?= $base_url ?>/public/page/css/custom.css" />


    
</head>
<body>