<?php


	use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\Exception;
    use PHPMailer\PHPMailer\SMTP;
   



    class Message
    {
        private $email = null;
        private $subject = null;
        private $message = null;
        public $status = array('status_code' => null, 'description_status'=>'');

        public function __set($attribute, $value)
        {
            $this->$attribute = $value;
        }
        public function __get($attribute)
        {
            return $this->$attribute;
        }
        public function validMessage()
        {
            if(empty($this->email) || empty($this->subject) || empty($this->message))
            {
                return false;
            }
            return true;
        }
    }
    $message = new Message();
    $message -> __set('email', $_POST['email']);
    $message -> __set('subject', $_POST['subject']);
    $message -> __set('message', $_POST['message']);
    
    if(!$message -> validMessage())
    {
        die();   // Equivalente a exit()
        header('Location: index.php?erro_pagina_nao_existe');
    }

    $mail = new PHPMailer(true);

    try 
    {
        //Server settings
        $mail->SMTPDebug = false;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = '00etset@gmail.com';                     //SMTP username
        $mail->Password   = 'dzdokhuujnsavlbf';                               //SMTP password
        $mail->SMTPSecure = 'tls';            //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('00etset@gmail.com', 'Web Completo Remetente'); //metodo para adicionaro remetente
        $mail->addAddress($message->__get('email'));     //Add a recipient
        // $mail->addAddress('ellen@example.com');               //metodo para adicionar destinatario
        $mail->addReplyTo('00etset@gmail.com', 'Information'); //metodo para responder o remetente
        // $mail->addCC('cc@example.com');//metodo para adicionar destinatario em copia
        // $mail->addBCC('bcc@example.com'); //metodo para adicionar copia oculta

        //Attachments //adicionar anexo
        // $mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
        // $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
			$mail->Subject = $message->__get('subject');
			$mail->Body    = $message->__get('message');
			$mail->AltBody = 'É necessário utilizar um client que suporte html para ter acesso ao documento completo';

        $mail->send();

        $message->status ['status_code'] = 1;
        $message->status ['description_status'] = 'E-mail enviado com sucesso';
        
    } 
    catch (Exception $e) 
    {
        $message->status ['status_code'] = 0;
        $message->status ['description_status'] = "Não foi possível enviar este e-mail! Por favor tente novamente mais tarde. Detalhes do erro: " . $mail->ErrorInfo;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Send Mail</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="icon" href="logo.png">
</head>
<body>
    <div class="container">
        <div class="py-3 text-center">
            <img class="d-block mx-auto mb-2" src="logo.png" alt="" width="72" height="72">
            <h2>Send Mail</h2>
            <p class="lead">Seu app de envio de e-mails particular!</p>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <?php if($message->status['status_code']){ ?>
                <div class="container">
                    <h1 class="display-4 text-success">Sucesso</h1>
                    <p><?= $message->status['description_status']?></p>
                    <a href="index.php" class="btn btn-success btn-lg mt-5 text-white">Voltar</a>
                </div>
            <?php    }?>
            <?php if(!$message->status['status_code'] ){ ?>
                <div class="container">
                    <h1 class="display-4 text-danger">Ops!</h1>
                    <p><?= $message->status['description_status']?></p>
                    <a href="index.php" class="btn btn-danger btn-lg mt-5 text-white">Voltar</a>
                </div>
            <?php    }?>
        </div>
    </div>
</body>
</html>