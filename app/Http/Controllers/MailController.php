<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

// require 'path/to/PHPMailer/src/Exception.php';
// require 'path/to/PHPMailer/src/PHPMailer.php';
// require 'path/to/PHPMailer/src/SMTP.php';

class MailController extends Controller
{
    public function store(Request $request)
    {
        $email = $request->recEmail;
        $mailMessage = $request->mailMessage;

        try {
            if($this->sendMail($mailMessage, $email)) {
                return true;
            } else {
                return false;
            }
        } 
        catch (Exception $e) 
        {
            $data['success'] = false;
            $data['message'] = 'Message could not be sent. Mailer Error: {$mail->ErrorInfo}';
            return $data;
        }
    }

    public function sendMail($mailMessage, $email)
    {
        //Load Composer's autoloader
        require '../vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {
            $mail->SMTPDebug = 0; 
            $mail->isSMTP(); 
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->CharSet = "UTF-8";
            $mail->isHTML(true);
            $mail->Username   = 'info@ewenrealtors.com';
            $mail->Password   = 'ewen@123Park';
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;  
        
            $mail->setFrom('info@ewenrealtors.com', 'Ewen Realtors');
            $mail->addAddress($email);
        
            $mail->Subject = 'Sold New Property - Ewen Realtors';
            $mail->Body = $mailMessage;
        
            $mail->send();
            $data['success'] = true;
            return $data;
        } 
        catch (Exception $e)
        {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            return false;
        }
    }

}
