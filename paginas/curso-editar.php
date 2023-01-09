<?php 
    include('lib/protect.php');
    protect(1);

    $idCurso = $_GET['idCurso'];
    $sqlCurso = "SELECT * FROM cursos WHERE id = '$idCurso'";
    $sqlCursoQuery = $mysqli->query($sqlCurso);
    $curso = $sqlCursoQuery->fetch_assoc(); 

if(isset($_POST['enviar'])){
    include('lib/conexao.php');
    include('lib/funcoes.php');

    $erro = false;
    
    $titulo = $_POST['titulo'];
    $professor = $_POST['professor'];
    $carga = $_POST['carga'];
    $valor = $_POST['valor'];
    if(empty($_POST['descricao'])) $descricao = $curso['descricao']; else $descricao = $_POST['descricao'];
    if(empty($_POST['conteudo'])) $conteudo = $curso['conteudo']; else $conteudo = $_POST['conteudo'];

    if(verificaUsuario($titulo, 5, 100, 'titulo')){
        $erro[] = verificaUsuario($titulo, 5, 100, 'titulo');
    }
    
    if(verificaUsuario($professor, 5, 50, "professor")){
        $erro[] = verificaUsuario($professor, 5, 50, "professor");
    }

    if(empty($carga)){
        $erro[] = "A campo carga não pode estar vazio!";
    }

    if(empty($descricao)){
        $erro[] = "A campo descrição não pode estar vazia!";
    } elseif (strlen($descricao)<10 || strlen($descricao)>100){
        $erro[] = "A campo descrição deve ter entre 10 e 300 caracteres!";
    }

    if(empty($conteudo)){
        $erro[] = "O campo conteúdo não pode estar vazia!";
    } elseif (strlen($conteudo)<10 || strlen($conteudo)>1000){
        $erro[] = "O campo conteúdo deve ter entre 10 e 300 caracteres!";
    }

    if(!$erro){
        $pathFotoCurso = $curso['fotoCurso'];
        $arq = $_FILES['fotoCurso'];
        if(!empty($arq['name']) && !empty($arq['size'])){
            $pathFotoCurso = uploadArquivo ($arq['error'], $arq['size'], $arq['name'], $arq['tmp_name'], "assets/images/cursos/");
            if($pathFotoCurso == 1){
                $erro[] = "Imagem com erro!";
            } else if($pathFotoCurso == 2) {
                $erro[] = "Arquivo muito grande!! Max: 2MB";
            } else if($pathFotoCurso == 3) {
                $erro[] = "Tipo de arquivo não aceito, tipos aceitos:<br> <b>jpg</b>, <b>png</b>";
            }
            if(!$erro) unlink($curso['fotoCurso']);
        }
        
        if(!$erro){
            $sqlCadastroCurso = "UPDATE cursos SET titulo = '$titulo', descricao = '$descricao', professor = '$professor', carga = '$carga', valor = '$valor', fotoCurso = '$pathFotoCurso', conteudo = '$conteudo' WHERE id = '$idCurso'";
            $sqlCadastroCursoQuery = $mysqli->query($sqlCadastroCurso);
            if(!$sqlCadastroCursoQuery){
                $erro[] = "Falha ao inserir no banco de dados: " . $mysqli->error;
            } else {
                die("<script>location.href=\"index.php?pagina=curso-gerenciar\";</script>");
            }
        }
    }   
}

?>
<div class="auth-body mr-auto ml-auto col-md-5">
    <form class="md-float-material" method="POST" enctype="multipart/form-data">
       
        <div class="auth-box">
            <?php if(isset($erro) > 0 && $erro){ ?>
                <div class="alert alert-danger">
                    <?php foreach($erro as $e){?>
                       <b>ERRO:</b> <?php echo $e;?><br>
                    <?php } ?>
                </div>
            <?php } ?>
            <div class="col-md-12">
                <h2 class="text-left txt-primary">Editar curso</h2>
                <p class="m-t-30 text-left" style="color: black;">Informe os dados abaixo para editar o curso!</p>
            </div>
            <hr/>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Titulo:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Titulo do curso" name="titulo" value="<?php if(isset($_POST['titulo'])) echo $_POST['titulo']; else echo $curso['titulo'];?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Professor:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nome do professor" name="professor" value="<?php if(isset($_POST['professor'])) echo $_POST['professor']; else echo $curso['professor']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Carga:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" min="0.00" max="10000.00" step="1" placeholder="Carga horaria do curso" name="carga" value="<?php if(isset($_POST['carga'])) echo $_POST['carga']; else echo $curso['carga']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Valor:</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" min="0.00" max="10000.00" step="0.01" placeholder="valor do curso"  name="valor" value="<?php if(isset($_POST['valor'])) echo $_POST['valor']; else echo $curso['valor']; ?>">
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
                    <textarea rows="5" col="5" class="form-control" placeholder="Descrição curta max: 300 caracteres" name="descricao" value="<?php if(isset($_POST['descricao'])) echo $_POST['descricao'];  else echo $curso['descricao'];?>"></textarea>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Conteudo:</label>
                <div class="col-sm-10">
                    <textarea rows="5" col="5" class="form-control" min="10" max="1000" placeholder="Conteúdo do curso, max 1000 caracteres" name="conteudo" value="<?php if(isset($_POST['conteudo'])) echo $_POST['conteudo']; ?>"></textarea>
                </div>
            </div>
            
            <div class="row m-t-20">
                <div class="col-md-6">
                    <a href="index.php?pagina=curso-gerenciar" class="btn hor-grd btn-grd-danger btn-md btn-block waves-effect text-center m-b-20">Cancelar</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" name='enviar' value='1' class="btn hor-grd btn-grd-success btn-md btn-block waves-effect text-center m-b-20"><i class="ti-save"></i>Enviar</button>
                </div>
            </div>
        </div>
    </form>
</div>