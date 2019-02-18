<?php include_once('includes/session.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto|Tangerine" rel="stylesheet">    
    <title>Coding Arena</title>
</head>
<body>
    <header id="main-header">
        <p id="brand">Coding Arena</p>
        <i class="fa fa-bars" id="mobile-menu-button"></i>
        <ul id="main-nav">
            <?php include('includes/nav.php') ?>
            <i class="fa fa-close" id="mobile-menu-close-button"></i>
        </ul>
    </header>