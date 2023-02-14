<?php


/* apenas dispara o envio do formulário caso exista $_POST['enviarFormulario']*/


if (isset($_POST['enviarFormulario'])){


/*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/


$enviaFormularioParaNome = 'Comercial';

$enviaFormularioParaEmail = 'cebapir@cebapir.com.br';


$caixaPostalServidorNome = 'Formulário do site Cebapir';

$caixaPostalServidorEmail = 'enviaemail@cebapir.com.br';

$caixaPostalServidorSenha = 'enviaemail22';


/*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/


/* abaixo as variaveis principais, que devem conter em seu formulario*/



$nome  = $_POST['nome'];

$email = $_POST['email'];

$telefone = $_POST['telefone'];

$mensagem = $_POST['mensagem'];




$mensagemConcatenada = 'Formulário gerado via website'.'<br/>';

$mensagemConcatenada .= '-------------------------------<br/><br/>';

$mensagemConcatenada .= 'Nome: '.$nome.'<br/>';

$mensagemConcatenada .= 'E-mail: '.$email.'<br/>';

$mensagemConcatenada .= 'Telefone: '.$telefone.'<br/>';





$mensagemConcatenada .= '-------------------------------<br/><br/>';

$mensagemConcatenada .= 'Mensagem: "'.$mensagem.'"<br/>';

        echo "<script>window.location='index.php#contact';alert('$nome, sua mensagem foi enviada com sucesso! Estaremos retornando em breve');</script>";



/*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/


require ('PHPMailer_5.2.4/class.phpmailer.php');


$mail = new PHPMailer();


$mail->IsSMTP();

$mail->SMTPAuth  = true;

$mail->Charset   = 'utf8_decode()';

$mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);

$mail->Port  = '587';

$mail->Username  = $caixaPostalServidorEmail;

$mail->Password  = $caixaPostalServidorSenha;

$mail->From  = $caixaPostalServidorEmail;

$mail->FromName  = utf8_decode($caixaPostalServidorNome);

$mail->IsHTML(true);

$mail->Subject  = utf8_decode($empresa);

$mail->Body  = utf8_decode($mensagemConcatenada);


$mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));


if(!$mail->Send()){

$mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);

}else{

$mensagemRetorno = 'Formulário enviado com sucesso!';

}

}

?>