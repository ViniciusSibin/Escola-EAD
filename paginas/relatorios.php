<?php
    include('lib/conexao.php');
    include('lib/funcoes.php');
    include('lib/protect.php');
    protect(1);
    
    $sqlRelatorio = "SELECT r.id, u.nome, c.titulo, r.valor, r.dataCompra FROM relatorio r, usuarios u, cursos c WHERE  u.id = r.id_usuario AND c.id = r.id_curso";
    $sqlRelatorioQuery = $mysqli->query($sqlRelatorio) or die($mysqli->error);
    $sqlRelatorioLinhas = $sqlRelatorioQuery->num_rows;
?>

<!-- Page-header start -->
<div class="page-header card">
<div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont icofont icofont-user-alt-3 bg-c-green"></i>
                <div class="d-inline">
                    <h4>Relatórios</h4>
                    <span>Visualize os gastos do usuário dentro do sistema.</span>
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
                    <li class="breadcrumb-item"><a href="#!">Gerenciar Relatórios</a>
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
                    <h4>Relatório</h4>
                    <div class="row align-items-center" >
                        <div class="col-sm-10"><span>Examine o relatório de compra do sistema</span></div>
                        <div class="col-sm-2">
                            <a class="btn hor-grd btn-grd-primary btn-md btn-block waves-effect text-center" href="index.php?pagina=usuario-cadastrar" style="text-decoration: none; color: #fff;">Cadastrar Usuário</a>
                        </div>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Usuário</th>
                                    <th>Curso</th>
                                    <th>Valor</th>
                                    <th>Data de Cadastro</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($sqlRelatorioLinhas == 0){ ?>
                                    <tr>
                                        <td colspan=6><p class="text-danger">Nenhuma compra foi efetuada!!!</p></td>    
                                    </tr>
                                <?php } 
                                while($relatorio = $sqlRelatorioQuery->fetch_assoc()){?>
                                    <tr>
                                        <td><?php echo $relatorio['id'] ?></td>
                                        <td><?php echo $relatorio['nome'] ?></td>
                                        <td><?php echo $relatorio['titulo'] ?></td>
                                        <td><?php echo str_replace('.', ',', $relatorio['valor']) ?></td>
                                        <td><?php echo visualizaDataBanco($relatorio['dataCompra']) ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>