<?php
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['usuario'];
$idfina = $_GET['idfina'];
?>

<?php

$host = "localhost";
$user = "root";
$senha = "";
$banco = "startsales";
$conexao = mysqli_connect($host, $user, $senha) or die (mysql_error());
mysqli_select_db($conexao, $banco) or die (mysql_error());

$selectfina = ("SELECT idfina, nome, tipofina FROM finalizadora WHERE idfina = $idfina") or die(mysqli_error());
$dadosfina = $conexao->query($selectfina);
        while ($linha = $dadosfina->fetch_assoc()) {
        $id = $linha["idfina"];
	    $nome = $linha["nome"];
	    $tipofina = $linha["tipofina"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Titulo da Pagina -->
    <title>Altere a Finalizadora</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/themeusu.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <?php
	        if($_SESSION['tipousu'] == 0){
                require_once 'View/SidebarMobile.php';
            }
            else if ($_SESSION['tipousu'] == 1){
                require_once 'View/SidebarMobile.php';
            }
            else{
                require_once 'View/SidebarMobile.php';
            } 
        ?>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <?php
	        if($_SESSION['tipousu'] == 0){
                require_once 'View/Sidebar.php';
            }
            else if ($_SESSION['tipousu'] == 1){
                require_once 'View/Sidebar.php';
            }
            else{
                require_once 'View/Sidebar.php';
            } 
        ?>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            <div class="header-button">
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                        <img src="images/icon/avatar.png" alt="" />
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#"><?php echo $_SESSION["nome"]; ?></a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            <div class="info clearfix">
                                                <div class="image">
                                                    <a href="#">
                                                    <img src="images/icon/avatar.png" alt="" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <h5 class="name">
                                                    </h5>
                                                    <p>Nome do usuário: </p>
                                                    <span class="email"><?php echo $_SESSION["usuario"]; ?></span>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__body">
                                            <div class="account-dropdown__item">
                                                    <a href="index.php">
                                                        <i class="zmdi zmdi-home"></i>Pagina principal</a>
                                                </div>
                                            </div>
                                            <div class="account-dropdown__footer">
                                            <a href="logout.php">
                                                    <i class="zmdi zmdi-power"></i>Sair</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT -->
               <form action="php/updatefina.php?idfina=<?php echo $id; ?>" method="POST">
                    <div class="main-content">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div style="float:left;width:900px;height:100px;">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Alteração de Finalizadora</strong>
                                            <button type="submit" id="salvar" class="btn btn-success">Salvar</button>
                                            <button type="button" id="excluir" class="btn btn-warning"><a href="php/deletefina.php?idfina=<?php echo $idfina; ?>">Excluir</a></button>
                                            <button type="button" id="cancelar" class="btn btn-danger"><a href="listafina.php">Cancelar</a></button>        
                                        </div>
                                        <div class="card-body card-block">
                                           
                                                <div class="form-group">
                                                        <label for="company" class=" form-control-label">Finalizadora</label>
                                                        <input type="text" id="nome" name="nome" value="<?php echo $nome  ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="vat" class=" form-control-label">Tipo</label>
                                                        <select name="tipo" id="tipo" class="form-control-sm form-control">
                                                            <option value="<?php echo $tipofina  ?>"><?php echo $tipofina ?></option>
                                                            <option value="Dinheiro">Dinheiro</option>
                                                            <option value="Cartao de Debito">Cartão de Débito</option>
                                                            <option value="Cartao de Credito">Cartão de Cŕedito</option>
                                                            <option value="Outros">Outros</option>
                                                         </select>
                                                    </div>
                    
                                                    </div>
                                                
                                                </div>
                                        </div>
                                    </div>
                                </div>
                                
                                
                                 </div>
                            </div>
                        </div>
                    </div>
                    <!-- END MAIN CONTENT-->
                    <!-- END PAGE CONTAINER-->
                </div>
            </form>
    </div>
        <?php } ?>
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->
