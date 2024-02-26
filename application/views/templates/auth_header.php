<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title ?></title>
    
    <link rel="icon" type="image/svg" sizes="16x16" href="<?= base_url('assets/img/icon/'); ?>logo.svg">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>fontawesome-free/css/all.css" rel="stylesheet">
    <style>
      .hline-w {
        border-bottom: 2px solid #858796;
        margin-bottom: 25px;
      }
      .warna {
        color: #4e73dfa6;
      }
    </style>
</head>

<body>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="min-height: 66px;">
      <a class="navbar-brand ml-3" href="<?= base_url($role) ;?>">
        <img src="<?= base_url('assets/img/icon/'); ?>logo-icon.png" width="33" height="33" class="d-inline-block align-top"> Transparan Screen Printing
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
    
      <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item active">
            <a class="nav-link" href="<?= base_url($role) ;?>">Home <span class="sr-only">(current)</span></a>
          </li>
        </ul>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
          <li class="nav-item">
              <?= $this->session->flashdata('message'); ?>
          </li>
        </ul>
        <?php if ($modal): ?>
        <form class="form-inline mr-3 my-lg-0">
          <button class="btn btn-outline-success my-2 my-sm-0 rounded-pill" type="button"  data-toggle="modal" data-target="#modal<?= $modal; ?>"><?= $modal == 'User' ? 'Login/Register' : 'Login' ;?></button>
        </form>
        <?php endif; ?>
      </div>
    </nav>
  </div>