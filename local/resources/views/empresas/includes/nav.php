<nav class="header-navbar navbar navbar-with-menu navbar-fixed-top navbar-semi-dark navbar-shadow" style="z-index: 100">
    <div class="navbar-wrapper">
        <div class="navbar-header" style="background-color: #f4f6f7;">
            <ul class="nav navbar-nav">
                <li class="nav-item mobile-menu hidden-md-up float-xs-left">
                    <a class="nav-link nav-menu-main menu-toggle hidden-xs">
                        <i class="icon-menu5 font-large-1" style="color: #343535;">
                        </i>
                    </a>
                </li>
                <li class="nav-item" >
                    <a class="navbar-brand nav-link" href="<?=  Request::root();?>/ofertas" style="padding-top: 7px;">
                        <img alt="branding logo" class="brand-logo" data-collapse="<?= $ruta;?>app-assets/images/logo/robust-logo-small.png" data-expand="<?= $ruta;?>app-assets/images/logo/robust-logo-light.png" src="<?= $ruta;?>app-assets/images/logo/robust-logo-light.png"/>
                    </a>
                </li>
                <li class="nav-item hidden-md-up float-xs-right">
                    <a class="nav-link open-navbar-container" data-target="#navbar-mobile" data-toggle="collapse">
                        <i class="icon-ellipsis pe-2x icon-icon-rotate-right-right">
                        </i>
                    </a>
                </li>
            </ul>
        </div>
        <div class="navbar-container content container-fluid">
            <div class="collapse navbar-toggleable-sm" id="navbar-mobile">
                <ul class="nav navbar-nav">
                    <li class="nav-item hidden-sm-down">
                        <a class="nav-link nav-menu-main menu-toggle hidden-xs" >
                            <i  class="icon-menu5">
                            </i>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav float-xs-right" style="z-index:10;position: relative;">
                    <li class="dropdown dropdown-user nav-item">
                        <a class="dropdown-toggle nav-link dropdown-user-link" data-toggle="dropdown" href="#">
                            <span class="avatar avatar-online">
                                 <?php if (session()->get('company_img')!=""): ?> 
                                                        <img class="img-nav-bar" style="width: 30px;height: 30px;border-radius: 50%;border: 1px solid #cdcdcd;" id="img-profile" style="height: 100px;width: 100px;border-radius: 50%;border: 4px solid #1d2b36;" src="<?= Request::root().'/uploads/min/'.session()->get('company_img')?>"> 
                                                        <?php else :?>
                                                        <img class="img-nav-bar" alt="avatar" src="<?= $ruta;?>app-assets/images/portrait/small/avatar-s-1.png">
                                                        <?php endif ?>
                               
                                    <i>
                                    </i>
                                </img>
                            </span>
                            <span class="user-name">
                               <?php echo session()->get('company_nombre');?>
                            </span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" >
                            <a class="dropdown-item" href="<?php echo Request::root();?>/empresas/panel">
                                <i class="icon-home3">
                                </i>
                                Inicio
                            </a>
                            <a class="dropdown-item" href="<?php echo Request::root();?>/empresas/perfil">
                                <i class="icon-user">
                                </i>
                                Mi perfil
                            </a>
                            <a class="dropdown-item" href="<?php echo Request::root();?>/empresas/planes">
                                <i class="icon-star-full">
                                </i>
                                Planes
                            </a>
                            <a class="dropdown-item" href="<?php echo Request::root();?>/empresas/configuracion">
                                <i class="icon-cog">
                                </i>
                                Configuración
                            </a>
                            <div class="dropdown-divider">
                            </div>
                            <a class="dropdown-item" href="<?php echo Request::root();?>/empresas/salir">
                                <i class="icon-log-out">
                                </i>
                                Salir
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>