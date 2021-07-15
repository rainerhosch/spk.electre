<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">

    <title><?= $title; ?></title>

    <meta name="description" content="ProUI Frontend is a Responsive Bootstrap Site Template created by pixelcave and added as a bonus in ProUI Admin Template package which is published on Themeforest.">
    <meta name="author" content="pixelcave">
    <meta name="robots" content="noindex, nofollow">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="<?= base_url('assets/frontend') ?>/img/favicon.png">
    <link rel="apple-touch-icon" href="<?= base_url('assets/frontend') ?>/img/icon57.png" sizes="57x57">
    <link rel="apple-touch-icon" href="<?= base_url('assets/frontend') ?>/img/icon72.png" sizes="72x72">
    <link rel="apple-touch-icon" href="<?= base_url('assets/frontend') ?>/img/icon76.png" sizes="76x76">
    <link rel="apple-touch-icon" href="<?= base_url('assets/frontend') ?>/img/icon114.png" sizes="114x114">
    <link rel="apple-touch-icon" href="<?= base_url('assets/frontend') ?>/img/icon120.png" sizes="120x120">
    <link rel="apple-touch-icon" href="<?= base_url('assets/frontend') ?>/img/icon144.png" sizes="144x144">
    <link rel="apple-touch-icon" href="<?= base_url('assets/frontend') ?>/img/icon152.png" sizes="152x152">
    <link rel="apple-touch-icon" href="<?= base_url('assets/frontend') ?>/img/icon180.png" sizes="180x180">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/plugins.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/main.css">
    <link rel="stylesheet" href="<?= base_url('assets/frontend') ?>/css/themes.css">
    <!-- END Stylesheets -->

    <!-- Modernizr (browser feature detection library) -->
    <script src="<?= base_url('assets/frontend') ?>/js/vendor/modernizr.min.js"></script>
</head>

<body>
    <?php $this->load->view('frontend/layout/header'); ?>
    <div class="container">
        <div class="row"></div>
    </div>
    <?php $this->load->view('frontend/layout/footer');
    ?>
    <!-- END Page Container -->

    <!-- Scroll to top link, initialized in js/app.js - scrollToTop() -->
    <a href="#" id="to-top"><i class="fa fa-angle-up"></i></a>

    <!-- jQuery, Bootstrap.js, jQuery plugins and Custom JS code -->
    <script src="<?= base_url('assets/frontend') ?>/js/vendor/jquery.min.js"></script>
    <script src="<?= base_url('assets/frontend') ?>/js/vendor/bootstrap.min.js"></script>
    <script src="<?= base_url('assets/frontend') ?>/js/plugins.js"></script>
    <script src="<?= base_url('assets/frontend') ?>/js/app.js"></script>
</body>

</html>