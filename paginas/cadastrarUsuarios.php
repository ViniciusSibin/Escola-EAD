<div class="auth-body mr-auto ml-auto col-md-7">
    <form class="md-float-material" method="POST">
        <div class="auth-box">
            <div class="col-md-12">
                <h3 class="text-left txt-primary">Cadastrar novo usuário</h3>
                <p class="m-t-30 text-left" style="color: black;">Informe os dados abaixo para cadastrar o usuário!</p>
            </div>
            <hr/>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Nome:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Nome do usuário" name="nome">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">E-mail:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Ex: exemplo@exemplo.com" name="email">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Telefone:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Ex:(44)98765-4321" name="telefone">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Data Nascimento:</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Ex:00/00/000" name="nascimento">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Senha:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Senha" name="senha">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Confirmar Senha:</label>
                <div class="col-sm-10">
                    <input type="password" class="form-control" placeholder="Confirmar Senha" name="confirmarSenha">
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Administrador? </label>
                <div class="col-sm-10">
                    <div><input type="radio" name="admin" value="1"> SIM</div>
                    <div><input type="radio" name="admin" value="0"> NÃO</div>
                </div>
            </div>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto de Perfil: </label>
                <div class="col-sm-10">
                    <input type="file" class="" name="fotoPerfil">
                </div>
            </div>
            <div class="row m-t-20">
                <div class="col-md-6">
                    <a href="index.php?pagina=gerenciarUsuarios" class="btn btn-danger btn-md btn-block waves-effect text-center m-b-20">Cancelar</a>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary btn-md btn-block waves-effect text-center m-b-20">Enviar</button>
                </div>
            </div>
        </div>
    </form>
</div>