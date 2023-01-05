<?php 
    require('lib/conexao.php');

    $sqlCurso = "SELECT * FROM cursos";
    $sqlCursoQuery = $mysqli->query($sqlCurso) or die($mysqli->error);
    $sqlCursoLinhas = $sqlCursoQuery->num_rows;    
?>
<!-- Page-header start -->
<div class="page-header card">
<div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont icofont icofont-bag bg-c-pink"></i>
                <div class="d-inline">
                    <h4>Loja de Cursos</h4>
                    <span>Aqui estão todos os cursos disponíveis em nosso sistema!</span>
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
                    <li class="breadcrumb-item"><a href="#!">Loja de Cursos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <?php if($sqlCursoLinhas == 0){ ?>
            <div class="h1">Nenhum curso cadastrado!</div>
        <?php } else {
            while($curso = $sqlCursoQuery->fetch_assoc()){?>
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
                        <form method="POST" action="">
                            <a class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20" href="index.php?pagina=lojaDeCursosDetalhes&id=<?php echo $curso['id']; ?>">Valor: R$<?php echo str_replace('.', ',', $curso['valor']); ?></a>
                        </form>
                        </div>
                    </div>
                </div>
            <?php }
        }?>
    </div>
</div>



