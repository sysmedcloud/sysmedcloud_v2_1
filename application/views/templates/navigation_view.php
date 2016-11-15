<div id="wrapper">
    
<nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" width="48px;" class="img-circle" src="<?=base_url();?>img/<?=$session["imagen"];?>" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> 
                                <span class="block m-t-xs"> 
                                    <strong class="font-bold">
                                    <?=ucfirst($session["primer_nom"])." ".ucfirst($session["apellido_pat"])." ".ucfirst($session["apellido_mat"]);?>
                                    </strong>
                            </span> 
                            <span class="text-muted text-xs block">
                                <?=ucfirst($session["perfil"]);?> 
                                <b class="caret"></b>
                            </span> 
                            </span> 
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Perfil</a></li>
                            <li><a href="contacts.html">Contacto</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="<?=base_url();?>login_app/logout_app">Cerrar sesión</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        SMC
                    </div>
                </li>
                <!-- menu medisis -->
                <li >
                    <a href="<?=base_url();?><?=strtolower($session["perfil"]);?>/dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Inicio</span></a>
                </li>
                
                <li>
                    <a href="<?=base_url();?><?=strtolower($session["perfil"]);?>/perfil"><i class="fa fa-user-md"></i> <span class="nav-label">Perfil</span></a>
                </li>   
                
                <li>
                    <a href="<?=base_url();?>"><i class="fa fa-calendar"></i> <span class="nav-label">Calendario</span></a>
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-users"></i> <span class="nav-label">Pacientes</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li ><a href="<?=base_url();?>">Crear Paciente</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-stethoscope"></i> <span class="nav-label">Consulta Medica</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li ><a href="<?=base_url();?>">Nueva Consulta</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-gears"></i> <span class="nav-label">Gestion de datos</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li ><a href="<?=base_url();?>profesional/medicamentos">Medicamentos</a></li>
                        <li ><a href="<?=base_url();?>profesional/alergias">Alergias</a></li>
                        <li ><a href="<?=base_url();?>profesional/patologias">Patologías</a></li>
                        <li ><a href="<?=base_url();?>profesional/tratamientos">Tratamientos</a></li>
                        <li ><a href="<?=base_url();?>profesional/vacunas">Vacunas</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="<?=base_url();?>"><i class="fa fa-clipboard"></i> <span class="nav-label">Reportes</span></a>
                </li>
                
                <li>
                    <a href="#"><i class="fa fa-phone-square"></i> <span class="nav-label">Soporte</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li ><a href="<?=base_url();?>">Contactenos</a></li>
                        <li >
                            <a href="#" data-toggle="modal" data-target="#myModal5">Acerca de Sysmedcloud</a>
                            <div class="modal inmodal fade" id="myModal5" tabindex="-1" role="dialog"  aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                                            
                                            <h4 class="modal-title">Acerca de SysMedCloud</h4>
                                            <small class="font-bold">
                                                Historias clínicas electrónicas 100% online
                                                
                                            </small>
                                        </div>
                                        <div class="modal-body">
                                             
                                            <strong>SysMedCloud</stronG> (Sistema de gestión  medica online), 
                                            es un sistema que le permite mantener una correcta gestión de los 
                                            pacientes que son atendidos por usted y sus colegas en los centros medicos 
                                            a lo largo del país.<br> 
                                            Con él, puede crear fichas medicas electrónicas, consultas medicas, 
                                            gestionar pacientes e incluso emitir Ordenes Medicas y Consentimientos Informados. 
                                            <strong>Olvídese de los papeles</strong> y sea bienvenido a SysMedCloud.
                                            <br><br>
                                            <strong>¡Bienvenido!</strong>
                                            <br><br>
                                            <img class="img-responsive" src="<?php echo base_url();?>img/logo.png" alt="SysMedCloud" title="SysMedCloud">
                                            
                                            0666 Antonio Varas, Providencia<br>
                                            Santiago de Chile<br>
                                            P: (+569) 8640-5645<br>
                                            Correo<br>
                                            <a href="">help@sysmedcloud.cl</a> 
                                            
                                        </div>

                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-white" data-dismiss="modal">Salir</button>
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- fin menu medisis -->
            </ul>

        </div>
</nav>