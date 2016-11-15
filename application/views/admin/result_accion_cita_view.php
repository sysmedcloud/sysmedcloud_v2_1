<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <script src="<?php echo base_url();?>js/jquery.min.js"></script>
    <script src="<?php echo base_url();?>js/bootstrap.min.js"></script>
    
    <title><?=$paciente;?></title>
</head>
<body>
<div class="container">
    <div class="ibox-content">
        <div class="alert <?php echo $btn_type; ?> alert-dismissable">
           <h2><?php echo $titulo; ?></h2>
        </div>
        <h1 class="logo-name">
           <img class="img-responsive" src="<?php echo base_url();?>img/logo.png" alt="SysMedCloud" title="SysMedCloud">
        </h1>
        <div class="hr-line-dashed"></div>
        <div class="row">
           <div class="col-md-6">
               <!--<button type="button" class="btn btn-default btn-warning">
                   <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                   &nbsp;Ver Agenda
               </button>-->
           </div>
           <div class="col-md-6">&nbsp;</div>
        </div>
    </div>
</div>
</body>
</html>