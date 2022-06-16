<?php
    session_start();
    require("DBconnect.php");
    $no = $_SESSION['no'];
    $email = $_SESSION['mail'];
    $text = $_SESSION['text'];
    $reply = $_POST['reply'];
    $reply  =nl2br($reply);
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'evavivicm0929@gmail.com';                     //SMTP username
        $mail->Password   = 'qoqwyuioveyezhda';                               //SMTP password
        //$mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        $mail->SMTPSecure = 'ssl';
    
        //Recipients
        $mail->setFrom('evavivicm0929@gmail.com', 'health手帳 管理員');
        $mail->addAddress($email);     //Add a recipient

        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->CharSet="UTF-8";
        $mail->Subject = '您好，謝謝您的聯絡，回覆如下:';
        $mail->Body    = $reply;
    
        $mail->SMTPOptions = array(
            'ssl' => array(
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            )
        );
        $mail->send();
        // echo '您的訊息已傳送！';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        $SQL="DELETE FROM message WHERE text='$text'";
        if(mysqli_query($link, $SQL)){
            $SQL="INSERT INTO replymsg (rno, rmail, rtext, reply) VALUES ('$no', '$email', '$text', '$reply')";
            if(mysqli_query($link, $SQL)){
                echo "<script type='text/javascript'>";
                // echo "alert('Update Successful');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=msg_mng.php'>";
            }else{
                echo "<script type='text/javascript'>";
                echo "alert('Update Fail');";
                echo "</script>";
                echo "<meta http-equiv='Refresh' content='0; url=m_reply.php'>";
            }
        }else{
            echo "<script type='text/javascript'>";
            echo "alert('Update Fail');";
            echo "</script>";
            echo "<meta http-equiv='Refresh' content='0; url=m_reply.php'>";
        } 
?>