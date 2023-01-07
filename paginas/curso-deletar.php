<?php 
    include('lib/conexao.php');

    $idCurso = $_GET['idCurso'];
    $sqlCurso = "SELECT * FROM cursos WHERE id = '$idCurso'";
    $sqlCursoQuery = $mysqli->query($sqlCurso);
    $curso = $sqlCursoQuery->fetch_assoc();
    
    var_dump($curso);
    if(isset($_POST['confirma'])){
        $sqlDeletaCurso = "DELETE FROM cursos WHERE id = '$idCurso'";
        $sqlDeletaCursoQuery = $mysqli->query($sqlDeletaCurso);
        if(!$sqlDeletaCursoQuery){
            $erro = "Falha ao deletar o curso do banco de dados";
        } else {
            unlink($curso['fotoCurso']);
            die("<script>location.href=\"index.php?pagina=curso-gerenciar\"</script>");
        }
    }
?>

<div class="auth-body mr-auto ml-auto col-md-5">
    <form class="md-float-material" method="POST">
        <div class="auth-box">
            <div class="col-md-12">
                <h2 class="text-left txt-primary">Deletar o curso <b><?php echo $curso['titulo'] ?></b></h2>
                <p class="m-t-30 text-left" style="color: black;">Tem certeza que deseja deletar o curso ?</p>
            </div>
            <hr/>
            <div class="row m-t-20">
                <div class="col-md-6">
                    <button type="submit" name="confirma" value="1" class="btn hor-grd btn-grd-success btn-md btn-block waves-effect text-center">Deletar</a>
                </div>
                <div class="col-md-6">
                    <a class="btn hor-grd btn-grd-danger btn-md btn-block waves-effect text-center" href="index.php?pagina=curso-gerenciar" style="text-decoration: none; color: #fff;">Cancelar</a>
                </div>
            </div>
        </div>
    </form>
</div>