<?php
    include('lib/conexao.php');
    include('lib/funcoes.php');
    include('lib/protect.php');
    protect(1);
    
    $sqlUsuario = "SELECT * FROM usuarios";
    $sqlUsuarioQuery = $mysqli->query($sqlUsuario) or die($mysqli->error);
    $sqlUsuarioLinhas = $sqlUsuarioQuery->num_rows;
?>

<!-- Page-header start -->
<div class="page-header card">
<div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <i class="icofont icofont icofont icofont-user-alt-3 bg-c-green"></i>
                <div class="d-inline">
                    <h4>Gerenciar Usuários</h4>
                    <span>Administre os usuários cadastrados no sistema.</span>
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
                    <li class="breadcrumb-item"><a href="#!">Gerenciar Usuários</a>
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
                    <h4>Todos os usuários</h4>
                    <div class="row align-items-center" >
                        <div class="col-sm-10"><span>Aqui estão todos os usuários cadastrados</span></div>
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
                                    <th>Imagem</th>
                                    <th>Nome</th>
                                    <th>E-mail</th>
                                    <th>É Admin?</th>
                                    <th>Data de Cadastro</th>
                                    <th>Gerenciar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if($sqlUsuarioLinhas == 0){ ?>
                                    <tr>
                                        <td colspan=6><p class="text-danger">Nenhum curso foi cadastrado!!!</p></td>    
                                    </tr>
                                <?php } 
                                while($usuario = $sqlUsuarioQuery->fetch_assoc()){?>
                                    <tr>
                                        <td><?php echo $usuario['id'] ?></td>
                                        <td><img height="36" src="<?php echo $usuario['fotoPerfil']; ?>" alt=""> </td>
                                        <td><?php echo $usuario['nome'] ?></td>
                                        <td><?php echo $usuario['email'] ?></td>
                                        <td><?php if($usuario['admin']) echo "SIM"; else echo "NÃO"; ?></td>
                                        <td><?php echo visualizaDataBanco($usuario['dataCadastro']) ?></td>
                                        <td>
                                            <div class="row col-md-12">
                                                <div class="col-md-6">
                                                    <a class="btn hor-grd btn-grd-info btn-md btn-block waves-effect text-center" href="index.php?pagina=usuario-editar&idUsuario=<?php echo $usuario['id']?>" style="text-decoration: none; color: #fff;">Editar</a>
                                                </div>
                                                <div class="col-md-6">
                                                    <a class="btn hor-grd btn-grd-danger btn-md btn-block waves-effect text-center" href="index.php?pagina=usuario-deletar&idUsuario=<?php echo $usuario['id']?>" style="text-decoration: none; color: #fff;">Deletar</a>
                                                </div>
                                            </div>    
                                        </td>
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