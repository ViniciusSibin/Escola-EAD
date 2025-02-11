<?php

    include('lib/conexao.php');
    include('lib/protect.php');
    protect(0);

    $pagina = "paginaInicial";
    $curso = false;

    if(isset($_GET['pagina'])) $pagina = $_GET['pagina'];

    if(isset($_GET['curso'])) $curso = $_GET['curso'];

    
    $id_Usuario = $_SESSION['usuario'];
    $sql_usuario = "SELECT * FROM usuarios WHERE id = '$id_Usuario'"; 
    $sql_usuario_query = $mysqli->query($sql_usuario) or die($mysqli->error);
    $usuario = $sql_usuario_query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Vtec - EAD</title>
    <!-- HTML5 Shim and Respond.js IE9 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="description" content="CodedThemes">
    <meta name="keywords" content="flat ui, admin  Admin , Responsive, Landing, Bootstrap, App, Template, Mobile, iOS, Android, apple, creative app">
    <meta name="author" content="CodedThemes">
    <!-- Favicon icon -->
    <link rel="icon" href="assets/images/favicon.webp" type="image/x-icon">
    <!-- Google font--><link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,800" rel="stylesheet">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap/css/bootstrap.min.css">
    <!-- themify-icons line icon -->
    <link rel="stylesheet" type="text/css" href="assets/icon/themify-icons/themify-icons.css">
    <!-- ico font -->
    <link rel="stylesheet" type="text/css" href="assets/icon/icofont/css/icofont.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.mCustomScrollbar.css">
</head>

<body>
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="ball-scale">
            <div class='contain'>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
                <div class="ring"><div class="frame"></div></div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <div id="pcoded" class="pcoded">
        <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header">
                <div class="navbar-wrapper">
                    <!-- Inicio da Logo -->
                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#!">
                            <i class="ti-menu"></i>
                        </a>
                        <a class="mobile-search morphsearch-search" href="#">
                            <i class="ti-search"></i>
                        </a>
                        <a href="index.html">
                            <img class="img-fluid" src="assets/images/Vtec_branca.png" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>
                    <!-- Fim da Logo -->

                    <!-- Inicio do header (Usuário) -->
                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu"></i></a></div>
                            </li>
                            
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            <?php if(isset($_SESSION['admin']) && !$_SESSION['admin']){?>
                            <li class="header-notification">
                                <a href="#!">
                                    R$
                                    <span class="badge bg-c-pink"></span>
                                    <?php if(empty($usuario['credito'])){
                                        echo "0,00";
                                    } else {
                                        echo number_format($usuario['credito'], 2, ',', '.');
                                    } ?>
                                </a>
                            </li>
                            <?php } ?>
                            <li class="user-profile header-notification">
                                <a href="#!">
                                    <img src="<?php echo $usuario['fotoPerfil'] ?>" class="img-radius" alt="User-Profile-Image">
                                    <span><?php echo $usuario['nome'] ?></span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                    <li>
                                        <a href="index.php?pagina=perfil">
                                            <i class="ti-user"></i> Perfil
                                        </a>
                                    </li>
                                    <li>
                                        <a href="logout.php">
                                            <i class="ti-layout-sidebar-left"></i> Sair
                                        </a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                    <!-- Fim do header (Usuário) -->
                </div>
            </nav>

            
            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <!-- inicio do Menu lateral -->
                    <nav class="pcoded-navbar">
                        <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
                        <div class="pcoded-inner-navbar main-menu">
                            <?php if(isset($_SESSION['admin']) && !$_SESSION['admin']){?>
                                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="liHover">
                                        <a href="index.php?pagina=paginaInicial">
                                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Página Inicial</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="index.php?pagina=lojaDeCursos">
                                            <span class="pcoded-micon"><i class="ti-bag"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Loja de Cursos</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="index.php?pagina=meusCursos">
                                            <span class="pcoded-micon"><i class="ti-control-play"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Meus Cursos</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="logout.php">
                                            <span class="pcoded-micon"><i class="ti-layout-sidebar-left"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Sair</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            <?php } else {?>
                                <div class="pcoded-navigatio-lavel" data-i18n="nav.category.navigation">Menu</div>
                                <ul class="pcoded-item pcoded-left-item">
                                    <li class="liHover">
                                        <a href="index.php?pagina=paginaInicial">
                                            <span class="pcoded-micon"><i class="ti-home"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Página Inicial</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="index.php?pagina=curso-gerenciar">
                                            <span class="pcoded-micon"><i class="ti-bag"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Gerenciar Cursos</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="index.php?pagina=usuario-gerenciar">
                                            <span class="pcoded-micon"><i class="ti-user"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Gerenciar Usuários</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="index.php?pagina=relatorios">
                                            <span class="pcoded-micon"><i class="ti-file"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Relatórios</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                    <li class="">
                                        <a href="logout.php">
                                            <span class="pcoded-micon"><i class="ti-layout-sidebar-left"></i><b>D</b></span>
                                            <span class="pcoded-mtext" data-i18n="nav.dash.main">Sair</span>
                                            <span class="pcoded-mcaret"></span>
                                        </a>
                                    </li>
                                </ul>
                            <?php } ?>
                        </div>
                    </nav>
                    <!-- Fim do Menu lateral -->

                    <!-- inicio do bory -->
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">
                            <div class="main-body">
                                <div class="page-wrapper">
                                    <?php if($curso) require("$curso"); else require("paginas/$pagina.php"); ?>
                                </div>
                            </div>
                            <div id="styleSelector">
                            </div>
                        </div>
                    </div>
                    <!-- Fim do bory -->
                </div>
            </div> 
        </div>
    </div>
    <!-- Warning Section Starts -->
    <!-- Older IE warning message -->
<!--[if lt IE 9]>
<div class="ie-warning">
    <h1>Warning!!</h1>
    <p>You are using an outdated version of Internet Explorer, please upgrade <br/>to any of the following web browsers
        to access this website.</p>
    <div class="iew-container">
        <ul class="iew-download">
            <li>
                <a href="http://www.google.com/chrome/">
                    <img src="assets/images/browser/chrome.png" alt="Chrome">
                    <div>Chrome</div>
                </a>
            </li>
            <li>
                <a href="https://www.mozilla.org/en-US/firefox/new/">
                    <img src="assets/images/browser/firefox.png" alt="Firefox">
                    <div>Firefox</div>
                </a>
            </li>
            <li>
                <a href="http://www.opera.com">
                    <img src="assets/images/browser/opera.png" alt="Opera">
                    <div>Opera</div>
                </a>
            </li>
            <li>
                <a href="https://www.apple.com/safari/">
                    <img src="assets/images/browser/safari.png" alt="Safari">
                    <div>Safari</div>
                </a>
            </li>
            <li>
                <a href="http://windows.microsoft.com/en-us/internet-explorer/download-ie">
                    <img src="assets/images/browser/ie.png" alt="">
                    <div>IE (9 & above)</div>
                </a>
            </li>
        </ul>
    </div>
    <p>Sorry for the inconvenience!</p>
</div>
<![endif]-->
<!-- Warning Section Ends -->
<!-- Required Jquery -->
<script type="text/javascript" src="assets/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="assets/js/jquery-ui/jquery-ui.min.js"></script>
<script type="text/javascript" src="assets/js/popper.js/popper.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap/js/bootstrap.min.js"></script>
<!-- jquery slimscroll js -->
<script type="text/javascript" src="assets/js/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- modernizr js -->
<script type="text/javascript" src="assets/js/modernizr/modernizr.js"></script>
<script type="text/javascript" src="assets/js/modernizr/css-scrollbars.js"></script>
<!-- classie js -->
<script type="text/javascript" src="assets/js/classie/classie.js"></script>
<!-- Custom js -->
<script type="text/javascript" src="assets/js/script.js"></script>
<script src="assets/js/pcoded.min.js"></script>
<script src="assets/js/demo-12.js"></script>
<script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
</body>

</html>
