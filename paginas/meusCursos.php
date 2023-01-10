<?php
if (!isset($_SESSION))
    session_start();

$idUsuario = $_SESSION['usuario'];
$sql = "SELECT * FROM cursos WHERE id in (SELECT curso FROM usuariocurso WHERE usuario = '$idUsuario')";
$sqlQuery = $mysqli->query($sql) or die($mysqli->error);
$cursoLinhas = $sqlQuery->num_rows;


?>
<!-- Page-header start -->
<div class="page-header card">
<div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont icofont icofont-bag bg-c-pink"></i>
                <div class="d-inline">
                    <h4>Meus Cursos</h4>
                    <span>Abaixo estão todos os cursos que foram comprados por você!</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.php">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Meus Cursos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
    <?php if($cursoLinhas == 0){ ?>
            <div class="h1">Nenhum curso cadastrado!</div>
        <?php } else {
            while($curso = $sqlQuery->fetch_assoc()){?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-block">
                            <img src="<?php echo $curso['fotoCurso']; ?>" alt="" class="img-fluid mb-5">
                            <h3><?php echo $curso['titulo']; ?></h3>
                            <div class="row align-items-end">
                            <p class="col-lg-9"><?php echo $curso['professor']; ?></p>
                            <P class="col-lg-3 text-md-end" style="text-align: right"><?php echo $curso['carga']; ?>Hs</P>
                            </div>
                            <p><?php echo $curso['descricao']; ?></p>
                            <a href="index.php?pagina=curso-conteudo" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" style="text-decoration: none; color: #fff;">Acessar aulas</a>
                        </div>
                    </div>
                </div>
            <?php }
        }?>
    </div>
</div>