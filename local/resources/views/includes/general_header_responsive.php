<?php  

$dir = '';
if ($_SERVER["SERVER_NAME"] == "localhost") {
	$dir = "/jobbers2.0";
} else {
	$dir = "/jobbersv2";
}

$back="";
if(isset($atras) && $atras==1)
{
$back="../administrator_candidatos_ver.php";	
}

$back2="";
if(isset($atras) && $atras==1)
{
$back2="../";	
}  

?>
<div class="responsive-header">
    <div class="responsive-menubar">
        <div class="res-logo" style="background-color: #fff; border-radius: 10px;padding-left: 25px;padding-right: 25px;">
            <a href="<?= url('inicio') ?>" title="">
                <img alt="Logo Jobbers" src="https://www.jobbersargentina.net/img/logo_d.png"/>
            </a>
        </div>
        <div class="menu-resaction">
            <div class="res-openmenu">
                <img alt="" src="<?= asset('local/resources/views/images/icon.png') ?>"/>
                Menú
            </div>
            <div class="res-closemenu">
                <img alt="" src="<?= asset('local/resources/views/images/icon2.png') ?>"/>
                Cerrar
            </div>
        </div>
    </div>
    <div class="responsive-opensec">
        <div class="btn-extars text-center">
            <?php if (session()->
            get('tipo_usuario')==2 || session()->get('tipo_usuario')== 1): ?>
            <?php if (session()->
            get('tipo_usuario')==2): ?>
            <a class="my-panel" href="<?= url('candidashboard') ?>" style="float: initial" title="">
                Mi panel
            </a>
            <?php elseif (session()->
            get('tipo_usuario')==1): ?>
            <a class="my-panel" href="<?= url('empresa/ofertas') ?>" style="float: initial" title="">
                Mi panel
            </a>
            <?php endif; ?>
            <?php else: ?>
            <ul class="account-btns">
                <li onclick='location.href="<?php echo Request::root()?>/registrar"'>
                    <a title="">
                        <i class="la la-key">
                        </i>
                        Registrar
                    </a>
                </li>
                <li onclick='location.href="<?php echo Request::root()?>/login"'>
                    <a title="">
                        <i class="la la-external-link-square">
                        </i>
                        Ingresar
                    </a>
                </li>
            </ul>
            <?php endif; ?>
        </div>
        <!--Btn Extras -->
        <div class="responsivemenu">
            <?php include("local/resources/views/includes/menus_publicos.php");?>
        </div>
    </div>
</div>