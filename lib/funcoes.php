<?php
    function limpar_texto($str){
        return preg_replace("/[^0-9]/", "", $str);
    }

    function visualizaNascimento($str){
        return implode('/', array_reverse(explode('-', $str)));
    }

    function visualizaTelefone ($str){
        if(empty($str)){
            return "Não informado";
        }

        $ddd = substr($str, 0, 2);
        $parte1 = substr($str, 2, 5);
        $parte2 = substr($str, 7);
        return "($ddd) $parte1-$parte2";
    }

    function visualizaDataBanco($str){
        return date("d/m/Y H:i:s", strtotime($str));
    }

    function verificaUsuario($usuario, $tamMin = 5, $tamMax = 30, $nome = ''){
        $erro = false;
        if(empty($usuario)){
            $erro = "O campo $nome não pode ser vazio!";
        } elseif (strlen($usuario) < $tamMin || strlen($usuario) > $tamMax){
            $erro = "O campo $nome deve conter entre 5 e 100 caracteres!";
        } elseif(preg_match("/[^a-zA-Z0-9'-'_' ']/i",$usuario)){
            $erro = "O $nome não deve conter caracteres especiais!!";
        }

        return $erro;
    }

    function verificaSenha($senha, $tamMin = 6, $tamMax = 15){
        $erro = false;
        if(empty($senha)){
            $erro = "O campo senha não pode ser vazio!";
        } elseif (strlen($senha) < $tamMin || strlen($senha) > $tamMax){
            $erro = "O campo senha deve conter entre 5 e 100 caracteres!";
        } elseif(!preg_match("/[^a-zA-Z0-9'-'_' ']/i",$senha)){
            $erro = "O senha deve conter caracteres especiais!!";
        }

        return $erro;
    }

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
    
    
    use PHPMailer\PHPMailer\PHPMailer;
    function enviarEmail($destinatario, $assunto, $mensagem){
        require_once('vendor/autoload.php');

        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->SMTPDebug = 0; //Para visualizar o log do e-mail coloque o atributo com o valor 2
        $mail->Host = 'smtp-mail.outlook.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'vinisibim@hotmail.com.br';
        $mail->Password = 'A21081998b';

        $mail->SMTPSecure = false;
        $mail->isHTML(true);
        $mail->CharSet = 'UTF-8';

        $mail->setFrom('vinisibim@hotmail.com.br', "Vinicius Sibin");
        $mail->addAddress("$destinatario");
        $mail->Subject = "$assunto";
        $mail->Body = "$mensagem";

        if($mail->send()){
            return true;
        } else {
            return false;
        }
    }

    function uploadArquivo ($error, $size, $name, $tmp_name, $diretorio){
        if($error){
            return 1;
        }

        if($size > 2097152){
            return 2;
        }

        $novoNomeDoArquivo = uniqid();
        $extensao = strtolower(pathinfo($name, PATHINFO_EXTENSION));

        if($extensao != "jpg" && $extensao != "png" && $extensao != "jpeg"){
            return 3;
        }

        $path = $diretorio . $novoNomeDoArquivo . "." . $extensao;
        $deu_certo = move_uploaded_file($tmp_name, $path);
        if($deu_certo){
            return $path;
        } else {
            return false;
        }
    }
?>