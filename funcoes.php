<?php 
	function enviarEmail($para, $nome, $assunto, $mensagem)  {		
		require_once("phpmailer/PHPMailerAutoload.php");		
		$Email = new PHPMailer();		
		$Email->isSMTP();
		//$Email->SMTPDebug = 0; //troque para 1 para exibir as msgs
		$Email->SMTPAuth = 'true';
		$Email->SMTPSecure = 'tls';		
		$Email->Host = 'smtp.gmail.com';
		$Email->Port = 587;		
		$Email->Username = 'horadoiffar';
		$Email->Password = 'iffar123';	
		$Email->SetLanguage('br');	
		$Email->FromName = $nome;
		$Email->AddAddress ($para);
		$Email->Subject = $assunto;
		$Email->Body = $mensagem;		
		if (!$Email ->Send()) {
			echo "<script> alert ('Sua mensagem nao foi enviada')</script>" .$Email->ErrorInfo;
            echo "<script> window.location.href = 'index.php'</script>";
        }
		else { 
			echo "<script> alert ('Sua mensagem foi enviada')</script>";
            echo "<script> window.location.href = 'index.php'</script";
        }
    }
?>