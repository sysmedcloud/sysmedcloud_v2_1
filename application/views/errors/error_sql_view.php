<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MEDISIS | Error SQL</title>

    <link href="<?=base_url();?>css/bootstrap.min.css" rel="stylesheet">
    <link href="<?=base_url();?>font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?=base_url();?>css/animate.css" rel="stylesheet">
    <link href="<?=base_url();?>css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">


    <div class="middle-box text-center animated fadeInDown">
        
        <div class="col-sm-12">
            <h1><i class="fa fa-frown-o"></i></h1>
            <h3 class="font-bold"><?=$msg_error;?></h3>

            <div class="error-desc">
                Lo sentimos, pero la página que buscas se encuentra con errores.
                haga clic en el botón cerrar sesión e inicie nuevamente sesión.
                <br>
                <a href="<?=base_url();?>login_app/logout_app" class="btn btn-primary">Cerrar Sesión</a>
            </div>
        </div>
        
    </div>

    <!-- Mainly scripts -->
    <script src="<?=base_url();?>js/jquery-2.1.1.js"></script>
    <script src="<?=base_url();?>js/bootstrap.min.js"></script>

</body>

</html>
