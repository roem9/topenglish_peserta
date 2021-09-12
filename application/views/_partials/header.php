<!doctype html>
<!--
* Tabler - Premium and Open Source dashboard template with responsive and high quality UI.
* @version 1.0.0-beta2
* @link https://tabler.io
* Copyright 2018-2021 The Tabler Authors
* Copyright 2018-2021 codecalm.net Paweł Kuna
* Licensed under MIT (https://github.com/tabler/tabler/blob/master/LICENSE)
-->
<html lang="en" translate="no">
  <head>
    <meta charset="utf-8"/>
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover"/> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge"/>

    <link rel="icon" href="<?= $link['value']?>/assets/img/logo.png?t=<?= time()?>" type="image/icon type">
    <title><?= $title?></title>

    <!-- CSS files -->
    <link href="<?= base_url()?>assets/css/tabler.min.css" rel="stylesheet"/>
    <link href="<?= base_url()?>assets/css/tabler-flags.min.css" rel="stylesheet"/>
    <link href="<?= base_url()?>assets/css/tabler-payments.min.css" rel="stylesheet"/>
    <link href="<?= base_url()?>assets/css/tabler-vendors.min.css" rel="stylesheet"/>
    <link href="<?= base_url()?>assets/css/demo.min.css" rel="stylesheet"/>
    <link href="<?= base_url()?>assets/mycss/style.css" rel="stylesheet"/>
    <script src="<?= base_url()?>assets/jquery/jquery-3.5.1.min.js"></script>
    <script src="<?= base_url()?>assets/jquery/sweetalert2@9.js"></script>
  </head>
  <!-- <body class="antialiased" style="background-color: #265D5A"> -->
  <body class="antialiased" style="background-color: <?= $background['value']?>">