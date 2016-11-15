
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <?php //echo md5("demo_1234"); ?>
                <h1 class="logo-name">
                    <img class="img-responsive" src="<?php echo base_url();?>img/logo.png" alt="SysMedCloud" title="SysMedCloud">
                </h1>
            </div>
            <h3>Bienvenidos a SysMedCloud</h3>
            <p>
                Sistema para la administración de Historias Clínicas Electrónicas online.
            </p>
            
            <p>Inicia sesión</p>
            
            <form  method="post" action="<?=base_url();?>login_app/inicio_sesion" class="m-t" role="form">
                
                <?=form_hidden('token',$token)?>
                
                <div class="form-group">
                    <input type="username" name="username" class="form-control" placeholder="Username" required="">
                    <?php echo form_error('username','<div class="text-danger">','</div>');?>
                </div>
                
                <div class="form-group">
                    <input type="password" name="password" class="form-control" placeholder="Password" required="">
                    <?php echo form_error('password','<div class="text-danger"">','</div>'); ?>
                </div>
                
                <?php
                    
                    //Mensaje tipo flashdata - datos de acceso son incorrectos
                    $login = $this->session->flashdata('usuario_incorrecto');
                    
                if ($login){ ?>
                <div class="text-danger"><?=$login;?></div><br>
                <?php } ?>
                         
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                
                <a href="#"><small>¿Has olvidado tu contraseña?</small></a>
                <p class="text-muted text-center"><small>¿No tienes una cuenta?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Crear una cuenta</a>
                
            </form>
            <p class="m-t"> 
                <small>
                    Copyright © 2015 sysmedcloud.cl<!--Inspinia we app framework base on Bootstrap 3 &copy; 2014-->
                </small> 
            </p>
        </div>
    </div>
    
   