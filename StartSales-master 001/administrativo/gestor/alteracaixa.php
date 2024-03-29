<?php
session_start();
$id = $_SESSION['id'];
$nome = $_SESSION['usuario'];
$idcaixa = $_GET['idcaixa'];
?>

<?php

$host = "localhost";
$user = "root";
$senha = "";
$banco = "startsales";
$conexao = mysqli_connect($host, $user, $senha) or die (mysql_error());
mysqli_select_db($conexao, $banco) or die (mysql_error());

$selectcaixa = ("SELECT idcaixa, numero, ativo FROM caixa WHERE idcaixa = $idcaixa") or die(mysqli_error());
$dadoscaixa = $conexao->query($selectcaixa);
        while ($linha = $dadoscaixa->fetch_assoc()) {
        $id = $linha["idcaixa"];
	    $numero = $linha["numero"];
	    $ativo = $linha["ativo"];
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
    <title>Altere o Caixa</title>

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
               <form action="php/updatecaixa.php?idcaixa=<?php echo $id; ?>" method="POST">
                    <div class="main-content">
                        <div class="section__content section__content--p30">
                            <div class="container-fluid">
                                <div style="float:left;width:900px;height:100px;">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong>Alteração de Caixas</strong>
                                            <button type="submit" id="salvar" class="btn btn-success">Salvar</button>
                                            <button type="button" id="excluir" class="btn btn-warning"><a href="php/deletecaixa.php?idcaixa=<?php echo $idcaixa; ?>">Excluir</a></button>
                                            <button type="button" id="cancelar" class="btn btn-danger"><a href="listacaixa.php">Cancelar</a></button>        
                                        </div>
                                        <div class="card-body card-block">
                                           
                                                <div class="form-group">
                                                        <label for="company" class=" form-control-label">Número</label>
                                                        <input type="text" id="numero" name="numero" value="<?php echo $numero  ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="vat" class=" form-control-label">Ativo</label>
                                                        <select name="ativo" id="ativo" class="form-control-sm form-control">
                                                            <option value="<?php echo $ativo  ?>"><?php echo $ativo ?></option>
                                                            <option value="Sim">Sim</option>
                                                            <option value="Nao">Não</option>
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
