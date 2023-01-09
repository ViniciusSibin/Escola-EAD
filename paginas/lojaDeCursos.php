<?php 
    require('lib/conexao.php');

    if(!isset($_SESSION)){
        session_start();
    }

    $id_Usuario = $_SESSION['usuario'];

    $sqlCurso = "SELECT c.* FROM cursos c LEFT JOIN usuariocurso uc on uc.curso = c.id WHERE uc.usuario <> '$id_Usuario' or uc.usuario IS NULL";
    $sqlCursoQuery = $mysqli->query($sqlCurso) or die($mysqli->error);
    $sqlCursoLinhas = $sqlCursoQuery->num_rows;  
    
    

    if(isset($_POST['cursoComprado']) && $_POST['cursoComprado']){
        $idCurso = $_POST['idCurso'];
        $valorCurso = $_POST['valorCurso'];
        
        
        $sql_usuario = "SELECT * FROM usuarios WHERE id = '$id_Usuario'"; 
        $sql_usuario_query = $mysqli->query($sql_usuario) or die($mysqli->error);
        $usuario = $sql_usuario_query->fetch_assoc();

        if($usuario['credito'] >= $valorCurso){
            $novoCredito = $usuario['credito'] - $valorCurso;
            
            $sqlNovoCredito = "UPDATE usuarios SET credito = '$novoCredito' WHERE id = '$id_Usuario'";
            $sqlNovoCreditoQuery = $mysqli->query($sqlNovoCredito);
            if(!$sqlNovoCreditoQuery){
                $erro = "Falha ao alterar o crédito no banco de dados.";
            } else {
                $sqlCursoUsuario = "INSERT INTO usuariocurso (usuario, curso) VALUE ('$id_Usuario', '$idCurso')";
                $sqlCursoUsuarioQuery = $mysqli->query($sqlCursoUsuario);
                if(!$sqlCursoUsuarioQuery){
                    $erro = "Falha ao inserir dados no banco de dados.";
                } else {
                    die("<script>location.href=\"index.php?pagina=meusCursos\";</script>");
                }
            }

            var_dump($novoCredito);
        } else {
            $erro = "Você não tem saldo suficiente!";
        }
        

    }
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
                            <input type="hidden" name="idCurso" value="<?php echo $curso['id']; ?>">
                            <input type="hidden" name="valorCurso" value="<?php echo $curso['valor']; ?>">
                            <button type="submit" name="cursoComprado" value="1" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Valor: R$<?php echo str_replace('.', ',', $curso['valor']); ?></button>
                        </form>
                        </div>
                    </div>
                </div>
            <?php }
        }?>
    </div>
</div>



