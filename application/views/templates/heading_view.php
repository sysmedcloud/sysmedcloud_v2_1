            <div class="row wrapper border-bottom white-bg page-heading">
                 <div class="col-sm-12">
                    <h2><?=ucfirst($session["perfil"]);?></h2>
                    <ol class="breadcrumb">
                        <li>
                            <?=$menu;?>
                        </li>
                        <li class="active">
                            <strong><?=ucfirst($empresa->nombre);?></strong>
                        </li>
                        <!--<li>
                           <?=ucfirst($session["perfil"]);?>
                        </li>
                        <li>
                            <?=ucfirst($session["primer_nom"]);?> <?=ucfirst($session["apellido_pat"]);?> <?=ucfirst($session["apellido_mat"]);?>
                        </li>-->
                    </ol>
                </div>
            </div>