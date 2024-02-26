<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <title><?= $title; ?></title>
    <!-- Icon -->
    <link rel="icon" type="image/svg" sizes="16x16" href="<?= base_url('assets/img/icon/'); ?>logo.svg">
    <!-- Custom CSS -->
    <link href="<?= base_url('assets/'); ?>css/style.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>fontawesome-free/css/all.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <style>
        .topbar-divider{
            width: 0;
            border-right:1px solid #e3e6f0;
            height:calc(4.375rem - 2rem);
            margin:auto 0.8rem
        }
        hr.sidebar-divider {
            margin: 0.5rem 1rem;
        }
        td.wdth {
            width: 9.2rem;
        }
        button.wdth {
            width: 4.5em;
        }
        .min-hgt {
            min-height: 500px;
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">