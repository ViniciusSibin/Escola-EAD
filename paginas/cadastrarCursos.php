<?php 

if(isset($_POST['enviar'])){
    include('lib/conexao.php');

    $erro = false;

    var_dump($_POST);
    var_dump($_FILES);
    
    $titulo = $_POST['titulo'];
    $professor = $_POST['professor'];
    $carga = $_POST['carga'];
    $valor = $_POST['valor'];
    $fotoCurso = $_FILES['fotoCurso'];
    $descricao = $_POST['descricao'];
    $conteudo = $_POST['conteudo'];

    if(!$erro){

    }else{
        }
}

?>
<div class="auth-body mr-auto ml-auto col-md-5">
    <form class="md-float-material" method="POST" enctype="multipart/form-data">
        <div class="auth-box">
            <div class="col-md-12">
                <h3 class="text-left txt-primary">Cadastrar novo curso</h3>
                <p class="m-t-30 text-left" style="color: black;">Informe os dados abaixo para cadastrar o curso!</p>
            </div>
            <hr/>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Titulo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Titulo do curso" name="titulo">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Professor:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nome do professor" name="professor">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Carga:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Carga Horária" name="carga">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Valor:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Valor do curso" name="valor">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Imagem:</label>
                <div class="col-sm-10">
                    <input type="file" class="form-control" name="fotoCurso">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Descrição:</label>
                <div class="col-sm-10">
                    <textarea rows="5" col="5" class="form-control" placeholder="Descrição curta max: 300 caracteres" name="descricao"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Conteudo:</label>
                <div class="col-sm-10">
                    <textarea rows="5" col="5" class="form-control" placeholder="Conteúdo do curso, max 1000 caracteres" name="conteudo"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label"></label>
                <p class="col-sm-10 col-form-label text-danger">ERRO: teste</p>
            </div>
            
            <div class="row m-t-20">
                <div class="col-md-6">
                    <a href="login.html" class="btn hor-grd btn-grd-danger btn-md btn-block waves-effect text-center m-b-20">Cancelar</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" name='enviar' value='1' class="btn hor-grd btn-grd-primary btn-md btn-block waves-effect text-center m-b-20"><i class="ti-save"></i> Enviar</button>
                </div>
            </div>
        </div>
    </form>
</div>