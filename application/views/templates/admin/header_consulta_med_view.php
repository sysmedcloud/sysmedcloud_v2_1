<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>SYSMEDCLOUD CHILE | DASHBOARD - PANEL DE CONTROL</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <!--<link href="<?php echo base_url(); ?>css/bootstrap.min.css" media="all" rel="stylesheet" type="text/css" />-->
    <link href="<?php echo base_url(); ?>css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>css/plugins/iCheck/custom.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>css/animate.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>css/style.css" media="all" rel="stylesheet" type="text/css" />
    <link href="<?php echo base_url(); ?>css/sweetalert.css" media="all" rel="stylesheet" type="text/css" />
    
    <!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
    <script src="<?php echo base_url(); ?>js/jquery-2.1.1.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/fileinput.js"   type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/locales/es.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/jquery.metisMenu.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/inspinia.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/pace.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/icheck.min.js" type="text/javascript"></script>
    <!--<script src="<?php echo base_url(); ?>js/jasny-bootstrap.min.js" type="text/javascript"></script>-->
    <script src="<?php echo base_url(); ?>js/consulta_medica.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/sweetalert.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>js/validador_rut.js" type="text/javascript"></script>
    
</head>
<?php 
switch ($session["id_perfil"]) {
             
        case '1':
             $skin = 'pace-done skin-1';
             break;
        case '2':
             $skin = 'pace-done skin-3';
             break;
        case '3':
             $skin = 'pace-done';
             break;             
        default:
             # code...
        break;
    } 

?>
<body data-baseurl="<?=base_url()?>" class="<?=$skin;?>">