<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';

    $email = 'brian_castano82221@elpoli.edu.co';
    $nombre = 'Jorge';
    $asunto = 'Prueba';
    $cuerpo = 'Hola';

    $i = 0;
    while ($i < 50) {
        enviarCorreo($email, $nombre, $asunto, $cuerpo);
        $i++;
    }

    enviarCorreo($email, $nombre, $asunto, $cuerpo);
    function enviarCorreo($email, $nombre, $asunto, $cuerpo){
        
        $mail = new PHPMailer(true);
        $mail->SMTPDebug = 0;                     //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'bludu360@gmail.com';                     //SMTP username
        $mail->Password   = 'valzuafuphnupqhj';                               //SMTP password
        $mail->SMTPSecure = 'tls';          //Enable implicit TLS encryption
        $mail->Port       = 587;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
        $mail->setFrom('bludu360@gmail.com', 'Laboratorio Integrado');
        $mail->addAddress($email, $nombre);   //Optional name

            //Content
        
        $mail->CharSet = 'UTF-8';                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $cuerpo;
        $mail->isHTML(true);   

        if($mail->send()){
            return true;
        }else{
            return false;
        }
    }
?>