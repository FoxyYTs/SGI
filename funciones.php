<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    function generaTokenPass($correo) {
        include_once("db.php");
        $conectar=conn();

        $token = generaToken();
        $stmt = mysqli_prepare($conectar,"UPDATE acceso SET request_password='1', token_password = ? WHERE email = ?");
        $stmt->bind_param("ss", $token, $correo);
        $stmt->execute();
        $stmt->close();
        return $token;
    }

    function generaToken() {
        $gen = md5(uniqid(mt_rand(), true));
        return $gen;
    }

    function getValor($campo, $campoWhere, $valor) {
        include_once("db.php");
        $conectar=conn();
    
        $stmt = mysqli_prepare($conectar, "SELECT $campo FROM acceso WHERE $campoWhere = ?");
        mysqli_stmt_bind_param($stmt, "s", $valor);
        mysqli_stmt_execute($stmt);
        $resultado=mysqli_stmt_get_result($stmt) or trigger_error("Error: ",mysqli_error($conectar));
        $total=mysqli_num_rows($resultado);
        
        if ($total>0) {
            return $resultado->fetch_assoc()[$campo];;
        } else {
            return false;
        }
    }

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
        $mail->setFrom('bludu360@gmail.com', 'Mailer');
        $mail->addAddress($email, $nombre);   //Optional name

            //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $cuerpo;

        if($mail->send()){
            return true;
        }else{
            return false;
        }
    }
    function verificarTokenPass($user,$token) {
        include_once("db.php");
        $conectar=conn();

        $stmt = mysqli_prepare($conectar, "SELECT * FROM acceso WHERE user = ? AND token_password = ? AND request_password = '1' LIMIT 1");
        mysqli_stmt_bind_param($stmt, "ss", $user, $token);
        mysqli_stmt_execute($stmt);
        $resultado=mysqli_stmt_get_result($stmt) or trigger_error("Error: ",mysqli_error($conectar));
        $total=mysqli_num_rows($resultado);

        if ($total>0) {
            $stmt->bind_result()
    }
?>