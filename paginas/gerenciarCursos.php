<?php
    require_once('lib/conexao.php');
    
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
                    <h4>Gerenciar Cursos</h4>
                    <span>Administre os cursos cadastrados no sistema.</span>
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
                    <li class="breadcrumb-item"><a href="#!">Gerenciar Cursos</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Page-header end -->

<div class="page-body">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4>Todos os cursos</h4>
                    <div class="row align-items-center" >
                        <div class="col-sm-10"><span>Aqui estão todos os cursos cadastrados</span></div>
                        <div class="col-sm-2"><button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center"><a href="index.php?pagina=cadastrarCursos" style="text-decoration: none; color: #fff;">Cadastrar Curso</a></button></div>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Imagem</th>
                                    <th>Título</th>
                                    <th>Professor</th>
                                    <th>Preço</th>
                                    <th>Gerenciar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($sqlCursoLinhas == 0){ ?>
                                    <tr>
                                        <td colspan=6><p class="text-danger">Nenhum curso foi cadastrado!!!</p></td>    
                                    </tr>
                                <?php } else { 
                                while($curso = $sqlCursoQuery->fetch_assoc()){?>
                                    <tr>
                                        <td><?php echo $curso['id'] ?></td>
                                        <td><img height="45" src="<?php echo $curso['fotoCurso']; ?>" alt=""> </td>
                                        <td><?php echo $curso['titulo'] ?></td>
                                        <td><?php echo $curso['professor'] ?></td>
                                        <td>R$<?php echo number_format($curso['valor'], 2, ',', '.'); ?></td>
                                        <td><button type="button" class="btn btn-primary btn-md btn-block waves-effect text-center col-md-8"><a href="index.php?pagina=detalhesCurso&idCurso=<?php echo $curso['id'] ?>" style="text-decoration: none; color: #fff;">Gerenciar</a></button></td>
                                    </tr>
                                <?php } }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>